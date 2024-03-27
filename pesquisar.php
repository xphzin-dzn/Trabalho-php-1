
<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "game";

    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    

    if(isset($_POST['pesquisar'])) {
        $pesquisar = $_POST['pesquisar'];
        
    
        $stmt = mysqli_prepare($conn, "SELECT * FROM games WHERE nome LIKE ? LIMIT 5");
        mysqli_stmt_bind_param($stmt, "s", $param_pesquisar);
        
        $param_pesquisar = "%$pesquisar%";
        
        mysqli_stmt_execute($stmt);
        
        $resultado_game = mysqli_stmt_get_result($stmt);
        

        while($row = mysqli_fetch_array($resultado_game)){
            echo "Nome do Game: ".$row['nome']."<br>";
        }
    }
?>
