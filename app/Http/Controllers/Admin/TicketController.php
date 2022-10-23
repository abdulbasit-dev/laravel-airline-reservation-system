<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use App\Models\Airline;
use App\Models\City;
use App\Models\Flight;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Illuminate\Http\Response;
use Log;

class TicketController extends Controller
{
    public function showFlights(Request $request)
    {
        if ($request->ajax()) {
            $data = Flight::query()
                ->when($request->airline, function ($query) use ($request) {
                    return $query->where('airline_id', $request->airline);
                })
                ->when($request->origin, function ($query) use ($request) {
                    return $query->where('origin_id', $request->origin);
                })
                ->when($request->destination, function ($query) use ($request) {
                    return $query->where('destination_id', $request->destination);
                })
                ->when($request->departure, function ($query) use ($request) {
                    return $query->whereDate('departure', ">=", $request->departure);
                })
                ->when($request->arrival, function ($query) use ($request) {
                    return $query->whereDate('arrival', $request->arrival);
                })
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex justify-content-center">';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" type="button" class="btn btn-primary waves-effect waves-light me-1 book-btn">' . __('buttons.book_flight') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('flight_info', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="">';
                    $td .= '<p class="fw-bold">' . __('translation.flight.flight_number') . ': <span class="fw-normal">' . $row->flight_number . '</span></p>';
                    $td .= '<p class="fw-bold">' . __('translation.flight.plane_code') . ': <span class="fw-normal">' . $row->plane->code . '</span></p>';
                    $td .= '<p class="fw-bold">' . __('translation.flight.airline') . ': <span class="fw-normal">' . $row->airline->name . '</span></p>';
                    $td .= '<p class="fw-bold">' . __('translation.flight.price') . ': <span class="fw-normal">' . formatPrice($row->price) . '</span></p>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('route', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="">';
                    $td .= '<p class="fw-bold">' . __('translation.flight.origin') . ': <span class="fw-normal">' . airportName($row->origin->name) . '</span></p>';
                    $td .= '<p class="fw-bold">' . __('translation.flight.destination') . ': <span class="fw-normal">' . airportName($row->destination->name) . '</span></p>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('time', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="">';
                    $td .= '<p class="fw-bold">' . __('translation.flight.departure') . ': <span class="fw-normal">' . formatDateWithTimezone($row->departure) . '</span></p>';
                    $td .= '<p class="fw-bold">' . __('translation.flight.arrival') . ': <span class="fw-normal">' . formatDateWithTimezone($row->arrival) . '</span></p>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('capacity', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="">';
                    $td .= '<p class="fw-bold">' . __('translation.flight.seats') . ': <span class="fw-normal">' . $row->seats . '</span></p>';
                    $td .= '<p class="fw-bold">' . __('translation.flight.remain_seats') . ': <span class="fw-normal">' . $row->remain_seats . '</span></p>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->rawColumns(['flight_info', 'route', 'time', 'capacity', 'action'])
                ->make(true);
        }

        $cities = City::pluck('name', 'id')->toArray();
        $airlines = Airline::pluck('name', 'id');

        return view('admin.tickets.booking', compact('cities', 'airlines'));
    }

    // show user booked flighits
    public function userTickets(Request $request)
    {

        if ($request->ajax()) {
            $data =  Ticket::query()
                ->whereUserId(auth()->id())
                ->orderByDesc('created_at')
                ->when($request->airline, function ($query) use ($request) {
                    return $query->whereHas('flight', function ($query) use ($request) {
                        return $query->where('airline_id', $request->airline);
                    });
                })
                ->when($request->origin, function ($query) use ($request) {
                    return $query->whereHas('flight', function ($query) use ($request) {
                        return $query->where('origin_id', $request->origin);
                    });
                })
                ->when($request->destination, function ($query) use ($request) {
                    return $query->whereHas('flight', function ($query) use ($request) {
                        return $query->where('destination_id', $request->destination);
                    });
                })
                ->when($request->departure, function ($query) use ($request) {
                    return $query->whereHas('flight', function ($query) use ($request) {
                        return $query->whereDate('departure', ">=", $request->departure);
                    });
                })
                ->when($request->arrival, function ($query) use ($request) {
                    return $query->whereHas('flight', function ($query) use ($request) {
                        return $query->whereDate('arrival', $request->arrival);
                    });
                })
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex justify-content-center">';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" type="button" class="btn btn-sm btn-outline-danger waves-effect waves-light me-1 cancel-btn">' . __('buttons.cancel_flight') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('flight_info', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="">';
                    $td .= '<p class="fw-bold">' . __('translation.flight.flight_number') . ': <span class="fw-normal">' . $row->flight->flight_number . '</span></p>';
                    $td .= '<p class="fw-bold">' . __('translation.flight.plane_code') . ': <span class="fw-normal">' . $row->flight->plane->code . '</span></p>';
                    $td .= '<p class="fw-bold">' . __('translation.flight.airline') . ': <span class="fw-normal">' . $row->flight->airline->name . '</span></p>';
                    $td .= '<p class="fw-bold">' . __('translation.flight.price') . ': <span class="fw-normal">' . formatPrice($row->flight->price) . '</span></p>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('route', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="">';
                    $td .= '<p class="fw-bold">' . __('translation.flight.origin') . ': <span class="fw-normal">' . airportName($row->flight->origin->name) . '</span></p>';
                    $td .= '<p class="fw-bold">' . __('translation.flight.destination') . ': <span class="fw-normal">' . airportName($row->flight->destination->name) . '</span></p>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('time', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="">';
                    $td .= '<p class="fw-bold">' . __('translation.flight.departure') . ': <span class="fw-normal">' . formatDateWithTimezone($row->flight->departure) . '</span></p>';
                    $td .= '<p class="fw-bold">' . __('translation.flight.arrival') . ': <span class="fw-normal">' . formatDateWithTimezone($row->flight->arrival) . '</span></p>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->rawColumns(['flight_info', 'route', 'time', 'action'])
                ->make(true);
        }

        $cities = City::pluck('name', 'id')->toArray();
        $airlines = Airline::pluck('name', 'id');

        return view('admin.tickets.user-tickets', compact('cities', 'airlines'));
    }



    public function book(Request $request)
    {
        try {
            //find flight
            $flight = Flight::find($request->flight_id);

            //check flight seat is available
            if ($flight->remain_seats < $request->seats) {
                return response()->json([
                    'status' => false,
                    'message' => __('api.not_enough_seats')
                ]);
            }
            // create ticket
            Ticket::create([
                'flight_id' => $request->flight_id,
                'user_id' => auth()->id(),
                'seat_number' => rand(1, 100),
            ]);

            // reduce flight seat
            $flight->decrement('remain_seats', $request->seats);

            // send notification to admin

            return $this->josnResponse(true, __('api.booking_success'), Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json(['message' => showErrorMessage($e)], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function cancel(Request $request)
    {
        try {
            $ticket = Ticket::find($request->id);

            //check ticket is booked by user
            if ($ticket->user_id != auth()->id()) {
                return $this->josnResponse(false, __('api.not_your_ticket'), Response::HTTP_FORBIDDEN);
            }

            //  find flight and increase seat
            $ticket->flight->increment('remain_seats', 1);
            $ticket->delete();


            return $this->josnResponse(true, __('messages.cancel_success'), Response::HTTP_OK);
        } catch (\Throwable $th) {
            return $this->josnResponse(false, __('api.internal_server_error'), Response::HTTP_INTERNAL_SERVER_ERROR, null, showErrorMessage($th));
        }
    }
}
