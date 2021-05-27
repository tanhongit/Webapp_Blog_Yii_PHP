<?php
/* @var $this ProductController */
require_once('protected/scripts/globals.php');
$this->breadcrumbs = array(
	'Product',
);
// print_r('<pre>');
// print_r($data);die;
?><div class="container">
	<div class="row">
		<?php
		foreach ($data as $value) :
		?>
			<div class="col-md-3">
				<a href="#"><img class="img-fluid" src="<?= Yii::app()->request->baseUrl . $value->image ?>" alt=""></a>
				<h3><?= $value->name ?></h3>
				<p>Gia: <?= $value->price ?> VND</p>
			</div>
		<?php
		endforeach;
		?>
	</div>
</div>
<?php
$this->widget('CLinkPager', array(
	'currentPage' => $pages->getCurrentPage(),
	'itemCount' => $item_count,
	'pageSize' => $page_size,
	'maxButtonCount' => 4,
	'header' => '',
	'firstPageLabel' => '|<',
	'prevPageLabel' => '<<',
	'nextPageLabel' => '>>',
	'lastPageLabel' => '>|',

));
// print_r('<pre>');
// print_r(Yii::app()->user->getState('currentUserInfo'));
?>
</body>
<?php
print_r(get_BaseUrl());
print_r(Yii::app()->cache->get('testquery')); ?>