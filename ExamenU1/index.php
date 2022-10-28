<?php
    header('Content-Type: application/JSON');
    $metodo = $_SERVER['REQUEST_METHOD'];

    switch ($metodo) {
        case 'GET': 
            if($_GET['accion']== 'personaje'){
                try{
                    $conexion= new PDO(
                    "mysql:host=localhost;dbname=KOF;charset=UTF8",
                    "root",
                    "root");

                }catch(PDOException $ex){
                    echo $ex->getMessage();
            }
            if(isset($_GET['id'])){

                $sql = 'SELECT * FROM personaje';
                $pstm = $conexion->prepare($sql);
                $pstm->bindParam(':n', $_GET['id']);
                $pstm->execute();
                $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
                if($rs != null){
                    echo json_encode($rs[0], JSON_PRETTY_PRINT);
                }else{
                    echo "No hay registros";
                }
            }else{
                $sql = 'SELECT * FROM personaje';
                $pstm = $conexion->prepare($sql);
                $pstm->execute();
                $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($rs, JSON_PRETTY_PRINT);
            }
        } else if($_GET['accion']== 'personaje_id'){
            try{
                $conexion= new PDO(
                "mysql:host=localhost;dbname=KOF;charset=UTF8",
                "root",
                "root");

            }catch(PDOException $ex){
                echo $ex->getMessage();
        }
        if(isset($_GET['id'])){

            $sql = 'SELECT * FROM personaje where personaje.id=:id';
            $pstm = $conexion->prepare($sql);
            $pstm->bindParam(':id', $_GET['id']);
            $pstm->execute();
            $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
            if($rs != null){
                echo json_encode($rs[0], JSON_PRETTY_PRINT);
            }else{
                echo "No hay registros";
            }
        }else{
            $sql = 'SELECT * FROM personaje where personaje.id=:id';
            $pstm = $conexion->prepare($sql);
            $pstm->execute();
            $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($rs, JSON_PRETTY_PRINT);
        }
    }else if($_GET['accion']== 'magia'){
                
            try{
                $conexion= new PDO(
                "mysql:host=localhost;dbname=KOF;charset=UTF8",
                "root",
                "root");

            }catch(PDOException $ex){
                echo $ex->getMessage();
        }
        if(isset($_GET['id'])){
            
            $sql = 'SELECT * FROM magia WHERE id = :n';
            $pstm = $conexion->prepare($sql);
            $pstm->bindParam(':n', $_GET['id']);
            $pstm->execute();
            $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
            if($rs != null){
                echo json_encode($rs[0], JSON_PRETTY_PRINT);
            }else{
                echo "No hay registros";
            }
        }else{
            $sql = 'SELECT * FROM magia';
            $pstm = $conexion->prepare($sql);
            $pstm->execute();
            $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($rs, JSON_PRETTY_PRINT);
        }
        } else if($_GET['accion']== 'tipo_lucha'){
                
            try{
                $conexion= new PDO(
                "mysql:host=localhost;dbname=KOF;charset=UTF8",
                "root",
                "root");

            }catch(PDOException $ex){
                echo $ex->getMessage();
        }
        if(isset($_GET['id'])){
            
            $sql = 'SELECT * FROM tipo_lucha WHERE id = :n';
            $pstm = $conexion->prepare($sql);
            $pstm->bindParam(':n', $_GET['id']);
            $pstm->execute();
            $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
            if($rs != null){
                echo json_encode($rs[0], JSON_PRETTY_PRINT);
            }else{
                echo "No hay registros";
            }
        }else{
            $sql = 'SELECT * FROM tipo_lucha';
            $pstm = $conexion->prepare($sql);
            $pstm->execute();
            $rs = $pstm->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($rs, JSON_PRETTY_PRINT);
        }    
        break;
        }

        case 'POST':
            if($_GET['accion']== 'personaje'){
                try{
                   $conexion = new PDO(
                    "mysql:host=localhost;dbname=KOF;charset=utf8",
                    "root",
                    "root"
                   );
                }catch( PDOException $ex){
                    echo $ex->getMessage();
                }
                try {
                    $data = json_decode(file_get_contents('php://input'));
                    $sql = 'INSERT INTO personaje (id, name, lastname, birthday, utiliza_magia, estatura, peso, equipo, magia_id, tipo_lucha_id) VALUES (:id, :name, :lastname, :birthday, :utiliza_magia, :estatura, :peso, :equipo, :magia_id, :tipo_lucha_id)';
                    $pstm = $conexion->prepare($sql);
                    $pstm ->bindParam(':id',$data->id);
                    $pstm ->bindParam(':name',$data->nombre);
                    $pstm ->bindParam(':lastname',$data->lastname);
                    $pstm ->bindParam(':birthday',$data->birthday);
                    $pstm ->bindParam(':utiliza_magia',$data->utiliza_magia);
                    $pstm ->bindParam(':estatura',$data->estatura);
                    $pstm ->bindParam(':peso',$data->peso);
                    $pstm ->bindParam(':equipo',$data->equipo);
                    $pstm ->bindParam(':magia_id',$data->magia_id);
                    $pstm ->bindParam(':tipo_lucha_id',$data->tipo_lucha_id);
                    $exec = $pstm->execute();
                    if ($exec) {
                        $_POST['result']=$exec;
                        $_POST['added']=$data->id;
                        echo json_encode($_POST);
                    } else {
                        $_POST['result']=$exec;
                        echo json_encode($_POST);
                         
                    }
                    exit();
                }catch( PDOException $ex){
                    echo $ex->getMessage();
                }
            }else if($_GET['accion']== 'magia'){
                try{
                    $conexion = new PDO(
                     "mysql:host=localhost;dbname=KOF;charset=utf8",
                     "root",
                     "root"
                    );
                 }catch( PDOException $ex){
                     echo $ex->getMessage();
                 }
                 try {
                     $data = json_decode(file_get_contents('php://input'));
                     $sql = 'INSERT INTO magia (id, name) VALUES (:id, :name)';
                     $pstm = $conexion->prepare($sql);
                     $pstm ->bindParam(':id',$data->id);
                     $pstm ->bindParam(':name',$data->name);
                     $exec = $pstm->execute();
                     if ($exec) {
                         $_POST['result']=$exec;
                         $_POST['added']=$data->id;
                         echo json_encode($_POST);
                     } else {
                         $_POST['result']=$exec;
                         echo json_encode($_POST);
                          
                     }
                     exit();
            }catch( PDOException $ex){
                echo $ex->getMessage();
            }
        } else if($_GET['accion']== 'tipo_lucha'){
            try{
                $conexion = new PDO(
                 "mysql:host=localhost;dbname=KOF;charset=utf8",
                 "root",
                 "root"
                );
             }catch( PDOException $ex){
                 echo $ex->getMessage();
             }
             try {
                 $data = json_decode(file_get_contents('php://input'));
                 $sql = 'INSERT INTO tipo_lucha (id, name) VALUES (:id, :name)';
                 $pstm = $conexion->prepare($sql);
                 $pstm ->bindParam(':id',$data->id_cargo);
                 $pstm ->bindParam(':name',$data->name);
                 $exec = $pstm->execute();
                 if ($exec) {
                     $_POST['result']=$exec;
                     $_POST['added']=$data->id;
                     echo json_encode($_POST);
                 } else {
                     $_POST['result']=$exec;
                     echo json_encode($_POST);
                      
                 }
                 exit();
        }catch( PDOException $ex){
            echo $ex->getMessage();
        }
        }
            break;

        case 'PUT':
            if($_GET['accion']== 'empleado'){
                try{
                   $conexion = new PDO(
                    "mysql:host=localhost;dbname=KOF;charset=utf8",
                    "root",
                    ""
                   );
                }catch( PDOException $ex){
                    echo $ex->getMessage();
    
                }
                try {
                    $data = json_decode(file_get_contents("php://input"));
                    $sql = "UPDATE personajes SET id=:id, name=:name, lastname=:lastname, 
                    birthday=:birthday, utiliza_magia=:utiliza_magia, estatura=:estatura, peso=:peso, equipo=:equipo, magia_id=:magia_id, tipo_lucha_id=:tipo_lucha_id WHERE id=:id";
                    $pstm = $conexion->prepare($sql);
                    $pstm ->bindParam(':id',$data->id);
                    $pstm ->bindParam(':name',$data->nombre);
                    $pstm ->bindParam(':lastname',$data->lastname);
                    $pstm ->bindParam(':birthday',$data->birthday);
                    $pstm ->bindParam(':utiliza_magia',$data->utiliza_magia);
                    $pstm ->bindParam(':estatura',$data->estatura);
                    $pstm ->bindParam(':peso',$data->peso);
                    $pstm ->bindParam(':equipo',$data->equipo);
                    $pstm ->bindParam(':magia_id',$data->magia_id);
                    $pstm ->bindParam(':tipo_lucha_id',$data->tipo_lucha_id);
                    
                    $exec = $pstm->execute();
                    if ($exec) {
                        $_POST['result']=$exec;
                        $_POST['updated']=$data->id;
                        echo json_encode($_POST);
                    } else {
                        $_POST['result']=$exec;
                        echo json_encode($_POST);
                         
                    }
                    exit();
    
                } catch( PDOException $ex){
                    echo $ex->getMessage();
                }
            }else if ($_GET['accion']== 'magia'){
                try{
                    $conexion = new PDO(
                     "mysql:host=localhost;dbname=KOF;charset=utf8",
                     "root",
                     "root"
                    );
                 }catch( PDOException $ex){
                     echo $ex->getMessage();
     
                 }
                 try {
                     $data = json_decode(file_get_contents("php://input"));
                     $sql = "UPDATE magia SET name=:name WHERE id=:id";
                     $pstm = $conexion->prepare($sql);
                     $pstm ->bindParam(':name',$data->name);
                     $pstm ->bindParam(':id',$data->id);
                     $exec = $pstm->execute();
                     if ($exec) {
                         $_POST['result']=$exec;
                         $_POST['updated']=$data->id;
                         echo json_encode($_POST);
                     } else {
                         $_POST['result']=$exec;
                         echo json_encode($_POST);
                          
                     }
                     exit();
     
                 } catch( PDOException $ex){
                     echo $ex->getMessage();
                 }
            } else if ($_GET['accion']== 'tipo_lucha'){
                try{
                    $conexion = new PDO(
                     "mysql:host=localhost;dbname=KOF;charset=utf8",
                     "root",
                     "root"
                    );
                 }catch( PDOException $ex){
                     echo $ex->getMessage();
     
                 }
                 try {
                     $data = json_decode(file_get_contents("php://input"));
                     $sql = "UPDATE tipo_lucha SET name=:name WHERE id=:id";
                     $pstm = $conexion->prepare($sql);
                     $pstm ->bindParam(':name',$data->name);
                     $pstm ->bindParam(':id',$data->id);
                     $exec = $pstm->execute();
                     if ($exec) {
                         $_POST['result']=$exec;
                         $_POST['updated']=$data->id;
                         echo json_encode($_POST);
                     } else {
                         $_POST['result']=$exec;
                         echo json_encode($_POST);
                          
                     }
                     exit();
     
                 } catch( PDOException $ex){
                     echo $ex->getMessage();
                 }
            }
            break;
        case 'DELETE':
            if($_GET['accion']== 'personaje'){
                try{
                   $conexion = new PDO(
                    "mysql:host=localhost;dbname=KOF;charset=utf8",
                    "root",
                    "root"
                   );
                }catch( PDOException $ex){
                    echo $ex->getMessage();
    
                }
                try {
                    $id = $_GET ['id'];
                    $sql = 'DELETE FROM personaje WHERE id=:id';
                    $pstm = $conexion->prepare($sql);
                    $pstm->bindParam(":id", $id);
                    $exec = $pstm->execute();
                    if($exec){
                        $_POST['result']=$exec;
                        $_POST['delete']=$id;
                        echo json_encode($_POST);
                    }else{
                        $_POST['result']=$exec;
                        echo json_encode($_POST);
                    }
    
                }catch( PDOException $ex){
                    echo $ex->getMessage();
                }
            }else if($_GET['accion']== 'magia'){
                try{
                    $conexion = new PDO(
                     "mysql:host=localhost;dbname=KOF;charset=utf8",
                     "root",
                     "root"
                    );
                 }catch( PDOException $ex){
                     echo $ex->getMessage();
     
                 }
                 try {
                     $id = $_GET ['id'];
                     $sql = 'DELETE FROM magia WHERE id=:id';
                     $pstm = $conexion->prepare($sql);
                     $pstm->bindParam(":id", $id);
                     $exec = $pstm->execute();
                     if($exec){
                         $_POST['result']=$exec;
                         $_POST['delete']=$id;
                         echo json_encode($_POST);
                     }else{
                         $_POST['result']=$exec;
                         echo json_encode($_POST);
                     }
                 }catch( PDOException $ex){
                     echo $ex->getMessage();
                 }
            } else if($_GET['accion']== 'tipo_lucha'){
                try{
                    $conexion = new PDO(
                     "mysql:host=localhost;dbname=KOF;charset=utf8",
                     "root",
                     "root"
                    );
                 }catch( PDOException $ex){
                     echo $ex->getMessage();
     
                 }
                 try {
                     $id = $_GET ['id'];
                     $sql = 'DELETE FROM tipo_lucha WHERE id=:id';
                     $pstm = $conexion->prepare($sql);
                     $pstm->bindParam(":id", $id);
                     $exec = $pstm->execute();
                     if($exec){
                         $_POST['result']=$exec;
                         $_POST['delete']=$id;
                         echo json_encode($_POST);
                     }else{
                         $_POST['result']=$exec;
                         echo json_encode($_POST);
                     }
                 }catch( PDOException $ex){
                     echo $ex->getMessage();
                 }
            }
            break;
        default:
            echo "Error de Metodo No se puede soportar!";
            break;    
    }
?>