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
    }

    public function create()
    {
    }

    public function storeJson(Request $request)
    {
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
    }

    public function edit($id)
    {
    }

    public function updateJson(Request $request, $id)
    {
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
    }
}
