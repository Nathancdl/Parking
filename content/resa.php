<?php
if(isset($_POST['submit']))
	{
    
    $dateactuel = time();
    
    $recherche = $bdd->query('SELECT * FROM places
                                 WHERE busy = 0');
    $donnee =  $recherche->fetch();
    
    $datefin = $dateactuel + 864000;
   
    
    if(!$donnee)
    {
        $attente = $bdd->query("UPDATE users set date_attente=".$dateactuel.", status = 1 WHERE id_u =".$_SESSION['id']);
       $result = $attente->fetch();
        
        }
    else
    {
        $placement = $bdd->query("INSERT INTO reservations(date_debut,date_fin,id_u,id_p) VALUES(".$dateactuel.",".$datefin.",".$_SESSION['id'].",".$donnee['id_p'].")");
        
        if($placement)
        {
              $placement1 = $bdd->query("UPDATE places set id_u =".$_SESSION['id']." , busy = 1  WHERE id_p = ".$donnee['id_p']);
        }
       
      }} ?>




            <form action='#' method='post'>
                <ul id="nav">
                    <li><input type='submit' name='submit' value="Reserver"> </li>
                </ul>
            
                </form>
            </div>

        </div>