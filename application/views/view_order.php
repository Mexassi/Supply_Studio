<div class="container">
  <button data-toggle="modal" data-target="#addOrderModal" class="btn btn-primary btn-block btn-add">New <svg class="icon icon-xs icon-plus"><use xlink:href="#icon-plus"></use></svg></button>
  <div class="table-responsive">
    <table id="ordersTable" class="table-order table table-hover">
      <colgroup></colgroup>
      <colgroup></colgroup>
      <colgroup></colgroup>
      <colgroup></colgroup>
      <colgroup></colgroup>
      <colgroup></colgroup>
      <colgroup></colgroup>
      <colgroup></colgroup>
      <thead>
        <tr class="order-table-row">
          <th>#</th>
          <th>Order</th>
          <th>Supplier</th>
          <th>Price</th>
          <th>Order Date</th>
          <th>Expected Arrival</th>
          <th>Arrival Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody id="ordersTableContent" class="orders-table-content">
        <tr class="order-table-row order-table-row--delivery">
          <td>1</td>
          <td>Potato</td>
          <td>The Potato Company</td>
          <td>$12.34</td>
          <td>12/12/2012</td>
          <td>14/12/2012</td>
          <td>-</td>
          <td class="order-table-status">In Delivery</td>
        </tr>
        <tr class="order-table-row order-table-row--arrival">
          <td>2</td>
          <td>Potato</td>
          <td>The Potato Company</td>
          <td>$12.34</td>
          <td>12/12/2012</td>
          <td>14/12/2012</td>
          <td>13/12/2012</td>
          <td class="order-table-status">Arrived</td>
        </tr>
        <tr class="order-table-row order-table-row--arrival-late">
          <td>3</td>
          <td>Potato</td>
          <td>The Potato Company</td>
          <td>$12.34</td>
          <td>12/12/2012</td>
          <td>14/12/2012</td>
          <td>15/12/2012</td>
          <td class="order-table-status">Late Arrival</td>
        </tr>
        <tr class="order-table-row order-table-row--late">
          <td>4</td>
          <td>Potato</td>
          <td>The Potato Company</td>
          <td>$12.34</td>
          <td>12/12/2012</td>
          <td>14/12/2012</td>
          <td>-</td>
          <td class="order-table-status">Late</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
