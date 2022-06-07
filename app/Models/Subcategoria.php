<?php

namespace App\Models;

use CodeIgniter\Model;

class Subcategoria extends Model
{
    protected $table      = 'subcategoria';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['nom','id_categoria'];

}