<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud de Games</title>
</head>
<body>

    <h1> Formulário de EDIÇÃO DE DADOS </h1>
<?php
  $id_for_showing = $_POST['id_update'];
  $conexao =  mysqli_connect("127.0.0.1","root","","game");
  $query = "SELECT nome,desenvolvedora,genero,imagem FROM games WHERE id=$id_for_showing";
  $resultado = mysqli_query($conexao,$query);
  $linha = mysqli_fetch_array($resultado,MYSQLI_ASSOC);
?>

    <form action="editar_dados.php"  method="post" enctype="multipart/form-data">
       
        <label> Nome: </label>
        <input type="text" name="nome_edit" value= "<?=$linha['nome']?>" >
        <label> Desennvolvedora: </label>
        <input type="text" name="desenvolvedora_edit" value=<?=$linha['desenvolvedora']?> >
        <label> Genero: </label>
        <input type="text" name="genero_edit" value=<?=$linha['genero']?> >
        <label> Imagem: </label>
        <input type="file" name="imagem_edit" value=<?=$linha['imagem']?> >
        <input type="hidden" name="id_for_updating" value=<?=$id_for_showing?> > 

        <button type="submit" name="submit">Enviar</button>

    </form>
    
</body>
</html>