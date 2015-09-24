<div id="page-wrapper" style="min-height: 291px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Product Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                  <?php
                  if($msg != '') {
                  ?>
                  <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $msg; ?>
                  </div>
                  <?php
                  }
                  ?>
                  <?php
                  if(!empty($err_msg)) {
                  ?>
                  <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $err_msg; ?>
                  </div>
                  <?php
                  }
                  ?>
                    <form role="form" action="" method="POST">
                        <div class="form-group">
                            <label>Parent Category</label>
                            <!-- <select class="form-control" name="parent" id="parent">
                              <option value="0">--Parent--</option>
                              <?php
                              foreach ($pcategories as $key => $pcategory) {
                              ?>
                                <option value="<?php echo $pcategory->pc_id; ?>"><?php echo $pcategory->pc_name; ?></option>
                              <?php
                              }
                              ?>
                            </select> -->
                            <select class="form-control" name="parent" id="parent">
                              <option value="0">--Parent--</option>
                              <?php foreach ($cat_tree[0] as $key => $cat_tree1) {
                                ?>
                              <option value="<?php echo $cat_tree1; ?>"><?php echo $cat_list[$cat_tree1]; ?></option>
                                
                                <?php if(array_key_exists($cat_tree1, $cat_tree)) { ?>
                                  <?php foreach ($cat_tree[$cat_tree1] as $key => $cat_tree2) { ?>
                                  <option value="<?php echo $cat_tree2; ?>">-<?php echo $cat_list[$cat_tree2]; ?></option>
                                    <?php if(array_key_exists($cat_tree2, $cat_tree)) { ?>
                                      <?php foreach ($cat_tree[$cat_tree2] as $key => $cat_tree3) { ?>
                                      <option value="<?php echo $cat_tree3; ?>"><?php echo $cat_list[$cat_tree3]; ?></option>
                                      <?php } ?>
                                    <?php } ?>
                                  <?php } ?>
                                <?php } ?>
                                <?php
                              } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" placeholder="Name" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="desc" id="desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="status_active" value="1" checked="">Active
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="status_inactive" value="0">Inactive
                                </label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-default" name="submit" id="submit" value="Add">
                        <input type="reset" class="btn btn-default" value="Reset">
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>