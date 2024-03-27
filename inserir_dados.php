<?php
$nome = $_POST['nome'];
$desenvolvedora = $_POST['desenvolvedora'];
$genero = $_POST['genero'];
$conexao =  mysqli_connect("127.0.0.1","root","","game");

$targetDir = "uploads/"; 

if(!empty($_FILES["imagem"]["name"])){ 
    $fileName = basename($_FILES["imagem"]["name"]);

    $fileNameModified = date("YmdHis").$fileName;

    $targetFilePath = $targetDir . $fileName ; 
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
    $targetFilePath = $targetDir.$fileNameModified; 
 
    // permite formatos de imagens abaixo
    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes)){ 
        // Upload file to server 
        if(move_uploaded_file($_FILES["imagem"]["tmp_name"], $targetFilePath)){ 
            // Insert image file name into database 
            $query = "INSERT INTO games (nome,desenvolvedora,genero,imagem) VALUES ('$nome', '$desenvolvedora' , '$genero' , '$fileNameModified')";
            $insert = mysqli_query($conexao,$query); 
            if($insert){ 
                $statusMsg = " O nome e o arquivo ".$fileName. " foram inseridos com sucesso!<br>"; 
            }else{ 
                $statusMsg = "Erro ao realizar o upload do arquivo"; 
            }  
        }else{ 
            $statusMsg = "Erro ao realizar o upload do arquivo"; 
        } 
    }else{ 
        $statusMsg = 'Formato inválido.'; 
    } 
}else{ 
    $statusMsg = 'Please select a file to upload.'; 
} 


echo $statusMsg;



echo "dados sendo armazenados no banco de dados<br>";


$result = mysqli_query($conexao,$query);
if($result) {
    echo "<br>Registro armazenado com sucesso<br>";
}else {
    echo "<br>Erro. Algo aconteceu. Banco de dados está ativo?";
}

?>

<a href="Untitled-1.php">Voltar</a>