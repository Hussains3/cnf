<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Models\File_data;
use App\Purchase;
use App\Sale;
use App\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $i = 0;
        $date = date('Y-m-d');
        $file_datas = File_data::whereDate('created_at', $date)->with('agent')->with('ie_data')->orderBy('id', 'DESC')->get();
        return view('home', compact('file_datas', 'i'));
    }
}
