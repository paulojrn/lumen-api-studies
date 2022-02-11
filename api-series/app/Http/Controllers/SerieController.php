<?php

namespace App\Http\Controllers;

use App\Models\Serie;

class SerieController
{
    public function index()
    {
        return Serie::all();
    }
}
