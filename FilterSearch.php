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
    require_once'connect_database.php';
    setcookie("file", "No File Selected!");
   
    
   /* if(isset($_POST['submit'])){
        $dateFrom=$_POST['from'];
      * $dateTo=$_POST['to'];
        $query11 = $conn->query("SELECT NofOccurences FROM errors WHERE Date='$date'");
        $res11 = $query11>fetch_assoc();
    }*/
    
        $dateFrom=$_POST['from']; 
        $dateTo=$_POST['to']; 
        
    
    $query = $conn->query("SELECT NofOccurences FROM errors WHERE Date>='$dateFrom' AND Date<='$dateTo' ");
    
    $res = $query->fetch_assoc();
    
    
    
    
    ?>
    




</body>
</html>
