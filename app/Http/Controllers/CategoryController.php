<?php

namespace App\Http\Controllers;

use App\Exports\GeneralExport;
use App\Http\Requests\CategoryRequest;
use App\Imports\CategoriesImport;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("category_view");

        if ($request->ajax()) {
            $data = Category::all();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('categories.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('categories.destroy', $row->id) . '"  class="btn btn-danger btn-sm delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= '</div>';
                    $td .= '</td>';
                    return $td;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("category_add");

        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //check permission
        $this->authorize("category_add");

        try {
            $validated = $request->validated();
            Category::create($validated);

            return redirect()->route('categories.index')->with([
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //check permission
        $this->authorize("category_edit");

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //check permission
        $this->authorize("category_edit");

        try {
            $validated = $request->validated();
            $category->update($validated);

            return redirect()->route('categories.index')->with([
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //check permission
        $this->authorize("category_delete");

        $category->delete();
        return redirect()->route('categories.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("category_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "categories";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Category::all();

        // create file name  
        $fileName = "categories_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("category_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new CategoriesImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('categories.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}
