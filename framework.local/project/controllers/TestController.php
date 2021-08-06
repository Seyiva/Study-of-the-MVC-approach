<?php
	namespace Project\Controllers;
	use \Core\Controller;

  class TestController extends Controller {
    public function act1() {
			echo 'This is public function act1()' ;
		}
		public function act2() {
			echo 'This is public function act2()' ;
		}
		public function act3() {
			echo 'This is public function act3()' ;
		}
  }
