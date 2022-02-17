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
                <form action="<?php echo URL ?>posts/create_post" method="post" role="form" enctype="multipart/form-data">
                    <p>Danh mục:</p>
                    <select name="post_category_create" id="">
                        <option value="0" selected>Chọn 1 danh mục</option>
                        <?php
                        foreach ($totalCate as $totalCate) {
                            ?>
                            <option value="<?php echo $totalCate["category_id"] ?>"><?php echo $totalCate["name_category"] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <p>Tiêu đề:</p> <input type="text" name="post_title_create" id="inputID" class="form-control" value="" title="" required="required" >
                    <br />
                    <p>Mô tả:</p> <input type="text" name="post_description_create" id="inputID" class="form-control" value="" title="" required="required" >
                    <br />
                    <p>Ảnh đại diện: </p> <input type="file" name="post_image_create" id="inputID" class="form-control" value="" title="" required="required" >
                    <br />
                    <p>Nội dung:</p> <div id="post_content_create"></div>
                    <textarea name="post_content_create" id="post_content" cols="30" rows="30" style="display:none;"></textarea>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" >
                            <a href="<?php echo URL ?>posts/index">Đóng</a>
                        </button>
                        <button type="submit" class="btn btn-primary" name="btn_create_post" id="add_post">Lưu</button>
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