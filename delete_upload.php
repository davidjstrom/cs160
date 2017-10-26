<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         require_once 'connect_database.php';
          
        if(isset($_GET['filename'])){ 
         $filename=tesInput($_GET['filename']);  
         $RES=$conn->query("SELECT * FROM files WHERE fileName='$filename'");
         if(!empty($RES)){
         $conn->query("DELETE FROM files WHERE fileName='$filename'");
         }
         header("location:chart2.php");
        }
        function tesInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
         
        ?>
    </body>
</html>
