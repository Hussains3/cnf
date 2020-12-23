<?php

namespace App\Http\Controllers;


use App\Models\Gfile;
use Illuminate\Http\Request;

class GfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gfiles = Gfile::all();
        $i = 0;
        return view('gfiles.index', compact('gfiles', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $yday = date('d.m.Y', strtotime("-1 days"));
        return view('gfiles.create', compact('yday'));
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
            'assesmentDate' => 'required',
            'greenFile' => 'required',
            'waitingGreenFile' => 'required',
        ]);

        $gfile = new Gfile();
        $gfile->assesmentDate = $request->assesmentDate;
        $gfile->greenFile = $request->greenFile;
        $gfile->waitingGreenFile = $request->waitingGreenFile;
        $gfile->save();

        $yday = date('d.m.Y', strtotime("-1 days"));
        return view('gfiles.create', compact('yday'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gfile  $gfile
     * @return \Illuminate\Http\Response
     */
    public function show(Gfile $gfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gfile  $gfile
     * @return \Illuminate\Http\Response
     */
    public function edit(Gfile $gfile)
    {
        $file = Gfile::find($gfile);
        return view('gfiles.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gfile  $gfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gfile $gfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gfile  $gfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gfile $gfile)
    {
        //
    }
}
