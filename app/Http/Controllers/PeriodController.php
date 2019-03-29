<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Period;

class PeriodController extends Controller
{
    public function indexJson()
    {
        $periods = Period::all();

        if (isset($periods)) {
            return response()->json($periods, 200);
        }

        return response()->json([
            'message' => 'Nenhum período foi encontrado!',
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

        $period = new Period();
        $period->createdate = $date;
        $period->description = $request->description;
        $period->save();

        return response()->json($period, 201);
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $period = Period::find($id);

        if (isset($period)) {
            return response()->json($period, 200);
        }

        return response()->json([
            'message' => 'O período não foi encontrado!',
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
        $period = Period::find($id);

        if (isset($period)) {
            $period->description = $request->description;
            $period->save();

            return response()->json($period, 200);
        }

        return response()->json([
            'message' => 'O período não foi encontrado!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $period = Period::find($id);

        if (isset($period)) {
            $period->delete();

            return response()->json([
                'message' => 'O período foi excluído com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'O período não foi encontrado!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
