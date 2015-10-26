<section class="content">
     <div class="row">
          <div class="col-md-12">
               <div class="box box-info">
                    <div class="box-header with-border">
                         <h3 class="box-title">Import Product</h3>
                    </div>
                    <?php echo form_open_multipart("product/doImport", array('id' => "frmImportProduct", 'class' => "form-horizontal")) ?>
                    <div class="box-body">
<!--                         <div class="form-group">
                              <label class="col-md-3 control-label">Product Excel File</label>
                              <div class="col-md-4">
                                   <input type="text" class="form-control" name="product_count" id="product_count"/>
                              </div>
                         </div>-->
                         
                         <div class="form-group">
                              <label class="col-md-3 control-label">Product Excel File</label>
                              <div class="col-md-4">
                                   <input required type="file" class="form-control" name="product_file" id="product_file"/>
                                   <span class="help-block">Please select .xls or .xlsx only</span>
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-md-3 control-label">Image Zipped File</label>
                              <div class="col-md-4">
                                   <input  type="file" name="image_zip" class="form-control" id="image_zip"/>
                                   <span class="help-block">Please select .rar file only</span>
                              </div>
                         </div>
                         <div class="box-footer clearfix">
                              <input type="submit" value="Save" class="btn btn-primary" style="float: left !important;"/>
                         </div>
                    </div>
                    <?php echo form_close() ?>
               </div>
          </div>
     </div>
</section>
</div>