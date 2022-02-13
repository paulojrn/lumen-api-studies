<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ["nome"];
    protected $perPage = 5; 

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    /**
     * Mutator para nome
     */
    public function setNomeAttribute($nome)
    {
        $this->attributes["nome"] = mb_strtoupper($nome);
    }
}
