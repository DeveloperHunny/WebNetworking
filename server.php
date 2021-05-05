<?php include "lib.php";
    //session_destroy();//로그인 유지 안 되게 개발때만 잠깐 이용

    CheckLogin(); //로그인 상태일 경우 HOMEPAGE로 이동
    
    function CheckLogin(){       
        if(!isset($_SESSION['USER'])){ //not login
            echo "<script>location.replace('loginPage.php')</script>";
            echo "실행!1";
        }
        else{ //already login
            echo "<script>location.replace('home.php')</script>";
            echo "실행!2";
        }
        
    }

?>