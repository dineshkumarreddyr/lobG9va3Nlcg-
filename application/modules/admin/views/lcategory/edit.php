<div id="page-wrapper" style="min-height: 291px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Look Category</h1>
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
                            <select class="form-control" name="parent" id="parent">
                              <option value="0">--Parent--</option>
                              <?php
                              foreach ($lcategories as $key => $lcat) {
                                if($lcat->lc_id != $lcategory->lc_id):
                              ?>
                                <option value="<?php echo $lcat->lc_id; ?>" <?php if($lcat->lc_id == $lcategory->lc_pid) { echo "selected"; } ?>><?php echo $lcat->lc_name; ?></option>
                              <?php
                              endif;
                              }
                              ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" placeholder="Name" name="name" id="name" value="<?php echo $lcategory->lc_name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="desc" id="desc"><?php echo $lcategory->lc_desc; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="status_active" value="1" <?php  echo ($lcategory->lc_status == 1) ? 'checked="true"' : '';  ?> >Active
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="status_inactive" value="0" <?php  echo ($lcategory->lc_status == 0) ? 'checked="true"' : '';  ?> >Inactive
                                </label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-default" name="submit" id="submit" value="Update">
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>