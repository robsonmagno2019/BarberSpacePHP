<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Barbershop;

class BarbershopController extends Controller
{
    public function indexJson()
    {
        $barbershops = Barbershop::with('admin.user', 'admin.color')->get();
        //$barbershops = Barbershop::with('admins.user')->get();

        if (isset($barbershops)) {
            return response()->json($barbershops, 200);
        }

        return response()->json([
            'mesage' => 'Nenhuma barbearia foi encontrada!',
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
        //$admin = Admin::find($request->admin_id);
        $admin = Admin::find(1);

        if (isset($admin)) {
            $date = new \DateTime();
            $date->format('Y-m-d H:i:s');

            $barbershop = new Barbershop();
            $barbershop->createdate = $date;
            $barbershop->name = $request->name;
            $barbershop->email = $request->email;
            $barbershop->coverphoto = $request->coverphoto;
            $barbershop->logo = $request->logo;
            $barbershop->admin()->associate($admin);
            $barbershop->street = $request->street;
            $barbershop->number = $request->number;
            $barbershop->district = $request->district;
            $barbershop->city = $request->city;
            $barbershop->state = $request->state;
            $barbershop->zipcode = $request->zipcode;
            $barbershop->complement = $request->complement;
            $barbershop->save();

            return response()->json($barbershop, 201);
        }
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $barbershop = Barbershop::with('admin.user', 'admin.color')->where('id', $id)->get()->first();

        if (isset($barbershop)) {
            return response()->json($barbershop, 200);
        }

        return response()->json([
            'message' => 'A barbearia não foi encontrada!',
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
        $barbershop = Barbershop::where('id', $id)->get()->first();
        //$barbershop = Barbershop::with('admins.user')->where('id', $id)->get();

        if (isset($barbershop)) {
            $barbershop->name = $request->name;
            $barbershop->email = $request->email;
            $barbershop->coverphoto = $request->coverphoto;
            $barbershop->logo = $request->logo;
            $barbershop->street = $request->street;
            $barbershop->number = $request->number;
            $barbershop->district = $request->district;
            $barbershop->city = $request->city;
            $barbershop->state = $request->state;
            $barbershop->zipcode = $request->zipcode;
            $barbershop->complement = $request->complement;
            $barbershop->save();

            return response()->json($barbershop, 200);
        }

        return response()->json([
            'message' => 'A barbearia não foi encontrada!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $barbershop = Barbershop::with(['admins' => function ($query) {
            $query->with('users');
        }])->where('id', $id)->get();
        //$barbershop = Barbershop::with('admins.user')->where('id', $id)->get();

        if (isset($barbershop)) {
            $barbershop->customer()->dissociate();

            $barbershop->delete();

            return response()->json([
                'message' => 'A barbearia foi excluída com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'A barbearia não foi encontrada!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
