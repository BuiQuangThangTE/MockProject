<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel " id="status_user">
            <div class="pull-left image">
                <img src="<?php echo URL ?><?php echo $_SESSION['avatar']?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php  echo $_SESSION['username']?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">


            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?php echo URL ?>admin/index_view">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Posts</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="<?php echo URL ?>posts?trang=1"><i class="fa fa-circle-o"></i>Posts</a></li>
                    <li><a href="<?php echo URL ?>posts/comments"><i class="fa fa-circle-o"></i>Comments</a></li>
                </ul>
            </li>

            <li>
                <a href="<?php echo URL ?>categories">
                    <i class="fa fa-th"></i> <span>Categories</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo URL ?>users?trang=1">
                    <i class="fa fa-table"></i> <span>Users</span>
                    <span class="pull-right-container">
            </span>
                </a>

            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>