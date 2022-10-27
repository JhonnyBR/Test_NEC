<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class BrandsModel extends Model
{
	protected $table = 'marca';
	protected $primaryKey = "Id_marca";

	protected $allowedFields = [];
}
?>