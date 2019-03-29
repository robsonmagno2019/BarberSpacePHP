<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchedulingStatus;

class SchedulingStatusController extends Controller
{
    public function indexJson()
    {
        $schedulingStatuses = SchedulingStatus::all();

        if (isset($schedulingStatuses)) {
            return response()->json($schedulingStatuses, 200);
        }

        return response()->json([
            'message' => 'Nenhum status de agendamento foi encontrado!',
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

        $schedulingStatus = new SchedulingStatus();
        $schedulingStatus->createdate = $date;
        $schedulingStatus->description = $request->description;
        $schedulingStatus->save();

        return response()->json($schedulingStatus, 201);
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $schedulingStatus = SchedulingStatus::find($id);

        if (isset($schedulingStatus)) {
            return response()->json($schedulingStatus, 200);
        }

        return response()->json([
            'message' => 'O status do agendamento não foi encontrado!',
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
        $schedulingStatus = SchedulingStatus::find($id);

        if (isset($schedulingStatus)) {
            $schedulingStatus->description = $request->description;
            $schedulingStatus->save();

            return response()->json($schedulingStatus, 200);
        }

        return response()->json([
            'message' => 'O status do agendamento não foi encontrado!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $schedulingStatus = SchedulingStatus::find($id);

        if (isset($schedulingStatus)) {
            $schedulingStatus->delete();

            return response()->json([
                'message' => 'O status de agendamento foi excluído com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'O status do agendamento não foi encontrado!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
