<?php

namespace App\Http\Controllers\Admin;

use App\Models\Flight;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FlightRequest;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Plane;
use DataTables;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Flight::query();
            return Datatables::of($data)->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('flights.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('flights.destroy', $row->id) . '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
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
                ->editColumn('status', function ($row) {
                    return $row->status
                        ? '<i class="bx bxs-plane-take-off text-success bx-sm"></i>'
                        : '<i class="bx bxs-plane-land text-danger bx-sm"></i>';
                })
                ->rawColumns(['flight_info', 'route', 'time', 'capacity', 'status', 'action'])
                ->make(true);
        }

        return view('admin.flights.index');
    }

    public function create()
    {
        // get all airlines that have planes
        $airlines = Airline::whereHas("planes")->pluck('name', 'id');
        $airports = Airport::all()->pluck('name', 'id');
        $planes = Plane::all()->pluck('name', 'id');
        return view('admin.flights.create', compact('airports', 'airlines', 'planes'));
    }

    public function store(FlightRequest $request)
    {
        try {
            $validated = $request->validated();
            // find plane 
            $plane = Plane::find($validated['plane_id']);

            Flight::create([
                "flight_number" => rand(1000, 9999),
                "airline_id" => $validated['airline_id'],
                "plane_id" => $validated['plane_id'],
                "origin_id" => $validated['origin_id'],
                "destination_id" => $validated['destination_id'],
                "departure" => $validated['departure'],
                "arrival" => $validated['arrival'],
                "seats" => $plane->capacity,
                "remain_seats" => $plane->capacity,
                "status" => 1,
                "price" => $validated['price'],
            ]);

            return redirect()->route('flights.index')->with([
                "message" =>  __('messages.success'),
                "icon" => "success",
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                "message" =>  $th->getMessage(),
                "icon" => "error",
            ]);
        }
    }

    public function edit(Flight $flight)
    {
        $airlines = Airline::all()->pluck('name', 'id');
        $airports = Airport::all()->pluck('name', 'id');
        $planes = Plane::all()->pluck('name', 'id');
        return view('admin.flights.edit', compact('airports', 'airlines', 'planes', 'flight'));
    }

    public function update(FlightRequest $request, Flight $flight)
    {
        try {
            $validated = $request->validated();
            // find plane 
            $plane = Plane::find($validated['plane_id']);

            $flight->update([
                "flight_number" => rand(1000, 9999),
                "airline_id" => $validated['airline_id'],
                "plane_id" => $validated['plane_id'],
                "origin_id" => $validated['origin_id'],
                "destination_id" => $validated['destination_id'],
                "departure" => $validated['departure'],
                "arrival" => $validated['arrival'],
                "seats" => $plane->capacity,
                "remain_seats" => $plane->capacity,
                "status" => 1,
                "price" => $validated['price'],
            ]);

            return redirect()->route('flights.index')->with([
                "message" =>  __('messages.update'),
                "icon" => "success",
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                "message" =>  $th->getMessage(),
                "icon" => "error",
            ]);
        }
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect()->route('flights.index');
    }

    public function getPlanesByAirline(Request $request)
    {
        $planes = Plane::whereAirlineId($request->airline_id)->pluck('name', 'id');

        // foreach planes push to array 
        $planesArray = [];
        foreach ($planes as $key => $value) {
            $planesArray[] = [
                "id" => $key,
                "text" => $value,
            ];
        }
        return response()->json($planesArray);
    }
}
