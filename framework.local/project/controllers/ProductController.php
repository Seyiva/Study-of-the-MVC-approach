<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Product;

  class ProductController extends Controller {
      private $products ;

      public function __construct() {
        $this->products = [
        		1 => [
        			'name'     => 'product1',
        			'price'    => 100,
        			'quantity' => 5,
        			'category' => 'category1',
        		],
        		2 => [
        			'name'     => 'product2',
        			'price'    => 200,
        			'quantity' => 6,
        			'category' => 'category2',
        		],
        		3 => [
        			'name'     => 'product3',
        			'price'    => 300,
        			'quantity' => 7,
        			'category' => 'category2',
        		],
        		4 => [
        			'name'     => 'product4',
        			'price'    => 400,
        			'quantity' => 8,
        			'category' => 'category3',
        		],
        		5 => [
        			'name'     => 'product5',
        			'price'    => 500,
        			'quantity' => 9,
        			'category' => 'category3',
        		],
	       ] ;
    }

    public function show($params) {
			$id = $params['id'] ;	// var_dump($id) ; var_dump($this->products[$id]) ;
			$name = $this->products[$id]['name'] ;
			$price = $this->products[$id]['price'] ;
			$quantity = $this->products[$id]['quantity'] ;
			$category = $this->products[$id]['category'] ;
			$cost = $price * $quantity ;
		//	echo $name.' '. $price .' '. $quantity.' '.$category .' ' .$cost ;
    }

		public function act($params) {
			$this->title = 'view act of products';
			$id = $params['id'] ;
			$product = $this->products[$id] ;

			return $this->render('product/act', $product ) ;
		}

	  /* public function all($params) {
			$this->title = 'view all of products';
			return $this->render('product/all', ['products'=> $this->products]) ;
		} */

		public function one($params)	{
			$product = (new Product) -> getById($params['id']);

			$this->title = '' ;
			$this->name = $product['name'];
			$this->price = $product['price'] ;
			$this->quantity = $product['quantity'] ;
			$this->description = $product['description'] ;
			return $this->render('product/one', [
				'product' => $product,
				'name' => $this->name,
				'price' => $this->price,
				'quantity' => $this->quantity,
				'description' => $this->description,
			]);
		}

		public function alldb()	{
			$this->title = 'Список всех продуктов';

			$products = (new Product) -> getAll();
			return $this->render('product/alldb', [
				'products' => $products
			]);
		}

  }
