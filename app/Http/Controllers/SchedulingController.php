<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Barber;
use App\Models\Barbershop;
use App\Models\Color;
use App\Models\Customer;
use App\Models\ServiceHour;
use App\Models\Scheduling;

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

        $serviceHour = ServiceHour::find($request->service_hour_id);
        $color = Color::find($request->color_id);
        $schedulingStatus = SchedulingStatus::Where('description', 'Criado')->get()->first();
        $customer = Customer::with('user')->where('customer_id', $request->customer_id)->get()->first();
        $admin = Admin::with('user')->where('admin_id', $request->admin_id)->get()->first();
        $barber = Barber::with('user')->where('barber_id', $request->barber_id)->get()->first();
        $barbershop = Barbershop::where('barbershop_id', $request->barbershop_id)->get()->first();

        $scheduling = new Scheduling();
        $scheduling->createdate = $date;
        $scheduling->schedulingdate = $request->schedulingdate;

        if (isset($serviceHour)) {
            $scheduling->service_hour()->associate($serviceHour);
        }

        if (isset($color)) {
            $scheduling->color()->associate($color);
        }

        if (isset($schedulingStatus)) {
            $scheduling->scheduling_status()->associate($schedulingStatus);
        }

        $scheduling->customeravulse = $request->customeravulse;

        if (isset($customer)) {
            $scheduling->customer()->associate($customer);
        }

        if (isset($admin)) {
            $scheduling->admin()->associate($admin);
        }

        if (isset($barber)) {
            $scheduling->barber()->associate($barber);
        }

        if (isset($barbershop)) {
            $scheduling->barbershop()->associate($barbershop);
        }

        $scheduling->save();

        $schedulingDB = Scheduling::where('id', $scheduling->id)->get()->first();

        foreach ($request->items as $itemJson) {
            $item = new Item();
            $item->quantity = $itemJson->quantity;
            $item->price = $itemJson->price;

            if (isset($itemJson->service_id)) {
                $item->service_id = $itemJson->service_id;
            }

            if (isset($itemJson->scheduling_id)) {
                $item->scheduling()->associate($schedulingDB);
            }

            if ($item->valid()) {
                $item->save();
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
