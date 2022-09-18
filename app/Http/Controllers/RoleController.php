<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DataTables;
use Log;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("role_view");

        if ($request->ajax()) {
            $data = Role::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('roles.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('roles.destroy', $row->id) . '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->addColumn('permissions', function ($row) {
                    $td = '<td>';
                    foreach ($row->permissions as  $permission) {
                        $td .= '<span class="btn btn-sm btn-info btn-rounded  waves-effect waves-light me-1 w-xs m-1">' . $permission->name . '</span>';
                    }
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', function ($row) {
                    return formatDate($row->created_at);
                })
                ->rawColumns(['action', 'permissions'])
                ->make(true);
        }

        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("role_add");

        $permissions = Permission::get()->pluck('name', 'name');
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        //check permission
        $this->authorize("role_add");

        try {
            $validated = $request->safe()->except(['permission']);
            $role = Role::create($validated);
            $permissions = $request->input('permission') ? $request->input('permission') : [];
            $role->givePermissionTo($permissions);

            return redirect()->route('roles.index')->with([
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //check permission
        $this->authorize("role_edit");

        $permissions = Permission::get()->pluck('name', 'name');
        return view('roles.edit', compact("role", "permissions"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        //check permission
        $this->authorize("role_edit");

        try {
            $validated = $request->safe()->except(['permission']);
            $role->update($validated);
            $permissions = $request->input('permission') ? $request->input('permission') : [];
            $role->syncPermissions($permissions);

            return redirect()->route('roles.index')->with([
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
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //check permission
        $this->authorize("role_delete");

        $role->delete();
        return redirect()->route('roles.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("role_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "roles";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Role::all();

        // create file name  
        $fileName = "role_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("role_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new RolesImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('roles.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}
