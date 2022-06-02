<?php

namespace App\Models;

use CodeIgniter\Model;

class Activitat extends Model
{
    protected $table      = 'activitat';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['nom', 'descripcio','categoria','subcategoria','pais','ciutat','longitud','latitud','dificultat','img','tipo_img'];

}