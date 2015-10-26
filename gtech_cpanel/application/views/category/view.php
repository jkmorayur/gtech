<section class="content">
     <div class="row">
          <section class="col-lg-12 connectedSortable">
               <?php echo form_open_multipart("category/update", array('id' => "frmCategory", 'class' => "form-horizontal")) ?>
               <input type="hidden" name="category[cat_id]" value="<?php echo $categories['cat_id']; ?>" />
               <div class="box box-info">
                    <div class="box-header">
                         <h3 class="box-title">Update Category</h3>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Category Title</label>
                         <div class="col-md-4">
                              <input type="text" class="form-control" value="<?php echo $categories['category_name']; ?>" name="category[cat_title]" id="cat_title" placeholder="Category Title"/>
                              <span class="help-block">
                                   <!--                                   A block of help text.-->
                              </span>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label">Category Parent</label>
                         <div class="col-md-4">
                              <?php
                                     
                                     build_category_tree($categories['cat_id'], $categories['cat_parent'], $this, $locations, 0);
                                   ?>

                                   <select name="category[cat_parent]" id="cat_parent" class="form-control">
                                        <option value="0">Select Parent</option> 
                                        <?php echo $locations ?>
                                   </select>
                                   <?php

                                     function build_category_tree($catId, $selectedId, $f, &$output, $preselected, $parent = 0, $indent = "") {
                                          $parentCategories = $f->category_model->getCategoryChaild($parent, $catId);
                                          foreach ($parentCategories as $key => $value) {
                                               $selected = ($value["cat_id"] == $selectedId) ? "selected=\"selected\"" : "";
                                               $output .= "<option value=\"" . $value["cat_id"] . "\" " . $selected . ">" . $indent . $value["cat_title"] . "</option>";
                                               if ($value["cat_id"] != $parent) {
                                                    build_category_tree($catId, $selectedId, $f, $output, $preselected, $value["cat_id"], $indent . "&nbsp;&nbsp;");
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
                                   <textarea  name="category[cat_desc]" class='editor'><?php echo $categories['category_desc']; ?></textarea>
     <!--                              <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                   </span>-->
                              </div>
                         </div>
                    </div>
                    <div class="form-group">
                         <label class="col-md-3 control-label"></label>
                         <div class="col-md-4">
                              <div class="input-group">
                                   <?php echo img(array('src' => 'assets/uploads/category/' . $categories['cat_image'], 'height' => '80', 'width' => '100','id' => 'imgBrandImage')); ?>
                              </div>
                              <?php if($categories['cat_image']) { ?>
                                   <span class="help-block">
                                        <a id="btnDeleteImage" data-url="<?php echo site_url('category/removeImage/'.$categories['cat_id']); ?>" href="javascript:void(0);" style="width: 100px;" class="btn btn-block btn-danger btn-xs">Delete</a>
                                   </span>
                              <?php } ?>
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
                         <input type="submit" value="Update" class="btn btn-primary" style="float: left !important;" id="sendEmail"/>
                    </div>
               </div>
               <?php echo form_close() ?>
          </section>
     </div>
</section>
</div>