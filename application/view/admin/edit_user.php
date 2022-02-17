<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
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
                        <h3 class="box-title">Sửa thông tin người dùng</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Group ID</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td id="user_id"><?php echo $user["user_id"] ?></td>
                                <td><?php echo $user["username"] ?></td>
                                <td><?php echo $user["email"] ?></td>
                                <td><a href="#" id="rule"><?php echo $user["rule"] ?></a></td>
                                <td style="display: none" id="group_id"><?php echo $user["id_group"] ?></td>

                            </tr>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <a href="<?php echo URL ?>users/index">Đóng</a>
                    </button>
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




