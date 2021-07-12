<?php
header('Content-Type: text/html; charset=iso-8859-1');

// CONECTANDO AO BANCO

// $user = 'root';
// $pass = '';
// $host = 'localhost';
// $dbname = 'agroreserva';


// $host = '127.0.0.1';
// $port = 3306;
// $user = 'agroreserva';
// $pass = 'AgroAdmin123@';
// $dbname = 'agrolanding';

$host = '127.0.0.1';
$port = 3306;
$user = 'root';
$pass = '';
$dbname = 'agrolanding';

if(isset($_POST["nome"])){
    
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $stmt = $pdo->prepare('INSERT INTO cadastros (nome, empresa, email, whatsapp, interesse, atuacao, racas) VALUES(:nome, :empresa, :email, :whatsapp, :interesse, :atuacao, :racas)');
        $stmt->execute(array(
            ':nome' => $_POST["nome"],
            ':empresa' => $_POST["empresa"],
            ':email' => $_POST["email"],
            ':whatsapp' => $_POST["whatsapp"],
            ':interesse' => implode (", ", $_POST["interesse"]),
            ':atuacao' => implode (", ", $_POST["atuacao"]),
            ':racas' => implode (", ", $_POST["racas"]),
        ));
        if($stmt->rowCount()){
            echo 'Sucesso';
        }else{
            echo 'Erro';
            $arr = $stmt->errorInfo();
            print_r($arr);
        }
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
    
};


?>