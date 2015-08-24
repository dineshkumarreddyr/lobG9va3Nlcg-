<div id="page-wrapper" style="min-height: 291px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Look</h1>
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
                            <label>Look Category</label>
                            <select class="form-control" name="category" id="category">
                              <option value="0">--Look category--</option>
                              <?php
                              foreach ($lcategories as $key => $lcat) {
                              ?>
                                <option value="<?php echo $lcat->lc_id; ?>" <?php if($lcat->lc_id == $look->l_category) { echo "selected"; } ?>><?php echo $lcat->lc_name; ?></option>
                              <?php
                              }
                              ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" placeholder="Name" name="name" id="name" value="<?php echo $look->l_name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="status_active" value="1" <?php  echo ($look->l_status == 1) ? 'checked="true"' : '';  ?> >Active
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="status_inactive" value="0" <?php  echo ($look->l_status == 0) ? 'checked="true"' : '';  ?> >Inactive
                                </label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-default" name="submit" id="submit" value="Update">
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>