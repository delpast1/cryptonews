
            <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?=$item->name?>
    <small>Edit Control panel</small>
  </h1>
  <ol class="breadcrumb">
      <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo site_url('student');?>"> Concept</a></li>
      <li class="active">Edit Concept detail</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="col-md-8 col-md-push-2">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"> Edit Concept</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <br/>

            <form role="form" id="editForm" method="post" action="<?php echo site_url('concept/doEdit/' . $item->id);?>">
                <div class="box-body">
                    <div class="form-group">
                        <label for="concept_name">Name</label>
                        <input type="text" class="form-control" name="concept_name" id="concept_name" placeholder="Enter concept name" value="<?=$item->name?>" >
                    </div>
                    <div class="form-group">
                        <label for="concept_detail">Detail</label>
                        <input type="text" class="form-control" name="concept_detail" id="concept_detail" placeholder="Enter concept detail" value="<?=$item->detail?>" >
                    </div>
                    <div class="form-group">
                        <label for="concept_url">URL</label>
                        <input type="text" class="form-control" name="concept_url" id="concept_url" placeholder="Enter concept url" value="<?=$item->url?>" >
                    </div>

                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <br/>
            <div class="alert alert-success alert-dismissable notification" style="display: none">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Notice!</b> <span class="msg-success">Successfully edited</span>
            </div>
            <div class="alert alert-danger alert-dismissable notification" style="display: none">
                <i class="fa fa-ban"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b>Error!</b> <span class="msg-error">Please try again</span>
            </div>
        </div><!-- /.box -->
    </div><!--/.col (right) -->

</section><!-- /.content
