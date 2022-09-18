<?php

namespace App\Http\Controllers;

use App\Exports\TemplateExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class LaravelExcelExport extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($type, $table)
    {

        //get type of file from request
        $type = $type == 'csv' ? 'csv' : 'xlsx';

        // check if  passed table name is correct and available in database
        if (!Schema::hasTable($table)) {
            return redirect()->back()->with([
                "message" =>  __('messages.invalid_table'),
                "icon" => "error",
            ]);
        }

        // get the heading of your file from the table or you can created your own heading
        $headers = Schema::getColumnListing($table);
        //remove id from headers
        array_shift($headers);

        // create file name  
        $fileName = $table . "_" . strtolower($type) . "_template_import." . $type;
        return Excel::download(new TemplateExport($headers), $fileName);
    }
}
