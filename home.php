<?php include "lib.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>

    <link rel="stylesheet" href="css/home_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <?php connectDB(); ?>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $serialNum = (int)$_POST["serialNum"] + 1;
            $id = $_POST["id"];
            $name = $_POST["name"];
            $pw = $_POST["pw"];

            $sql = "UPDATE clients 
            SET id = '$id' , pw = '$pw', name = '$name'
            WHERE serialNum = '$serialNum'";

            if($_SERVER['conn']->query($sql) === TRUE){
                echo "<script>location.replace('home.php')</script>";
            }
            else{
                echo $_SERVER['conn']->error;
            }
        }

    ?>

    <div class="container">
        <header>
            <span class="title">Client DB</span>
        </header>
        <main>
            <table>
                <tr><th></th><th>ID</th><th>NAME</th><th>PASSWORD</th></tr>
                <?php settingTable(); ?>
            </table>
        </main>



        <div class="layerDim">
            <div class="bgClass">

            </div>
            <div class="popUp">
                <span class="title">User Info</span>
                <form action="home.php" method="POST">
                    
                    <ul>
                        <li><input type="text" name="serialNum" id="inputSerial" style="display:none"></li>
                        <li><label for="inputID">ID </label> <input type="text" name="id" id="inputID"></li>
                        <li><label>NAME </label> <input type="text" name="name"></li>
                        <li><label>PW </label> <input type="text" name="pw"></li>
                    </ul>
                    <button type="submit" id="submitBtn">Modify</button>  
                    
                </form>
                <button id="closeBtn">Close</button>
                
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>
</html>

<?php 
 function connectDB(){

        //declare value
        $servername = "localhost";
        $username = "root";
        $password = "dmsgk41251723";
        $dbname = "clientDB";
        $sql = "";
    
        //Connect Database
        $_SERVER['conn'] = new mysqli($servername, $username, $password, $dbname);
    
        //Check db connection
        if($_SERVER['conn']->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

 }

 function settingTable(){
    $sql = "SELECT * FROM clients";
        $result = $_SERVER['conn']->query($sql);
        $row = $result->fetch_assoc(); //첫줄 root 계정 안 보이게
        $num = 1;
        while($row = $result->fetch_assoc()){
            echo "<tr><th>" . $num ."</th><td>" . $row["id"] ."</td><td>" . $row["name"] . "</td><td>" . $row["pw"] . "</td></tr>";
            $num++;
        }
 }
?>