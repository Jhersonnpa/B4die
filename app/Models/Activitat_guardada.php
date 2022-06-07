<?php

namespace App\Models;

use CodeIgniter\Model;

class Activitat_guardada extends Model
{
    protected $table      = 'activitat_guardada';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['id_usuari', 'id_activitat','data'];

}