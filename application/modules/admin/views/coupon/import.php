<div id="page-wrapper" style="min-height: 291px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Import Coupons</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <form role="form" action="" method="POST" enctype="multipart/form-data">
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
                  <div class="form-group">
                      <label>Provider</label>
                      <select class="form-control" name="provider" id="provider">
                        <option value="">--Select Provider--</option>
                        <?php $providers = array("OMG"=>"OMG"); ?>
                        <?php foreach ($providers as $key => $provider) : ?>
                        <option value="<?php echo $key; ?>"><?php echo $provider; ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>File</label>
                      <input type="file" class="form-control" name="filename" id="filename">
                  </div>

                  <input type="submit" class="btn btn-default" name="submit" id="submit" value="Upload">
                  <input type="reset" class="btn btn-default" value="Reset">
                </div>
              </form>
            </div>
            <!-- /.row -->
        </div>