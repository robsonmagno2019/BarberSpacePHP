<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function indexJson()
    {
        $colors = Color::all();

        if (isset($colors)) {
            return response(
                $colors, 200);
        } else {
            return response()->json([
                'message' => 'Nenhuma cor registrada!',
            ], 200);
        }
    }

    public function index()
    {
        $colors = Color::all();

        if (isset($colors)) {
            return view('color.index', compact('colors'));
        }
    }

    public function create()
    {
        return view('color.create');
    }

    public function storeJson(Request $request)
    {
        $messages = [
            'name.required' => 'A descrição é obrigatória.',
            'name.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'name.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'code.required' => 'A descrição é obrigatória.',
            'code.min' => 'A descrição deve conter no mínimo 7 caracteres.',
            'code.max' => 'A descrição deve conter no máximo 10 caracteres.',
        ];
        $request->validate([
            'name' => 'required|min:2|max:20',
            'code' => 'required|min:7|max:10',
        ], $messages);

        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        $color = new Color();
        $color->createdate = $date;
        $color->name = $request->name;
        $color->code = $request->code;
        $color->save();

        return response()->json($color, 201);
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'A descrição é obrigatória.',
            'name.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'name.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'code.required' => 'A descrição é obrigatória.',
            'code.min' => 'A descrição deve conter no mínimo 7 caracteres.',
            'code.max' => 'A descrição deve conter no máximo 10 caracteres.',
        ];
        $request->validate([
            'name' => 'required|min:2|max:20',
            'code' => 'required|min:7|max:10',
        ], $messages);

        $date = new \DateTime();
        $date->format('Y-m-d H:i:s');

        $color = new Color();
        $color->createdate = $date;
        $color->name = $request->name;
        $color->code = $request->code;
        $color->save();

        return redirect('/cores');
    }

    public function showJson($id)
    {
        $color = Color::find($id);

        if (isset($color)) {
            return response()->json($color, 200);
        }

        return response()->json([
                    'message' => 'A cor não foi encontrada!',
                ], 404);
    }

    public function show($id)
    {
        $color = Color::find($id);

        if (isset($color)) {
            return view('color.show', compact('color'));
        }
    }

    public function edit($id)
    {
        $color = Color::find($id);

        if (isset($color)) {
            return view('color.edit', compact('color'));
        }
    }

    public function updateJson(Request $request, $id)
    {
        $messages = [
            'name.required' => 'A descrição é obrigatória.',
            'name.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'name.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'code.required' => 'A descrição é obrigatória.',
            'code.min' => 'A descrição deve conter no mínimo 7 caracteres.',
            'code.max' => 'A descrição deve conter no máximo 10 caracteres.',
        ];
        $request->validate([
            'name' => 'required|min:2|max:20',
            'code' => 'required|min:7|max:10',
        ], $messages);

        $color = Color::find($id);

        if (isset($color)) {
            $color->name = $request->name;
            $color->code = $request->code;
            $color->save();

            return response()->json($color, 200);
        }

        return response()->json([
            'message' => 'A cor não foi encontrada!',
        ], 404);
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'A descrição é obrigatória.',
            'name.min' => 'A descrição deve conter no mínimo 2 caracteres.',
            'name.max' => 'A descrição deve conter no máximo 20 caracteres.',
            'code.required' => 'A descrição é obrigatória.',
            'code.min' => 'A descrição deve conter no mínimo 7 caracteres.',
            'code.max' => 'A descrição deve conter no máximo 10 caracteres.',
        ];
        $request->validate([
            'name' => 'required|min:2|max:20',
            'code' => 'required|min:7|max:10',
        ], $messages);

        $color = Color::find($id);

        if (isset($color)) {
            $color->name = $request->name;
            $color->code = $request->code;
            $color->save();

            return redirect('/cores');
        }
    }

    public function destroyJson($id)
    {
        $color = Color::find($id);

        if (isset($color)) {
            $color->delete();

            return response()->json([
                'message' => 'A cor foi excluída com sucesso!',
            ], 200);
        }

        return response()->json([
            'message' => 'A cor não foi encontrada!',
        ], 404);
    }

    public function destroy($id)
    {
        $color = Color::find($id);

        if (isset($color)) {
            $color->delete();

            return redirect('/cores');
        }
    }
}
