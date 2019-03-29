<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barbershop;
use App\Models\Category;

class CategoryController extends Controller
{
    public function indexJson()
    {
        $categories = Category::with('barbershop')->get();

        if (isset($categories)) {
            return response()->json($categories, 200);
        }

        return response()->json([
            'message' => 'Nenhuma categoria foi encontrada!',
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

        $barbershop = Barbershop::find($request->barbershop_id);

        $category = new Category();
        $category->createdate = $date;
        $category->description = $request->description;
        $category->barbershop()->associate($barbershop);
        $category->save();

        return response()->json($category, 201);
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $category = Category::with('barbershop')
                    ->where('id', $id)->get()->first();

        if (isset($category)) {
            return response()->json($category, 200);
        }

        return response()->json([
            'message' => 'A categoria não foi encontrada!',
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
        $category = Category::with('barbershop')
                    ->where('id', $id)->get()->first();

        if (isset($category)) {
            $category->description = $request->description;
            $category->save();

            return response()->json($category, 200);
        }

        return response()->json([
            'message' => 'A categoria não foi encontrada!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $category = Category::with('barbershop')
                    ->where('id', $id)->get()->first();
        if (isset($category)) {
            $category->barbershop()->dissociate();

            $category->delete();

            return response()->json([
                'message' => 'A categoria foi excluída com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'A categoria não foi encontrada!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
