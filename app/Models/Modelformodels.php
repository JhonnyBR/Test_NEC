<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class Modelformodels extends Model
{
	protected $table = 'modelo';
	protected $primaryKey = "Id_modelo";

	protected $allowedFields = ['Stock_modelo'];

	public function Getabiliavility($id){
		$db = \Config\Database::connect();
		$builder = $db->table('modelo');
		$builder->select('Stock_modelo');
		$filter = [
            "Id_modelo =" => $id
        ];
        $builder->where($filter);
        $query = $builder->get();
		
		return $query->getResult();
	}

	public function Getprice($id)
	{
		$db = \Config\Database::connect();
		$builder = $db->table('modelo');
		$builder->select('Precio_unidad');
		$filter = [
            "Id_modelo =" => $id
        ];
        $builder->where($filter);
        $query = $builder->get();
		
		return $query->getResult();
	}
}
?>