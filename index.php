<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>2hacks</title>
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


<body class="red">
<?php
require_once'connect_database.php';
 
$username = $password = $email = "";


$UnRequired = $PwRequired = $EmRequired = "";


if($conn->connect_error){
    echo 'jjj';
}
//$query = "SELECT * FROM users WHERE uName='$username'" or die("query failed");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST['username']) || empty($password = $_POST['password'])) {
        
       
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
      
       $_SESSION["username"]=$username;

       $query = "SELECT * FROM users WHERE Uname='$username'" or die("query failed");
       
       
       $password = tesInput($_POST['password']);
        if (mysqli_query($conn, $query)) {
            
            $valPassword = $conn->query("SELECT pWord FROM users WHERE Uname = '$username'");
            if(!$valPassword){
                echo mysqli_affected_rows($conn);
            }
            if (mysqli_query($conn, $query)) {
                $row=$conn->query("SELECT pWord FROM users WHERE Uname = '$username'");
                
                
                while($row=$valPassword->fetch_assoc()){
                    
                
                if ($row["pWord"]== $password) {
                    
                    header("location: findbugs.php?username=".$username);
                }
                }
            }
        }else{
           echo mysqli_errno($conn);
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
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="login-form" method="POST">
        <div class="row">
          <div class="input-field col s12 center">
              <img src="3hacks.jpg" alt="" class="responsive-img valign profile-image-login">
            <p class="center login-form-text">2hacks| Login Form</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="username" class="validate" id="email" type="text">
            <label for="email" data-error="wrong" data-success="right" class="center-align">Email</label>
            <span class="required"><?php echo $UnRequired; ?></span>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="password" id="password" type="password">
            <label for="password">Password</label>
            <span class="required"><?php echo $PwRequired; ?></span>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
              <input type="submit" value="Log in" class="btn col s5">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="Register.php">Register Now!</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="forgot-password.html">Forgot password?</a></p>
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
           2hacks © 2017
            <a class="grey-text text-lighten-4 right" href="http://w3lessons.info"></a>
            </div>
          </div>
  </footer>
</body>

</html>
