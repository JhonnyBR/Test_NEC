<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class MarcasModel extends Model
{
	protected $table = 'marcas';
	protected $primaryKey = "Id_marca";

	protected $allowedFields = [];
}
?>