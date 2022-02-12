<?php

namespace App\Http\Controllers;

use App\Models\Episodio;

class EpisodioController extends BaseController
{
    public function __construct()
    {
        $this->classe = Episodio::class;
    }
}
