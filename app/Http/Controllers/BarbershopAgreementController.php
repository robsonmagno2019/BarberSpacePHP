<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barbershop;
use App\Models\BarbershopAgreement;
use App\Models\DurationContract;
use App\Models\Plan;

class BarbershopAgreementController extends Controller
{
    public function indexJson()
    {
        $barbershopagreements = BarbershopAgreement::with('plan', 'barbershop', 'duration_contract')->get();

        if (isset($barbershopagreements)) {
            return response()->json($barbershopagreements, 200);
        }

        return response()->json([
            'message' => 'Nenhum contrato foi registrado!',
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

        $plan = Plan::find($request->plan_id);
        $barbershop = Barbershop::find($request->barbershop_id);
        $durationContract = DurationContract::find($request->duration_contract_id);

        $barbershopagreement = new BarbershopAgreement();
        $barbershopagreement->createdate = $date;
        $barbershopagreement->enddate = $request->enddate;

        if (isset($plan)) {
            $barbershopagreement->plan()->associate($plan);
        }

        if (isset($barbershop)) {
            $barbershopagreement->barbershop()->associate($barbershop);
        }

        if (isset($durationContract)) {
            $barbershopagreement->duration_contract()->associate($durationContract);
        }

        $barbershopagreement->save();

        if ($durationContract->description != '1 Mês') {
            return response()->json($barbershopagreement, 201);
        }
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $barbershopagreement = BarbershopAgreement::with('plan', 'barbershop', 'duration_contract')
        ->where('id', $id)->get()->first();

        if (isset($barbershopagreement)) {
            return response()->json($barbershopagreement, 200);
        }

        return response()->json([
            'message' => 'O contrato não foi encontrado!',
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
        $barbershopagreement = BarbershopAgreement::with('plan', 'barbershop', 'duration_contract')
        ->where('id', $id)->get()->first();

        if (isset($barbershopagreement)) {
            $plan = Plan::find($request->plan_id);
            $barbershop = Barbershop::find($request->barbershop_id);
            $durationContract = DurationContract::find($request->duration_contract_id);
            $barbershopagreement->enddate = $request->enddate;

            if (isset($plan)) {
                $barbershopagreement->plan()->associate($plan);
            }

            if (isset($barbershop)) {
                $barbershopagreement->barbershop()->associate($barbershop);
            }

            if (isset($durationContract)) {
                $barbershopagreement->duration_contract()->associate($durationContract);
            }

            $barbershopagreement->save();

            return response()->json($barbershopagreement, 200);
        }

        return response()->json([
            'message' => 'O contrato não foi encontrado!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
        $barbershopagreement = BarbershopAgreement::with('plan', 'barbershop', 'duration_contract')
        ->where('id', $id)->get()->first();

        if (isset($barbershopagreement)) {
            $barbershopagreement->plan()->dissociate();
            $barbershopagreement->barbershop()->dissociate();
            $barbershopagreement->duration_contract()->dissociate();

            $barbershopagreement->delete();

            return response()->json([
                'message' => 'O contrato foi excluído com sucesso!',
            ], 404);
        }

        return response()->json([
            'message' => 'O contrato não foi encontrado!',
        ], 404);
    }

    public function destroy($id)
    {
    }
}
