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
    }

    public function create()
    {
    }

    public function storeJson(Request $request)
    {
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
    }

    public function edit($id)
    {
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
