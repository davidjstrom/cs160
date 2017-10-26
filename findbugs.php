
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

<?php if (session_status()<=0) {
     $ref=$_SERVER['HTTP_REFERER'];
     header("location: $ref");
   exit;
}?>
  <div id="login-page" class="row">
    <div class="col s12 z-depth-6 card-panel">
        <form method="post" action="bugs2.php" enctype="multipart/form-data">
                
                <fieldset>
                    <legend>Upload file</legend>
                    
                    <input name=file type="file"/><br>
                    <input  name="username" type="text" value="<?php echo $_GET['username']; ?>" hidden=""/>
                    <span style="color: red;" name='file'><?php if(isset($_COOKIE['file'])){
                        echo $_COOKIE['file'];
                    }
                        ?></span>
                    <input id="submit" value="submit"  type="submit"/>
                </fieldset>
              
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







