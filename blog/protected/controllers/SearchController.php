<?php

class SearchController extends Controller
{
	public function actionIndex()
	{
		// get value in url
		isset($_REQUEST['page']) && $params = $_REQUEST['page'];
		$page = (isset($params) ? $params - 1 : 0);

		isset($_GET['keyword'])
			? $keyword = $_GET['keyword']
			: $keyword = "";

		//get count
		$count = Product::model()->getAllSearch($keyword);

		//count page
		$pages = new CPagination($count);
		$per_page = 4; //Required config params in main.php
		$pages->setPageSize($per_page);

		$data = Product::model()->searchUsePagination($keyword, $page, $per_page);

		$this->render(
			'index',
			array(
				'data' => $data,

				//div Paging navigation
				'page_size' => $per_page,
				'pages' => $pages,
				'item_count' => $count,
				'keyword' => $keyword,
			)
		);
	}

	public function actionAdvanced()
	{
		// get value in url
		isset($_REQUEST['page']) && $params = $_REQUEST['page'];
		$page = (isset($params) ? $params - 1 : 0);

		isset($_GET['keyword'])
			? $keyword = $_GET['keyword']
			: $keyword = "";

		$categories = Category::model()->getAll();

		//get count
		$count = Product::model()->getAllSearch($keyword);

		//count page
		$pages = new CPagination($count);
		$per_page = 4; //Required config params in main.php
		$pages->setPageSize($per_page);

		$data = Product::model()->searchUsePagination($keyword, $page, $per_page);

		$this->render(
			'advanced',
			array(
				'data' => $data,
				'categories' => $categories,

				//div Paging navigation
				'page_size' => $per_page,
				'pages' => $pages,
				'item_count' => $count,
				'keyword' => $keyword,
			)
		);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

	public function actionFetchData()
	{
		if (isset($_POST["action"])) {
			$query = " SELECT * FROM tbl_product WHERE status = '1' ";

			if (isset($_POST["keyword"])) {;
				$query .= "AND (name LIKE '%" . $_POST["keyword"] . "%' OR price LIKE '%" . $_POST["keyword"] . "%') ";
			}

			if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
				$query .= "AND price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "' ";
			}

			if (isset($_POST["category"])) {
				$brand_filter = implode("','", $_POST["category"]);
				$query .= "AND category_id IN('" . $brand_filter . "') ";
			}

			$statement = Yii::app()->db->createCommand($query)->queryAll();


			$total_row = 1;
			$output = '';
			if ($total_row > 0) {
				foreach ($statement as $value) {
					$price = return_price_apply_i18n($value['price']);

					if (strlen($value['name']) < 20) {
						$name =  $value['name'];
					} else $name = substr($value['name'], 0, 25) . '...';

					$output .= '
						<div class="col-md-3 col-sm-6">
							<div class="single-shop-product">
								<div class="product-upper">
									<a href="/product/detail/' . $value['id'] . '"><img id="imgProduct' . $value['id'] . '" src="' . Yii::app()->request->baseUrl . $value['image'] . '" alt="' . $value['image'] . '"></a>
								</div>
								<h2><a href="/product/detail/' . $value['id'] . '"><span id="product_name_for_modal_' . $value['id'] . '">' . $name . '</span></a></h2>
								<div class="product-carousel-price">
									<ins>' . $price . '</ins> <del>$0.00</del>
								</div>

								<div class="product-option-shop">
									<a href="javascript:voice(0);" class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" onclick="addToCart(' . $value['id'] . ')">Add to cart</a>
								</div>
							</div>
						</div>
					';
				}
			} else {
				$output .= '<h3>No Data Found</h3>';
			}
			echo $output;
		}
	}
}
