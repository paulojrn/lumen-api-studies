<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController
{
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());

        return response()->json($serie, 201);
    }

    public function show(int $id)
    {
        $serie = Serie::find($id);

        if (is_null($serie)) {
            return response()->json("", 204);
        }

        return response()->json($serie);
    }

    public function update(int $id, Request $request)
    {
        $serie = Serie::find($id);

        if (is_null($serie)) {
            return response()->json(["erro" => "Recurso não encontrado"], 404);
        }

        $serie->fill($request->all());
        $serie->save();

        return $serie;
    }

    public function destroy(int $id, Request $request)
    {
        $qtdRecursosRemovidas = Serie::destroy($id);

        if ($qtdRecursosRemovidas === 0) {
            return response()->json(["erro" => "Recurso não encontrado"], 404);
        }

        return response()->json("", 204);
    }
}
