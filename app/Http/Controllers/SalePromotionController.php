<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barbershop;
use App\Models\Product;
use App\Models\SalePromotion;
use App\Models\Service;

class SalePromotionController extends Controller
{
    public function indexJson()
    {
        $salepromotions = SalePromotion::with('product', 'service', 'barbershop')->get();

        if (isset($salepromotions)) {
            return response()->json($salepromotions, 200);
        }

        return response()->json([
            'message' => 'Nenhuma promoção encontrada!',
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

        $product = Product::find($request->product_id);
        $service = Service::find($request->service_id);
        $barbershop = Barbershop::find($request->barbershop_id);

        $salepromotion = new SalePromotion();
        $salepromotion->createdate = $date;
        $salepromotion->enddate = $request->enddate;
        $salepromotion->description = $request->description;
        $salepromotion->price = $request->price;

        if (isset($product)) {
            $salepromotion->product()->associate($product);
        }

        if (isset($service)) {
            $salepromotion->service()->associate($service);
        }

        if (isset($barbershop)) {
            $salepromotion->barbershop()->associate($barbershop);
        }

        $salepromotion->save();

        return response()->json($salepromotion, 201);
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $salepromotion = SalePromotion::with('product', 'service', 'barbershop')
        ->where('id', $id)->get()->first();

        if (isset($salepromotion)) {
            return response()->json($salepromotion, 200);
        }

        return response()->json([
            'message' => 'A promoção não foi encontrada!',
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
        $salepromotion = SalePromotion::with('product', 'service', 'barbershop')
        ->where('id', $id)->get()->first();

        if (isset($salepromotion)) {
            $salepromotion->enddate = $request->enddate;
            $salepromotion->description = $request->description;
            $salepromotion->price = $request->price;

            $salepromotion->save();

            return response()->json($salepromotion, 200);
        }

        return response()->json([
            'message' => 'A promoção não foi encontrada!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $salepromotion = SalePromotion::with('product', 'service', 'barbershop')
        ->where('id', $id)->get()->first();

        if (isset($salepromotion)) {
            $salepromotion->product()->dissociate();
            $salepromotion->service()->dissociate();
            $salepromotion->barbershop()->dissociate();

            $salepromotion->delete();

            return response()->json([
                'message' => 'A promoção foi excluída com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'A promoção não foi encontrada!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
