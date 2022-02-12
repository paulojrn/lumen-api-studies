<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController
{
    protected string $classe;

    public function index()
    {
        return $this->classe::all();
    }

    public function store(Request $request)
    {
        $recurso = $this->classe::create($request->all());

        return response()->json($recurso, 201);
    }

    public function show(int $id)
    {
        $recurso = $this->classe::find($id);

        if (is_null($recurso)) {
            return response()->json("", 204);
        }

        return response()->json($recurso);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);

        if (is_null($recurso)) {
            return response()->json(["erro" => "Recurso não encontrado"], 404);
        }

        $recurso->fill($request->all());
        $recurso->save();

        return $recurso;
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidas = $this->classe::destroy($id);

        if ($qtdRecursosRemovidas === 0) {
            return response()->json(["erro" => "Recurso não encontrado"], 404);
        }

        return response()->json("", 204);
    }
}
