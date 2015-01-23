<div id="addOrderModal" class="modal-product-add modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">Add Order</div>
      <div class="modal-body">
        <form id="addOrderForm" name="addProductForm" class="form-horizontal">
          <div class="form-group">
            <label for="product" class="col-sm-3 control-label">Product</label>
            <div class="col-sm-9">
              <select class="form-control" name="product">
                <option>Product 1</option>
                <option>Product 2</option>
                <option>Product 3</option>
                <option>Product 4</option>
                <option>Product 5</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="quantity" class="col-sm-3 control-label">Quantity</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="quantity" placeholder="Quantity" />
            </div>
          </div>
          <div class="form-group">
            <label for="note" class="col-sm-12">Note</label>
            <div class="col-sm-12">
              <textarea name="note" class="form-control" rows="3"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <span>Total: <strong>$1234.56</strong></span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" form="addOrderForm">Add Order</button>
      </div>
    </div>
  </div>
</div>
