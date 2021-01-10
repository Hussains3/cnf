<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Data_user;
use App\Models\File_data;
use App\Models\Goods_report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class Report extends Controller
{
    public function index()
    {
        //ie_datas
        $i = 0;
        //        $file_datas = File_data::get();
        $agents = Agent::pluck('name', 'id');
        return view('reports.index', compact('agents', 'i'));
    }

    public function deliver_report()
    {
        //ie_datas
        $i = 0;
        //        $file_datas = File_data::get();
        $agents = Agent::pluck('name', 'id');
        return view('reports.index', compact('agents', 'i'));
    }

    //

    public function get_all_report(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $agent_id = $request->agent_id;

                $query = 'date(created_at) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($agent_id == '') {
                    $file_datas = File_data::whereRaw($query)->where('status', 'Delivered')->with('agent')->with('ie_data')->get();
                } else {
                    $file_datas = File_data::whereRaw($query)->where('status', 'Delivered')->where('agent_id', $request->agent_id)->with('agent')->with('ie_data')->get();
                }
            } else {
                //              $sales_date = Trip::orderBy('id', 'desc')->get();
                //                $file_datas = File_data::with('agent')->with('ie_data')->get();
                $file_datas = File_data::where('status', 'Delivered')->with('agent')->with('ie_data')->get();
            }
            return DataTables::of($file_datas)->make(true);
        }
    }


    public function operator_report()
    {
        //ie_datas
        $i = 0;
        //        $file_datas = File_data::get();
        $agents = Agent::pluck('name', 'id');
        return view('reports.operator', compact('agents', 'i'));
    }

    public function get_operator_report(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $agent_id = $request->agent_id;

                $query = 'date(lodgement_date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($agent_id == '') {
                    $file_datas = File_data::whereRaw($query)->where('status', '!=', 'Received')->with('agent')->with('ie_data')->get();
                } else {
                    $file_datas = File_data::whereRaw($query)->where('status', '!=', 'Received')->where('agent_id', $request->agent_id)->with('agent')->with('ie_data')->get();
                }
            } else {
                //              $sales_date = Trip::orderBy('id', 'desc')->get();
                //                $file_datas = File_data::with('agent')->with('ie_data')->get();
                $file_datas = File_data::where('status', '!=', 'Received')->with('agent')->with('ie_data')->get();
            }
            return DataTables::of($file_datas)->make(true);
        }
    }



    public function receiver_report()
    {
        //ie_datas
        $i = 0;
        //        $file_datas = File_data::get();
        $agents = Agent::pluck('name', 'id');
        return view('reports.receiver', compact('agents', 'i'));
    }

    public function get_receiver_report(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $agent_id = $request->agent_id;

                $query = 'date(lodgement_date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($agent_id == '') {
                    $file_datas = File_data::whereRaw($query)->with('agent')->with('ie_data')->get();
                } else {
                    $file_datas = File_data::whereRaw($query)->where('agent_id', $request->agent_id)->with('agent')->with('ie_data')->get();
                }
            } else {
                //              $sales_date = Trip::orderBy('id', 'desc')->get();
                //                $file_datas = File_data::with('agent')->with('ie_data')->get();
                $file_datas = File_data::with('agent')->with('ie_data')->get();
            }
            return DataTables::of($file_datas)->make(true);
        }
    }



    public function data_entry()
    {


        $i = 0;
        $agents = Agent::pluck('name', 'id');
        return view('reports.data_entry', compact('file_datas', 'agents', 'i'));
    }

    public function get_data_entry(Request $request)
    {


        if (request()->ajax()) {
            if (!empty($request->from_date)) {


                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $agent_id = $request->agent_id;

                $query = 'date(lodgement_date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($agent_id == '') {
                    $file_datas = File_data::whereRaw($query)->where('status', '!=', 'Received')->with(['agent', 'ie_data', 'operator'])->get();
                } else {
                    $file_datas = File_data::whereRaw($query)->where('status', '!=', 'Received')->where('agent_id', $request->agent_id)->with(['agent', 'ie_data', 'operator'])->get();
                }
            } else {

                $file_datas = File_data::where('status', '!=', 'Received')->with(['agent', 'ie_data', 'operator'])->get();
            }

            return DataTables::of($file_datas)->make(true);
        }
    }



    public function daily_summary()
    {
        $date = Carbon::today();
        $file_datas = File_data::whereDate('created_at', $date)->get();
        $total_file = count($file_datas);
        $total_amount = 0;
        foreach ($file_datas as $file_datas) {
            $total_amount = $total_amount + $file_datas->fees;
        }

        return view('reports.daily_summary', compact('total_file', 'total_amount', 'date'));
    }

    public function get_daily_summary(Request $request)
    {
        $date = $request->date;

        $file_datas = File_data::whereDate('created_at', $date)->get();
        $total_file = count($file_datas);
        $total_amount = 0;
        foreach ($file_datas as $file_datas) {
            $total_amount = $total_amount + $file_datas->fees;
        }
        return view('reports.daily_summary', compact('total_file', 'total_amount', 'date'));
    }




    public function daily_report()
    {
        $date = Carbon::today();
        $file_datas = File_data::with(['ie_data', 'agent', 'operator'])
            ->whereDate('created_at', $date)
            ->where('status', '<>', 'Received')
            ->orderBy('be_number', 'asc')
            ->get();
        $total_file = count($file_datas);
        $total_amount = 0;
        foreach ($file_datas as $file_data) {
            $total_amount = $total_amount + $file_data->fees;
        }
        $users = User::pluck('name', 'id');
        return view('reports.daily_report', compact('file_datas', 'users', 'total_amount', 'total_file', 'date'));
    }



    public function get_daily_report(Request $request)
    {

        $date = $request->to_date;
        $file_datas = File_data::with(['ie_data', 'agent', 'operator'])
            ->whereDate('created_at', $date)
            ->where('status', '<>', 'Received')
            ->orderBy('be_number', 'asc')
            ->get();
        $total_file = count($file_datas);
        $total_amount = 0;
        foreach ($file_datas as $file_data) {
            $total_amount = $total_amount + $file_data->fees;
        }
        $users = User::pluck('name', 'id');
        return view('reports.daily_report', compact('file_datas', 'users', 'total_amount', 'total_file', 'date'));
    }



    public function import_report()
    {
        //ie_datas
        $i = 0;
        //        $file_datas = File_data::get();
        $agents = Agent::pluck('name', 'id');
        return view('reports.import_report', compact('agents', 'i'));
    }

    public function get_import_report(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $agent_id = $request->agent_id;

                $query = 'date(created_at) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($agent_id == '') {
                    $file_datas = File_data::whereRaw($query)->where('ie_type', 'Import')->where('status', 'Delivered')->with('agent')->with('ie_data')->get();
                } else {
                    $file_datas = File_data::whereRaw($query)->where('ie_type', 'Import')->where('status', 'Delivered')->where('agent_id', $request->agent_id)->with('agent')->with('ie_data')->get();
                }
            } else {
                //              $sales_date = Trip::orderBy('id', 'desc')->get();
                //                $file_datas = File_data::with('agent')->with('ie_data')->get();
                $file_datas = File_data::where('ie_type', 'Import')->where('status', 'Delivered')->with('agent')->with('ie_data')->get();
            }
            return DataTables::of($file_datas)->make(true);
        }
    }

    public function export_report()
    {
        //ie_datas
        $i = 0;
        //        $file_datas = File_data::get();
        $agents = Agent::pluck('name', 'id');
        return view('reports.export_report', compact('agents', 'i'));
    }

    public function get_export_report(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $agent_id = $request->agent_id;

                $query = 'date(created_at) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($agent_id == '') {
                    $file_datas = File_data::whereRaw($query)->where('ie_type', 'Export')->where('status', 'Delivered')->with('agent')->with('ie_data')->get();
                } else {
                    $file_datas = File_data::whereRaw($query)->where('ie_type', 'Export')->where('status', 'Delivered')->where('agent_id', $request->agent_id)->with('agent')->with('ie_data')->get();
                }
            } else {
                //              $sales_date = Trip::orderBy('id', 'desc')->get();
                //                $file_datas = File_data::with('agent')->with('ie_data')->get();
                $file_datas = File_data::where('ie_type', 'Export')->where('status', 'Delivered')->with('agent')->with('ie_data')->get();
            }
            return DataTables::of($file_datas)->make(true);
        }
    }



    public function monthly_final_report()
    {
        $i = 0;
        $date = date('m');
        // $users = User::where()->get();
        $users = User::whereRoleIs('operator')->orderBy('name', 'asc')->pluck('name', 'id');
        // return $users;
        // $month = date('m', strtotime(date('m')));
        // return $month;

        /*
            SELECT
	users.`name`,
	SUM(file_datas.page) AS totalFile,
	SUM(file_datas.no_of_pages) AS totalPage,
		(SELECT
	salaries.working_days
FROM
	salaries
WHERE
	salaries.user_id = file_datas.operator_id AND
	salaries.`year` = 2021 AND
	salaries.`month` = 1 ) as Day,

	(SELECT
	salaries.holiday
FROM
	salaries
WHERE
	salaries.user_id = file_datas.operator_id AND
	salaries.`year` = 2021 AND
	salaries.`month` = 1 ) as holiday
FROM
	file_datas
	INNER JOIN
	users
	ON
		file_datas.operator_id = users.id
	INNER JOIN
	salaries
	ON
		users.id = salaries.user_id
WHERE
	file_datas.created_at BETWEEN "2021-01-01" AND "2021-01-31"
GROUP BY
	file_datas.operator_id

        */


        $userSalary = DB::table('salaries')
            ->selectRaw(
                'users.`name`,
                SUM( IF(file_datas.page = 1,1,0) ) AS item_1,
                SUM(file_datas.page) AS TotalItem,
                SUM(file_datas.no_of_pages) AS total_pages'
            )
            ->where('month', '=', $date)
            ->groupBy('users.name')
            ->join('users', 'users.id', '=', 'file_datas.operator_id')
            ->get();
        return $userSalary;
        return view('reports.monthly_final_report', compact('i', 'users', 'userSalary'));
    }





    public function work_report_per_day($date = "2020-12-21")
    {
        $i = 1;
        $users = User::get();
        $agents = Agent::pluck('name', 'id');
        $date = !empty($date) ? $date : date('Y-m-d');


        $work_sheet = DB::table('file_datas')
            ->selectRaw(
                'users.`name`,
            SUM( IF(file_datas.page = 1,1,0) ) AS item_1,
            SUM( IF(file_datas.page BETWEEN 2 AND 4,1,0) ) AS item_2_4,
            SUM( IF(file_datas.page BETWEEN 5 AND 7,1,0) ) AS item_5_7,
            SUM( IF(file_datas.page BETWEEN 8 AND 9,1,0) ) AS item_8_9,
            SUM( IF(file_datas.page >= 10 ,1,0) ) AS item_10,
            SUM(file_datas.page) AS TotalItem,
            SUM(file_datas.no_of_pages) AS total_pages'
            )
            ->whereDate('lodgement_date', '=', $date)
            ->groupBy('users.name')
            ->join('users', 'users.id', '=', 'file_datas.operator_id')
            ->get();
        // return $work_sheet;

        // if ($work_sheet != 0) {
        //     # code...
        // }
        //   return  $date;
        return view('reports.work_report', compact('i', 'work_sheet'));
    }

    public function get_work_report(Request $request)
    {

        return $this->work_report_per_day($request->target_date);
    }


    //monthly asesment report with gf ==================================start
    public function goods_report(Request $request)
    {
        $i = 0;
        $startDate = Carbon::now(); //returns current day
        $first = $request->from_date ?? "2020-12-01";
        $last = $request->to_date ?? "2020-12-31";
        $name = null;

        $assReportQ = DB::table('file_datas')
            ->selectRaw(
                'users.`name`,
                file_datas.lodgement_date,
                SUM(file_datas.page) AS totalFiles,
                SUM( IF(file_datas.goods_type = "Perishable" ,1,0) ) AS TotalPerishable,
               IFNULL( (SELECT gfiles.waitingGreenFile FROM gfiles WHERE gfiles.assesmentDate = file_datas.lodgement_date LIMIT 1 ), 0) as Waiting_G_F'
            )
            ->whereBetween('lodgement_date', [$first, $last])
            ->groupBy('users.name', 'file_datas.lodgement_date')
            ->join('users', 'users.id', '=', 'file_datas.operator_id')
            ->orderBy('users.name', "asc")
            ->get();


        $reportItems = $assReportQ->map(function ($item) {

            $tp = $item->totalFiles - $item->TotalPerishable;
            $tpgf = $tp -  $item->Waiting_G_F;
            $percentage = round(($tpgf * 100) / $item->totalFiles, 2);
            return    collect($item)->merge(['tp' => $tp, 'tpgf' => $tpgf, 'percentage' => $percentage]);
        });
        return view('reports.goods_report', compact('reportItems', 'i', 'name'));
    }
}
