<section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>

                                <?php echo $totalConceptCount; ?>
                            </h3>
                            <p>
                                Thuật Ngữ
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="<?php echo site_url('concept');?>" class="small-box-footer">
                            Chi tiết <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-green">
                      <div class="inner">
                          <h3>

                              <?php echo $totalNewsCount; ?>
                          </h3>
                          <p>
                              Tin tức
                          </p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-home"></i>
                      </div>
                      <a href="<?php echo site_url('news');?>" class="small-box-footer">
                          Chi tiết <i class="fa fa-arrow-circle-right"></i>
                      </a>
                  </div>
                </div><!-- ./col -->

                <!-- <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-dark-blue text-white">
                      <div class="inner">
                          <h3>

                              <?php echo $totalDepartmentCount; ?>
                          </h3>
                          <p>
                              Courses
                          </p>
                      </div>
                      <div class="icon text-white">
                          <i class="ion ion-home"></i>
                      </div>
                      <a href="<?php echo site_url('deparment');?>" class="small-box-footer">
                          More info <i class="fa fa-arrow-circle-right"></i>
                      </a>
                  </div>
                </div>
            </div>    -->
            <!-- /.row -->



            <!-- Main row -->


        </section><!-- /.content -->
