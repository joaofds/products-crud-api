<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // DI de Product.
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->product->all();
        if (count($product) > 0) {
            return response()->json(
                [
                    'produtos' => $product->all()
                ]
            );
        }

        return response()->json(
            [
                'code' => 204,
                'status' => 'No products registered'
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all(['name', 'price']);

        $rules = [
            'name' => 'required|unique:products',
            'price' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'name.unique' => 'Já existe um produto com esse título'
        ];

        $request->validate($rules, $feedback);
        $product = $this->product;
        $result = $product->create($data);
        if ($result) {
            return response()->json(
                [
                    'code' => 201,
                    'status' => 'Product created',
                ]
            );
        }

        return response()->json(
            [
                'code' => 500,
                'status' => 'Internal error'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product;
        if ($product->find($id)) {
            return response()->json(
                [
                    'code' => 200,
                    'status' => 'success',
                    'produto' => $product->find($id),
                ]
            );
        }

        return response()->json([
            'code' => 204,
            'status' => 'Product not found'
        ]);
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
        $product = $this->product->find($id);
        if (!$product) {
            return response()->json(
                [
                    'code' => 204,
                    'status' => 'Product not found'
                ]
            );
        }

        $rules = [
            'name' => 'required',
            'price' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
        ];

        $request->validate($rules, $feedback);
        $product->update($request->all());
        return response()->json(
            [
                'code' => 200,
                'status' => 'Product updated'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);
        if (!$product) {
            return response()->json(
                [
                    'code' => 204,
                    'status' => 'Product not found'
                ]
            );
        }

        $product->delete();
        return response()->json(
            [
                'code' => 200,
                'status' => 'Product deleted'
            ]
        );
    }
}
