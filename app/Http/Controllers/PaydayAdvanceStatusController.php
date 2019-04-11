<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaydayAdvanceStatus;

class PaydayAdvanceStatusController extends Controller
{
    public function indexJson()
    {
        $paydayAdvanceStatuses = PaydayAdvanceStatus::all();

        if (isset($paydayAdvanceStatuses)) {
            return response()->json($paydayAdvanceStatuses, 200);
        }

        return response()->json([
            'message' => 'Nenhum status de vale foi encontrado!',
        ], 404);
    }

    public function index()
    {
        $paydayAdvanceStatuses = PaydayAdvanceStatus::all();

        if (isset($paydayAdvanceStatuses)) {
            return view('payday-advance-status.index', compact('paydayAdvanceStatuses'));
        }
    }

    public function create()
    {
        return view('payday-advance-status.create');
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

        $paydayAdvanceStatus = new PaydayAdvanceStatus();
        $paydayAdvanceStatus->createdate = $date;
        $paydayAdvanceStatus->description = $request->description;
        $paydayAdvanceStatus->save();

        return response()->json($paydayAdvanceStatus, 201);
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

        $paydayAdvanceStatus = new PaydayAdvanceStatus();
        $paydayAdvanceStatus->createdate = $date;
        $paydayAdvanceStatus->description = $request->description;
        $paydayAdvanceStatus->save();

        return redirect('/status-dos-vales');
    }

    public function showJson($id)
    {
        $paydayAdvanceStatus = PaydayAdvanceStatus::find($id);

        if (isset($paydayAdvanceStatus)) {
            return response()->json($paydayAdvanceStatus, 200);
        }

        return response()->json([
            'message' => 'O status do vale não foi encontrado!',
        ], 404);
    }

    public function show($id)
    {
        $paydayAdvanceStatus = PaydayAdvanceStatus::find($id);

        if (isset($paydayAdvanceStatus)) {
            return view('payday-advance-status.show', compact('paydayAdvanceStatus'));
        }
    }

    public function edit($id)
    {
        $paydayAdvanceStatus = PaydayAdvanceStatus::find($id);

        if (isset($paydayAdvanceStatus)) {
            return view('payday-advance-status.edit', compact('paydayAdvanceStatus'));
        }
    }

    public function updateJson(Request $request, $id)
    {
        $paydayAdvanceStatus = PaydayAdvanceStatus::find($id);

        if (isset($paydayAdvanceStatus)) {
            $paydayAdvanceStatus->description = $request->description;
            $paydayAdvanceStatus->save();

            return response()->json($paydayAdvanceStatus, 200);
        }

        return response()->json([
            'message' => 'O status do vale não foi encontrado!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $paydayAdvanceStatus = PaydayAdvanceStatus::find($id);

        if (isset($paydayAdvanceStatus)) {
            $paydayAdvanceStatus->delete();

            return response()->json([
                'message' => 'O status de vale foi excluído com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'O status do vale não foi encontrado!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
