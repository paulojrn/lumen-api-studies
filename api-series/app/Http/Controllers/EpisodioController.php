<?php

namespace App\Http\Controllers;

use App\Models\Episodio;

class EpisodioController extends BaseController
{
    public function __construct()
    {
        $this->classe = Episodio::class;
    }

    public function porSerie(int $serieId)
    {
        $episodios = Episodio::query()
            ->where("serie_id", $serieId)
            ->get();

        return $episodios;
    }
}
