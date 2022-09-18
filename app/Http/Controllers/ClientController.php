<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use App\Http\Requests\ClientRequest;
use App\Imports\ClientsImport;
use App\Models\ClientCategory;
use App\Models\Zone;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Log;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("client_view");

        if ($request->ajax()) {
            $data = Client::query()
                ->with('category')
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('clients.show', $row->id) . '" type="button" class="btn btn-rounded btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="' . route('clients.edit', $row->id) . '" type="button" class="btn btn-rounded btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('clients.destroy', $row->id) . '"  class="btn btn-rounded btn-sm btn-danger  delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("client_add");

        $clientCategories  = ClientCategory::pluck('name', 'id')->toArray();
        $zones  = Zone::pluck('name', 'id')->toArray();
        return view('clients.create', compact('clientCategories', 'zones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        //check permission
        $this->authorize("client_add");

        try {
            $validated = $request->safe()->except(['category', 'zone']);
            Client::create($validated + [
                'category_id' => $request->category,
                'lat' => $request->lat,
                'long' => $request->long,
                "zone_id" => $request->zone,
            ]);

            return redirect()->route('clients.index')->with([
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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //check permission
        $this->authorize("client_view");

        $client->load('category:id,name');
        // get number of orders for this client
        $client->orders_count = $client->orders()->count();

        return view('clients.show', compact("client"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //check permission
        $this->authorize("client_edit");
        $clientCategories  = ClientCategory::pluck('name', 'id')->toArray();
        return view('clients.edit', compact("client", 'clientCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        //check permission
        $this->authorize("client_edit");

        try {
            $validated = $request->safe()->except(['category']);
            $client->update($validated + ['category_id' => $request->category]);

            return redirect()->route('clients.index')->with([
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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //check permission
        $this->authorize("client_delete");

        $client->delete();
        return redirect()->route('clients.index');
    }

    public function mapView()
    {
        //check permission
        $this->authorize("client_view");

        $clients = Client::all();
        return view('clients.map-view', compact('clients'));
    }


    public function export()
    {
        //check permission
        $this->authorize("client_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "client";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Client::all();

        // create file name  
        $fileName = "client_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("client_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new ClientsImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('clients.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}
