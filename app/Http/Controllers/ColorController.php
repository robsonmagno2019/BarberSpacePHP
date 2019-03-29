<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function indexJson()
    {
        $colors = Color::all();

        if (isset($colors)) {
            return response(
                $colors, 200);
        } else {
            return response()->json([
                'message' => 'Nenhuma cor registrada!',
            ], 200);
        }
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

        $color = new Color();
        $color->createdate = $date;
        $color->name = $request->name;
        $color->code = $request->code;
        $color->save();

        return response()->json($color, 201);
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $color = Color::find($id);

        if (isset($color)) {
            return response()->json($color, 200);
        }

        return response()->json([
                    'message' => 'A cor não foi encontrada!',
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
        $color = Color::find($id);

        if (isset($color)) {
            $color->name = $request->name;
            $color->code = $request->code;
            $color->save();

            return response()->json($color, 200);
        }

        return response()->json([
            'message' => 'A cor não foi encontrada!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $color = Color::find($id);

        if (isset($color)) {
            $color->delete();

            return response()->json([
                'message' => 'A cor foi excluída com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'A cor não foi encontrada!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
