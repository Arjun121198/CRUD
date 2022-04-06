<?php

namespace App\Http\Controllers;

use App\Models\CustomerDetail;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller

{
    /*
    * View Home Page Function
    */

    public function home()
    {
        $data = CustomerDetail::all();
        return view('home', compact('data'));
    }

    /*
    * Add Customer Details Function
    */

    public function customerAdd(Request $request)
    {
        CustomerDetail::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        ]);
        $data = CustomerDetail::all();
        return view('home', compact('data'));
    }

    /*
    * Delete Customer Details Function
    */

    public function customerDelete(Request $request)
    {
        $data = CustomerDetail::find($request->id);
        $data->delete();
        return redirect('home');
    }

    /*
    * Show old  Customer Details Function
    */
    public function find(Request $request)
    {
        $data = CustomerDetail::find($request->id);
        return view('home', compact(('data')));
    }
    /*
    * Update Customer Details Function
    */

    public function customerUpdate(Request $request)
    {
        $data = CustomerDetail::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();
        return redirect('home');
    }


    /*
    * View Form Function
    */

    public function input()
    {
        return view('input');
    }

    /*
    * View New Form Function
    */

    public function new()
    {
        $data = Number::all();

        return view('new', compact('data'));
    }

    /*
    * Add Number in View Form Function
    */

    public function addNew(Request $request)
    {
        Number::create([
            'number' => $request['number'],
        ]);
        return redirect('new');
    }

    /*
    * Find Number in View Form Function
    */

    public function show(Request $request)
    {
        $searchNumber = Number::where('number', "=", $request->number)->first();

        if ($searchNumber) {
            $response = '<p>Search Found</p>';
        } else {
            $response = '<p>Search Not Found</p>';
        }
        return $response;
    }
    
}
