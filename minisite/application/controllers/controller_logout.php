<?php
class Controller_Logout extends Controller {

    function action_index()
	{        
        
        session_start(); 
	    $_SESSION['auth'] = null;
	
 	    header('Location: /') ; die() ;

        $this->view->generate('main_view.php', 'template_view.php');
    }
}