<div>
	это представление
	действия act контроллера page
</div>
<!-- Notice: Undefined property: Project\Controllers\PageController::$title in W:\domains\framework.local\core\Controller.php on line 9 -->
<h1><?= $header ?></h1>
<ul>
  <?php foreach ($users as $user): ?>
  		<li><?= $user; ?></li>
  	<?php endforeach; ?>
</ul>
