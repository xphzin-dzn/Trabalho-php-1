<?php
echo "Remocao";

$id_a_ser_removido = $_POST['id'];

$conexao =  mysqli_connect("127.0.0.1","root","","game");

$query = "DELETE FROM games WHERE id = ".$id_a_ser_removido;
echo "$query";
$resultado = mysqli_query($conexao,$query);


?>
<a href="Untitled-1.php"> Clique aqui para voltar </a>