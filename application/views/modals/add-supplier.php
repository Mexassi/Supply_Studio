<div id="addSupplierModal" class="modal-supplier-add modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">Add Supplier</div>
      <div class="modal-body">
        <form id="addSupplierForm" name="addSupplierForm" class="form-horizontal">
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Business Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="name" placeholder="Business Name" />
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Contact Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" name="email" placeholder="Contact Email" />
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Phone Number</label>
            <div class="col-sm-9">
              <input type="tel" class="form-control" name="phone" placeholder="Phone Number" />
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" form="addSupplierForm">Add Supplier</button>
      </div>
    </div>
  </div>
</div>
