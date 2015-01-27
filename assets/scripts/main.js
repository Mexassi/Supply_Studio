$(function() {
  $('[data-toggle="tooltip"]').tooltip();
  
  $('body').on('mouseenter mouseleave', 'table th', function() {
    $(this).parents('table').find('colgroup:eq('+$(this).index()+')').toggleClass('column-hover');
  })

  $('#pendingOrdersTable').dynatable();
  $('#ordersTable').dynatable();
  $('#productsTable').dynatable();
  $('#suppliersTable').dynatable();
})

// Modals
$(function() {
  var Modal = function(el, formEl) {
    this.el = el;
    this.modal = $(this.el).modal({
      show: false
    });

    this.formEl = $(formEl);
  };

  Modal.prototype.setFormListener = function(func) {
    this.formListener = func;
    this.formEl.submit(this.formListener);
  }

  // Add supplier modal
  function AddSupplierModal() {
    Modal.call(this, '#addSupplierModal', '#addSupplierForm');
  };

  AddSupplierModal.prototype = Object.create(Modal.prototype);
  AddSupplierModal.prototype.constructor = AddSupplierModal;

  // Add product modal
  function AddProductModal() {
    Modal.call(this, '#addProductModal', '#addProductForm');
  };

  AddProductModal.prototype = Object.create(Modal.prototype);
  AddProductModal.prototype.constructor = AddProductModal;

  // Add order modal
  function AddOrderModal() {
    Modal.call(this, '#addOrderModal', '#addOrderForm');
  };

  AddOrderModal.prototype = Object.create(Modal.prototype);
  AddOrderModal.prototype.constructor = AddOrderModal;


  // ---------------------------------------------------------------------------


  var addSupplierModal = new AddSupplierModal();
  addSupplierModal.setFormListener(function() {
    // TODO: Actions when submitting
  });

  var addProductModal = new AddProductModal();
  addProductModal.setFormListener(function() {
    // TODO: Actions when submitting
  });

  var addOrderModal = new AddOrderModal();
  AddOrderModal.setFormListener(function() {
    // TODO: Actions when submitting
  });
});
