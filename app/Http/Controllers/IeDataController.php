<?php

namespace App\Http\Controllers;

use App\Models\Ie_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IeDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ie_datas
        $i = 0;
        $ie_datas = Ie_data::get();
        return view('ie_datas.index',compact('ie_datas','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ie_datas.create');
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
            'bin_no' => 'required',
            'name' => 'required',
            'ie' => 'required',
            'owners_name' => 'sometimes',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2024',
            'destination' => 'sometimes',
            'office_address' => 'sometimes',
            'phone' => 'sometimes',
            'email' => 'sometimes',
            'house' => 'sometimes',
            'note' => 'sometimes'
        ]);

        $ie_data = new Ie_data();
        $ie_data->bin_no = $request->bin_no;
        $ie_data->ie = $request->ie;
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
//        $ie_data->note = $request->note;
        $ie_data->save();

        flash('New Importer / Exporter Add Success.')->success();

        return redirect()->route('ie_datas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ie_data  $ie_data
     * @return \Illuminate\Http\Response
     */
    public function show(Ie_data $ie_data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ie_data  $ie_data
     * @return \Illuminate\Http\Response
     */
    public function edit(Ie_data $ie_data)
    {
        return view('ie_datas.edit',compact('ie_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ie_data  $ie_data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ie_data $ie_data)
    {
        $this->validate($request, [
            'bin_no' => 'required',
            'name' => 'required',
            'ie' => 'required',
            'owners_name' => 'sometimes',
            'photo' => 'sometimes|image|mimes:jpg,jpeg,png,gif|max:2024',
            'destination' => 'sometimes',
            'office_address' => 'sometimes',
            'phone' => 'sometimes',
            'email' => 'sometimes',
            'house' => 'sometimes',
            'note' => 'sometimes'
        ]);

        $ie_data->bin_no = $request->bin_no;
        $ie_data->ie = $request->ie;
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
             Storage::delete("images/{$ie_data->image}");

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
//        $ie_data->note = $request->note;
        $ie_data->save();

        flash('New Importer / Exporter Update Success.')->success();
        return redirect()->route('ie_datas.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ie_data  $ie_data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ie_data $ie_data)
    {
        //
    }
}
