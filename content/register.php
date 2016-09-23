<?php

    
    try
    {
        $bdd = new PDO("mysql:host=localhost;dbname=parking","root","");
    }
    catch(Exception $e)
    {
        die("erreur de connection");
    }
 
    if(isset($_POST['submit']))
    {
        $login = $_POST['login'];
        $mdp = sha1($_POST['mdp']);
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $i = 0;
        
        
        if($i == 0)
        {
            //traitement
            
            $requete = $bdd->prepare("INSERT INTO users(login,mdp,prenom,email,nom,status) 
                                    VALUES(:login,:mdp,:prenom,:email,:nom,0)");
           $requete->bindValue(":login",$login,PDO::PARAM_STR);
           $requete->bindValue(":mdp",$mdp,PDO::PARAM_STR);
           $requete->bindValue(":prenom",$prenom,PDO::PARAM_STR);
           $requete->bindValue(":email",$email,PDO::PARAM_STR);
           $requete->bindValue(":nom",$nom,PDO::PARAM_STR);
           $requete->execute();
           
           
            if (!$requete) 
            {
                echo "<div class='cant'>Nom d'utilisateur ou E-Mail déjà inscrit.</div>";}
            }
        else
        {
            echo "Votre demande d'inscription a bien été prise en compte";
        }
         
    }
?>             
                
                <div class='inscri'>
                  <a href="#" style="text-decoration:none">Connexion</a>
                   <a class="titre">Inscription</a>
                    <form action="#" method="post" enctype="multipart/form-data" class="inscrip">
                        <a>Nom d'utilisateur : </a><input type="text" name="login" required /><br/>
                        <a>Mot de passe : </a><input type="password" name="mdp" required /><br/>
                        <a>Prenom : </a><input type="text" name="prenom" required /><br/>
                        <a>Nom : </a><input type="text" name="nom" required/><br/>
                        <a>E-Mail : </a><input type="email" name="email" required /><br/>
                       
                        <input type="submit" name="submit" id="submit" /></form>
                </div>

