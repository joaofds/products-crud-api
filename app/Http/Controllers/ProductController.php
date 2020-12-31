<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = new Product();
        if (count($product->all()) > 0) {
            return response()->json(
                [
                    'produtos' => $product->all()
                ]
            );
        } else {
          return response()->json(
              [
                  'code' => 204,
                  'status' => 'No products registered'
              ]
          );
        }

        // do the same
        //return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        if ($product) {
            return response()->json(
                [
                    'code' => 201,
                    'status' => 'Product created',
                ]
            );
        } else {
            return response()->json(
                [
                    'code' => 500,
                    'status' => 'Internal error'
                ]
            );
        }

        // do the same
        //Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = new Product();
        if ($product->find($id)) {
            return response()->json(
                [
                    'code' => 200,
                    'status' => 'success',
                    'produto' => $product->find($id),
                ]
            );
        } else {
            return response()->json([
                'code' => 204,
                'status' => 'Product not found'
            ]);
        }

        // do the same
        //return Product::findOrFail($id);
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
        $product = Product::where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'price' => $request->price,
                ]
            );
        if ($product) {
            return response()->json(
                [
                    'code' => 200,
                    'status' => 'Product updated'
                ]
            );
        } else {
            return response()->json(
                [
                    'code' => 204,
                    'status' => 'Product not found'
                ]
            );
        }

        // do the same
        //$product = Product::find($id);
        //$product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->delete();
        if ($product) {
            return response()->json(
                [
                    'code' => 200,
                    'status' => 'Product deleted'
                ]
            );
        } else {
            return response()->json(
                [
                    'code' => 204,
                    'status' => 'Product not found'
                ]
            );
        }

        // do the same
        //Product::find($id)->delete();
    }
}
