<?php include "lib.php";

    
    //declare value
    $servername = "localhost";
    $username = "root";
    $password = "dmsgk41251723";
    $dbname = "clientDB";
    $sql = "";

    //Connect Database
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check db connection
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    //REQUEST 요청
    $errMsg = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["id"]) || empty($_POST["pw"])){
            $errMsg = "This input is fault!!";
            echo "$errMsg";
        }
        else{ //check id and pw in database;
            $id = $_POST['id'];
            $pw = $_POST['pw'];
            $sql = "SELECT id, pw FROM clients WHERE id = '$id' AND pw = '$pw'";
            $result = $conn->query($sql);
            echo $conn->error;
            if($result !== false && $result->num_rows > 0){
                $_SESSION['USER'] = $id;
                
            }
            else{
                unset($_SESSION['USER']);
            }
            echo "<script>location.replace('server.php')</script>";
        }
    }






?>
