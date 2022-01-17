<?php

class Controller_Admin extends Controller
{
	
	public function action_index()
	{ 	
		session_start();
		
		if (isset($_SESSION['auth']) and  $_SESSION['status'] == "admin" )
		{
			$data = [] ;
			
			$flash = $this->getFlash() ;
			$data['flash'] = $flash ;
			
			if(isset($_GET['page'])){
				$numberOfPage = $_GET['page'] ;
				$usersOnPage = 5 ; 
				$from = ($numberOfPage - 1) * $usersOnPage ;
				
				$all_users = new Model_Admin() ;
				$users = $all_users->get_Users($from, $usersOnPage) ;
				

				$countOfUsers = $all_users->get_CountUsers() ;
				
				$countOfPages = ceil($countOfUsers/$usersOnPage) ;
				
				$data['numberOfPage'] = $numberOfPage;
				$data['countOfPages'] = $countOfPages;
				$data['users'] = $users ;
				
			} else {
				$numberOfPage = 1 ;
			} 
						
			$this->view->generate('admin_view.php', 'template_view.php', $data);
		}
		
	}
	
	public function action_edit() {
		session_start();

		if (isset($_SESSION['auth']) and $_SESSION['status'] == "admin" )
		{	
			$this->addChanges();

			$data = [] ;

			$url_Arr = explode('/', $_SERVER['REQUEST_URI']) ;
			
			$part_class = $url_Arr[1];
			$part_action = $url_Arr[2];
			
			$url = implode('/',$url_Arr) ;
			
			if(preg_match('#/'.$part_class.'/'.$part_action.'/(?<slugLogin>(?:[a-z0-9_.-]+@[a-z_.-]+\.[a-z]{2,4})$)#', $url, $params)){
				$slugLogin = $params['slugLogin'] ;
						
				$user = new Model_Admin() ;
				$data = $user->get_ByLogin($slugLogin) ;
				
				$this->view->generate('edition_view.php', 'template_view.php', $data);
			}
		}
		else
		{
			$_SESSION['auth'] = null ;
			Route::ErrorPage404();
		}
    }

	protected function addChanges() {
		if(isset($_POST['name']) and isset($_POST['surname']) and isset($_POST['status_id'])) {

			$mysqli = new Model() ;
			$mysqli::getLink() ;

			$name = mysqli_real_escape_string($mysqli::getLink(),$_POST['name']) ;
			$surname = mysqli_real_escape_string($mysqli::getLink(),$_POST['surname']) ;
			$status_id = mysqli_real_escape_string($mysqli::getLink(),$_POST['status_id']) ;

			$url_Arr = explode('/', $_SERVER['REQUEST_URI']) ;
			$part_class = $url_Arr[1];
			$part_action = $url_Arr[2];
			
			$url = implode('/',$url_Arr) ;
			if(preg_match('#/'.$part_class.'/'.$part_action.'/(?<slugLogin>(?:[a-z0-9_.-]+@[a-z_.-]+\.[a-z]{2,4})$)#', $url, $params)){
				$slugLogin = $params['slugLogin'] ;

				$get_user = new Model_Admin() ;
				$user = $get_user->get_ByLogin($slugLogin) ;

				$updated_user = $get_user->update_ByLogin($slugLogin, $name, $surname, $status_id) ;
				
				$_SESSION['message'] = [
					'text' => "Вы изменили личные данные пользователя $slugLogin",
					'status' => 'success'
				] ; 

				header("Location: /admin/?page=1") ; die() ;
			} 
		} else {
			return '' ;
		}
	}
	

	public function action_delete() {
		session_start();

		if (isset($_SESSION['auth']) and $_SESSION['status'] == "admin" )
		{
			$data = [] ;

			$url_Arr = explode('/', $_SERVER['REQUEST_URI']) ;
			
			$part_class = $url_Arr[1];
			$part_action = $url_Arr[2];
			
			$url = implode('/',$url_Arr) ;
			
			if(preg_match('#/'.$part_class.'/'.$part_action.'/(?<slugLogin>(?:[a-z0-9_.-]+@[a-z_.-]+\.[a-z]{2,4})$)#', $url, $params)){
				$slugLogin = $params['slugLogin'] ;
						
				$user = new Model_Admin() ;
				$user->delete_ByLogin($slugLogin) ;
				
				$_SESSION['message'] = [
					'text' => "Вы удалили пользователя $slugLogin",
					'status' => 'success'
				] ; 
				header("Location: /admin/?page=1") ; die() ;
			}
		} else {
			$_SESSION['auth'] = null ;
			Route::ErrorPage404();
		}
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
