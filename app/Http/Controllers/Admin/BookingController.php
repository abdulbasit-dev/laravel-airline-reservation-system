<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        //check permission
        $this->authorize("booking_view");

        if ($request->ajax()) {
            $data = Booking::query();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $td = '<td>';
                $td .= '<div class="d-flex">';
                     $td .= '<a href="' . route('bookings.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                     $td .= '<a href="' . route('bookings.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('bookings.destroy', $row->id). '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                $td .= "</div>";
                $td .= "</td>";
                return $td;
            })
            // ->editColumn('created_at', function ($row) {
            //     return formatDate($row->created_at);
            // })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('bookings.index');
    }

    public function create()
    {
        //check permission
        $this->authorize("booking_add");

        return view('bookings.create');
    }

    public function store(BookingRequest $request)
    {
        //check permission
        $this->authorize("booking_add");

        try {
            $validated = $request->validated();
            Booking::create($validated);

            return redirect()->route('bookings.index')->with([
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

    public function show(Booking $booking)
    {
        //check permission
        $this->authorize("booking_view");

        return view('bookings.show', compact("booking"));
    }

    public function edit(Booking $booking)
    {
        //check permission
        $this->authorize("booking_edit");
        
        return view('bookings.edit', compact("booking"));
    }

    public function update(BookingRequest $request, Booking $booking)
    {
        //check permission
        $this->authorize("booking_edit");

        try {
            $validated = $request->validated();
            $booking->update($validated);

            return redirect()->route('bookings.index')->with([
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
    
    public function destroy(Booking $booking)
    {
        //check permission
        $this->authorize("booking_delete");

        $booking->delete();
        return redirect()->route('bookings.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("booking_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "bookings";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Booking::all();

        // create file name  
        $fileName = "booking_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("booking_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new BookingsImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('bookings.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}