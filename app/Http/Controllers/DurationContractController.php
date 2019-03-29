<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DurationContract;

class DurationContractController extends Controller
{
    public function indexJson()
    {
        $durationContract = DurationContract::all();

        if (isset($durationContract)) {
            return response()->json([
                $durationContract,
            ], 200);
        }

        return response()->json([
            'message' => 'Nenhuma duração de contrato foi encontrada!',
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

        $durationContract = new DurationContract();

        $durationContract->createdate = $date;
        $durationContract->description = $request->description;
        $durationContract->save();

        return response()->json($durationContract, 201);
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $durationContract = DurationContract::find($id);

        if (isset($durationContract)) {
            return response()->json($durationContract, 200);
        }

        return response()->json([
            'message' => 'A duração de contrado não foi encontrada!',
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
        $durationContract = DurationContract::find($id);

        if (isset($durationContract)) {
            $durationContract->createdate = $date;
            $durationContract->description = $request->description;
            $durationContract->save();

            return response()->json($durationContract, 200);
        }

        return response()->json([
            'message' => 'A duração de contrado não foi encontrada!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $durationContract = DurationContract::find($id);

        if (isset($durationContract)) {
            $durationContract->delete();

            return response()->json([
                'message' => 'A duração de contrado foi excluída com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'A duração de contrado não foi encontrada!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
