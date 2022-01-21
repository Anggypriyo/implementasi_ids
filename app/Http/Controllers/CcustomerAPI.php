<?php

namespace App\Http\Controllers;
use App\Models\customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CcustomerAPI extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = customer::all();
        //dd($customer);
        return response()->json([
            'success' => true,
            'message' => 'List Data Customer',
            'data' => $customer,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'alamat' => 'required',
            'id_kel' => 'required',
         ]);
         if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
         }
         $customer = customer::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'id_kel' => $request->id_kel,
            //'foto_customer' => $request->image,
        ]);
        if($customer) {

            return response()->json([
               'success' => true,
               'message' => 'Customer Created',
               'data'    => $customer
            ], 201);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Customer Failed to Save',
             ], 409);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = customer::findOrfail($id);
        if($customer){
            return response()->json([
                'success' => true,
                'messege' => 'List Data Customer',
                'data' => $customer,
            ],200);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Customer Not Found',
                
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'alamat' => 'required',
            'id_kel' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $customer = customer::findOrfail($id);
        if($customer){
            $customer->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'id_kel' => $request->id_kel
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Customer Updated',
                'data' => $customer
            ],200);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Customer Not Found To Updated',
                
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = customer::findOrfail($id);
        if($customer){
            $customer->delete();
            return response()->json([
                'success' => true,
                'message' => 'Customer $id Destroy',
            ],200);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Customer Not Found To Destroy',
                
            ],404);
        }
    }


    
}
