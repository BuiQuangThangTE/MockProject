<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách người dùng</h3>
                        <button class="btn btn-info" data-toggle="modal" href="#add_users"
                                style="float: right; margin-right: 50px; width: 150px;font-size: 14px;padding: 2px;">ADD
                        </button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Quyền QT</th>
                                <th>Avatar</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <?php
                            foreach ($load_view_user as $r) {
                                ?>
                                <tbody id="row-user-<?php echo $r['user_id'] ?>">
                                <tr>
                                    <td><?php echo $r['user_id'] ?></td>
                                    <td><?php echo $r['username'] ?></td>
                                    <td><?php echo $r['email'] ?></td>
                                    <td><?php echo $r['id_group'] ?></td>
                                    <td><img src="<?php echo $r['avatar'] ?>"
                                             style="width: 100px; height: 100px"></td>
                                    <td>
                                        <a class="btn btn-primary text-center btn-edit" style="min-width: 80px"
                                           data-toggle="modal"
                                           href="users/edit_user/<?php echo $r['user_id'] ?>">Edit
                                        </a>
                                    </td>
                                    <td>
                                    <a class="btn btn-danger btn-delete" style="min-width: 80px"
                                       onclick="showModal_user(<?php echo $r['user_id'] ?>)">Delete
                                    </a>
                                    </td>
                                </tr>
                                </tbody>
                                <?php
                            }
                            ?>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <?php if ($trang == 1) { ?>
                    <a href="<?php echo URL ?>users?trang=<?php echo $trang + 1 ?>" class="btn btn-primary">NEXT</a>
                <?php }
                if ($trang < $so_trang && $trang > 1) { ?>
                    <a href="<?php echo URL ?>users?trang=<?php echo $trang - 1 ?>" class="btn btn-success">BACK</a>
                    <a href="<?php echo URL ?>users?trang=<?php echo $trang + 1 ?>" class="btn btn-primary">NEXT</a>
                <?php }
                if ($trang == $so_trang && $trang > 1) { ?>
                    <a href="<?php echo URL ?>users?trang=<?php echo $trang - 1 ?>" class="btn btn-success">BACK</a>
                <?php } ?>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>
<div class="modal fade" id="add_users">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thêm USERS</h4>
            </div>
            <div class="modal-body">
                <form action="users/newUsers" method="post" enctype="multipart/form-data">
                    Username: <input type="text" name="user" id="inputID" class="form-control" value="" title=""
                                     required="required">
                    Password: <input type="password" name="pass" id="inputID" class="form-control" value="" title=""
                                     required="required">
                    Email: <input type="email" name="email" id="inputID" class="form-control" value="" title=""
                                  required="required">
                    Avatar: <input type="file" name="avatar" id="inputID" class="form-control" value="" title=""
                                   required="required">
                    Phân quyền: <select id="inputID" class="form-control" name="id_group">
                        <option value="0">Người đọc</option>
                        <option value="1">Admin</option>
                    </select>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Đóng
                        </button>
                        <button type="submit" class="btn btn-primary" name="save_user">Lưu</button>
                    </div>
                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->








<div class="modal fade" id="delete_users">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Yêu cầu xác nhận</h4>
                <input type="hidden" id="id_user_DL" name="id_user_DL">
            </div>
            <div class="modal-body">
                <h1>Bạn có chắc chắn muốn xóa không?</h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-danger" onclick="delete_user()">Xóa</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->