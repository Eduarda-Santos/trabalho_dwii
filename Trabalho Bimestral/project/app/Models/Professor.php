<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    public function disciplina() {
        return $this->hasMany('\App\Models\Disciplina');
    }

    protected $table = "professores";
    protected $fillable = ['status','nome', 'email', 'siape', 'eixo_id'];
}
