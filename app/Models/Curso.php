<?php

namespace Amusic\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'id';
    protected $fillable = ['curso', 'valor'];

    public function getCursoStatusDescricaoAttribute()
    {
      $descricao = "Inativo";

      if ($this->status == 1) {
          $descricao = "Ativo";
      }

      return $descricao;
    }
}
