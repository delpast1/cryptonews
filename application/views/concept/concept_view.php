<section class="content-header">
  <h1>
      Thuật Ngữ
      <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
      <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Concept</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
      <div class="col-xs-12">
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">Danh sách Thuật Ngữ</h3>
              </div><!-- /.box-header -->
              <div class="box-body table-responsive">
                  <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Thuật Ngữ</th>
                            <th>Khái niệm/ Chi tiết</th>
                            <th>URL</th>
                            <?php 
                                if ($this->session->userdata('adminRole') == "admin") {
                                    echo '<th>Edit</th><th>Remove</th>';
                                }
                            ?>
                            
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($all_items as $item) : ?>
                      <tr>
                          <td><?=$item->name?></td>
                          <td><?=$item->detail?></td>
                          <td><?php 
                            if ($item->url) {
                                $url = $item->url;
                                echo '<a href="'.$url.'" target = "_blank">Chi tiết</a>';
                            }
                          ?></td>
                          <?php 
                            if ($this->session->userdata('adminRole') == "admin") {
                                echo '<td><a target="_blank" href="'.site_url('concept/edit/' . $item->id).'">Edit</a>  </td>
                                <td><a class="deleteItem" href="'.site_url('concept/doRemove/'. $item->id).'">Remove</a>  </td>';
                            }
                          ?>
                            <!-- <td><a target="_blank" href="<?php echo site_url('concept/edit/' . $item->id);?>">Edit</a>  </td>
                            <td><a class="deleteItem" href="<?php echo site_url('concept/doRemove/' . $item->id);?>">Remove</a>  </td> -->
                      <?php endforeach; ?>
                      </tr>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Student Number</th>
                          <th>Status</th>
                          <th>Edit</th>
                          <th>Remove</th>
                        </tr>
                    </tfoot> -->
                  </table>
              </div><!-- /.box-body -->
          </div><!-- /.box -->
      </div>
  </div>

    <div class="container box">
		<h3 align="center">Import CSV Data </h3>
		<br />

		<form method="post" id="import_csv" enctype="multipart/form-data" action="<?php echo site_url('concept/importCSV');?>">
			<div class="form-group">
				<label>Select CSV File</label>
				<input type="file" name="csv_file" id="csv_file" required accept=".csv" />
			</div>
			<br />
			<button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Import</button>
		</form>
		<br />

        <div class="alert alert-success alert-dismissable notification" style="display: none">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Notice!</b> <span class="msg-success"></span>
        </div>
        <div class="alert alert-danger alert-dismissable notification" style="display: none">
            <i class="fa fa-ban"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Error!</b> <span class="msg-error">Please try again</span>
        </div>
	</div>
</section><!-- /.content -->
