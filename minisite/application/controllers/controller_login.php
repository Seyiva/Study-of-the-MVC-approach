<?php

class Controller_Login extends Controller {
    public function action_index()
	{   
        $data = [] ;

        session_start() ;
        // $_SESSION['auth'] = null;
        
        $flash = $this->getFlash() ;
        $data['flash'] = $flash ;

        if(isset($_POST['login']) and isset($_POST['password'])) {

            $login = $_POST['login'];

            $mod_log = new Model_Login() ;
            $user = $mod_log->get_ByLogin($login) ;

            if ( isset($user) ) {
                // правильнее воспользоваться password_verify(), но пароли при регистрации не хешировал
                if($_POST['password'] == $user['password']) {
                    
                    $_SESSION['auth'] = true ;
                    /**  Перекладываем данные из объекта $user  в сессию */
                    $_SESSION['login_user'] =  $user['login']; //делаем запись залогининого пользователя в сессию
                    $_SESSION['status'] = $user['status']; // записываем status пользователя из БД
                    $_SESSION['name_user'] = $user['name'];
                    $_SESSION['surname_user'] = $user['surname'];
                    
                    // вход обычного пользователя
                    if($_SESSION['status'] == "user" ) {

                        $_SESSION['message'] = [
                            'text' => "Вы вошли успешно, Вы лучший пользователь",
                            'status' => 'success'
                        ] ; 
                        
                       header("Location: /profile") ; die() ;
                    } 
                    // вход админа
                    elseif ($_SESSION['status'] == "admin" ) {
                        
                        $_SESSION['message'] = [
                            'text' => " Админ, хорошей работы ",
                            'status' => 'success'
                        ] ; 
                        
                        header("Location: /admin/?page=1") ; die() ;
                    }
                                    
                } else {
                    $_SESSION['auth'] = false ;
      
                    $_SESSION['message'] = [
                      'text' => "Вы неверно ввели логин или пароль",
                      'status' => 'error'
                    ] ; 
                }
            }

        }

        $this->view->generate('login_view.php', 'template_view.php', $data);
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