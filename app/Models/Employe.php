<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nama', 'alamat', 'gender', 'gaji'])]
class Employe extends Model
{
    use HasFactory;

    protected $table = 'employes';
}
