<div id="page-wrapper" style="min-height: 291px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            DataTables Advanced Tables
                        </div> -->
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Store ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($products as $key => $product) {
                                            ?>
                                        <tr class="gradeX">
                                            <td><?php echo $product->p_id; ?></td>
                                            <td><?php echo $product->p_storeId; ?></td>
                                            <td><?php echo $product->p_name; ?></td>
                                            <td><?php echo $product->pc_name; ?></td>
                                            <td class="center"><?php echo ($product->p_status) ? 'Active' : 'InActive'; ?></td>
                                            <td class="center">
                                                <a href="" class="fa fa-eye"></a>
                                                <a href="" class="fa fa-edit"></a>
                                                <a href="" class="glyphicon glyphicon-remove"></a>
                                            </td>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>