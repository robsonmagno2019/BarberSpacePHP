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
        $categories = Category::with('barbershop')->get();

        if (isset($categories)) {
            return view('category.index', compact('categories'));
        }
    }

    public function create()
    {
        return view('category.create');
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
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 40 caracteres.',
            'barbershop_id.required' => 'Nenhuma barbearia foi selecionada.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:40',
        ], $messages);

        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        //$barbershop = Barbershop::find($request->barbershop_id);
        //$barbershop = Barbershop::find(1);

        $category = new Category();
        $category->createdate = $date;
        $category->description = $request->input('description');
        $category->barbershop_id = 1;

        // if (isset($category->barbershop_id)) {
        //     $category->barbershop()->associate($barbershop);
        // }

        $category->save();

        return redirect('/categorias');
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
        $category = Category::with('barbershop')
                    ->where('id', $id)->get()->first();

        if (isset($category)) {
            return view('category.show', compact('category'));
        }
    }

    public function edit($id)
    {
        $category = Category::with('barbershop')
                    ->where('id', $id)->get()->first();

        if (isset($category)) {
            return view('category.edit', compact('category'));
        }

        return redirect('/categorias');
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
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 40 caracteres.',
            'barbershop_id.required' => 'Nenhuma barbearia foi selecionada.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:40',
            'barbershop_id' => 'required',
        ], $messages);

        //$barbershop = Barbershop::find($request->barbershop_id);
        //$barbershop = Barbershop::find(1);

        $category = Category::find($id);
        $category->description = $request->input('description');
        $category->barbershop_id = $request->barbershop_id;

        // if (isset($category->barbershop_id)) {
        //     $category->barbershop()->associate($barbershop);
        // }

        $category->save();

        return redirect('/categorias');
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
        $category = Category::with('barbershop')
                    ->where('id', $id)->get()->first();
        if (isset($category)) {
            $category->barbershop()->dissociate();

            $category->delete();

            return redirect('/categorias');
        }

        return response()->json([
            'message' => 'A categoria não foi encontrada!',
        ], 404);
    }
}
