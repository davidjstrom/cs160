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
        include 'connect_database.php';
        
        $target_file = $_GET['fileName'];
        $username=$_SESSION['username'];
           
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
                     fclose($myfile);
                   
                   header("location:chart2.php");
           
      
        
        
        
        ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

        <fieldset>            
            <label>Upload file:</label>
            <input name=file type="file"/><br>
            

            <input id="submit" value="submit"  type="submit"/>
        </fieldset>

    </form>
    </body>
</html>
