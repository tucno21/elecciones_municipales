<?php

namespace App\Model;

use System\Model;

class Students extends Model
{
    /**
     * nombre de la tabla
     */
    protected static $table       = 'students';
    /**
     * nombre primary key
     */
    protected static $primaryKey  = 'id';
    /**
     * nombre de la columnas de la tabla
     */
    protected static $allowedFields = ['name', 'dni', 'aula', 'candidatoId', 'date_access'];
    /**
     * obtener los datos de la tabla en 'array' u 'object'
     */
    protected static $returnType     = 'object';
    /**
     * si hay un campo de contraseña cifrar (true/false)
     */
    protected static $passEncrypt = false;
    protected static $useTimestamps   = false;
}
