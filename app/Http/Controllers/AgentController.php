<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $i = 0;
        $agents = Agent::get();
        return view('agents.index', compact('agents', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agents.create');
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
            'name' => 'required',
            'phone' => 'sometimes',
        ]);

        $agent = new Agent();
        $agent->ain_no = $request->ain_no;
        $agent->name = $request->name;
        $agent->owners_name = $request->owners_name;

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
            $agent->photo = 'images/' . $filename;
        }

        $agent->destination = $request->destination;
        $agent->office_address = $request->office_address;
        $agent->phone = $request->phone;
        $agent->email = $request->email;
        $agent->house = $request->house;
        //        $agent->note = $request->note;
        $agent->save();

        flash('New Agent Add Success.')->success();

        return redirect()->route('agents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        //
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        return view('agents.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'sometimes',
        ]);

        $agent->ain_no = $request->ain_no;
        $agent->name = $request->name;
        $agent->owners_name = $request->owners_name;

        //$agent->photo = $request->photo;

        if ($request->hasFile('photo')) {
            //get image file.
            $image = $request->photo;
            //get just extension.
            $ext = $image->getClientOriginalExtension();
            //make a unique name
            $filename = uniqid() . '.' . $ext;

            //delete the previous image.
            Storage::delete("images/{$agent->image}");

            //upload the image
            $request->photo->move(public_path('images'), $filename);

            //this column has a default value so don't need to set it empty.
            $agent->photo = 'images/' . $filename;
        }

        $agent->destination = $request->destination;
        $agent->office_address = $request->office_address;
        $agent->phone = $request->phone;
        $agent->email = $request->email;
        $agent->house = $request->house;
        //$agent->note = $request->note;
        $agent->save();

        flash('Agent UpdateSuccess.')->success();

        return redirect()->route('agents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        // $agent = Agent::find($agent);
        $agent->delete();
        return redirect()->route('agents.index');
    }



    // show soft deleted data
    public function showDeactive()
    {
        $i = 0;
        $tAgent = Agent::onlyTrashed()->get();
        // return $tAgent;
        return view('agents.trash', compact('tAgent', 'i'));
    }

    //======================



    // Restore soft deleted data
    public function restore($id)
    {

        $agent = Agent::onlyTrashed()->find($id);
        $response = 'Something Wrong';

        if (!is_null($agent)) {

            $agent->restore();
            $response = $this->successfulMessage(200, 'Successfully restored', true, $agent->count(), $agent);
        } else {

            return response($response);
        }
        return response($response);
    }

    // Premanent delete
    public function permanentDeleteSoftDeleted($id)
    {
        $agent = Agent::onlyTrashed()->find($id);
        $response = 'Something Wrong';

        if (!is_null($agent)) {

            $agent->forceDelete();
            $response = $this->successfulMessage(200, 'Successfully deleted permanently', true, 0, $agent);
        } else {

            return response($response);
        }
        return response($response);
    }
}
