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
$fName=$lName=$username = $password = $email = "";


$UnRequired = $PwRequired = $EmRequired = $FnRequired=$LnRequired= "";

$conn = new mysqli("localhost", "messi55", "messi", "errorlog");
if($conn->connect_error){
    echo 'jjj';
}
$query = "SELECT * FROM users";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username']) || empty($_POST['password'])||empty($_POST['email'])) {
       
        if (empty($_POST['username'])) {
            $UnRequired = "Required*";
        } else {
            $username = tesInput($username);
        }
        if (empty($password = $_POST['password'])) {
            $PwRequired = "Required*";
        } else {
            $password = tesInput($password);
        }
        
    } else {
        
       $username = tesInput($_POST['username']);
       $password = tesInput($_POST['password']);
       $fName=tesInput($_POST['fName']);
       $lName=tesInput($_POST['lName']);
       
            
            
            
                $recExists= "SELECT * FROM users WHERE uName='$username'";
                $result=  mysqli_fetch_array($conn->query($recExists));
                if($result!=false){
                    
                    $UnRequired="userName exists*";
                }else{
                    
                   mkdir($username); 
                   $stm = ("INSERT INTO users(fName,lName,uName,pWord) VALUES('$fName','$lName','$username','$password')"); 
                   if($conn->query($stm)===true){
                      
                       header("location:index.php");            
                   
                }else{
                    echo mysqli_error($conn);
                }
            
            
        
    }
    }
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
