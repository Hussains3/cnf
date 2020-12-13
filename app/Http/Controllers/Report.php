<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Data_user;
use App\Models\File_data;
use App\Models\Goods_report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class Report extends Controller
{
    public function index()
    {
        //ie_datas
        $i = 0;
//        $file_datas = File_data::get();
        $agents = Agent::pluck('name','id');
        return view('reports.index',compact('agents','i'));
    }

    public function deliver_report()
    {
        //ie_datas
        $i = 0;
//        $file_datas = File_data::get();
        $agents = Agent::pluck('name','id');
        return view('reports.index',compact('agents','i'));
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
                if ($agent_id == ''){
                    $file_datas = File_data::whereRaw($query)->where('status','Delivered')->with('agent')->with('ie_data')->get();
                }else {
                    $file_datas = File_data::whereRaw($query)->where('status','Delivered')->where('agent_id',$request->agent_id)->with('agent')->with('ie_data')->get();
                }

            } else {
//              $sales_date = Trip::orderBy('id', 'desc')->get();
//                $file_datas = File_data::with('agent')->with('ie_data')->get();
                $file_datas = File_data::where('status','Delivered')->with('agent')->with('ie_data')->get();
            }
            return DataTables::of($file_datas)->make(true);
        }
    }


    public function operator_report()
    {
        //ie_datas
        $i = 0;
//        $file_datas = File_data::get();
        $agents = Agent::pluck('name','id');
        return view('reports.operator',compact('agents','i'));
    }

    public function get_operator_report(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $agent_id = $request->agent_id;

                $query = 'date(lodgement_date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($agent_id == ''){
                    $file_datas = File_data::whereRaw($query)->where('status','!=','Received')->with('agent')->with('ie_data')->get();
                }else {
                    $file_datas = File_data::whereRaw($query)->where('status','!=','Received')->where('agent_id',$request->agent_id)->with('agent')->with('ie_data')->get();
                }

            } else {
//              $sales_date = Trip::orderBy('id', 'desc')->get();
//                $file_datas = File_data::with('agent')->with('ie_data')->get();
                $file_datas = File_data::where('status','!=','Received')->with('agent')->with('ie_data')->get();
            }
            return DataTables::of($file_datas)->make(true);
        }
    }



    public function receiver_report()
    {
        //ie_datas
        $i = 0;
//        $file_datas = File_data::get();
        $agents = Agent::pluck('name','id');
        return view('reports.receiver',compact('agents','i'));
    }

    public function get_receiver_report(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $agent_id = $request->agent_id;

                $query = 'date(lodgement_date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($agent_id == ''){
                    $file_datas = File_data::whereRaw($query)->with('agent')->with('ie_data')->get();
                }else {
                    $file_datas = File_data::whereRaw($query)->where('agent_id',$request->agent_id)->with('agent')->with('ie_data')->get();
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
        $users = User::where('id','!=','1')->pluck('name','id');
        return view('reports.data_entry',compact('users','i'));
    }

    public function get_data_entry(Request $request)
    {

//        return Data_user::with('file_data')->with('user')->get();
        if (request()->ajax()) {
            if (!empty($request->from_date)) {


                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $agent_id = $request->agent_id;

                $query = 'date(lodgement_date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($agent_id == ''){
                    $file_datas = File_data::whereRaw($query)->where('status','!=','Received')->with('agent')->with('ie_data')->get();
                }else {
                    $file_datas = File_data::whereRaw($query)->where('status','!=','Received')->where('agent_id',$request->agent_id)->with('agent')->with('ie_data')->get();
                }

            } else {

//              $sales_date = Trip::orderBy('id', 'desc')->get();
//              $file_datas = File_data::with('agent')->with('ie_data')->get();

                $file_datas = Data_user::with('file_data')->with('user')->get();
            }
            return DataTables::of($file_datas)->make(true);
        }
    }

    public function daily_summary()
    {
        $file_datas = File_data::whereDate('created_at',Carbon::today())->get();
         $total_file = count($file_datas);
         $total_amount = 0;
         foreach ($file_datas as $file_datas){
             $total_amount = $total_amount + $file_datas->fees;
        }

         return view('reports.daily_summary',compact('total_file','total_amount'));
    }

    public function daily_report()
    {


         $file_datas = File_data::where('status','<>','Received')->whereDate('created_at',Carbon::today())->with('ie_data')->with('agent')->with('data_users')->get();

        $total_file = count($file_datas);
        $total_amount = 0;
        foreach ($file_datas as $file_data){
            $total_amount = $total_amount + $file_data->fees;
        }

        $users = User::pluck('name','id');

        return view('reports.daily_report',compact('file_datas','users','total_amount','total_file'));

    }



    public function get_daily_report(Request $request)
    {

//        return Data_user::with('file_data')->with('user')->get();
        if (request()->ajax()) {
            if (!empty($request->from_date)) {


                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $user_id = $request->agent_id;

                $query = 'date(lodgement_date) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($user_id == ''){
                    $file_datas = File_data::whereRaw($query)->where('status','!=','Received')->with('agent')->with('ie_data')->get();
                }else {
                    $file_datas = File_data::whereRaw($query)->where('status','!=','Received')->where('agent_id',$request->agent_id)->with('agent')->with('ie_data')->get();
                }

            } else {

//              $sales_date = Trip::orderBy('id', 'desc')->get();
//              $file_datas = File_data::with('agent')->with('ie_data')->get();

                $file_datas = Data_user::with('file_data')->with('user')->get();
            }
            return DataTables::of($file_datas)->make(true);
        }
    }



    public function import_report()
    {
        //ie_datas
        $i = 0;
//        $file_datas = File_data::get();
        $agents = Agent::pluck('name','id');
        return view('reports.import_report',compact('agents','i'));
    }

    public function get_import_report(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $agent_id = $request->agent_id;

                $query = 'date(created_at) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($agent_id == ''){
                    $file_datas = File_data::whereRaw($query)->where('ie_type','Import')->where('status','Delivered')->with('agent')->with('ie_data')->get();
                }else {
                    $file_datas = File_data::whereRaw($query)->where('ie_type','Import')->where('status','Delivered')->where('agent_id',$request->agent_id)->with('agent')->with('ie_data')->get();
                }

            } else {
//              $sales_date = Trip::orderBy('id', 'desc')->get();
//                $file_datas = File_data::with('agent')->with('ie_data')->get();
                $file_datas = File_data::where('ie_type','Import')->where('status','Delivered')->with('agent')->with('ie_data')->get();
            }
            return DataTables::of($file_datas)->make(true);
        }
    }

    public function export_report()
    {
        //ie_datas
        $i = 0;
//        $file_datas = File_data::get();
        $agents = Agent::pluck('name','id');
        return view('reports.export_report',compact('agents','i'));
    }

    public function get_export_report(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
                $agent_id = $request->agent_id;

                $query = 'date(created_at) between "' . $startdate . '" AND "' . $enddate . '"';
                if ($agent_id == ''){
                    $file_datas = File_data::whereRaw($query)->where('ie_type','Export')->where('status','Delivered')->with('agent')->with('ie_data')->get();
                }else {
                    $file_datas = File_data::whereRaw($query)->where('ie_type','Export')->where('status','Delivered')->where('agent_id',$request->agent_id)->with('agent')->with('ie_data')->get();
                }

            } else {
//              $sales_date = Trip::orderBy('id', 'desc')->get();
//                $file_datas = File_data::with('agent')->with('ie_data')->get();
                $file_datas = File_data::where('ie_type','Export')->where('status','Delivered')->with('agent')->with('ie_data')->get();
            }
            return DataTables::of($file_datas)->make(true);
        }
    }



    public function monthly_final_report(){
        $i = 0;
        $users = User::get();
        //$file_datas = File_data::get();
        $agents = Agent::pluck('name','id');
        return view('reports.monthly_final_report',compact('agents','i'));
    }
    public function get_monthly_final_report(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
//                $agent_id = $request->agent_id;

                $query = 'date(date) between "' . $startdate . '" AND "' . $enddate . '"';
                    $file_datas = Goods_report::whereRaw($query)->get();

            } else {
//              $sales_date = Trip::orderBy('id', 'desc')->get();
//                $file_datas = File_data::with('agent')->with('ie_data')->get();
                $file_datas = Goods_report::get();
            }
            return DataTables::of($file_datas)->make(true);
        }
    }





    public function goods_report()
    {
         $i = 0;
//        $file_datas = File_data::get();
        $agents = Agent::pluck('name','id');
        return view('reports.goods_report',compact('agents','i'));
    }

    public function get_goods_report(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $startdate = $request->from_date;
                $enddate = $request->to_date;
//                $agent_id = $request->agent_id;

                $query = 'date(date) between "' . $startdate . '" AND "' . $enddate . '"';
                    $file_datas = Goods_report::whereRaw($query)->get();

            } else {
//              $sales_date = Trip::orderBy('id', 'desc')->get();
//                $file_datas = File_data::with('agent')->with('ie_data')->get();
                $file_datas = Goods_report::get();
            }
            return DataTables::of($file_datas)->make(true);
        }
    }



}
