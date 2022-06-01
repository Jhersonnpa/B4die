<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuari extends Model
{
    protected $table      = 'usuari';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['nom_usuari', 'nom','cognom','email','contrasenya','data_naixament','pais','telefon','img','tipo_img','tipo_usuari','puntuacion','rango'];
}