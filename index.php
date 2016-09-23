<?php 

	if(isset($_GET['page']))
	{
        
        if(file_exists("content/".$_GET['page']))
		{
			$contenu = "content/".$_GET['page'];
		}
		else
		{
			$contenu = "content/404.php";
		}
	}
	else
	{  
		$contenu = "content/accueil.php";
	}
    require "content/layout.php";

?>
