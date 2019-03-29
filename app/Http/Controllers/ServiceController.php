<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barbershop;
use App\Models\Category;
use App\Models\Service;

class ServiceController extends Controller
{
    public function indexJson()
    {
        $services = Service::with('category', 'barbershop')->get();

        if (isset($services)) {
            return response()->json($services, 200);
        }

        return response()->json([
            'message' => 'Nenhum serviço foi registrado!',
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

        $category = Category::find($request->category_id);
        $barbershop = Barbershop::find($request->barbershop_id);

        $service = new Service();
        $service->createdate = $date;
        $service->description = $request->description;
        $service->duration = $request->duration;
        $service->price = $request->price;
        $service->category()->associate($category);
        $service->barbershop()->associate($barbershop);
        $service->save();

        return response()->json($service, 201);
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $service = Service::with('category', 'barbershop')
                    ->where('id', $id)->get()->first();
        if (isset($service)) {
            return response()->json($service, 200);
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
        $service = Service::with('category', 'barbershop')
                    ->where('id', $id)->get()->first();
        if (isset($service)) {
            $category = Category::find($request->category_id);

            $service->description = $request->description;
            $service->duration = $request->duration;
            $service->price = $request->price;
            $service->category()->associate($category);
            $service->save();

            return response()->json($service, 200);
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
        $service = Service::with('category', 'barbershop')
                    ->where('id', $id)->get()->first();
        if (isset($service)) {
            $service->category()->dissociate();
            $service->barbershop()->dissociate();

            $service->delete();

            return response()->json([
                'message' => 'O serviço foi excluído com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'O serviço não foi encontrado!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
