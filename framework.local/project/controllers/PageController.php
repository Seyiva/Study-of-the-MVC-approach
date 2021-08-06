<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Page;

  class PageController extends Controller  	{
		private $pages ;

		public function __construct() {
			$this->pages = [
							1 => ['title'=>'страница 1', 'text'=>'текст страницы 1'],
							2 => ['title'=>'страница 2', 'text'=>'текст страницы 2'],
							3 => ['title'=>'страница 3', 'text'=>'текст страницы 3'],
						];
		}

		public function one($params)	{
			$page = (new Page) -> getById($params['id']);
			
			$this->title = $page['title'];
			$this->text = $page['text'] ;
			return $this->render('page/one', [
				'page' => $page,
				'h1' => $this->title,
				'text' => $this->text
			]);
		}

		public function all()	{
			$this->title = 'Список всех страниц';

			$pages = (new Page) -> getAll();
			return $this->render('page/all', [
				'pages' => $pages,
				'h1' => $this->title
			]);
		}

		public function test($params) {
			$this->title = 'test db' ;
			$page = new Page; // создаем объект модели

			$data = $page->getById(1); // получим запись с id=3
			//var_dump($data);

			$data = $page->getById(3); // получим запись с id=5
			//var_dump($data);

			$data = $page->getByRange(2, 3); // записи с id от 2 до 5
			//var_dump($data);
		}

    public function show($params) {
			$id = $params['id'] ;
			$page = $this->pages[$id] ;
			$this->title = $page['title'] ;

			return $this->render('page/show',$page) ;
  	}

		public function act()	{
			$this->title = 'act page' ;
			return $this->render('page/act', [
				'header' => 'список юзеров',
				'users'  => ['user1', 'user2', 'user3'],
			] );
		}
  }
