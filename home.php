<?php include "lib.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>

    <link rel="stylesheet" href="css/home_style.css">
</head>
<body>
    <div class="container">
        <header>
            <span class="title">Client DB</span>
        </header>
        <main>
            <table>
                <tr><th>ID</th><th>NAME</th><th>PASSWORD</th></tr>
                <?php connectDB(); ?>
            </table>
        </main>
    </div>
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
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        //Check db connection
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM clients";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" . $row["id"] ."</td><td>" . $row["name"] . "</td><td>" . $row["pw"] . "</td></tr>";
        }

  

 }
?>