$(function() {
  $('body').on('mouseenter mouseleave', 'table th', function() {
    $(this).parents('table').find('colgroup:eq('+$(this).index()+')').toggleClass('column-hover');
  })

  $('#ordersTable').dynatable();
  $('#productsTable').dynatable();
  $('#suppliersTable').dynatable();
})
