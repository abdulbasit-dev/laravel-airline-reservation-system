<?php

namespace App\Http\Controllers;

use App\Models\WorkTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use DataTables;

class WorkTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("workTime_view");

        if ($request->ajax()) {
            $data = WorkTime::query()
                ->with('user:id,name')
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('work-times.user-report', $row->user_id) . '" type="button" class="btn btn-sm btn-rounded btn-primary waves-effect waves-light me-1">' . __('translation.work_time.user_report') . '</a>';
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

        return view('work-times.index');
    }

    public function userWorktimes(Request $request, User $user)
    {
        //check permission
        $this->authorize("workTime_view");

        $data = WorkTime::query()
            ->whereUserId($user->id);

        if ($request->ajax()) {
            if (strtotime($request->startDate) && strtotime($request->endDate)) {
                $data->whereBetween('created_at', [$request->startDate, $request->endDate]);
            }
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('total_time', function ($row) {
                    return gmdate("H:i:s", $row->total_time);
                })
                ->editColumn('created_at', function ($row) {
                    return formatDateWithTimezone($row->created_at);
                })
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<button type="button" class="btn btn-sm btn-rounded btn-primary waves-effect waves-light me-1" data-bs-toggle="modal" data-bs-target="#mapView" data-start-lat="'.$row->start_lat.'" data-start-long="'.$row->start_long.'" data-end-lat="'.$row->end_lat.'" data-end-long="'.$row->end_long.'">' . __('translation.work_time.view_on_map') . '</button>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $data->get();
        if ($data) {
            $chart = new LaravelChart([
                'chart_title'           => __('translation.work_time.hour_per_day'),
                'chart_type'            => 'bar',
                'report_type'           => 'group_by_date',
                'model'                 => 'App\Models\WorkTime',
                'group_by_field'        => 'created_at',
                'group_by_period'       => 'day',
                'aggregate_function'    => 'sum',
                'aggregate_field'       => 'total_time',
                'aggregate_transform' => function ($value) {
                    return round($value / 3600, 2);
                },
                'column_class'          => 'col-md-8',
                "where_raw"             => "user_id = $user->id",
                'continuous_time'       => true,
                'filter_field'          => 'created_at',
                'filter_days'           => 30, // show only worktimes for last 30 days
                "chart_color"           => '85, 110, 230',
            ]);
        } else {
            $chart = NULL;
        }

        return view('work-times.user-worktimes', compact('user', 'chart'));
    }
}
