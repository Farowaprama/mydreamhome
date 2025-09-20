<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tolate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['tolate']=Tolate::select('tolates.id as tolate_id', 'tolates.purpose', 'tolates.status', 'tbl_set_bills.total_bill' , 'house_information.num_of_beds' , 'house_information.num_of_bathroom' , 'house_information.num_of_belcony', 'house_information.image', 'house_information.area', 'house_information.google_location', 'house_information.division_id', 'house_information.district_id')
        ->join('house_information', 'house_information.id', '=', 'tolates.house_info_id')
        ->join('tbl_set_bills', 'tbl_set_bills.id', '=', 'tolates.set_bill_id')
        ->orderBy('tolates.id', 'DESC')
        ->get();
        //dd($data['tolate']);
        return view('home', compact('data'));
    }
}
