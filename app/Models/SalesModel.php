<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class SalesModel extends Model
{
	protected $table = 'ventas';
	protected $primaryKey = "Id_venta";

	protected $allowedFields = ['Cantidad_venta', 'Total_venta', 'Fecha_venta', 'Fk_modelo'];

	public function Consultdata(){
		$db = \Config\Database::connect();
		$builder = $db->table('ventas v');
		$builder->select("SUM(v.Cantidad_venta) as cantidadtotal, v.Fecha_venta, m.Nombre_modelo, mr.Nombre_marca, m.Precio_unidad");
		$builder->join("modelo m", 'm.Id_modelo = v.Fk_modelo');
		$builder->join("marca mr", 'mr.Id_marca = m.Fk_marca');
		$builder->groupBy('v.Fk_modelo');
		$query = $builder->get();
		return $query->getResultArray();
	}
}
?>