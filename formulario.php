<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">

		<label for="codigo">Nombre del producto:</label>
		<textarea required id="descripcion" name="nombre_prod" cols="30" rows="5" class="form-control"></textarea>
		<label for="descripcion">Referencia del producto:</label>
		<input type="text" class="form-control" name="referencia_prod" id="" placeholder="Referencia del Producto" required>

		<label for="precioVenta">Precio producto:</label>
		<input type="text" class="form-control" name="precio_prod" id="" placeholder="Precio del Producto" required>

		<label for="precioCompra">Peso del producto:</label>
		<input type="text" class="form-control" name="peso_prod" id="" placeholder="Peso del Producto" required>

		<label for="precioCompra">Categoría del Producto:</label>
		<input type="text" class="form-control" name="categoria_prod" id="" placeholder="Categoría del Producto" required>
		<label for="stock">Cantidad:</label>
		<input class="form-control" class="form-control" name="stock" required type="number" id="stock" placeholder="Cantidad o stock">
		<label for="precioCompra">Fecha:</label>
		<input type="date" class="form-control" name="fecha" required>

		<br><br><input class="btn btn-info" type="submit" value="Guardar">

	</form>
</div>
<?php include_once "pie.php" ?>