<section class="dash-panel container">
	<div class="row">
		<ul class="dash-panel-list col-md-3 col-md-push-9">
			<h1 class="h3">Quick Order</h1>
			<?php for ($i = count($orders['rows']); $i > count($orders['rows']) - 3; $i--): ?>
				<?php $order = $orders['rows'][$i-1] ?>
				<li class="clearfix">
					<a href="#">
						<div class="dash-panel-list-item"><?= $orders['placement'][$order['order_id']]['quantity'] ?> <?= $products[$orders['placement'][$order['order_id']]['product_id']]->product_name ?></div>
						<div class="clearfix"></div>
						<div class="dash-panel-list-supplier"><?= $suppliers[$products[$orders['placement'][$order['order_id']]['product_id']]->supplier_id]['supplier_name'] ?></div>
					</a>
				</li>
			<?php endfor ?>
		</ul>
		<ul class="dash-panel-list col-md-4 col-md-pull-3">
			<h1 class="h3">Recent Orders</h1>
			<?php foreach ($orders['rows'] as $order): ?>
				<?php
					$processDate = new DateTime($order['process_date']);
					$placementDate = new DateTime($order['placement_date']);
					$today = new DateTime(null);
					$interval = date_diff($today, $processDate);
				?>
				<li class="clearfix">
					<a class="quick-pending-orders-link <?= $today > $processDate ? 'quick-pending-orders-link--done' : '' ?>" href="#">
						<div class="dash-panel-list-item"><?= $orders['placement'][$order['order_id']]['quantity'] ?> <?= $products[$orders['placement'][$order['order_id']]['product_id']]->product_name ?></div>
						<time class="quick-pending-orders-eta"><?= $today > $processDate ? $interval->format('arrived %a days ago') : $interval->format('arriving in %a days')?></time>
						<div class="clearfix"></div>
						<div class="dash-panel-list-supplier"><?= $suppliers[$products[$orders['placement'][$order['order_id']]['product_id']]->supplier_id]['supplier_name'] ?></div>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

</section>
