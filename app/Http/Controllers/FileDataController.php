<?php

namespace App\Http\Controllers;

use App\Mail\SendMailable;
use App\Models\Agent;
use App\Models\Data_user;
use App\Models\File_data;
use App\Models\Ie_data;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FileDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i = 0;
        $file_datas = File_data::with('agent')->with('ie_data')->get();
        return view('file_datas.index', compact('file_datas','i'));
    }

    public function file_list()
    {
        $i = 0;
        $file_datas = File_data::get();
        return view('file_datas.index', compact('file_datas','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $now = Carbon::now();
        $year = $now->year;

        $file_data = File_data::latest()->first();
        if ($file_data){
            $next_lodgement_no = $file_data->lodgement_no + 1;
        }else{
            $next_lodgement_no = 1;
        }


        $agents = Agent::pluck('name','id');
        return view('file_datas.create',compact('agents','next_lodgement_no','year','file_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lodgement_no' => 'required',
            'lodgement_date' => 'required',
            'manifest_no' => 'required',
            'manifest_date' => 'required',
            'agent_id' => 'sometimes',
            'group' => 'sometimes',
            'note' => 'sometimes'
        ]);

        $file_data = new File_data();
        $file_data->lodgement_no = $request->lodgement_no;
        $file_data->lodgement_date = $request->lodgement_date;
        $file_data->manifest_no = $request->manifest_no;
        $file_data->manifest_date = $request->manifest_date;
        $file_data->agent_id = $request->agent_id;
        $file_data->group = $request->group;
        $file_data->status = 'Received';
        //$file_data->note = $request->note;
        $file_data->save();

        $data_user = new Data_user();
        $data_user->file_data_id = $file_data->id;
        $data_user->user_id = Auth::user()->id;
        $data_user->note = Auth::user()->name;
        $data_user->save();

        flash('New File Receive Success.')->success();

        return redirect()->route('file_datas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File_data  $file_data
     * @return \Illuminate\Http\Response
     */
    public function show(File_data $file_data)
    {
        if( Auth::user()->hasRole('admin|deliver')){
            


            $ie_data = File_data::find($file_data->ie_data_id);
            $ie_data->status = 'Printed';
            $ie_data->save();
        }

        return view('file_datas.show',compact('file_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File_data  $file_data
     * @return \Illuminate\Http\Response
     */
    public function edit(File_data $file_data)
    {


        $now = Carbon::now();
        $year = $now->year;

        if($file_data->be_number != ''){

             $next_be_number = $file_data->be_number;
        }else {
            $next_be_number = File_data::where('status','!=','Received')->latest()->first();
            if ($next_be_number){
                $next_be_number = $next_be_number->be_number + 1;
            }else{
                $next_be_number = 1;
            }

        }


        $agents = Agent::pluck('name','id');
        $ie_datas = Ie_data::pluck('name','id');

         $file_data = File_data::where('id',$file_data->id)->with('ie_data')->first();




        return view('file_datas.edit',compact('file_data','agents','ie_datas','year','next_be_number'));
    }

    public function file_edit(File_data $file_data)
    {
        $agents = Agent::pluck('name','id');
        return view('file_datas.file_edit',compact('file_data','agents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File_data  $file_data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File_data $file_data)
    {


        if( Auth::user()->hasRole('receiver')){
            $this->validate($request, [
                'lodgement_no' => 'required',
                'lodgement_date' => 'required',
                'manifest_no' => 'required',
                'manifest_date' => 'required',
                'agent_id' => 'required',
                'group' => 'required'
            ]);

            $file_data->lodgement_no = $request->lodgement_no;
            $file_data->lodgement_date = $request->lodgement_date;
            $file_data->manifest_no = $request->manifest_no;
            $file_data->manifest_date = $request->manifest_date;
            $file_data->agent_id = $request->agent_id;
            $file_data->group = $request->group;
            $file_data->save();
        }

        if( Auth::user()->hasRole('operator')){

            $this->validate($request, [
                'lodgement_no' => 'required',
                'lodgement_date' => 'required',
                'manifest_no' => 'required',
                'manifest_date' => 'required',
                'ie_type' => 'required',
                'agent_id' => 'required',
                'goods_type' => 'required',
                'be_number' => 'required',
                'page' => 'required'
            ]);

            if ($file_data->ie_data_id == '') {

                $ie_data = new Ie_data();
            }else{

                $ie_data = Ie_data::find($file_data->ie_data_id);

            }
                $ie_data->bin_no = $request->bin_no;
                $ie_data->ie = $request->ie_type;
                $ie_data->name = $request->name;
                $ie_data->owners_name = $request->owners_name;
                

                if ($request->hasFile('photo')) {
                    //get image file.
                    $image = $request->photo;
                    //get just extension.
                    $ext = $image->getClientOriginalExtension();
                    //make a unique name
                    $filename = uniqid() . '.' . $ext;

                    //delete the previous image.
//             Storage::delete("images/{$projectVerified->image}");

                    //upload the image
                    $request->photo->move(public_path('images'), $filename);

                    //this column has a default value so don't need to set it empty.
                    $ie_data->photo = 'images/'.$filename;
                }

                $ie_data->destination = $request->destination;

                $ie_data->office_address = $request->office_address;
                $ie_data->phone = $request->phone;
                $ie_data->email = $request->email;
                $ie_data->house = $request->house;
                $ie_data->save();



            $file_data->lodgement_no = $request->lodgement_no;
            $file_data->lodgement_date = $request->lodgement_date;
            $file_data->manifest_no = $request->manifest_no;
            $file_data->manifest_date = $request->manifest_date;
            $file_data->ie_type = $request->ie_type;
            $file_data->ie_data_id = $ie_data->id;
            $file_data->agent_id = $request->agent_id;
            $file_data->group = $request->group;
            $file_data->goods_name = $request->goods_name;
            $file_data->goods_type = $request->goods_type;
            $file_data->be_number = $request->be_number;
            $file_data->be_date = $request->be_date;
            $file_data->page = $request->page;
            $file_data->fees = $request->fees;
            $file_data->operator_id = Auth::user()->id;
            $file_data->status = 'Operated';
            $file_data->save();


            $file_data_check = Data_user::where('user_id',Auth::user()->id)->where('file_data_id',$file_data->id)->get();


            if (count($file_data_check) == '0'){
                $data_user = new Data_user();
                $data_user->file_data_id = $file_data->id;
                $data_user->user_id = Auth::user()->id;
                $data_user->note = Auth::user()->name;
                $data_user->save();
            }

            flash('Received File Operated Success.')->success();

        }

        if( Auth::user()->hasRole('admin|deliver')){

            $this->validate($request, [
                'lodgement_no' => 'required',
                'lodgement_date' => 'required',
                'manifest_no' => 'required',
                'manifest_date' => 'required',
                'ie_type' => 'required',
                'agent_id' => 'required',
                'group' => 'required',
                'goods_type' => 'required',
                'be_number' => 'required',
                'page' => 'required'
            ]);


            if ($file_data->ie_data_id == '') {

                $ie_data = new Ie_data();
            }else{

                $ie_data = Ie_data::find($file_data->ie_data_id);

            }
            $ie_data->bin_no = $request->bin_no;
            $ie_data->ie = $request->ie_type;
            $ie_data->name = $request->name;
            $ie_data->owners_name = $request->owners_name;

            if ($request->hasFile('photo')) {
                //get image file.
                $image = $request->photo;
                //get just extension.
                $ext = $image->getClientOriginalExtension();
                //make a unique name
                $filename = uniqid() . '.' . $ext;

                //delete the previous image.
//             Storage::delete("images/{$projectVerified->image}");

                //upload the image
                $request->photo->move(public_path('images'), $filename);

                //this column has a default value so don't need to set it empty.
                $ie_data->photo = 'images/'.$filename;
            }

            $ie_data->destination = $request->destination;

            $ie_data->office_address = $request->office_address;
            $ie_data->phone = $request->phone;
            $ie_data->email = $request->email;
            $ie_data->house = $request->house;
            $ie_data->save();

            //return $request->all();

            $file_data->lodgement_no = $request->lodgement_no;
            $file_data->lodgement_date = $request->lodgement_date;
            $file_data->manifest_no = $request->manifest_no;
            $file_data->manifest_date = $request->manifest_date;
            $file_data->ie_type = $request->ie_type;
            $file_data->ie_data_id = $ie_data->id;
            $file_data->agent_id = $request->agent_id;
            $file_data->group = $request->group;
            $file_data->goods_name = $request->goods_name;
            $file_data->goods_type = $request->goods_type;
            $file_data->be_number = $request->be_number;
            $file_data->be_date = $request->be_date;
            $file_data->page = $request->page;
            $file_data->fees = $request->fees;
            $file_data->status = 'Delivered';
            $file_data->save();


            $agent_phone = Agent::where('id',$file_data->agent_id)->first();
            $agent_email = $agent_phone->email;
            $agent_phone = $agent_phone->phone;

    //      Sms Data

            $ie_name = Ie_data::where('id',$file_data->ie_data_id)->first();
            $ie_name = $ie_name->name;
            $sms_data = 'B/E Number:'.$file_data->be_number .'. B/E Date: '.$file_data->be_date.'. '. $file_data->ie_type. '. Name: '. $ie_name .'. Manifest No: '. $file_data->manifest_no.'. Manifest Date: '.$file_data->manifest_date;

            //$email_data = 'B/E Number:'.$file_data->be_number .'.<br> B/E Date: '.$file_data->be_date.'.<br> '. $file_data->ie_type. '.<br> Name: '. $ie_name .'.<br> Manifest No: '. $file_data->manifest_no.'.<br> Manifest Date: '.$file_data->manifest_date;

            $email_data = ['be_number'=>$file_data->be_number,'be_date'=>$file_data->be_date,'ie_type'=>$file_data->ie_type,'ie_name'=>$ie_name,'manifest_no'=>$file_data->manifest_no,'manifest_date'=>$file_data->manifest_date];


            //      SMS Function and API

            function send_sms($sms_data, $agent_phone) {

                $url = "http://esms.dianahost.com/smsapi";
                $data = [
                    "api_key" => "C20075015fcfa6e18ab532.04423004",
                    "type" => "text",
                    "contacts" => $agent_phone,
                    "senderid" => "8809612446331",
                    "msg" => $sms_data,
                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
                return $response;
            }

            $file_data_check = Data_user::where('file_data_id',$file_data->id)->where('user_id',Auth::user()->id)->get();
            if (count($file_data_check) == '0'){
                $data_user = new Data_user();
                $data_user->file_data_id = $file_data->id;
                $data_user->user_id = Auth::user()->id;
                $data_user->note = Auth::user()->name;
                $data_user->save();

                send_sms($sms_data, $agent_phone);

                $djm = 'bnplcnfasso@gmail.com';
                Mail::to($agent_email)->send(new SendMailable($email_data));
            }
        }



        return redirect()->route('file_datas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File_data  $file_data
     * @return \Illuminate\Http\Response
     */

    public function destroy(File_data $file_data)
    {
        //
    }
}
