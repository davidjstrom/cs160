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
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script src="Myjs.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css">

    </head>
</head>
<body>  
    <style>
        .canvasjs-chart-credit{
            display: none;
        }
        body{
            background-color: #2196F3;
        }
        form{
            background-color: whitesmoke; 
            padding: 4px 5px;
        }

        .wrapper, .byoccurence{
            position: static;
            margin-top: 1%;
            display : none;
            border:1px solid lightgray;
            padding:4px;
            box-shadow:inset 1px 1px 1px rgba(0,0,0,.1)

        }
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 2px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }


        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #f1f1f1}

        /* Show the dropdown menu on hover */
        .dropdown1:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>
        <?php
        require_once 'connect_database.php';
        
        echo $_SESSION['username'];
       
        $target_dir = $_SESSION['username']."/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $filename=basename($_FILES["file"]["name"]);
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
       // $conn = mysqli_connect("localhost", "messi55", "messi", "errorlog") or die("Can not connect to database");
         
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
           $username=$_SESSION['username'];
           echo $filename;
         if($RES=$conn->query("SELECT * FROM files WHERE fileName='$target_file'")){
        
        $rowcount=mysqli_num_rows($RES);
        
        if($rowcount==0){
          $query= "INSERT INTO files(fileName,ID,uName) VALUES ('$target_file','','$username')";
          $result= $conn->query($query);
        
          }
         }
         
          
            $myfile = fopen($target_file, "r");
          
            $i = 0;

            $arr = array(400 => 0, 401 => 0, 411 => 0, 403 => 0, 404 => 0, 412 => 0,                                                 
                         520 =>0,521 =>0,522 =>0,523 =>0,524 =>0,200 =>0,405 =>0,
                         'warn'=>0,'exception'=>0
                
                );
            //authorization failure, errors, exceptions, access denied, error *". 
            $e404=$arr[404];
            $e411=$warn=$exception=$e403=0;
                
            $res=$_SESSION['arr'] = array(404=>$arr[404],411=>$arr[411],'warn'=>$arr['warn'],403=>$arr[403],200=>$arr[200]);
            
            
            $errors = array(200, 404, 403, 411, 405,'exception','WARN');
           
           
           /* $count=count(file("./errors.txt"));
           for($i=0;$i<$count;$i++){
               $fline=fgets($erors);
               $query = $conn->query("INSERT INTO errors(EType,Date,NofOccurences) VALUES('$fline','2010-12-12','0')");
               $errors[$i]=$fline;
           }*/

           
               
                while (!feof($myfile)) {                   
                   
                    $line = fgets($myfile);
                   
                       
               $date="/([0-9]{4})\-([0-9]{2})\-([0-9]{2})/";// just the date
               $patt="/(\b[0-9]{3}\b)/";
               $patt2="/(\bwarn\b)/i";
               $patt3="/(\bexception\b)/i";
                   
                    foreach ($errors as $error) {
                       
                        //$query = $conn->query("INSERT INTO Errors(EType, EDescription,Date, NofOccurences)" . " values($error)");
                        $pattern = "/\b[0-9]{4}\-[0-9]{2}\-[0-9]{2}(.*).$error\b/";
                       
                       // $date="/([0-9]{4})\-([0-9]{2})\-([0-9]{2})/";// just the date
                       
                        
                        
                        if (preg_match($pattern, $line, $match)) {
                            
                           
                             if (preg_match($patt, $match[0], $match2)) {
                                 
                                 if (preg_match($patt2, $line, $match3)) {
                                    $arr['warn'] ++;
                                  }
                                  if (preg_match($patt3, $line, $match4)) {
                                      $arr['exception'] ++;
                                  }
                                  
                                 if($match2[0]==404){
                                     $arr[404] ++;
                                     
                                 }else if($match2[0]==405){
                                     $arr[405] ++;
                                     
                                 }else if($match2[0]==412){
                                     $arr[412] ++;
                                     
                                 }    else if($match2[0]==411){
                                     $arr[411] ++;
                                     
                                 }else if($match2[0]==200){
                                     $arr[200] ++;
                                     
                                 }else if($match2[0]==405){
                                     $arr[405] ++;
                                     
                                 }            
                            
                        }
                        }
                        
                         
                    }
                     
                   
                }
                    $_SESSION['e404']=$arr[404]; 
                    $_SESSION['e405']=$arr[405];
                    $_SESSION['e411']=$arr[411]; 
                    $_SESSION['ewarn']=$arr['warn']; 
                    $_SESSION['e200']=$arr[200]; 
                    $_SESSION['e412']=$arr[412];
                   
                   header("location:chart2.php");
           
        }
       // $TOTAL = $arr[404] + $arr[200] + $arr[403] + $arr[203] + $arr[405] + $arr[411];
       
        fclose($myfile);
        ?>
    

    




</body>
</html>


