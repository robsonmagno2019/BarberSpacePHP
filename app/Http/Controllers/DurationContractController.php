<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DurationContract;

class DurationContractController extends Controller
{
    public function indexJson()
    {
        $durationContracts = DurationContract::all();

        if (isset($durationContracts)) {
            return response()->json([
                $durationContracts,
            ], 200);
        }

        return response()->json([
            'message' => 'Nenhuma duração de contrato foi encontrada!',
        ], 404);
    }

    public function index()
    {
        $durationContracts = DurationContract::all();

        if (isset($durationContracts)) {
            return view('duration-contract.index', compact('durationContracts'));
        }
    }

    public function create()
    {
        return view('duration-contract.create');
    }

    public function storeJson(Request $request)
    {
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 40 caracteres.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:40',
        ], $messages);

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
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 40 caracteres.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:40',
        ], $messages);

        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        $durationContract = new DurationContract();

        $durationContract->createdate = $date;
        $durationContract->description = $request->description;
        $durationContract->save();

        return redirect('/durationcontracts');
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
        $durationContract = DurationContract::find($id);

        if (isset($durationContract)) {
            return view('duration-contract.show', compact('durationContract'));
        }
    }

    public function edit($id)
    {
        $durationContract = DurationContract::find($id);

        if (isset($durationContract)) {
            return view('duration-contract.edit', compact('durationContract'));
        }
    }

    public function updateJson(Request $request, $id)
    {
        $durationContract = DurationContract::find($id);

        if (isset($durationContract)) {
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
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 40 caracteres.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:40',
        ], $messages);

        $durationContract = DurationContract::find($id);

        if (isset($durationContract)) {
            $durationContract->description = $request->description;
            $durationContract->save();

            return redirect('/durationcontracts');
        }
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
        if (isset($durationContract)) {
            $durationContract->delete();

            return redirect('/durationcontracts');
        }
    }
}
