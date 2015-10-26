<section class="content">
     <div class="row">
          <section class="col-lg-12 connectedSortable">
               <?php echo form_open_multipart("category/insert", array('id' => "frmCategory", 'class' => "form-horizontal")) ?>
               <div class="box box-info">
                    <div class="box-header">
                         <h3 class="box-title">Add Category</h3>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Category Title</label>
                         <div class="col-md-4">
                              <input type="text" class="form-control" name="category[cat_title]" id="cat_title" placeholder="Category Title"/>
                              <span class="help-block">
                                   <!--A block of help text.-->
                              </span>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Category Parent</label>
                         <div class="col-md-4">
                              <?php
                                build_category_tree($this, $locations, 0);
                              ?>

                              <select name="category[cat_parent]" id="cat_parent" class="form-control">
                                   <option value="0">Select Parent</option> 
                                   <?php echo $locations ?>
                              </select>
                              <?php

                                function build_category_tree($f, &$output, $preselected, $parent = 0, $indent = "") {
                                     $ser_parent = '';
                                     $parentCategories = $f->category_model->getCategoryChaild($parent);
                                     foreach ($parentCategories as $key => $value) {
                                          $selected = ($value["cat_id"] == $ser_parent) ? "selected=\"selected\"" : "";
                                          $output .= "<option value=\"" . $value["cat_id"] . "\" " . $selected . ">" . $indent . $value["cat_title"] . "</option>";
                                          if ($value["cat_id"] != $parent) {
                                               build_category_tree($f, $output, $preselected, $value["cat_id"], $indent . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
                                          }
                                     }
                                }
                              ?>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Description</label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <textarea name="category[cat_desc]" class='editor'></textarea>
     <!--                              <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                   </span>-->
                              </div>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Category Logo</label>
                         <div class="col-md-4">
                              <div id="newupload">
                                   <input type="hidden" id="x10" name="x1[]" />
                                   <input type="hidden" id="y10" name="y1[]" />
                                   <input type="hidden" id="x20" name="x2[]" />
                                   <input type="hidden" id="y20" name="y2[]" />
                                   <input type="hidden" id="w0" name="w[]" />
                                   <input type="hidden" id="h0" name="h[]" />
                                   <input type="file" class="form-control" name="cat_image" id="image_file0" onchange="fileSelectHandler('0','500','268')" />
                                   <img id="preview0" class="preview"/>
                              </div>
                              <span class="help-block">
                                   <!--<p style="color: red;">Image size width 500 height 268</p>-->
                              </span>
                         </div>
                    </div>
                    <div class="box-footer clearfix">
                         <input type="submit" value="Save" class="btn btn-primary" style="float: left !important;" id="sendEmail"/>
                    </div>
               </div>
               <?php echo form_close() ?>
          </section>
     </div>
</section>
</div>