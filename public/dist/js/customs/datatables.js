$(function () {

    //Example Datatables

    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,paging :false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    //Start Datatables

    $("#display-user-table").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,paging :false,"ordering": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#display-user-table_wrapper .col-md-6:eq(0)');

    $("#display-category-table").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,paging :false,"ordering": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#display-category-table_wrapper .col-md-6:eq(0)');

    $("#display-product-table").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,paging :false,"ordering": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#display-product-table_wrapper .col-md-6:eq(0)');

    $("#display-order-table").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,paging :false,"ordering": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#display-order-table_wrapper .col-md-6:eq(0)');

    $("#display-feedback-table").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,paging :false,"ordering": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#display-feedback-table_wrapper .col-md-6:eq(0)');
    
  });