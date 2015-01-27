$(function() {
  $('[data-toggle="tooltip"]').tooltip();

  $('body').on('mouseenter mouseleave', 'table th', function() {
    $(this).parents('table').find('colgroup:eq('+$(this).index()+')').toggleClass('column-hover');
  })

  $('#pendingOrdersTable').dynatable();
  $('#ordersTable').dynatable();
  $('#productsTable').dynatable();
  $('#suppliersTable').dynatable();
});

$(function() {
  var tutorialTrigger = $('#tutorial');
  var tutorial = introJs();
  tutorial.setOptions({
    steps: [
      {
        element: '.dash-logo',
        intro: "Hello and welcome to Supply Studio! This tutorial will get you up and running in discovering what Supply Studio can do for you in helping you streamline your supply order management process."
      },
      {
        element: '.dash-panel',
        intro: "You are now in the dashboard. In here information you will need often for a quick look will be shown here, for example the recent orders you made and their status and a quick access to ordering products you haven't ordered for a long time in the same amount you have ordered before. We predicted everything for you to make Supply Studio quick and easy."
      },
      {
        element: '.dash-header-nav',
        intro: "At the top you have access to managing your Supply Studio business information. There is a link to access the dashboard later, your orders list, the suppliers for your business, and the products they supply to you."
      },
      {
        element: '#dLabel',
        intro: "Supply Studio also allows you to manage not just one business, but multiple businesses with different setup should you are a successful person in an important multinational company managing supplies on lots of branches across the world. By clicking here, you can view the businesses that you manage as well as adding a new business to have the supplies handled by Supply Studio."
      },
      {
        element: '.dash-header-nav--right',
        intro: "Also at the top right you can go to settings to personalise your account and configure your business, as well as logging out and accessing this tutorial again with the ? icon."
      }
    ]
  });

  tutorialTrigger.click(function() {
    tutorial.start();
  });
});

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
