<?php
$nome = $_POST["nome_edit"];
$desenvolvedora = $_POST["desenvolvedora_edit"];
$genero = $_POST["genero_edit"];
$id_for_updating = $_POST ["id_for_updating"];
$targetDir = "uploads/"; 

if(isset($_POST["submit"])){ 

    $conexao =  mysqli_connect("127.0.0.1","root","","game");


    if(!empty($_FILES["imagem_edit"]["name"])){ 
        $fileName = basename($_FILES["imagem_edit"]["name"]);
    
        $fileNameModified = date("YmdHis").$fileName;
    
        $targetFilePath = $targetDir . $fileName ; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
        $targetFilePath = $targetDir.$fileNameModified; 
     
        // permite formatos de imagens abaixo
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to server 
            if(move_uploaded_file($_FILES["imagem_edit"]["tmp_name"], $targetFilePath)){ 
                // Insert image file name into database 
                $query = "UPDATE games SET nome='$nome', desenvolvedora='$desenvolvedora', genero='$genero', imagem ='$fileNameModified' WHERE id=$id_for_updating";
                echo $query;
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
    
}

    echo $statusMsg;
?>




