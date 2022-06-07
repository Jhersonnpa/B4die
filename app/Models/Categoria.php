<?php

namespace App\Models;

use CodeIgniter\Model;

class Categoria extends Model
{
    protected $table      = 'categoria';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['nom'];
}