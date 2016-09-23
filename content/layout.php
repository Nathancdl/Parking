
<?php 
    session_start();
                            try
                            {
                                $bdd = new PDO("mysql:host=localhost;dbname=parking;charset=utf8","root","");
                            }
                            catch(Exception $e)
                            {
                                die("erreur de connection");
                            }



                               if(isset($_POST['connect']))
                                {
                                    $login = $_POST['login'];
                                    $mdp = sha1($_POST['mdp']);

                                    $requete = $bdd->query("SELECT * FROM users 
                                                            WHERE login ='".$login."' 
                                                            AND mdp ='".$mdp."'");

                                    if($reponse = $requete->fetch())
                                    {
                                        $_SESSION['connecte'] = true;
                                        $_SESSION['id'] = $reponse['id_u'];
                                        header("location:index.php?page=accueil.php");
        
			                             die();
                                         
                                    }
                                    else
                                    {
                                        echo "<div class='cant'>Nom d'utilisateur ou mot de passe incorect</div>";
                                    }
                                }
                                
                                
if(isset($_SESSION['connecte']))
{
                         $requetezer = $bdd->query("SELECT * FROM users WHERE id_u  = ".$_SESSION['id']."");
                            $pseudo = $requetezer->fetch();
}
                       
                          ?>  


<!DOCTYPE html>
<html>
	<head>  
	<title> King Park </title>
		<meta charset="utf-8" /><!-- encodage -->
		<meta name="author" content="OXEN&copy;" /><!-- auteur -->
		<meta name="description" content="Test" /><!-- description du site -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css" /><!-- lien vers le css-->
		<link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

	</head>
<body>
       
           <header role="banner" class="navbar navbar-fixed-top navbar-inverse">
              <div class="container">
                <div class="navbar-header">
                  <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="navbar-inverse side-collapse in">
                  <nav role="navigation" class="navbar-collapse">
                   <a href="">Logo de l'entreprise</a>
                    <ul class="nav navbar-nav pull-right">
                     <?php
    if(!isset($_SESSION['connecte']))
    {
        echo "<li><a href='index.php?page=register.php' class='zoombox'>S'enregistrer</a></li>";
        echo "<form action='#' method='post' class='connection'>
                  <a>Nom d'utilisateur : </a><input type='text' name='login'/>
                  <a>Mdp : </a><input type='password' name='mdp'/>
	              <input type='submit' name='connect' value='OK'/>
                  </form>";
    }
    else
    {
        echo "<li><a href='index.php?page=compte.php'>Mon compte</a></li>";
        echo "<li><a href='index.php?page=logout.php'>Se deconnecter</a></li>";}?>
                      
                    </ul>
                  </nav>
                </div>
              </div>
            </header>
            <div class="container side-collapse-container">
              <div class="row">
                   <div class="contenu">
                       <?php 
                            require $contenu; 
                       ?>
                   </div>
              </div>
            </div>
       
       
        <footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 footerleft ">
        <div class="logofooter"> Logo</div>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
        <p><i class="fa fa-map-pin"></i> 210, Aggarwal Tower, Rohini sec 9, New Delhi -        110085, INDIA</p>
        <p><i class="fa fa-phone"></i> Phone (India) : +91 9999 878 398</p>
        <p><i class="fa fa-envelope"></i> E-mail : info@webenlance.com</p>
        
      </div>
      <div class="col-md-2 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">GENERAL LINKS</h6>
        <ul class="footer-ul">
          <li><a href="#"> Career</a></li>
          <li><a href="#"> Privacy Policy</a></li>
          <li><a href="#"> Terms & Conditions</a></li>
          <li><a href="#"> Client Gateway</a></li>
          <li><a href="#"> Ranking</a></li>
          <li><a href="#"> Case Studies</a></li>
          <li><a href="#"> Frequently Ask Questions</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">LATEST POST</h6>
        <div class="post">
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
          <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--footer start from here-->

<div class="copyright">
  <div class="container">
    <div class="col-md-6">
      <p>© 2016 - All Rights with Webenlance</p>
    </div>
    <div class="col-md-6">
      <ul class="bottom_ul">
        <li><a href="#">webenlance.com</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Faq's</a></li>
        <li><a href="#">Contact us</a></li>
        <li><a href="#">Site Map</a></li>
      </ul>
    </div>
  </div>
</div>
        
        <script>
    
            $(document).ready(function() {   
                    var sideslider = $('[data-toggle=collapse-side]');
                    var sel = sideslider.attr('data-target');
                    var sel2 = sideslider.attr('data-target-2');
                    sideslider.click(function(event){
                        $(sel).toggleClass('in');
                        $(sel2).toggleClass('out');
                    });
                });
            
        </script>
    
    </body>
</html>
