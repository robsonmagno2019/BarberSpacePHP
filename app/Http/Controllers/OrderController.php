<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Barber;
use App\Models\Barbershop;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderStatus;

class OrderController extends Controller
{
    public function indexJson()
    {
        $orders = Order::with('order_status', 'customer', 'admin', 'barber', 'barbershop')->get();

        if (isset($orders)) {
            return response()->json($orders, 200);
        }

        return response()->json([
            'message' => 'Nenhum serviço encontrado!',
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

        $orderStatus = OrderStatus::Where('description', 'Criado')->get()->first();
        //$customer = Customer::find($request->customer_id);
        //$admin = Admin::find($request->admin_id);
        //$barber = Barber::with('type_of_remuneration')->where('id', $request->barber_id)->get()->first();
        //$barbershop = Barbershop::find($request->barbershop_id);

        $orderid = Order::insertGetId([
            'createdate' => $date,
            'number' => 1,
            'order_status_id' => $orderStatus->id,
            'customeravulse' => $request->customeravulse,
            'customer_id' => $request->customer_id,
            'admin_id' => $request->admin_id,
            'barber_id' => $request->barber_id,
            'barbershop_id' => $request->barbershop_id,
            'valueadmin' => $request->valueadmin,
            'valuebarber' => $request->valuebarber,
        ]);

        // if (isset($orderStatus)) {
        //     $order->order_status()->associate($orderStatus);
        // }

        // $order->customeravulse = $request->customeravulse;

        // if (isset($customer)) {
        //     $order->customer()->associate($customer);
        // }

        // if (isset($admin)) {
        //     $order->admin()->associate($admin);
        // }

        // if (isset($barber)) {
        //     $order->barber()->associate();
        // }

        // if (isset($barbershop)) {
        //     $order->barbershop()->associate($barbershop);
        // }

        $array = $request->items;

        foreach ($array as $item) {
            $newItem = new Item();
            $newItem = new Item();
            $newItem->quantity = $item['quantity'];
            $newItem->price = $item['price'];
            $newItem->product_id = $item['product_id'];
            $newItem->service_id = $item['service_id'];
            $newItem->scheduling_id = $item['scheduling_id'];
            $newItem->order_id = $orderid;

            if ($newItem->valid()) {
                $newItem->save();
            }
        }

        $order = Order::with('items')
        ->where('id', $orderid)->get()->first();
        $order->calculatePercetage($order->items());

        $order->save();

        return response()->json($order, 201);
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $order = Order::with('order_status', 'customer', 'admin', 'barber', 'barbershop', 'items')
        ->where('id', $id)->get()->first();

        if (isset($order)) {
            return response()->json($order, 200);
        }

        return response()->json([
            'message' => 'O serviço não foi encontrado!',
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
        $order = Order::with('order_status', 'customer', 'admin', 'barber', 'barbershop', 'items')
        ->where('id', $id)->get()->first();

        if (isset($order)) {
            $orderStatus = OrderStatus::find($request->order_status_id);

            if (isset($orderStatus)) {
                $order->order_status()->associate($orderStatus);

                if ($this->count($request->items) > 0) {
                    foreach ($request->items as $itemJson) {
                        foreach ($this->items() as $itemDB) {
                            if ($itemJson->product_id == $itemDB->product_id ||
                            $itemJson->service_id == $itemDB->service_id) {
                                ++$itemDB->quantity;
                            } else {
                                $item = new Item();
                                $item->quantity = $itemJson->quantity;
                                $item->price = $itemJson->price;

                                if (isset($itemJson->product_id)) {
                                    $item->product_id = $itemJson->product_id;
                                }

                                if (isset($itemJson->service_id)) {
                                    $item->service_id = $itemJson->service_id;
                                }

                                if (isset($itemJson->order_id)) {
                                    $orderDB = Order::where('id', $order->id)->get()->first();
                                    $item->order()->associate($orderDB);
                                }

                                if ($item->valid()) {
                                    $item->save();
                                }
                            }
                        }
                    }
                }
            }

            return response()->json($order, 200);
        }

        return response()->json([
            'message' => 'O serviço não foi encontrado!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $order = Order::with('order_status', 'customer', 'admin', 'barber', 'barbershop', 'items')
        ->where('id', $id)->get()->first();

        if (isset($order)) {
            $order->order_status()->dissociate();
            $order->customer()->dissociate();
            $order->admin()->dissociate();
            $order->barber()->dissociate();
            $order->barbershop()->dissociate();

            foreach ($this->items() as $item) {
                if ($item->order_id == $order->id) {
                    $itemDB = Item::with('product', 'service', 'order')
                    ->where('order_id', $order->id)->get()->first();

                    if (isset($itemDB)) {
                        $itemDB->product()->dissociate();
                        $itemDB->service()->dissociate();
                        $itemDB->order()->dissociate();

                        $itemDB->delete();
                    }
                }
            }

            $order->delete();

            return response()->json([
                'message' => 'O serviço foi excluído com sucesso!',
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
