<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Rol;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol = Rol::select('id')->where('nombre','Invitado')->first();
        User::create([ "nombre" => "invitado", "apellido" => "woobsing", "correo" => "guest@woobsing.org", "password" => Hash::make('invitado2023'), "id_rol" => $rol->id ]);

        $rol = Rol::select('id')->where('nombre','Administrador')->first();
        User::create([ "nombre" => "admin", "apellido" => "woobsing", "correo" => "admin@woobsing.org", "password" => Hash::make('admin2023'), "id_rol" => $rol->id ]);
        unset($rol);
    }
}
