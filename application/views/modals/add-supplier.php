<div id="addSupplierModal" class="modal-supplier-add modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">Add Supplier</div>
      <div class="modal-body">
        <?php
          $form = array('id' => 'addSupplierForm', 'name' => 'addSupplierForm', 'class' => 'form-horizontal', 'role' => 'form');
          echo form_open('supplierValidation', $form);
        ?>
          <div class="form-group">
            <label for="supplierName" class="col-sm-3 control-label">Business Name</label>
            <div class="col-sm-9">
              <?php
                $supplierName = array('class' => 'form-control', 'name' => 'supplierName', 'type' => 'text', 'placeholder' => 'Supplier Name', 'required' => 'true');
                echo form_input($supplierName, $this->input->post('supplierName'));
                echo form_error('supplierName', '<p class="mioError">', '</p>');
              ?>
            </div>
          </div>
          <div class="form-group">
            <label for="supplierEmail" class="col-sm-3 control-label">Contact Email</label>
            <div class="col-sm-9">
              <?php
                $supplierEmail = array('class' => 'form-control', 'name' => 'supplierEmail', 'type' => 'text', 'placeholder' => 'Contact Email', 'required' => 'true');
                echo form_input($supplierEmail, $this->input->post('supplierEmail'));
                echo form_error('supplierEmail', '<p class="mioError">', '</p>');
              ?>
            </div>
          </div>
          <div class="form-group">
            <label for="supplierPhoneNo" class="col-sm-3 control-label">Phone Number</label>
            <div class="col-sm-9">
              <?php
                $supplierPhoneNo = array('class' => 'form-control', 'name' => 'supplierPhoneNo', 'type' => 'number', 'placeholder' => 'Phone Number', 'required' => 'true');
                echo form_input($supplierPhoneNo, $this->input->post('supplierPhoneNo'));
                echo form_error('supplierPhoneNo', '<p class="mioError">', '</p>');
              ?>
            </div>
          </div>
        <?php
        echo form_close();
        ?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php
          $submit = array('class' => 'btn btn-primary', 'value' => 'Add Supplier', 'form' => 'addSupplierForm');
          echo form_submit($submit);
        ?>
      </div>
    </div>
  </div>
</div>
