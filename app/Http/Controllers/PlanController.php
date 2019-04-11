<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function indexJson()
    {
        $plans = Plan::all();

        if (isset($plans)) {
            return response()->json($plans, 200);
        }

        return response()->json([
            'message' => 'Nenhum plano foi encontrado!',
        ], 404);
    }

    public function index()
    {
        $plans = Plan::all();

        if (isset($plans)) {
            return view('plan.index', compact('plans'));
        }
    }

    public function create()
    {
        return view('plan.create');
    }

    public function storeJson(Request $request)
    {
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'price.required' => 'O preço é obrigatório.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
            'price' => 'required',
        ], $messages);

        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        $plan = new Plan();
        $plan->createdate = $date;
        $plan->description = $request->description;
        $plan->price = (float) $request->price;
        $plan->save();

        return response()->json($plan, 201);
    }

    public function store(Request $request)
    {
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'price.required' => 'O preço é obrigatório.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
            'price' => 'required',
        ], $messages);

        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        $plan = new Plan();
        $plan->createdate = $date;
        $plan->description = $request->description;
        $plan->price = (float) $request->price;
        $plan->save();

        return redirect('/plans');
    }

    public function showJson($id)
    {
        $plan = Plan::find($id);

        if (isset($plan)) {
            return response()->json($plan, 200);
        }

        return response()->json([
            'message' => 'O plano não foi encontrado!',
        ], 404);
    }

    public function show($id)
    {
        $plan = Plan::find($id);

        if (isset($plan)) {
            return view('plan.show', compact('plan'));
        }
    }

    public function edit($id)
    {
        $plan = Plan::find($id);

        if (isset($plan)) {
            return view('plan.edit', compact('plan'));
        }
    }

    public function updateJson(Request $request, $id)
    {
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'price' => 'O preço é obrigatório.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
            'price' => 'required',
        ], $messages);

        $plan = Plan::find($id);

        if (isset($plan)) {
            $plan->description = $request->description;
            $plan->price = (float) $request->price;
            $plan->save();

            return response()->json($plan, 200);
        }

        return response()->json([
            'message' => 'O plano não foi encontrado!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'price' => 'O preço é obrigatório.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
            'price' => 'required',
        ], $messages);

        $plan = Plan::find($id);

        if (isset($plan)) {
            $plan->description = $request->description;
            $plan->price = (float) $request->price;
            $plan->save();

            return redirect('/plans');
        }
    }

    public function destroyJson($id)
    {
        $plan = Plan::find($id);

        if (isset($plan)) {
            $plan->delete();

            return response()->json([
                'message' => 'O plano foi excluído com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'O plano não foi encontrado!',
        ], 404);
    }

    public function destroy($id)
    {
        $plan = Plan::find($id);

        if (isset($plan)) {
            $plan->delete();

            return redirect('/plans');
        }
    }
}
