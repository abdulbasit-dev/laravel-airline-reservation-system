<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use App\Http\Requests\CarRequest;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("car_view");

        $data = Car::query()
            ->with('driver:id,name')
            ->get();

        if ($request->ajax()) {
            $data = Car::query()
                ->with('driver:id,name')
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('cars.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="' . route('cars.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('cars.destroy', $row->id) . '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('cars.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("car_add");

        $drivers = User::role(['driver', 'sale-representative'])->get()->pluck('name', 'id')->toArray();
        return view('cars.create', compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        //check permission
        $this->authorize("car_add");

        try {
            $validated = $request->validated();
            Car::create([
                'user_id' => $validated['driver'],
                'plate_number' => $validated['plate_number'],
                'model' => $validated['model'],
            ]);

            return redirect()->route('cars.index')->with([
                "message" =>  __('messages.success'),
                "icon" => "success",
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                "message" =>  $e->getMessage(),
                "icon" => "error",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Car $car)
    {
        //check permission
        $this->authorize("car_view");

        $car->load('driver', 'expenses', 'expenses.user:id,name');

        if ($request->ajax()) {
            return Datatables::of($car->expenses)->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) {
                        $td = '<td>';
                        $td .= '<div class="d-flex">';
                        $td .= '<a href="' . route('car-expenses.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                        $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('car-expenses.destroy', $row->id) . '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                        $td .= "</div>";
                        $td .= "</td>";
                        return $td;
                    }
                )
                ->editColumn('price', function ($row) {
                    return formatPrice($row->price);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // return $car;
        return view('cars.show', compact("car"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //check permission
        $this->authorize("car_edit");

        $drivers = User::role(['driver', 'sale-representative'])->get()->pluck('name', 'id')->toArray();
        return view('cars.edit', compact("car", "drivers"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, Car $car)
    {
        //check permission
        $this->authorize("car_edit");

        try {
            $validated = $request->validated();
            $car->update([
                'user_id' => $validated['driver'],
                'plate_number' => $validated['plate_number'],
                'model' => $validated['model'],
            ]);

            return redirect()->route('cars.index')->with([
                "message" =>  __('messages.update'),
                "icon" => "success",
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                "message" =>  $e->getMessage(),
                "icon" => "error",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //check permission
        $this->authorize("car_delete");

        $car->delete();
        return redirect()->route('cars.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("car_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "cars";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Car::all();

        // create file name  
        $fileName = "car_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }
}
