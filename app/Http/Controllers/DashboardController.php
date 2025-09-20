<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use DB;
use DataTables;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\TblSetBill;
use App\Models\RenterPayBill;

class DashboardController extends Controller
{

    public function admin_dashboard(Request $req, $id = null){

        if(Auth::user()->usertype == 'renter'){

            $renter_id = $id ? $id : Auth::id();
            $data['renter_id'] =  $renter_id;
            $data['user_info'] = User::where('id', $renter_id)->first();

            $data['total_due_pay'] = RenterPayBill::groupBy('renter_id')->where('renter_id', $renter_id)->select("renter_id", DB::raw('SUM(due_bill) AS total_due_bill'), DB::raw('SUM(total_pay) AS total_pay_sum'))->first();

            $data['total_due_pay_current'] = RenterPayBill::groupBy('renter_id')->where('renter_id', $renter_id)->select("renter_id", DB::raw('SUM(due_bill) AS total_due_bill'), DB::raw('SUM(total_pay) AS total_pay_sum'))->whereBetween('created_at', [ Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])->first();
            //dd($data['total_due_pay_current']);
            return view('renter.dashboard', compact('data'));

        }
        else{

            $id = $id ? $id : Auth::id();
            $data['orders'] = Order::where('user_id', $id)->first();

            if(empty($data['orders'])){

                return redirect()->route('checkout');
            }
            else{

                $data['user_info'] = User::where('id', $id)->first();

            

            $data['total_flat'] = TblSetBill::where('created_by', $id)->count();
            $data['total_renter'] = User::where('landlord_id', $id)->count();

            $data['total_due_pay'] = RenterPayBill::groupBy('created_by')->where('created_by', $id)->select("created_by", DB::raw('SUM(due_bill) AS total_due_bill'), DB::raw('SUM(total_pay) AS total_pay_sum'))->first();

            $data['total_due_pay_current'] = RenterPayBill::groupBy('created_by')->where('created_by', $id)->select("created_by", DB::raw('SUM(due_bill) AS total_due_bill'), DB::raw('SUM(total_pay) AS total_pay_sum'))->whereBetween('created_at', [ Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])->first();
            //dd($data['total_due_pay_current']);
            return view('admin\dashboard', compact('data'));

            }

            

            }

        

    }
    public function show_dashboard(Request $req, $id = null){

        $renter_id = $id ? $id : Auth::id();
        $data['renter_id'] =  $renter_id;
        $data['user_info'] = User::where('id', $renter_id)->first();

        $data['total_due_pay'] = RenterPayBill::groupBy('renter_id')->where('renter_id', $renter_id)->select("renter_id", DB::raw('SUM(due_bill) AS total_due_bill'), DB::raw('SUM(total_pay) AS total_pay_sum'))->first();

        $data['total_due_pay_current'] = RenterPayBill::groupBy('renter_id')->where('renter_id', $renter_id)->select("renter_id", DB::raw('SUM(due_bill) AS total_due_bill'), DB::raw('SUM(total_pay) AS total_pay_sum'))->whereBetween('created_at', [ Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->first();
        //dd($data['total_due_pay_current']);
        return view('renter\dashboard', compact('data'));

    }
}
