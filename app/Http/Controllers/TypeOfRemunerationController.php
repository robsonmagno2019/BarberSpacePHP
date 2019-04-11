<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeOfRemuneration;

class TypeOfRemunerationController extends Controller
{
    public function indexJson()
    {
        $typeOfRemunerations = TypeOfRemuneration::all();

        if (isset($typeOfRemunerations)) {
            return response()->json($typeOfRemunerations, 200);
        }

        return response()->json([
            'message' => 'Nenhum tipo de remuneração foi encontrado!',
        ], 404);
    }

    public function index()
    {
        $typeOfRemunerations = TypeOfRemuneration::all();

        if (isset($typeOfRemunerations)) {
            return view('type-of-remuneration.index', compact('typeOfRemunerations'));
        }
    }

    public function create()
    {
        return view('type-of-remuneration.create');
    }

    public function storeJson(Request $request)
    {
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'barbershop_id.required' => 'Nenhuma barbearia foi selecionada.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
        ], $messages);

        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        $typeOfRemuneration = new TypeOfRemuneration();
        $typeOfRemuneration->createdate = $date;
        $typeOfRemuneration->description = $request->description;
        $typeOfRemuneration->save();

        return response()->json($typeOfRemuneration, 201);
    }

    public function store(Request $request)
    {
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'barbershop_id.required' => 'Nenhuma barbearia foi selecionada.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
        ], $messages);

        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        $typeOfRemuneration = new TypeOfRemuneration();
        $typeOfRemuneration->createdate = $date;
        $typeOfRemuneration->description = $request->description;
        $typeOfRemuneration->save();

        return redirect('/tiposderemuneracoes');
    }

    public function showJson($id)
    {
        $typeOfRemuneration = TypeOfRemuneration::find($id);

        if (isset($typeOfRemuneration)) {
            return response()->json($typeOfRemuneration, 200);
        }

        return response()->json([
            'message' => 'O tipo de remuneração não foi encontrado!',
        ], 404);
    }

    public function show($id)
    {
        $typeOfRemuneration = TypeOfRemuneration::find($id);

        if (isset($typeOfRemuneration)) {
            return view('type-of-remuneration.show', compact('typeOfRemuneration'));
        }
    }

    public function edit($id)
    {
        $typeOfRemuneration = TypeOfRemuneration::find($id);

        if (isset($typeOfRemuneration)) {
            return view('type-of-remuneration.edit', compact('typeOfRemuneration'));
        }
    }

    public function updateJson(Request $request, $id)
    {
        $typeOfRemuneration = TypeOfRemuneration::find($id);

        if (isset($typeOfRemuneration)) {
            $typeOfRemuneration->description = $request->description;
            $typeOfRemuneration->save();

            return response()->json($typeOfRemuneration, 200);
        }

        return response()->json([
            'message' => 'O tipo de remuneração não foi encontrado!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $typeOfRemuneration = TypeOfRemuneration::find($id);

        if (isset($typeOfRemuneration)) {
            $typeOfRemuneration->delete();

            return response()->json([
                'message' => 'O tipo de remuneração foi excluído com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'O tipo de remuneração não foi encontrado!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
