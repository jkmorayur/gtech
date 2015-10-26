// When the browser is ready...
$(document).ready(function (event) {
     $('.datetime').datepicker({
          format: "yyyy-mm-dd"
     }).on('changeDate', function (e) {
          $(this).datepicker('hide');
     });
     var table = $("#example1").dataTable();
     $('.editor').redactor({
          focus: true,
          lang: 'en',
          imageUpload: 'ajax/upload.php',
          plugins: ['fontfamily', 'fontsize', 'fullscreen', 'fontcolor', 'table', 'imagemanager']
     });
     /*form news*/
     $("#frmNews").submit(function (e) {
          e.preventDefault();
     }).validate({
          rules: {
               'news[nws_title]': "required"
          },
          messages: {
               'news[nws_title]': "Please enter news title"
          },
          submitHandler: function (form) {
               form.submit();
          }
     });
     /*Form category*/
     $("#frmCategory").submit(function (e) {
          e.preventDefault();
     }).validate({
          rules: {
               cat_title: "required"
          },
          messages: {
               cat_title: "Please enter category title"
          },
          submitHandler: function (form) {
               form.submit();
          }
     });
     /*Form category*/

     /*Form product*/
     $("#frmProduct").submit(function (e) {
          e.preventDefault();
     }).validate({
          rules: {
               'product[prd_name]': "required"
          },
          messages: {
               'product[prd_name]': "Please enter product name"
          },
          submitHandler: function (form) {
               form.submit();
          }
     });
     /*Form product*/

     /*Form brand*/
     $("#frmBrand").submit(function (e) {
          e.preventDefault();

     }).validate({
          rules: {
               brd_title: "required",
               brd_url: {
                    url: true
               }
          },
          messages: {
               brd_title: "Please enter brand title",
               brd_url: {
                    url: "Please enter valid url"
               }
          },
          submitHandler: function (form) {
               form.submit();
          }
     });
     /*Form brand*/


     /*Form Calibration*/
     $("#frmCalibration").submit(function (e) {
          e.preventDefault();

     }).validate({
          rules: {
               cal_title: "required"
          },
          messages: {
               cal_title: "Please enter title"

          },
          submitHandler: function (form) {
               form.submit();
          }
     });
     /*Form Calibration*/

     /*Calibration Service*/
     $("#frmCalibrationService").submit(function (e) {
          e.preventDefault();

     }).validate({
          rules: {
               'calibration_service[gcs_cal_id]': "required"
          },
          messages: {
               'calibration_service[gcs_cal_id]': "Please select calibration"
          },
          submitHandler: function (form) {
               form.submit();
          }
     });
     /*Calibration Service*/

     /*Import Product*/
     $("#frmImportProduct").submit(function (e) {
          e.preventDefault();
     }).validate({
          rules: {
               product_file: {
                    required: true,
                    accept: "xls,xlsx"
               },
               image_zip: {
                    accept: "zip"
               },
               product_count: {
                    required: true,
                    number: true
               }
          },
          messages: {
               product_file: {
                    required: "Please select a excel file",
                    accept: "Please select only .xls or .slsx file"
               },
               image_zip: {
                    accept: "Please select only .zip"
               },
               product_count: {
                    required: "Please enter number of product to import",
                    number: "Please enter only number"
               }
          },
          submitHandler: function (form) {
               form.submit();
          }
     });
     /*Import Product*/

     /*Delete image*/
     $(document).on('click', '#btnDeleteImage', function () {
          if (confirm('Are you sure want to delete brnd image?')) {
               var url = $(this).attr('data-url');
               $.ajax({
                    type: 'post',
                    url: url,
                    dataType: 'json',
                    success: function (resp) {
                         $('#imgBrandImage').attr("src", '.' + none_image);
                         showMessage(resp.msg, resp.status);
                    }
               });
          }
     });
     /*Delete image*/
     /*Delete product docs*/
     $(document).on('click', '.btnDeleteDocs', function () {
          if (confirm('Are you sure want to delete this record?')) {
               var url = $(this).attr('data-url');
               var id = $(this).attr('id');

               $.ajax({
                    type: 'post',
                    url: url,
                    dataType: 'json',
                    success: function (resp) {
                         $('#prodDocs' + id).hide();
                         showMessage(resp.msg, resp.status);
                    }
               });
          }
     });
     /*Delete product docs*/
     $('#btnAddMoreSpecification').click(function () {
          $('#divSpecificatiion').append($('#temSpecification').html());
     });
     $(document).on('click', '.btnRemoveMoreSpecification', function () {
          $(this).parent('div').parent('div').remove();
     });
     $(document).on('click', '.delete', function () {
          if (confirm('Are you sure want to delete this record?')) {
               var url = $(this).attr('data-url');
               var id = $(this).attr('id');

               var oTable = $('#example1').dataTable();
               var rowIndex = oTable.fnGetPosition($(this).closest('tr')[0]);

               $.ajax({
                    type: 'post',
                    url: url,
                    dataType: 'json',
                    success: function (resp) {
                         showMessage(resp.msg, resp.status);
                         oTable.fnDeleteRow(rowIndex);
                    }
               });
          }
     });
     $(document).on('click', '.btnRemoveProductImages', function () {
          $(this).parent('div').parent('div').remove();
     });
     var index = 1;
     $('#btnMoreProductImages').click(function () {

          $('#divMoreProductImages').append('<div class="form-group">' +
                  '<label class="col-md-3 control-label"></label>' +
                  '<div class="col-md-4">' +
                  '<div class="input-group"><input type="hidden" id="x1' + index + '" name="x1[]" />' +
                  '<input type="hidden" id="y1' + index + '" name="y1[]" />' +
                  '<input type="hidden" id="x2' + index + '" name="x2[]" />' +
                  '<input type="hidden" id="y2' + index + '" name="y2[]" />' +
                  '<input type="hidden" id="w' + index + '" name="w[]" />' +
                  '<input type="hidden" id="h' + index + '" name="h[]" />' +
                  '<input type="file" class="form-control" style="display: table;margin-bottom: 10px;" name="prd_image[]" id="image_file' + index + '" onchange="fileSelectHandler(' + "'" + index + "'" + ',500, 333)" />' +
                  '<div class="error' + index + '"></div>' +
                  '<img class="preview" id="preview' + index + '"/></div>' +
                  '<span class="help-block"><p style="color: red;">Image size width 500 height 333</p>' +
                  '</span></div><div class="box-tools"><a href="javascript:void(0);" class="btn btn-info btn-sm btnRemoveProductImages" id="" data-original-title="Add More">' +
                  '<i class="fa fa-times"></i></a></div>');
          index++;
     });

     /*Filter by calibration on calibration service*/
     $('.calibration').change(function () {
          var id = $(this).val();
          window.location = site_url + '/calibration/calibration_service/' + id;
     });
     /*Filter by calibration on calibration service*/

     /*Change Order Status*/
     $(document).on('change', '.cmbOrderStatus', function () {
          if (confirm('Are you sure want to change order status?')) {
               var url = $(this).attr('data-url');
               var id = $(this).val();
               var orderId = $(this).attr('order-id');
               $.ajax({
                    type: 'post',
                    url: url,
                    dataType: 'json',
                    data: {status: id, order: orderId},
                    success: function (resp) {
                         showMessage(resp.msg, resp.status);
                    }
               });
          }
     });
     /*Change Order Status*/
});

function showMessage(message, type) {
     $('.success').hide();
     $('.error').hide();
     $('.info').hide();
     $('.alert').hide();
     if (type == 'success') {
          $('.success').slideDown(500);
          $('.sus_msg').html(message);
     } else if (type == 'fail') {
          $('.error').slideDown(500);
          $('.err_msg').html(message);
     } else if (type == 'info') {
          $('.info').slideDown(500);
          $('.err_inf').html(message);
     } else if (type == 'alert') {
          $('.alert').slideDown(500);
          $('.err_alt').html(message);
     }
}