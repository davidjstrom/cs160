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
        
        
        function manageErrors($conn, $myfile) { 
            $i = 0;        
            
            
            $arr = array(400 => 0, 401 => 0, 402 => 0, 403 => 0, 404 => 0, 405 => 0,
                         412=>0,413=>0,414=>0,415=>0,421=>0,422=>0,423=>0,426=>0,429=>0,431=>0,451=>0,
                         500=>0,501=>0,502 =>0,503=>0,504 =>0,505 =>0,506 =>0,507 =>0,508 =>0,510 =>0,511 ,                         
                         520 =>0,521 =>0,522 =>0,523 =>0,524 =>0,525 =>0,526 =>0,
                         'warn'=>0,'exception'=>0
                
                );
            $errors = array(200, 404, 403, 411, 405, 'warn','exception');
            
            $query = $conn->query("UPDATE errors SET NofOccurences='0'");
            
            

            while (!feof($myfile)) {
                $line = fgets($myfile);
                foreach ($errors as $error) {
                    //$query = $conn->query("INSERT INTO Errors(EType, EDescription,Date, NofOccurences)" . " values($error)");
                    $pattern = "/\b[0-9]{4}\-[0-9]{2}\-[0-9]{2}(.*)$error\b/i";
                    $date="/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";// just the date
                    $pattern2='/'.$error.'/i';
                    
                    if (preg_match_all($pattern, $line, $match)) {                                                                        
                        
                        if($query = $conn->query("SELECT * FROM errors Where EType='$error'")){
                         $nOfocc = $conn->query("SELECT NofOccurences FROM errors Where EType='$error'"); 
                         $row=$nOfocc->fetch_assoc();
                         $NofOccur=$row['NofOccurences']+1;
                         $query = $conn->query("UPDATE errors set NofOccurences=$NofOccur Where EType='$error'");
                         if(preg_match($date, $line, $match)){
                             $query = $conn->query("UPDATE errors set Date=$match[0] Where EType='$error'");
                         }
                        }
                    }
                    
                }
            }
        }
  
        $target_dir = $_POST['username']."/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        
        switch ($_FILES['file']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:                   
             header("location:".$_SERVER['HTTP_REFERER']);
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }
        $conn = mysqli_connect("localhost", "messi55", "messi", "errorlog") or die("Can not connect to database");
        
        /*
        if(!isset($_GET["file"])){
             header("location:".$_SERVER['HTTP_REFERER'] ); 
        }else if (!isset($_GET["myfile"])){
            header("location:".$_SERVER['HTTP_REFERER'] );
        }*/
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {


            $myfile = fopen($target_file, "r");


            $erroTable = "SELECT * FROM errors";
            $result = mysqli_query($conn, $erroTable);

            if ($result != true) {

                $createErrors = "CREATE TABLE errors("
                        . "EType VARCHAR(100) PRIMARY KEY,"
                        . "Date DATE,"
                        . "NofOccurences INT NOT NULL)";
                $conn->query($createErrors);
                if ($conn->query($createErrors) === false) {
                    echo mysqli_error($conn);
                }
                manageErrors($conn, $myfile);
            } else {
                if (!mysqli_errno($conn)) {
                    manageErrors($conn, $myfile);
                }
            }
            
            header("location:chart.php");

           
            ?>
            


            <?php
            $conn->close();
            fclose($myfile);
        }
        //$TOTAL = $arr[404] + $arr[200] + $arr[403] + $arr[203] + $arr[405] + $arr[411];
        //echo $arr[200];
        ?>

    </body>
</html>
