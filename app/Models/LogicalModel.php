<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class LogicalModel extends Model
{
    protected $BDSistemTimeAdmin = 'Ventas_de_Vehiculos';

    function getBrand(){
        $db      = \Config\Database::connect();
        $builder = $db->table('marca');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
}
?>