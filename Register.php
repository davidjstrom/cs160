<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign-up for 2hacks</title>
  <!-- CORE CSS-->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

<style type="text/css">
html,
body {
    height: 100%;
}
html {
    display: table;
    margin: auto;
}
body {
    display: table-cell;
    vertical-align: middle;
}
.margin {
  margin: 0 !important;
}
</style>
  
</head>

<body class="blue">
 <?php
$fName=$lName=$username = $password = $email = "";


$UnRequired = $PwRequired = $EmRequired = $FnRequired=$LnRequired= "";

$conn = new mysqli("localhost", "messi55", "messi", "errorlog");
if($conn->connect_error){
    echo 'jjj';
}
$query = "SELECT * FROM users";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        
        if (empty($_POST['username'])) {
            echo 'p';
            $UnRequired = "Required*";
        } else {
            
            $username = tesInput($username);
        }
        if (empty($password = $_POST['password'])) {
            echo 'pp';
            $PwRequired = "Required*";
        } else {
            $password = tesInput($password);
        }
        
        
    } else {
        echo 'ooo';
        
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

  <div id="login-page" class="row">
    <div class="col s12 z-depth-6 card-panel">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="3hacks.jpg" alt="" class="responsive-img valign profile-image-login">
            <p class="center login-form-text">Sign-Up For 2hacks</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="username" id="username" type="text" class="validate">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input name="email" id="email" type="email" class="validate" >
            <label for="email" class="center-align">Email</label>
            <span class="required"><?php echo $UnRequired; ?></span>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="password" id="password" type="password" class="validate">
            <label for="password">Password</label>
            <span class="required"><?php echo $PwRequired; ?></span>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password-again" type="password">
            <label for="password-again">Re-type password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
              <input type="submit" value="Register" class="btn col s5">
          </div>
          <div class="input-field col s12">
              <p class="margin center medium-small sign-up">Already have an account? <a href="index.php">Login</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>


  <center>
<script id="mNCC" language="javascript">
    medianet_width = "336";
    medianet_height = "280";
    medianet_crid = "842814926";
    medianet_versionId = "3111299"; 
  </script>
<script src="//contextual.media.net/nmedianet.js?cid=8CU65ZB5M"></script>
</center>

  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!--materialize js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>



  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27820211-3', 'auto');
  ga('send', 'pageview');

</script><script src="//load.sumome.com/" data-sumo-site-id="1cf2c3d548b156a57050bff06ee37284c67d0884b086bebd8e957ca1c34e99a1" async="async"></script>


   <footer class="page-footer">
          <div class="footer-copyright">
            <div class="container">
            © 2015 W3lessons.info
            <a class="grey-text text-lighten-4 right" href="http://w3lessons.info">Karthikeyan K</a>
            </div>
          </div>
  </footer>
</body>

</html>