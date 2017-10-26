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
           background-color:#2196F3; 
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
            background-color:#2196F3; 
        }
        .container2{
            display:block; 
            max-width: 500px;
            float: left;
            clear:left;
           
        }
        body{
            overflow:hidden;
        }
        
        .table{
            border:2px blue dashed ; 
            
        }
        td{
            background-color: aliceblue;
        }
        tr{
            border: 2px solid #2196F3; 
        }
        
        .dropbtn:hover{
            background-color:#2196F3; 
        }
        .error{
            color: red;
            margin-left: 50%;
            text-decoration: double  red underline ; 
            font-family: sans-serif;
            font-size:25px;
        }
    </style>
    <?php
    
     require_once 'connect_database.php';
     /*if(!isset($_SESSION['username'])) {
   include_once("login.php");
   exit;
}*/
     if(!isset($_SESSION['username'])) {
   include_once("index.php");
   exit;
}
     $_SESSION['file']="No File Selected!";
   

    // $conn = mysqli_connect("localhost", "messi55", "messi", "errorlog") or die("Can not connect to database");

    /* if(isset($_POST['submit'])){
      $dateFrom=$_POST['from'];
     * $dateTo=$_POST['to'];
      $query11 = $conn->query("SELECT NofOccurences FROM errors WHERE Date='$date'");
      $res11 = $query11>fetch_assoc();
      } */
     //$RES = $conn->query("SELECT fileName FROM users WHERE Uname = '$username'");
         
    

    function resetVal() {
        global $res, $e200, $e405, $e404, $e411, $e412, $ewarn;
        $e200 = $_SESSION['e200'];
        $e412 = $_SESSION['e412'];
        $ewarn = $_SESSION['ewarn'];
        $e411 = $_SESSION['e411'];
        $e405 = $_SESSION['e405'];
        $e404 = $_SESSION['e404'];

        $res = array($e200, $e405, $e404, $e411, $e412, $ewarn);
    }

    resetVal();

    if (isset($_GET['type'])) {

        if ($_GET['type'] == NULL) {
            echo 'ff';
        } else if ($_GET['type'] == 'warn') {

            $e200 = 0;
            $e412 = 0;
            $ewarn = $res[5];
            $e411 = 0;
            $e405 = 0;
            $e404 = 0;
           if($ewarn==0){
               echo  "<p class='error'>NO Such Error!</p>";
           }
            
        } else if ($_GET['type'] == '405') {
            resetVal();
            $e200 = 0;
            $e412 = 0;
            $ewarn = 0;
            $e411 = 0;
            $e404 = 0;
            if( $e405==0){
               echo  "<p class='error'>NO Such Error!</p>";
           }
        } else if ($_GET['type'] == '412') {
            resetVal();
            $e200 = 0;
            $e405 = 0;
            $ewarn = 0;
            $e411 = 0;
            $e404 = 0;
            if( $e412==0){
               echo  "<p class='error'>NO Such Error!</p>";
           }
            
        } else if ($_GET['type'] == '200') {
            resetVal();
            $e405 = 0;
            $e412 = 0;
            $ewarn = 0;
            $e411 = 0;
            $e404 = 0;
            if( $e200==0){
               echo  "<p class='error'>NO Such Error!</p>";
           }
        } else if ($_GET['type'] == '411') {
            resetVal();
            $e200 = 0;
            $e412 = 0;
            $ewarn = 0;
            $e404 = 0;
            $e405 = 0;
            if( $e411==0){
               echo  "<p class='error'>NO Such Error!</p>";
           }
            
        }
    } else {
        $e200 = $_SESSION['e200'];
        $e412 = $_SESSION['e412'];
        $ewarn = $_SESSION['ewarn'];
        $e411 = $_SESSION['e411'];
        $e405 = $_SESSION['e405'];
        $e404 = $_SESSION['e404'];
    }
    ?>

    <div class="chartcontainer">
        <script type="text/javascript">

            window.onload = function () {
                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "Error Log"
                    },
                    data: [
                        {
                            // Change type to "doughnut", "line", "splineArea", etc.
                            type: "doughnut",
                            dataPoints: [
                                {label: "412", y: <?php echo $e412; ?>},
                                {label: "warn", y: <?php echo $ewarn; ?>},
                                {label: "411", y: <?php echo $e411; ?>},
                                {label: "200", y: <?php echo $e200; ?>},
                                {label: "405", y: <?php echo $e405; ?>},
                                {label: "404", y: <?php echo $e404; ?>}
                            ]
                        }
                    ]
                });
                chart.render();
            };
        </script>
        
    </div>

    <form method="post" action="bugs2.php" enctype="multipart/form-data">

        <fieldset>            
            <label>Upload file:</label>
            <input name=file type="file"/><br>
            <input  name="username" type="text" value="<?php echo $_SESSION["username"]; ?>" hidden/>
            <span style="color: red;" name='myfile'><?php
    if (isset($_SESSION['file'])) {
        echo $_SESSION['file'];
    }
    ?></span><br>

            <input id="submit" value="submit"  type="submit"/>
        </fieldset>

    </form>

    <div class="container">  

        <div class="btn-group">
            <div class="bfh-datepicker" data-format="y-m-d" data-date="today">
            </div>
            <button onclick="f()" id="files" type="button" class="btn btn-primary">My Files</button>
            <button type="button" class="btn btn-primary"><a href="destroySession.php">Log Out</a></button>
        </div>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Search Errors
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li onclick="date()" class="bydate"><a href="#">By Date</a></li>
                <li onclick="date2()" class="boccurence"><a href="#">By occurence</a>
                </li>

                <div class="dropdown1">
                    <button class="dropbtn">By Type</button>
                    <div class="dropdown-content">
                        <a href="<?php echo $_SERVER['PHP_SELF'] . "?type=warn"; ?>">warn</a>
                        <a href="<?php echo $_SERVER['PHP_SELF'] . "?type=405"; ?>">405</a>
                        <a href="<?php echo $_SERVER['PHP_SELF'] . "?type=411"; ?>">411</a>
                    </div>
                </div> 


            </ul>

        </div> 

    </div>
    <div  class='wrapper'>
        <form action="FilterSearch.php" method="POST">
            <legend></legend>
            <label for="from">from:</label>
            <input type="text" id="from" name="from">
            <label for="to">to:</label>
            <input type="text" id="to" name="to">
            <input name="submit" type="submit" value="submit">
        </form>
    </div>
    <form class="byoccurence" action="/action_page.php" method="get">
        Points:
        <input width="100px"  type="number" name="points" min="0" max="600">
        <input type="submit">
    </form>
    
  <div class="container2" id="table">
      
      <h3 style="color:white;text-decoration: underline">My Files</h3>
        
  <table class="table">
    <thead>
      
    </thead>
    <tbody>
      <?php       
     $RES = $conn->query("SELECT fileName FROM files WHERE uName = '$username'");
      while($row=$RES->fetch_assoc()){?>
      <tr>      
           <td><?php echo $row['fileName'];?><button value='<?php echo $row['fileName'];?>' class="delete">delete</button>
               <button><a href="add_file.php?fileName=<?php echo $row['fileName']; ?>"  class="select">Analyse</a></button></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>
   <script>
       

</script>
    
    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
    <script>
        
     function myFunction(obj) {
          var filename = $(obj).val();    

    var txt;
    if (confirm("Confirm Deletion!") == true) {
        txt = "OK";
        window.location.href=("delete_upload.php?filename="+filename);
    } else {
        txt = "Cancel";
         //alert($(this).text());
        
    }
    
    document.getElementById("demo").innerHTML = txt;
}
    
$(document).ready(function(){
    $("#files").click(function(){
        
        $(".container2").toggle();
     
    });
    $(".delete").click(function(){
        myFunction(this);
    });
});

        
        $(function () {

            $("#from").datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    $("#to").datepicker("option", "minDate", selectedDate);
                }
            });
            $("#to").datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onClose: function (selectedDate) {
                    $("#from").datepicker("option", "maxDate", selectedDate);
                }
            });
        });
    </script>
    




</body>
</html>
