<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ServiceHour;
use App\Models\Scheduling;
use App\Models\SchedulingStatus;

class SchedulingController extends Controller
{
    public function indexJson()
    {
        $schedules = Scheduling::with('service_hour', 'color', 'scheduling_status',
                    'customer', 'admin', 'barber', 'barbershop')->get();

        if (isset($schedules)) {
            return response()->json($schedules, 200);
        }

        return response()->json([
            'message' => 'Nenhum agendamento foi registrado!',
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

        $schedulingStatus = SchedulingStatus::Where('description', 'Criado')->get()->first();

        $schedulingid = Scheduling::insertGetId([
            'createdate' => $date,
            'schedulingdate' => $request->schedulingdate,
            'service_hour_id' => $request->service_hour_id,
            'color_id' => $request->color_id,
            'scheduling_status_id' => $schedulingStatus->id,
            'customeravulse' => $request->customeravulse,
            'customer_id' => $request->customer_id,
            'admin_id' => $request->admin_id,
            'barber_id' => $request->barber_id,
            'barbershop_id' => $request->barbershop_id,
        ]);

        $array = $request->items;

        foreach ($array as $item) {
            $newItem = new Item();
            $newItem->quantity = $item['quantity'];
            $newItem->price = $item['price'];
            $newItem->product_id = $item['product_id'];
            $newItem->service_id = $item['service_id'];
            $newItem->scheduling_id = $schedulingid;
            $newItem->order_id = $item['order_id'];

            if ($newItem->valid()) {
                $newItem->save();
            }
        }

        return response()->json($scheduling, 201);
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $scheduling = Scheduling::with('service_hour', 'color', 'scheduling_status',
                    'customer', 'admin', 'barber', 'barbershop', 'items')
                    ->where('id', $id)->get()->first();

        if (isset($scheduling)) {
            return response()->json($scheduling, 200);
        }

        return response()->json([
            'message' => 'O agendamento não foi encontrado!',
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
        $scheduling = Scheduling::with('service_hour', 'color', 'scheduling_status',
        'customer', 'admin', 'barber', 'barbershop', 'items')
        ->where('id', $id)->get()->first();

        if (isset($scheduling)) {
            $scheduling->schedulingdate = $request->schedulingdate;
            $serviceHour = ServiceHour::find($request->service_hour_id);
            $schedulingStatus = SchedulingStatus::Where('description', 'Criado')->get()->first();

            if (isset($serviceHour)) {
                $scheduling->service_hour()->associate($serviceHour);
            }

            if (isset($schedulingStatus)) {
                $scheduling->scheduling_status()->associate($schedulingStatus);
            }

            $scheduling->save();

            return response()->json($scheduling, 200);
        }

        return response()->json([
            'message' => 'O agendamento não foi encontrado!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $scheduling = Scheduling::with('service_hour', 'color', 'scheduling_status',
        'customer', 'admin', 'barber', 'barbershop', 'items')
        ->where('id', $id)->get()->first();

        if (isset($scheduling)) {
            $scheduling->service_hour()->dissociate();
            $scheduling->color()->dissociate();
            $scheduling->scheduling_status()->dissociate();
            $scheduling->customer()->dissociate();
            $scheduling->admin()->dissociate();
            $scheduling->barber()->dissociate();
            $scheduling->barbershop()->dissociate();

            $scheduling->save();

            return response()->json([
                'message' => 'O agendamento foi excluído com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'O agendamento não foi encontrado!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
