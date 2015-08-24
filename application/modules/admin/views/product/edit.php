<div id="page-wrapper" style="min-height: 291px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <form role="form" action="" method="POST">
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
                      <label>Store ID</label>
                      <input class="form-control" placeholder="Store ID" name="storeid" id="storeid" value="<?php echo $product->p_storeId; ?>">
                  </div>
                  <div class="form-group">
                      <label>Name</label>
                      <input class="form-control" placeholder="Name" name="name" id="name" value="<?php echo $product->p_name; ?>">
                  </div>
                  <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" rows="3" name="desc" id="desc"><?php echo $product->p_desc; ?></textarea>
                  </div>
                  <div class="form-group">
                      <label>Category</label>
                      <select class="form-control" name="category" id="category">
                        <option value="">--Select Category--</option>
                        <?php foreach ($pcategories as $key => $pcategory) : ?>
                        <option value="<?php echo $pcategory->pc_id; ?>" <?php if($product->p_category == $pcategory->pc_id) { echo "selected"; } ?>><?php echo $pcategory->pc_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Brand</label>
                      <select class="form-control" name="brand" id="brand">
                        <option value="">--Select brand--</option>
                        <?php foreach ($brands as $key => $brand) : ?>
                        <option value="<?php echo $brand->brand_id; ?>" <?php if($product->p_brand == $brand->brand_id) { echo "selected"; } ?>><?php echo $brand->brand_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Provider</label>
                      <select class="form-control" name="provider" id="provider">
                        <option value="">--Select Provider--</option>
                        <?php foreach ($providers as $key => $provider) : ?>
                        <option value="<?php echo $provider->provider_id; ?>" <?php if($product->p_provider == $provider->provider_id) { echo "selected"; } ?>><?php echo $provider->provider_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                      <label>Image URL</label>
                      <input class="form-control" placeholder="Image URL" name="image" id="image" value="<?php echo $product->p_image; ?>">
                  </div>
                  <div class="form-group">
                      <label>URL</label>
                      <input class="form-control" placeholder="URL" name="url" id="url" value="<?php echo $product->p_url; ?>">
                  </div>
                  <div class="form-group">
                      <label>MRP</label>
                      <input class="form-control" placeholder="MRP" name="mrp" id="mrp" value="<?php echo $product->p_mrp; ?>">
                  </div>
                  <div class="form-group">
                      <label>Price</label>
                      <input class="form-control" placeholder="Price" name="price" id="price" value="<?php echo $product->p_price; ?>">
                  </div>
                  <div class="form-group">
                      <label>Status</label>
                      <div class="radio">
                          <label>
                              <input type="radio" name="status" id="status_active" value="1" <?php if($product->p_status == 1) { echo 'checked=""'; } ?>>Active
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                              <input type="radio" name="status" id="status_inactive" value="0" <?php if($product->p_status == 0) { echo 'checked=""'; } ?>>Inactive
                          </label>
                      </div>
                  </div>

                  <input type="submit" class="btn btn-default" name="submit" id="submit" value="Update">
                  <!-- <input type="reset" class="btn btn-default" value="Reset"> -->
                </div>
              </form>
            </div>
            <!-- /.row -->
        </div>