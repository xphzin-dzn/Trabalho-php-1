<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Games </title>
</head>
<body>
    <h1>CRUD de Games</h1>

    <h2>Inserir Game</h2>
    <form  action = "inserir_dados.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="inserir">
        Nome: <input type="text" name="nome"><br>
        Desenvolvedora: <input type="text" name="desenvolvedora"><br>
        Gênero: <input type="text" name="genero"><br>
        Imagem do Game: <input type="file" name="imagem"><br>
        <input type="submit" value="Inserir">
    </form>

    <h2>Listar Games</h2>
    <a href="listar_dados.php"> Listar Jogos</a>

    <h2>Pesquisar Game</h2>
    <form method="get">
        <input type="text" name="nome">
        <input type="submit" value="Pesquisar">
    </form>
    <?php
   //if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nome'])) {
     //  pesquisarGame($_GET['nome']);
    //}
    ?>

</body>
</html>