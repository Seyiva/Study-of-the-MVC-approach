<?php
class Controller_Profile extends Controller {

    public function action_index()
	{   
        session_start() ;

        $data = [] ;

        $flash = $this->getFlash() ;
        $data['flash'] = $flash ;
        
        if(isset($_SESSION['auth'])) {
            
            $content = "<h1> Ваш логин: ". $_SESSION['login_user']  ."</h1> 
                <h3><b> ". $_SESSION['name_user'] ." ". $_SESSION['surname_user'] ."</b></h3>";
            
            $data['content'] = $content ;
        }
        
        $this->view->generate('profile_view.php', 'template_view.php', $data);
    }

    protected function getFlash(){
        if(isset($_SESSION['message'])) {
            $status_message = $_SESSION['message']['status'];
            $text_message = $_SESSION['message']['text'];

            unset($_SESSION['message']) ;

            return "<p class= \"$status_message\">$text_message</p>" ;
                
        }
    }
}