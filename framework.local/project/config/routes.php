<?php
	use \Core\Route;

	return [
		new Route('/hello/', 'hello', 'index'), // роут для приветственной страницы, можно удалить
		new Route('/my-page1/', 'page', 'show1'),
		new Route('/my-page2/', 'page', 'show2'),
		new Route('/my-test1/', 'test', 'act1'),
		new Route('/my-test2/', 'test', 'act2'),
		new Route('/my-test3/', 'test', 'act3'),

		new Route('/nums/:n1/:n2/:n3/', 'num', 'sum'),

		new Route('/user/all/', 'user', 'all'),
		new Route('/user/first/:n/', 'user', 'first'),
		new Route('/user/:id/:key/', 'user', 'info'),
		new Route('/user/:id/', 'user', 'show'),

		new Route('/page/act/', 'page', 'act'),
		new Route('/page/test/', 'page', 'test'),
	//	new Route('/page/:id/', 'page', 'show'),

		new Route('/pages/',   'page', 'all'),
		new Route('/page/:id/', 'page', 'one'),

		//new Route('/product/all/', 'product', 'all'),
		new Route('/products/', 'product', 'alldb'),
		//new Route('/product/:id/', 'product', 'act'), // вывод данных от представления
		new Route('/product/:id/', 'product', 'one'),
		//new Route('/product/:id/', 'product', 'show'), // вывод данных от контроллера

	];
