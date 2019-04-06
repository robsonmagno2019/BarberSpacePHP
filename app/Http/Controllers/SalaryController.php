<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber;
use App\Models\Salary;

class SalaryController extends Controller
{
    public function indexJson($id)
    {
        $salaries = Salary::with('barber')->where('barber_id', $id)->get();

        if (isset($salaries)) {
            return response()->json($salaries, 200);
        }

        return response()->json([
            'message' => 'O barbeiro não tem nenhum salário registrado!',
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

        $barber = Barber::find($request->barber_id);

        $salary = new Salary();
        $salary->createdate = $salary->createDateSalary();
        $salary->price = $request->price;

        if (isset($barber)) {
            $salary->barber()->associate($barber);
        }

        $salary->save();
    }

    public function store(Request $request)
    {
    }

    public function showJson($id)
    {
        $salary = Salary::with('barber')->where('id', $id)->get()->first();

        if (isset($salary)) {
            return response()->json($salary, 200);
        }

        return response()->json([
            'message' => 'O salário não foi encontrado!',
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
        $salary = Salary::with('barber')->where('id', $id)->get()->first();

        if (isset($salary)) {
            $salary->update($request->price);
        }
    }

    public function update(Request $request, $id)
    {
    }

    public function destroyJson($id)
    {
    }

    public function destroy($id)
    {
    }
}
