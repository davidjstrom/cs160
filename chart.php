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
    setcookie("file", "No File Selected!");
    $conn = mysqli_connect("localhost", "messi55", "messi", "errorlog") or die("Can not connect to database");
    
   /* if(isset($_POST['submit'])){
        $dateFrom=$_POST['from'];
      * $dateTo=$_POST['to'];
        $query11 = $conn->query("SELECT NofOccurences FROM errors WHERE Date='$date'");
        $res11 = $query11>fetch_assoc();
    }*/
    
        if(isset($_GET['type'])){
            $type=$_GET['type'];
         if($type=='warn'){
        $query = $conn->query("UPDATE errors SET NofOccurences='0' WHERE EType!='$type'");
        $query3 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='$type'");
       
         }else if($type=="exception"){
             $query = $conn->query("UPDATE errors SET NofOccurences='0' WHERE EType!='$type'");
             $query8 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='$type'");
         }
         
    $query = $conn->query("SELECT NofOccurences FROM errors WHERE EType='200'");
    $query2 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='412'");
    $query3 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='warn'");
    $query4 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='411'");
    $query5 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='403'");
    $query6 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='404'");
    $query7 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='405'");
    $query8 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='exception'");
    $res = $query->fetch_assoc();
    $res2 = $query7->fetch_assoc();
    $res3 = $query3->fetch_assoc();
    $res4 = $query4->fetch_assoc();
    $res5 = $query5->fetch_assoc();
    $res6 = $query6->fetch_assoc();
    $res8 = $query8->fetch_assoc();
         
        }
         
    
    $query = $conn->query("SELECT NofOccurences FROM errors WHERE EType='200'");
    $query2 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='412'");
    $query3 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='warn'");
    $query4 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='411'");
    $query5 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='403'");
    $query6 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='404'");
    $query7 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='405'");
    $query8 = $conn->query("SELECT NofOccurences FROM errors WHERE EType='exception'");
    $res = $query->fetch_assoc();
    $res2 = $query7->fetch_assoc();
    $res3 = $query3->fetch_assoc();
    $res4 = $query4->fetch_assoc();
    $res5 = $query5->fetch_assoc();
    $res6 = $query6->fetch_assoc();
    $res8 = $query8->fetch_assoc();
    
    
    
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
                                {label: "412", y: <?php echo $res2["NofOccurences"] ?>},
                                {label: "warn", y: <?php echo $res3["NofOccurences"] ?>},
                                {label: "411", y: <?php echo $res4["NofOccurences"] ?>},
                                {label: "200", y: <?php echo $res["NofOccurences"] ?>},
                                {label: "403", y: <?php echo $res5["NofOccurences"] ?>},
                                {label: "404", y: <?php echo $res6["NofOccurences"] ?>},
                                {label: "exception", y: <?php echo $res8["NofOccurences"] ?>}
                            ]
                        }
                    ]
                });
                chart.render();
            };
        </script>
    </div>

    <form method="post" action="bugs.php" enctype="multipart/form-data">

        <fieldset>            
            <label>Upload file:</label>
            <input name=file type="file"/><br>
            <input  name="username" type="text" value="<?php echo $_COOKIE["username"]; ?>" hidden/>
            <span style="color: red;" name='myfile'><?php
                if (isset($_COOKIE['file'])) {
                    echo $_COOKIE['file'];
                }
                ?></span><br>

            <input id="submit" value="submit"  type="submit"/>
        </fieldset>

    </form>

    <div class="container">  

        <div class="btn-group">
            <div class="bfh-datepicker" data-format="y-m-d" data-date="today">
            </div>
            <button type="button" class="btn btn-primary">Delete Files</button>
            <button type="button" class="btn btn-primary">Log Out</button>
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
                        <a href="<?php echo $_SERVER['PHP_SELF']."?type=warn"; ?>">warn</a>
                        <a href="<?php echo $_SERVER['PHP_SELF']."?type=exception"; ?>">exception</a>
                        <a href="#">405</a>
                    </div>
                </div> 


            </ul>

        </div> 

    </div>
    <div  class='wrapper'>
        <form action="FilterSearch.php" method="POST">
        <legend>Period :</legend>
        <label for="from">from:</label>
        <input type="text" id="from" name="from">
        <label for="to">to:</label>
        <input type="text" id="to" name="to">
        <button name="submit" type="submit" value="submit"><a href="<?php echo $_SERVER['PHP_SELF']; ?>">submit</a></button>
        </form>
    </div>
    <form class="byoccurence" action="/action_page.php" method="get">
        Points:
        <input width="100px"  type="number" name="points" min="0" max="600">
        <input type="submit">
    </form>
    <div id="chartContainer" style="height: 400px; width: 100%;"></div>
    <script>
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
