<?php

namespace App\Models;

use CodeIgniter\Model;

class usuario_Model extends Model
{
    protected $table = 'usuarios'; // Nombre de la tabla
    protected $primaryKey = 'id_usuario'; // Identificador de la tabla
    protected $allowedFields = ['nombre', 'apellido', 'username', 'email', 'password', 'perfil_id', 'baja', 'created_at']; // Todos los campos de la tabla
}