<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderStatus;

class OrderStatusController extends Controller
{
    public function indexJson()
    {
        $orderStatuses = OrderStatus::all();
        if (isset($orderStatuses)) {
            return response()->json($orderStatuses, 200);
        }

        return response()->json([
            'message' => 'Nenhum status foi encontrado!',
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

        $orderStatus = new OrderStatus();
        $orderStatus->createdate = $date;
        $orderStatus->description = $request->description;
        $orderStatus->save();

        return response()->json($orderStatus, 201);
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $orderStatus = OrderStatus::find($id);

        if (isset($orderStatus)) {
            return response()->json($orderStatus, 200);
        }

        return response()->json([
            'message' => 'O status de pedido não foi encontrado!',
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
    }

    public function update(Request $request, $id)
    {
        $orderStatus = OrderStatus::find($id);

        if (isset($orderStatus)) {
            $orderStatus->description = $request->description;
            $orderStatus->save();

            return response()->json($orderStatus, 200);
        }

        return response()->json([
            'message' => 'O status de pedido não foi encontrado!',
        ], 404);
    }

    public function destroyJson($id)
    {
        $orderStatus = OrderStatus::find($id);

        if (isset($orderStatus)) {
            $orderStatus->delete();

            return response()->json([
                'message' => 'O status de order foi excluído com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'O status de pedido não foi encontrado!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
