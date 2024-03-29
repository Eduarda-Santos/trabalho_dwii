<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docencia extends Model
{
    use HasFactory;

    protected $table = "docencia";
    protected $fillable = ['disciplina_id', 'professor_id'];
}
