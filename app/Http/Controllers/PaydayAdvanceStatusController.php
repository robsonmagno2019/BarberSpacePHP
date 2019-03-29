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
    }

    public function create()
    {
    }

    public function storeJson(Request $request)
    {
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
    }

    public function edit($id)
    {
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
