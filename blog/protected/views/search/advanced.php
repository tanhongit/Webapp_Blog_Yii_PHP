<?php
require_once('protected/scripts/globals.php');
$this->breadcrumbs = array(
	'Search',
	'Advanced'
);
?>
<style>
	.search-input {
		color: red;
	}
</style>
<div class="single-product-area">
	<div class="zigzag-bottom"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="product-content-right">
					<div class="woocommerce">
						<div id="customer_details" class="col2-set">
							<div class="woocommerce-billing-fields">
								<h3>Advanced Search</h3>

								<h4 class="search-input"><strong>By Keyword</strong></h4>
								<p id="billing_last_name_field" class="form-row form-row-first validate-required">
									<input type="text" required value="" placeholder="Enter keyword or price" id="input_search_keyword" name="input_search_keyword" class="common_selector input-text ">
								</p>

								<hr>
								<h4 class="search-input"><strong>By Price</strong></h4>
								<p id="billing_last_name_field" class="form-row form-row-first validate-required">
									<label class="" for="from_price_search_input">From <abbr title="required" class="required">*</abbr>
									</label>
									<input type="text" required value="" placeholder="From <?= get_price_apply_i18n(1) ?>" id="hidden_minimum_price" name="from_price_search_input" class="common_selector input-text ">
								</p>

								<p id="billing_last_name_field" class="form-row form-row-last validate-required">
									<label class="" for="to_price_search_input">To <abbr title="required" class="required">*</abbr>
									</label>
									<input type="text" required value="" placeholder="To <?= get_price_apply_i18n(100) ?>" id="hidden_maximum_price" name="to_price_search_input" class="common_selector input-text ">
								</p>
							</div>
							<div class="form-row place-order">
								<input type="submit" data-value="Apply" value="Apply" id="from_price_search" name="from_price_search" class="common_selector button alt">
							</div>
							<br>
							<input type="hidden" id="hidden_minimum_price" value="0" />
							<input type="hidden" id="hidden_maximum_price" value="65000" />

							<hr>
							<h4 class="search-input"><strong>By Category</strong></h4>
							<div class="list-group">
								<?php foreach ($categories as $row) { ?>
									<div class="list-group-item">
										<label>
											<input class="common_selector category_input form-check-input me-1" type="checkbox" value="<?= $row['id'] ?>">
											<?= $row['name'] ?>
										</label>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-9">
				<div class="row filter-data">
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	#loading {
		text-align: center;
		background: url('<?= get_BaseUrl(); ?>/images/loader.gif') no-repeat center;
		height: 150px;
	}
</style>
<script src="<?= get_BaseUrl(); ?>/js/jquery2.1.1.min.js"></script>
<script>
	$(document).ready(function() {

		filter_data();

		function filter_data() {
			$('.filter-data').html('<div id="loading" style=""></div>');
			var action = 'fetchData';
			var minimum_price = $('#hidden_minimum_price').val();
			var maximum_price = $('#hidden_maximum_price').val();
			var keyword = $('#input_search_keyword').val();

			var category = get_filter('category_input');
			$.ajax({
				url: "/search/fetchData",
				type: "POST",

				data: {
					action: action,
					keyword: keyword,
					minimum_price: minimum_price,
					maximum_price: maximum_price,
					category: category,
				},
				success: function(data) {
					$('.filter-data').html(data);
					$('#load_search').load(url + '<?= $_SERVER['REQUEST_URI'] ?> #load_search');
				}
			});
		}

		function get_filter(class_name) {
			var filter = [];
			$('.' + class_name + ':checked').each(function() {
				filter.push($(this).val());
			});
			return filter;
		}

		$('.common_selector').click(function() {
			filter_data();
		});
	});
</script>