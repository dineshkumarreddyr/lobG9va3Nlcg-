<div id="page-wrapper" style="min-height: 291px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Provider</h1>
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
                            <label>Name</label>
                            <input class="form-control" placeholder="Name" name="name" id="name" value="<?php echo $provider->provider_name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Logo URL</label>
                            <input class="form-control" placeholder="Logo URL" name="image" id="image" value="<?php echo $provider->provider_image; ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="desc" id="desc"><?php echo $provider->provider_desc; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="status_active" value="1" <?php  echo ($provider->provider_status == 1) ? 'checked="true"' : '';  ?> >Active
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="status_inactive" value="0" <?php  echo ($provider->provider_status == 0) ? 'checked="true"' : '';  ?> >Inactive
                                </label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-default" name="submit" id="submit" value="Update">
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>