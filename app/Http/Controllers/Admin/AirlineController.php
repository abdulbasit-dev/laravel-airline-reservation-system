<?php

namespace App\Http\Controllers\Admin;

use App\Models\Airline;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AirlineRequest;
use DataTables;

class AirlineController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Airline::query()
                ->withCount('planes');
            return Datatables::of($data)->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('airlines.show', $row->id) . '" type="button" class="btn btn-sm  btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="' . route('airlines.edit', $row->id) . '" type="button" class="btn btn-sm  btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('airlines.destroy', $row->id) . '"  class="btn btn-sm  btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->addColumn('image', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex align-items-center">';
                    $td .= '<img src="' . getFile($row) . '" class="img-thumbnail avatar-md">';
                    $td .= '<span class="ms-2">' . $row->name . '</span>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('planes_count', function ($row) {
                    return '<span class="badge badge-pill badge-soft-info font-size-14">' . $row->planes_count . '</span>';
                })
                ->editColumn('created_at', fn ($row) => formatDate($row->created_at))
                ->rawColumns(['action', 'image', 'planes_count'])
                ->make(true);
        }

        return view('admin.airlines.index');
    }

    public function create()
    {
        return view('admin.airlines.create');
    }

    public function store(AirlineRequest $request)
    {
        try {
            $validated = $request->validated();
            $airline = Airline::create($validated);

            if ($request->has('file')) {
                // get file name from requets and find this file in the storage
                $filePath = storage_path('tmp/uploads/' . $request->file);
                // this will move the file from its current path to the storage path
                $airline->addMedia($filePath)->usingName($request->name)->toMediaCollection();
            }

            return redirect()->route('airlines.index')->with([
                "message" =>  __('messages.success'),
                "icon" => "success",
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                "message" => $th->getMessage(),
                "icon" => "error",
            ]);
        }
    }

    public function show(Request $request, Airline $airline)
    {
        $airline->load('planes');

        if ($request->ajax()) {
            return Datatables::of($airline->planes)->addIndexColumn()
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

        return view('admin.airlines.show', compact('airline'));
    }

    public function edit(Airline $airline)
    {
        return view('admin.airlines.edit', compact("airline"));
    }

    public function update(AirlineRequest $request, Airline $airline)
    {
        try {
            $validated = $request->validated();
            $airline->update($validated);

            if ($request->has('file')) {
                // delete old product image
                $mediaItems = $airline->getMedia();
                if (count($mediaItems) > 0) {
                    $mediaItems->each(function ($item, $key) {
                        $item->delete();
                    });
                }

                // get file name from requets and find this file in the storage
                $filePath = storage_path('tmp/uploads/' . $request->file);

                // this will move the file from its current path to the storage path
                $airline->addMedia($filePath)->usingName($request->name)->toMediaCollection();
            }

            return redirect()->route('airlines.index')->with([
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

    public function destroy(Airline $airline)
    {
        $airline->delete();
        return redirect()->route('airlines.index');
    }

}
