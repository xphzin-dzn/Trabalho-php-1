<?php
echo "Banco de Dados";
$conexao =  mysqli_connect("127.0.0.1","root","","game");

if (!empty($_POST['$id_for_updating'])){
   $nome_edit = $_POST['nome_edit'];
   $desenvolvedora_edit = $_POST['desenvolvedora_edit'];
   $genero_edit = $_POST['genero_edit'];
   $id_for_updating = $_POST['$id_for_updating']; 
   $query = "UPDATE games SET nome='$nome_edit', desenvolvedora='$desenvolvedora_edit', genero=$genero_edit  WHERE id=$id_for_updating";
   mysqli_query($conexao,$query);
}

if (!empty($_POST["id_for_removing"])){
    $removingRow = $_POST["id_for_removing"];
    $query_for_removing = "DELETE FROM games WHERE id=$removingRow";
    mysqli_query($conexao,$query_for_removing);
  
  }


   
$query = "SELECT id,nome,desenvolvedora,genero,imagem FROM games";
$resultado = mysqli_query($conexao,$query);


?>
<table class="table">
  <thead>
    <tr>
    <th scope="col">id<th>
    <th scope="col">Nome</th>
    <th scope="col">desenvolvedora</th>
    <th scope="col">genero</th>
    <th scope="col">imagem</th>

    </tr>
  </thead>
  <tbody>
<?php
while($linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
    echo "<tr> <td>".$linha['id']."</td> <td>".$linha['nome']."</td>
    <td>".$linha['desenvolvedora']."</td>
    <td>".$linha['genero']."</td>
    <td><img src = './uploads/".$linha ['imagem']."'width ='100' 'height = '100'> </td>";
?>
<td>
 <form action="listar_dados.php"  method="post" >
       <input type="hidden" name="id_for_removing" value="<?=$linha['id']?>" >
       <button type="submit" name="submit">delete</button>
</form>
</td>
<td>
 <form action="formulario_edicao.php"  method="post" >
       <input type="hidden" name="id_update" value="<?=$linha['id']?>" >
       <button type="submit" name="submit"> editar</button>
</form>
</td>
</tr>
<?php    
}
?>

<a href="Untitled-1.php"> clique aqui para voltar </a>

</tbody>
</table>


