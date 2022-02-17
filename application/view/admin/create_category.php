<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blank page
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Thêm bài viết</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form action="<?php echo URL ?>categories/create_category" method="post" role="form" enctype="multipart/form-data">
                    <p>Tên danh mục:</p> <input type="text" name="caregory_name_create" id="inputID" class="form-control" value="" title="" required="required" >
                    <br />
                    <p>Mô tả:</p> <input type="text" name="caregory_description_create" id="inputID" class="form-control" value="" title="" required="required" >
                    <br />
                    <br />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <a href="<?php echo URL ?>categories/index">Đóng</a>
                        </button>
                        <button type="submit" class="btn btn-primary" name="btn_create_category" id="add_post">Lưu</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->