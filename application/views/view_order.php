<div class="container">
  <button data-toggle="modal" data-target="#addOrderModal" class="btn btn-primary btn-block btn-add">New <svg class="icon icon-xs icon-plus"><use xlink:href="#icon-plus"></use></svg></button>
  <?php if (!empty($pendingOrders)): ?>
    <div class="table-responsive">
      <h2>Orders In Queue</h2>
      <table id="pendingOrdersTable" class="table-order table table-hover">
        <thead>
          <tr class="order-table-row">
            <th>#</th>
            <th>Order</th>
            <th>Supplier</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Order Date</th>
            <th>Expected Arrival</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          <?php foreach ($pendingOrders as $po): ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $products[$po['id']]->product_name ?></td>
              <td><?= $suppliers[$products[$po['id']]->supplier_id]['supplier_name'] ?></td>
              <td><?= $po['quantity'] ?></td>
              <td><?= '$'.number_format($po['quantity'] * $products[$po['id']]->product_price, 2)  ?></td>
              <td><?= $po['orderDate']->format('d/m/Y') ?></td>
              <td><?= $po['orderDate']->add(new DateInterval('P2D'))->format('d/m/Y') ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <div class="clearfix"></div>
      <?php
        $form = array('id' => 'processOrdersForm', 'name' => 'processOrdersForm', 'role' => 'form');
      ?>
      <?= form_open('processAllOrders', $form) ?>
        <button type="submit" class="btn btn-lg btn-primary margin-sm-v pull-right" data-toggle="tooltip" data-placement="bottom" title="Send all order requests to the respective suppliers">Process All Orders</button>
      </form>
    </div>
    <hr />
  <?php endif ?>
  <div class="table-responsive">
    <h2>Orders Made</h2>
    <table id="ordersTable" class="table-order table table-hover">
      <thead>
        <tr class="order-table-row">
          <th>#</th>
          <th>Order</th>
          <th>Supplier</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th>Order Date</th>
          <th>Expected Arrival</th>
        </tr>
      </thead>
      <tbody id="ordersTableContent" class="orders-table-content">
        <?php $i = 1 ?>
        <?php foreach ($orders['rows'] as $order): ?>
          <tr class="order-table-row order-table-row--delivery">
            <td><?= $i++ ?></td>
            <td><?= $products[$orders['placement'][$order['order_id']]['product_id']]->product_name ?></td>
            <td><?= $suppliers[$products[$orders['placement'][$order['order_id']]['product_id']]->supplier_id]['supplier_name'] ?></td>
            <td><?= $orders['placement'][$order['order_id']]['quantity'] ?></td>
            <td><?= '$'.number_format($orders['placement'][$order['order_id']]['quantity'] * $products[$orders['placement'][$order['order_id']]['product_id']]->product_price, 2)  ?></td>
            <td><?= date_format(new DateTime($order['placement_date']), 'd/m/Y') ?></td>
            <td><?= date_format(new DateTime($order['process_date']), 'd/m/Y') ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
