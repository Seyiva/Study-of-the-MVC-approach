<?php
	namespace Project\Controllers;
	use \Core\Controller;

  class UserController extends Controller  	{
    private $users ;

    public function __construct() {
			$this->users = [
        1 => ['name'=>'user1', 'age'=>'23', 'salary' => 1000],
    		2 => ['name'=>'user2', 'age'=>'24', 'salary' => 2000],
    		3 => ['name'=>'user3', 'age'=>'25', 'salary' => 3000],
    		4 => ['name'=>'user4', 'age'=>'26', 'salary' => 4000],
    		5 => ['name'=>'user5', 'age'=>'27', 'salary' => 5000],
			];
		}

		public function all($params) {
			foreach ($this->users as $user) {
				echo $user['name'] . ' ' . $user['age'] . '<br>';
			}
		}

    public function show($params) {
      echo implode(', ', $this->users[$params['id']] ) ;
			var_dump($this->users[ $params['id'] ]) ;
    }

		public function info($params) {
			$id = $params['id'] ;
			$key =  $params['key'] ;
			var_dump($params) ;
			var_dump($this->users[$id][$key]) ;
			var_dump($this->users[ $params['id']] [$params['key']] ) ;
			echo $id . '  ' . $key;
		}


		public function first($params) {
		
			$first = 0 ;
			$num = $params['n'] ;
			$new_data = array_slice($this->users, $first, $num);

			foreach($new_data as $user) {
				echo $user['name'] . ' ' . $user['age'] . ' - ' . $user['salary']. '<br>';
			}
		}

  }
