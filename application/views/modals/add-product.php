<div id="addProductModal" class="modal-product-add modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">Add Product</div>
      <div class="modal-body">
        <form id="addProductForm" name="addProductForm" class="form-horizontal">
          <div class="form-group">
            <label for="supplier" class="col-sm-3 control-label">Supplier</label>
            <div class="col-sm-9">
              <select class="form-control" name="supplier">
                <?php foreach ($supplierList as $supplier): ?>
                  <option><?= stripslashes($supplier['supplierCompanyName']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Product Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="name" placeholder="Product Name" />
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Price</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="price" placeholder="Price" />
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" form="addProductForm">Add Product</button>
      </div>
    </div>
  </div>
</div>
