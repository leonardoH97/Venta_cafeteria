<?php
if (!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if ($producto === FALSE) {
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
<div class="col-xs-12">
	<h1>Editar producto con el ID <?php echo $producto->id; ?></h1>
	<form method="post" action="guardarDatosEditados.php">
		<input type="hidden" name="id" value="<?php echo $producto->id; ?>">

		<label for="codigo">Nombre del producto:</label>
		<textarea required id="descripcion" name="nombre_prod" cols="30" rows="5" class="form-control"><?php echo $producto->descripcion; ?></textarea>
		<label for="descripcion">Referencia del producto:</label>
		<input type="text" class="form-control" name="referencia_prod" id="" placeholder="Referencia del Producto" value="<?php echo $producto->referencia_prod; ?>" required>

		<label for="precioVenta">Precio producto:</label>
		<input type="text" class="form-control" name="precio_prod" id="" placeholder="Precio del Producto" value="<?php echo $producto->precioVenta; ?>" required>

		<label for="precioCompra">Peso del producto:</label>
		<input type="text" class="form-control" name="peso_prod" id="" placeholder="Peso del Producto" value="<?php echo $producto->peso_prod; ?>" required>

		<label for="precioCompra">Categoría Producto:</label>
		<input type="text" class="form-control" name="categoria_prod" id="" placeholder="Categoría del Producto" value="<?php echo $producto->categoria_prod ?>">
		<label for="stock">Cantidad:</label>
		<input class="form-control" class="form-control" name="stock" required type="number" id="stock" placeholder="Cantidad o stock" value="<?php echo $producto->existencia; ?>">
		<label for="precioCompra">Fecha:</label>
		<input type="date" class="form-control" name="fecha" value="<?php echo $producto->fecha; ?>" required>

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
		<a class="btn btn-warning" href="./listar.php">Cancelar</a>





	</form>
</div>
<?php include_once "pie.php" ?>