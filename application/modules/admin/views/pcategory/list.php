<div id="page-wrapper" style="min-height: 291px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product Categories</h1>
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
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($pcategories as $key => $pcategory) {
                                            ?>
                                        <tr class="gradeX">
                                            <td><?php echo $pcategory->pc_id; ?></td>
                                            <td><?php echo $pcategory->pc_name; ?></td>
                                            <td class="center"><?php echo ($pcategory->pc_status) ? 'Active' : 'InActive'; ?></td>
                                            <td class="center">
                                                <a href="" class="fa fa-eye"></a>
                                                <a href="<?php echo base_url('admin/pcategory/edit/'.$pcategory->pc_id); ?>" class="fa fa-edit"></a>
                                                <a href="<?php echo base_url('admin/pcategory/remove/'.$pcategory->pc_id); ?>"  onclick="return confirm('Are you sure want to delete?')" class="glyphicon glyphicon-remove"></a>
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