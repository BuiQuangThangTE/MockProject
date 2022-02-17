<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categories
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách thể loại</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a class="btn btn-success btn-add" href="<?php echo URL ?>categories/create_category">Add</a>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($totalCate as $tocalCate) {
                                ?>
                                <tr id="row-category-<?php echo $tocalCate["category_id"] ?>">
                                    <td><?php echo $tocalCate["category_id"] ?></td>
                                    <td><?php echo $tocalCate["name_category"] ?></td>
                                    <td><?php echo $tocalCate["description"] ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-edit"
                                           href="categories/edit_category/<?php echo $tocalCate["category_id"] ?>" onclick="">Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-delete" style="min-width: 80px" onclick="deleteCategory(<?php echo $tocalCate["category_id"] ?>)"
                                        >Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="delete_category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Yêu cầu xác nhận</h4>
                <input type="hidden" id="id_cate" name="id_cate">
            </div>
            <div class="modal-body">
                <h1>Bạn có chắc chắn muốn xóa không?</h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-danger delete_cate" data-dismiss="modal" >Xóa</button>
                <button type="submit" class="btn btn-danger" onclick="delete_cate()">Xóa</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

