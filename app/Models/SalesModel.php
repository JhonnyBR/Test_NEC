<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class SalesModel extends Model
{
	protected $table = 'ventas';
	protected $primaryKey = "Id_venta";

	protected $allowedFields = ['Cantidad_venta', 'Total_venta', 'Fecha_venta', 'Fk_modelo'];
}
?>