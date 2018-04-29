<aside class="left-side sidebar-offcanvas bg-dark-blue">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar bg-dark-blue">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <!-- <div class="image">
                <img src="<?php echo base_url();?>assets/avatar/dogecrypto.jpg" class="img-circle" alt="User Image" />

            </div> -->
            <!-- <div class="pull-left info">
                <p class="text-white">
                    Hello, <?php echo $this->session->userdata('adminName');?>
                </p>

            </div> -->
        </div>

        <ul class="sidebar-menu">
            <li class="active">
                <a href="<?php echo site_url('dashboard');?>" class="sb-dashboard text-white">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('concept');?>" class="sb-concept text-white">
                    <i class="fa fa-user"></i> <span>Thuật Ngữ</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('news');?>" class="sb-news text-white">
                    <i class="fa fa-tags"></i> <span>Tin tức</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
