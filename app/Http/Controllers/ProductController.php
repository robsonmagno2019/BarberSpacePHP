<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barbershop;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function indexJson()
    {
        $products = Product::with('category', 'barbershop')->get();

        if (isset($products)) {
            return response()->json($products, 200);
        }

        return response()->json([
            'message' => 'Nenhum produto foi registrado!',
        ], 404);
    }

    public function index()
    {
    }

    public function create()
    {
    }

    public function storeJson(Request $request)
    {
        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        $category = Category::find($request->category_id);
        $barbershop = Barbershop::find($request->barbershop_id);

        $product = new Product();
        $product->createdate = $date;
        $product->title = $request->title;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->category()->associate($category);
        $product->barbershop()->associate($barbershop);
        $product->save();

        return response()->json($product, 201);
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $product = Product::with('category', 'barbershop')
                    ->where('id', $id)->get()->first();

        if (isset($product)) {
            return response()->json($product, 200);
        }

        return response()->json([
            'message' => 'O produto não foi encontrado!',
        ], 404);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function updateJson(Request $request, $id)
    {
        $product = Product::with('category', 'barbershop')
                    ->where('id', $id)->get()->first();

        if (isset($product)) {
            $category = Category::find($request->category_id);

            $product->title = $request->title;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->weight = $request->weight;
            $product->category()->associate($category);
            $product->save();

            return response()->json($product, 200);
        }

        return response()->json([
            'message' => 'O produto não foi encontrado!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $product = Product::with('category', 'barbershop')
                    ->where('id', $id)->get()->first();

        if (isset($product)) {
            $product->category()->dissociate();
            $product->barbershop()->dissociate();

            $product->delete();

            return response()->json([
                'message' => 'O produto foi excluído com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'O produto não foi encontrado!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
