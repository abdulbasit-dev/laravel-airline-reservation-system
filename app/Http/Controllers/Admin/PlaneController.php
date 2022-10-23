<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plane;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class PlaneController extends Controller
{
    public function index(Request $request)
    {
        //check permission
        // $this->authorize("plane_view");

        if ($request->ajax()) {
            $data = Plane::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('planes.show', $row->id) . '" type="button" class="btn btn-sm btn-rounded btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="' . route('planes.edit', $row->id) . '" type="button" class="btn btn-sm btn-rounded btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('planes.destroy', $row->id) . '"  class="btn btn-sm btn-rounded btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', function ($row) {
                    return formatDate($row->created_at);
                })
                ->editColumn('code', function ($row) {
                    return '<span class="badge badge-pill badge-soft-info font-size-13">' . $row->code . '</span>';
                })
                ->editColumn('capacity', function ($row) {
                    return '<span class="badge badge-pill badge-soft-info font-size-13">' . $row->capacity . '</span>';
                })
                ->rawColumns(['action', 'code', 'capacity'])
                ->make(true);
        }

        return view('admin.planes.index');
    }

    public function create()
    {
        //check permission
        $this->authorize("plane_add");

        return view('admin.planes.create');
    }

    public function store(PlaneRequest $request)
    {
        //check permission
        $this->authorize("plane_add");

        try {
            $validated = $request->validated();
            Plane::create($validated);

            return redirect()->route('planes.index')->with([
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

    public function show(Plane $plane)
    {
        //check permission
        $this->authorize("plane_view");

        return view('admin.planes.show', compact("plane"));
    }

    public function edit(Plane $plane)
    {
        //check permission
        $this->authorize("plane_edit");

        return view('admin.planes.edit', compact("plane"));
    }

    public function update(PlaneRequest $request, Plane $plane)
    {
        //check permission
        $this->authorize("plane_edit");

        try {
            $validated = $request->validated();
            $plane->update($validated);

            return redirect()->route('planes.index')->with([
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

    public function destroy(Plane $plane)
    {
        //check permission
        $this->authorize("plane_delete");

        $plane->delete();
        return redirect()->route('planes.index');
    }
}
