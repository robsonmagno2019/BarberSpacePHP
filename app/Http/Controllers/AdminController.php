<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Admin;
use App\Models\Color;

class AdminController extends Controller
{
    public function indexJson()
    {
        $admins = Admin::with('user')->with('color')->get();

        if (isset($admins)) {
            return response()->json($admins, 200);
        }

        return response()->json([
            'message' => 'Nenhum administrador foi encontrado!',
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
        $color = Color::find($request->color_id);

        if (isset($userDB)) {
            $admin = new Admin();
            $admin->document = $request->document;
            $admin->phone = $request->phone;
            $admin->photo = $request->photo;
            $admin->color()->associate($color);
            $admin->user()->associate($userDB);
            $admin->save();

            return response()->json($admin, 201);
        }
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $admin = Admin::with('user')->with('color')->where('id', $id)->get();

        if (isset($admin)) {
            return response($admin, 200);
        }

        return response()->json([
            'message' => 'O administrador não foi encontrado!',
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
        $admin = Admin::with('user')->with('color')->where('id', $id)->get()->first();

        if (isset($admin)) {
            //$admin->color()->dissociate();
            $admin->user->name = $request->name;
            $admin->user->email = $request->email;
            $admin->user->password = $request->password; // Cryptografar
            $admin->user->active = $request->active;
            $admin->user->is_superadmin = $request->is_superadmin;
            $admin->user->is_admin = $request->is_admin;
            $admin->user->is_barber = $request->is_barber;
            $admin->user->is_customer = $request->is_customer;
            $admin->user->save();

            $color = Color::find($admin->color_id);

            $admin->document = $request->document;
            $admin->phone = $request->phone;
            $admin->photo = $request->photo;
            $admin->user_id = $admin->user->id;
            $admin->color()->associate($color);
            $admin->save();

            return response()->json($admin, 200);
        }

        return response()->json([
            'message' => 'O administrador não foi encontrado!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $admin = Admin::with('users')->where('id', $id)->get()->first();

        if (isset($admin)) {
            $user = User::find($admin->user_id);

            $admin->user()->dissociate();
            $admin->color()->dissociate();

            $user->delete();
            $admin->delete();

            return response()->json([
                'message' => 'O administrador foi excluído com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'O administrador não foi encontrado!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
