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
        $orderStatuses = OrderStatus::all();
        if (isset($orderStatuses)) {
            return view('order-status.index', compact('orderStatuses'));
        }
    }

    public function create()
    {
        return view('order-status.create');
    }

    public function storeJson(Request $request)
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
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'barbershop_id.required' => 'Nenhuma barbearia foi selecionada.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
        ], $messages);

        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        $orderStatus = new OrderStatus();
        $orderStatus->createdate = $date;
        $orderStatus->description = $request->description;
        $orderStatus->save();

        return redirect('/status-dos-pedidos');
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
        $orderStatus = OrderStatus::find($id);

        if (isset($orderStatus)) {
            return view('order-status.show', compact('orderStatus'));
        }
    }

    public function edit($id)
    {
        $orderStatus = OrderStatus::find($id);

        if (isset($orderStatus)) {
            return view('order-status.edit', compact('orderStatus'));
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

        $orderStatus = OrderStatus::find($id);

        if (isset($orderStatus)) {
            $orderStatus->description = $request->description;
            $orderStatus->save();

            return redirect('/status-dos-pedidos');
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
        $orderStatus = OrderStatus::find($id);

        if (isset($orderStatus)) {
            $orderStatus->delete();

            return redirect('/status-dos-pedidos');
        }
    }
}
