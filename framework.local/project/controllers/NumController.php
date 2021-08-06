<?php
	namespace Project\Controllers;
	use \Core\Controller;

  class NumController extends Controller  	{
    public function sum(array $params)  {
      $values = array_values($params) ;
      $sum = array_sum($values) ;
      echo "Ответ:". $sum;
		}
  }
