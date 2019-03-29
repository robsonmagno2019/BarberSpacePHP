<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Barber;
use App\Models\Color;
use App\Models\Barbershop;
use App\Models\TypeOfRemuneration;

class BarberController extends Controller
{
    public function indexJson()
    {
        $barbers = Barber::with('type_of_remuneration', 'user', 'color', 'barbershop')->get();

        if (isset($barbers)) {
            return response()->json($barbers, 200);
        }

        return response() - json([
            'message' => 'Nenhum barbeiro foi encontrado!',
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
        $user->is_barber = true;
        $user->is_customer = false;
        $user->save();

        $userDB = User::where('id', $user->id)->get()->first();
        $typeofremuneration = TypeOfRemuneration::find($request->type_of_remuneration_id);
        $color = Color::find($request->color_id);
        $barbershop = Barbershop::find($request->barbershop_id);

        if (isset($userDB)) {
            $barber = new Barber();
            $barber->type_of_remuneration()->associate($typeofremuneration);
            $barber->percentage = $request->percentage;
            $barber->salary = $request->salary;
            $barber->color()->associate($color);
            $barber->user()->associate($userDB);
            $barber->barbershop()->associate($barbershop);
            $barber->save();

            return response()->json($barber, 201);
        }
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $barber = Barber::with('type_of_remuneration', 'user', 'color', 'barbershop')
                    ->where('id', $id)->get()->first();

        if (isset($barber)) {
            return response()->json($barber, 200);
        }

        return response()->json([
            'message' => 'O barbeiro não foi encontrado.',
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
        $barber = Barber::with('type_of_remuneration', 'user', 'color', 'barbershop')
                    ->where('id', $id)->get()->first();
        if (isset($barber)) {
            $barber->user->name = $request->name;
            $barber->user->email = $request->email;
            $barber->user->password = $request->password; // Cryptografar
            $barber->user->active = $request->active;
            $barber->user->is_superadmin = $request->is_superadmin;
            $barber->user->is_admin = $request->is_admin;
            $barber->user->is_barber = $request->is_barber;
            $barber->user->is_customer = $request->is_customer;
            $barber->user->save();

            $typeofremuneration = TypeOfRemuneration::find($request->type_of_remuneration_id);
            $color = Color::find($request->color_id);

            $barber->type_of_remuneration()->associate($typeofremuneration);
            $barber->percentage = $request->percentage;
            $barber->salary = $request->salary;
            $barber->phone = $request->phone;
            $barber->photo = $request->photo;
            $barber->color()->associate($color);
            $barber->save();

            return response()->json($barber, 200);
        }

        return response()->json([
            'message' => 'O barbeiro não foi encontrado.',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $barber = Barber::with('type_of_remuneration', 'user', 'color', 'barbershop')
                    ->where('id', $id)->get()->first();
        if (isset($barber)) {
            $user = User::find($barber->user_id);

            $barber->type_of_remuneration()->dissociate();
            $barber->color()->dissociate();
            $barber->user()->dissociate();
            $barber->barbershop()->dissociate();

            $barber->delete();
            $user->delete();

            return response()->json([
                'message' => 'O barbeiro foi excluído com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'O barbeiro não foi encontrado.',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
