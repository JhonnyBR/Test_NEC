<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ventas</title>
</head>
<body>
	<table class="table table-hover m-5">
		<thead>
			<tr>
				<th scope="col">Fecha de venta</th>
				<th scope="col">Marca</th>
				<th scope="col">Modelo</th>
				<th scope="col">Cantidad de venta</th>
				<th scope="col">Precio Venta</th>
				<th scope="col">Total Venta</th>
			</tr>
		</thead>
		<tbody>
			<?php
		while($long > 0 ){
				echo "<tr>
				<td>".$data[$long-1]['Fecha_venta']."</td>
				<td>".$data[$long-1]['Nombre_marca']."</td>
				<td>".$data[$long-1]['Nombre_modelo']."</td>
				<td>".$data[$long-1]['cantidadtotal']."</td>
				<td> $". number_format($data[$long-1]['Precio_unidad'],0,0, '.')."</td>
				<td> $". number_format(intval($data[$long-1]['Precio_unidad'])*intval($data[$long-1]['cantidadtotal']), 0, 0, '.')."</td>
				</tr>
				";
				--$long;
			}
			?>
		</tbody>
	</table>	
		</body>
		</html>
