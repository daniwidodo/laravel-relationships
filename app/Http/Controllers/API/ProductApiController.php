<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $product = Product::with('dataProducts')->get();
        // return response()->json($cars,200);
        // $products = Product::latest();
        // if( request('search'))
        // {
        //     $products->where('name', '%', request('search').'%');
        // }
        return Product::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'car_id' => 'required',
            
        ]);

        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search ($request)
    {
        // $data = Product::all();
        // $data->where('name', '=', $request);
        // return response()->json($data,200);
        // $data = Product::query()
        // ->where('name', 'LIKE', $request);
        $data = Product::where('name', '=', $request)->get();
        if ($data->isEmpty()) 
        { 
            return response()->json([ 'message' => 'Resource not found!' ], 404);
        } else {
            return response()->json($data, 200);
           
        }
        
    }

}
