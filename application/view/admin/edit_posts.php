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
                <h3 class="box-title">Cập nhập bài viết</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form action="<?php echo URL ?>posts/edit_post" method="post" role="form" enctype="multipart/form-data">
                    <p>Danh mục:</p>
<!--                    --><?php //var_dump($category_name); exit(); ?>
                    <select name="post_category_edit" id="">
                        <option value="<?php echo $category_name['category_id']?>" selected><?php echo $category_name["name_category"] ?></option>
                        <?php
                        foreach ($totalCate as $totalCate) {
                            ?>
                            <option value="<?php echo $totalCate["category_id"] ?>"><?php echo $totalCate["name_category"] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <input name="blog_id" value="<?php echo $edit_blog['blog_id']?> " style="display: none">
<!--                    <div name="blog_id" >--><?php //echo $edit_blog['blog_id']?><!--</div>-->
                    <p>Tiêu đề:</p> <input type="text" name="post_title_edit" id="inputID" class="form-control" value="<?php echo $edit_blog['title']?>" title="" required="required" >
                    <br />
                    <p>Mô tả:</p> <input type="text" name="post_description_edit" id="inputID" class="form-control" value="<?php echo $edit_blog['description']?>" title="" required="required" >
                    <br />

                    <div class="form-group">
                        <p>Ảnh đại diện: </p> <input type="file" name="post_image_edit" id="inputID" class="form-control" title="" >
                        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
                        <?php if (!empty($edit_blog['image'])): ?>
                            <img height="80" src="<?php echo URL ?><?php echo $edit_blog['image'] ?>"/>
                        <?php endif; ?>
                    </div>
                    <br />
                    <textarea name="edit_post_content" id="edit_post_content" cols="30" rows="30" style="display: none"><?php echo $edit_blog['content']?></textarea>
                    <p>Nội dung:</p> <div id="post_content_edit"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" >
                            <a href="<?php echo URL ?>posts/index">Đóng</a>
                        </button>
                        <button type="submit" class="btn btn-primary" name="btn_edit_post" id="edit_post">Đăng</button>
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