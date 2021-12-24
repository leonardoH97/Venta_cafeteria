<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);



$senten = $base_de_datos->query("SELECT productos.descripcion FROM productos GROUP BY productos.id 
ORDER BY SUM(productos.existencia) DESC LIMIT 0 , 1");
$exitenciamayor = $senten->fetchAll(PDO::FETCH_OBJ);


$sentenmaxven = $base_de_datos->query("SELECT productos_vendidos.id_producto, productos.descripcion, SUM(productos_vendidos.cantidad) AS 
TotalVentas FROM productos_vendidos  JOIN productos WHERE productos.id=productos_vendidos.id_producto GROUP BY productos_vendidos.id 
ORDER BY SUM(productos_vendidos.cantidad) DESC LIMIT 0 , 1");
$maxvendido = $sentenmaxven->fetchAll(PDO::FETCH_OBJ);
?>

<div class="col-xs-12">
	<h1>Productos</h1>
	<div>
		<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
	</div>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>NOMBRE</th>
				<th>REFERENCIA </th>
				<th>PECIO </th>
				<th>PESO</th>
				<th>CATEGORIA</th>
				<th>STOCK</th>
				<th>FECHA </th>
				<th colspan="2">OPCIONES</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($productos as $producto) { ?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->referencia_prod ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->peso_prod ?></td>
					<td><?php echo $producto->categoria_prod ?></td>
					<td><?php echo $producto->existencia ?></td>
					<td><?php echo $producto->fecha ?></td>

					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id ?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<h2><label for=""> Producto mas vendido: <?php foreach ($maxvendido  as $maxvendido ) {
											echo $maxvendido->descripcion ?>
	<?php } ?></label></h2>
	<h2> <label for="">  Producto con mayor stock: <?php foreach ($exitenciamayor as $exitenciamayorv) {
													echo $exitenciamayorv->descripcion ?>
		<?php } ?></label></h2>


</div>
<?php include_once "pie.php" ?>