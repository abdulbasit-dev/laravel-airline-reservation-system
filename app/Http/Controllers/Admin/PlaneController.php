<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plane;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlaneRequest;
use App\Models\Airline;
use Illuminate\Http\Request;
use DataTables;

class PlaneController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Plane::query()
                ->with('airline:id,name');
            return Datatables::of($data)->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('planes.edit', $row->id) . '" type="button" class="btn btn-sm  btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('planes.destroy', $row->id) . '"  class="btn btn-sm  btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', function ($row) {
                    return formatDate($row->created_at);
                })
                ->editColumn('code', function ($row) {
                    return '<span class="badge badge-pill badge-soft-info font-size-14">' . $row->code . '</span>';
                })
                ->editColumn('capacity', function ($row) {
                    return '<span class="badge badge-pill badge-soft-info font-size-14">' . $row->capacity . '</span>';
                })
                ->rawColumns(['action', 'code', 'capacity'])
                ->make(true);
        }

        return view('admin.planes.index');
    }

    public function create()
    {
        $airlines = Airline::all()->pluck('name', 'id');
        return view('admin.planes.create', compact('airlines'));
    }

    public function store(PlaneRequest $request)
    {
        try {
            $validated = $request->validated();
            Plane::create($validated);

            return redirect()->route('planes.index')->with([
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

    public function edit(Plane $plane)
    {
        $airlines = Airline::all()->pluck('name', 'id');
        return view('admin.planes.edit', compact("plane", "airlines"));
    }

    public function update(PlaneRequest $request, Plane $plane)
    {
        try {
            $validated = $request->validated();
            $plane->update($validated);

            return redirect()->route('planes.index')->with([
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

    public function destroy(Plane $plane)
    {
        $plane->delete();
        return redirect()->route('planes.index');
    }
}
