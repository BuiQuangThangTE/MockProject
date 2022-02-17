<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Posts
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
                        <h3 class="box-title">Danh sách bài viết</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a class="btn btn-success btn-add" href="<?php echo URL ?>posts/create_post">Add</a>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Images</th>
                                <th>Views</th>
                                <th>Category</th>
                                <th>User</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($load_view_user as $totalPosts) {
                                ?>
                                <tr id="row-post-<?php echo $totalPosts["blog_id"] ?>">
                                    <td><?php echo $totalPosts["blog_id"] ?></td>
                                    <td><?php echo $totalPosts["title"] ?></td>
                                    <td><?php echo $totalPosts["description"] ?></td>
                                    <!--                                    <td>-->
                                    <?php //var_dump( $totalPosts["image"])?><!--</td>-->
                                    <td class="image">
                                        <img
                                            src="<?php echo URL ?><?php echo $totalPosts["image"] ?>"
                                            style="max-width: 150px; max-height: 150px">
                                    </td>
                                    <td><?php echo $totalPosts["views"] ?></td>
                                    <td><?php echo $totalPosts["name_category"] ?></td>
                                    <td><?php echo $totalPosts["username"] ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-edit" data-toggle="modal"
                                           href="<?php echo URL ?>posts/view_edit_post/<?php echo $totalPosts["blog_id"] ?>">Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-delete"
                                           onclick="showModal_blog(<?php echo $totalPosts["blog_id"] ?>)">Delete
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

                <?php if ($trang < $so_trang) {
                if ($trang == 1) { ?>
                    <a href="<?php echo URL ?>posts?trang=<?php echo $trang + 1 ?>" class="btn btn-primary">NEXT</a>
                <?php }
                if ($trang > 1) { ?>
                    <a href="<?php echo URL ?>posts?trang=<?php echo $trang - 1 ?>" class="btn btn-success">BACK</a>
                    <a href="<?php echo URL ?>posts?trang=<?php echo $trang + 1 ?>" class="btn btn-primary">NEXT</a>

                <?php }}
                if ($trang == $so_trang && $trang > 1) { ?>
                    <a href="<?php echo URL ?>posts?trang=<?php echo $trang - 1 ?>" class="btn btn-success">BACK</a>
                <?php } ?>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<div class="modal fade" id="delete_posts">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Yêu cầu xác nhận</h4>
                <input type="hidden" id="id_post" name="id_user_DL">
            </div>
            <div class="modal-body">
                <h1>Bạn có chắc chắn muốn xóa không?</h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-danger" onclick="delete_blog()">Xóa</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->