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
        $periods = Period::all();

        if (isset($periods)) {
            return view('period.index', compact('periods'));
        }
    }

    public function create()
    {
        return view('period.create');
    }

    public function storeJson(Request $request)
    {
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
        ], $messages);

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
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
        ], $messages);

        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        $period = new Period();
        $period->createdate = $date;
        $period->description = $request->description;
        $period->save();

        return redirect('/periodos');
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
        $period = Period::find($id);

        if (isset($period)) {
            return view('period.show', compact('period'));
        }
    }

    public function edit($id)
    {
        $period = Period::find($id);

        if (isset($period)) {
            return view('period.edit', compact('period'));
        }
    }

    public function updateJson(Request $request, $id)
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
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'barbershop_id.required' => 'Nenhuma barbearia foi selecionada.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
        ], $messages);

        $period = Period::find($id);

        if (isset($period)) {
            $period->description = $request->description;
            $period->save();

            return redirect('/periodos');
        }
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
        $period = Period::find($id);

        if (isset($period)) {
            $period->delete();

            return redirect('/periodos');
        }
    }
}
