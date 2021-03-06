<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barbershop;
use App\Models\Period;
use App\Models\ServiceHour;

class ServiceHourController extends Controller
{
    public function indexJson()
    {
        $serviceHours = ServiceHour::with('period', 'barbershop')->get();

        if (isset($serviceHours)) {
            return response()->json($serviceHours, 200);
        }

        return response()->json([
            'message' => 'Nenhum horário de atendimento foi registrado!',
        ], 404);
    }

    public function index()
    {
        $serviceHours = ServiceHour::with('period', 'barbershop')->get();

        if (isset($serviceHours)) {
            return view('service-hour.index', compact('serviceHours'));
        }
    }

    public function create()
    {
        return view('service-hour.create');
    }

    public function storeJson(Request $request)
    {
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'barbershop_id' => 'A barbearia é obrigatória.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
            'barbershop_id' => 'required',
        ], $messages);

        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        $period = Period::find($request->period_id);
        $barbershop = Barbershop::find($request->barbershop_id);

        $serviceHour = new ServiceHour();
        $serviceHour->createdate = $date;
        $serviceHour->description = $request->description;

        if (isset($period)) {
            $serviceHour->period()->associate($period);
        }

        if (isset($barbershop)) {
            $serviceHour->barbershop()->associate($barbershop);
        }

        $serviceHour->save();

        return response()->json($serviceHour, 201);
    }

    public function store(Request $request)
    {
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'barbershop_id' => 'A barbearia é obrigatória.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
            'barbershop_id' => 'required',
        ], $messages);

        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        $period = Period::find($request->period_id);
        $barbershop = Barbershop::find($request->barbershop_id);

        $serviceHour = new ServiceHour();
        $serviceHour->createdate = $date;
        $serviceHour->description = $request->description;

        if (isset($period)) {
            $serviceHour->period()->associate($period);
        }

        if (isset($barbershop)) {
            $serviceHour->barbershop()->associate($barbershop);
        }

        $serviceHour->save();

        return redirect('/horario-de-servicos');
    }

    public function getPeriod($duration)
    {
        $hours = 0;
        $mins = 0;
        $secs = 0;

        if (str_word_count($duration, 0, 'h') > 0) {
            $durationHor = explode('h', $duration);

            for ($i = 0; $i < $durationHor; ++$i) {
                if ($i == 0 && str_word_count($durationHor[$i], 0, 'min') == 0) {
                    $hours = $durationHor[$i];
                }

                if ($i == 1 && str_word_count($durationHor[$i], 0, 'min') > 0) {
                    $durationMin = explode('min', $durationHor[$i]);

                    for ($j = 0; $j < $durationMin; ++$j) {
                        $mins = $durationMin[$j];
                    }
                }
            }

            $secs = 0;
        }

        if (str_word_count($duration, 0, 'h') == 0 && str_word_count($duration, 0, 'min') > 0) {
            $durationExplodes = explode('min', $duration);
            $hours = 0;
            $mins = $durationExplodes[1];
            $secs = 0;
        }

        $date = DateTime::setTime($hours, $mins, $secs);

        return $date;
    }

    public function showJson($id)
    {
        $serviceHour = ServiceHour::with('period', 'barbershop')
                        ->where('id', $id)->get()->first();

        if (isset($serviceHour)) {
            return response()->json($serviceHour, 200);
        }

        return response()->json([
            'message' => 'O horário de serviço não foi encontrado!',
        ], 404);
    }

    public function show($id)
    {
        $serviceHour = ServiceHour::with('period', 'barbershop')
                        ->where('id', $id)->get()->first();

        if (isset($serviceHour)) {
            return view('service-hour.show', compact('serviceHour'));
        }
    }

    public function edit($id)
    {
        $serviceHour = ServiceHour::with('period', 'barbershop')
                        ->where('id', $id)->get()->first();

        if (isset($serviceHour)) {
            return view('service-hour.edit', compact('serviceHour'));
        }
    }

    public function updateJson(Request $request, $id)
    {
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'period_id.required' => 'O período é obrigatório.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
            'period_id' => 'required',
        ], $messages);

        $serviceHour = ServiceHour::with('period', 'barbershop')
                        ->where('id', $id)->get()->first();

        if (isset($serviceHour)) {
            $period = Period::find($request->period_id);
            $barbershop = Barbershop::find($request->barbershop_id);
            $serviceHour->description = $request->description;

            if (isset($period)) {
                $serviceHour->period()->associate($period);
            }

            if (isset($barbershop)) {
                $serviceHour->barbershop()->associate($barbershop);
            }
            $serviceHour->save();

            return response()->json($serviceHour, 200);
        }

        return response()->json([
            'message' => 'O horário de serviço não foi encontrado!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'description.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'period_id.required' => 'O período é obrigatório.',
        ];
        $request->validate([
            'description' => 'required|min:2|max:20',
            'period_id' => 'required',
        ], $messages);

        $serviceHour = ServiceHour::with('period', 'barbershop')
                        ->where('id', $id)->get()->first();

        if (isset($serviceHour)) {
            $period = Period::find($request->period_id);
            $serviceHour->description = $request->description;
            $serviceHour->period()->associate($period);
            $serviceHour->save();

            return redirect('/horario-de-servicos');
        }
    }

    public function destroyJson($id)
    {
        $serviceHour = ServiceHour::with('period', 'barbershop')
                        ->where('id', $id)->get()->first();

        if (isset($serviceHour)) {
            $serviceHour->period()->dissociate();
            $serviceHour->barbershop()->dissociate();

            $serviceHour->delete();

            return response()->json([
                'message' => 'O horário de serviço foi excluído com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'O horário de serviço não foi encontrado!',
        ], 404);
    }

    public function destroy($id)
    {
        $serviceHour = ServiceHour::with('period', 'barbershop')
                        ->where('id', $id)->get()->first();

        if (isset($serviceHour)) {
            $serviceHour->period()->dissociate();
            $serviceHour->barbershop()->dissociate();

            $serviceHour->delete();

            return redirect('/horario-de-servicos');
        }
    }
}
