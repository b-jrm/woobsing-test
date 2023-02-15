<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol_permiso extends Model
{
    use HasFactory;

    protected $table = "roles_permisos";
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_rol',
        'id_permiso',
    ];
}
