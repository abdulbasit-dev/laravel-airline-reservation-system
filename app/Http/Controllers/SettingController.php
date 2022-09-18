<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use App\Imports\SettingImport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use DataTables;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("setting_view");

        if ($request->ajax()) {
            $data = Setting::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $td = '<td>';
                $td .= '<div class="d-flex">';
                     $td .= '<a href="' . route('settings.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('settings.destroy', $row->id). '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                $td .= "</div>";
                $td .= "</td>";
                return $td;
            })
            ->editColumn('created_at', function ($row) {
                return formatDate($row->created_at);
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("setting_add");

        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check permission
        $this->authorize("setting_add");

        $validator = Validator::make($request->all(), [
            "key" => ['required','string'],
            "value" => ['required','string'],
        ]);
        
        try {
            $validator->validate();
            Setting::create([
                "key"=>$request->key,
                "value"=>$request->value]);

            return redirect()->route('settings.index')->with([
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //check permission
        $this->authorize("setting_view");

        return view('settings.show', compact("setting"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //check permission
        $this->authorize("setting_edit");
        
        return view('settings.edit', compact("setting"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //check permission
        $this->authorize("setting_edit");

        $validator = Validator::make($request->all(), [
            "key" => ['required','string'],
            "value" => ['required','string'],
        ]);
        
        try {
            $validator->validate();
            $setting->update([
            "key"=>$request->key,
            "value"=>$request->value]);

            return redirect()->route('settings.index')->with([
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //check permission
        $this->authorize("setting_delete");

        $setting->delete();
        return redirect()->route('settings.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("setting_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "settings";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Setting::all();

        // create file name  
        $fileName = "setting_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("setting_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new SettingImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('suppliers.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}