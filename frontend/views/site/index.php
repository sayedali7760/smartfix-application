<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->params['main_menu'][] = 'Dashboard';
$this->params['breadcrump'][] = [
	['link' => 'site/index', 'title' => 'Home'],
	['title' => 'Dashboard']
];
?>

<!-- BEGIN: Page Main-->
<div id="main">
	<div class="row">
		<div class="col s12">
			<div class="container">
				<div class="section">
					<!--card stats start-->
					<div id="card-stats" class="pt-0">
						<div class="row">
							<div class="col-md-4 box1">
								<div class="card gradient-45deg-purple-light-blue gradient-shadow min-height-100 white-text animate fadeLeft">
									<div class="padding-4">
										<div class="row">
											<div class="col s7 m7">
												<i class="material-icons background-round mt-5">add_shopping_cart</i>
												<p>Total Uploads</p>
											</div>
											<div class="col s5 m5 right-align">
												<h5 class="mb-0 white-text"><?php echo number_format($data['count']); ?></h5>

											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div><!-- START RIGHT SIDEBAR NAV -->

				<!-- END RIGHT SIDEBAR NAV -->
			</div>
			<div class="content-overlay"></div>
		</div>
	</div>
</div>