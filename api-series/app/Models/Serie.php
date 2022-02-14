<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ["nome"];
    protected $perPage = 5;
    protected $appends = ["links"];

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

    /**
     * Accessor para links
     */
    public function getLinksAttribute(): array
    {
        return [
            "self" => "/api/series/" . $this->id,
            "episodios" => "/api/series/" . $this->id . "/episodios"
        ];
    }
}
