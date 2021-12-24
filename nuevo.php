<?php

if (
	!isset($_POST["nombre_prod"]) ||
	!isset($_POST["referencia_prod"]) ||
	!isset($_POST["precio_prod"]) ||
	!isset($_POST["peso_prod"]) ||
	!isset($_POST["categoria_prod"]) ||
	!isset($_POST["stock"]) ||
	!isset($_POST["fecha"])
) exit();



include_once "base_de_datos.php";

$nombre_prod = $_POST['nombre_prod'];
$referencia_prod = $_POST['referencia_prod'];
$precio_prod = $_POST['precio_prod'];
$peso_prod = $_POST['peso_prod'];
$categoria_prod = $_POST['categoria_prod'];
$stock = $_POST['stock'];
$fecha = $_POST['fecha'];


$sentencia = $base_de_datos->prepare("INSERT INTO productos(descripcion, referencia_prod, precioVenta, peso_prod, categoria_prod, existencia, fecha) VALUES (?, ?, ?, ?, ?,?,?);");
$resultado = $sentencia->execute([$nombre_prod, $referencia_prod, $precio_prod, $peso_prod, $categoria_prod, $stock, $fecha]);

if ($resultado === TRUE) {
	header("Location: ./listar.php");
	exit;
} else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>