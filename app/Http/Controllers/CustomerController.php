<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function indexJson()
    {
        $customers = Customer::with('user')->get();

        if (isset($customers)) {
            return response()->json($customers, 200);
        }

        return response()->json([
            'message' => 'Nenhum cliente foi encontrado!',
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

        $user = new User();
        $user->createdate = $date;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password; // Cryptografar
        $user->active = true;
        $user->is_superadmin = false;
        $user->is_admin = false;
        $user->is_barber = false;
        $user->is_customer = true;
        $user->save();

        $userDB = User::where('id', $user->id)->get()->first();

        if (isset($userDB)) {
            $customer = new Customer();
            $customer->birthDate = $request->birthDate;
            $customer->phone = $request->phone;
            $customer->photo = $request->photo;
            $customer->user()->associate($userDB);
            $customer->save();

            return response()->json($customer, 201);
        }
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $customer = Customer::with('user')->where('id', $id)->get();

        if (isset($customer)) {
            return response($customer, 200);
        }

        return response()->json([
            'message' => 'O cliente não foi encontrado!',
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
        $customer = Customer::with('user')->where('id', $id)->get()->first();

        if (isset($customer)) {
            $customer->user->name = $request->name;
            $customer->user->email = $request->email;
            $customer->user->password = $request->password; // Cryptografar
            $customer->user->active = $request->active;
            $customer->user->is_superadmin = $request->is_superadmin;
            $customer->user->is_admin = $request->is_admin;
            $customer->user->is_barber = $request->is_barber;
            $customer->user->is_customer = $request->is_customer;
            $customer->user->save();

            $customer->birthDate = $request->birthDate;
            $customer->phone = $request->phone;
            $customer->photo = $request->photo;
            $customer->user_id = $customer->user->id;
            $customer->save();

            return response()->json($customer, 200);
        }

        return response()->json([
            'message' => 'O cliente não foi encontrado!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $customer = Customer::with('users')->where('id', $id)->get();

        if (isset($customer)) {
            $user = User::find($customer->user_id);

            $customer->user()->dissociate();

            $user->delete();
            $customer->delete();

            return response()->json([
                'message' => 'O cliente foi excluído com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'O cliente não foi encontrado!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
