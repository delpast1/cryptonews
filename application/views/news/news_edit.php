
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <small>Edit Control panel</small>
  </h1>
  <ol class="breadcrumb">
      <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo site_url('news');?>"> news</a></li>
      <li class="active">Edit news</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="col-md-8 col-md-push-2">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"> Edit news</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <br/>

            <form role="form" id="editForm" method="post" action="<?php echo site_url('news/doEdit/' . $item->id);?>">
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Date</label>
                        <input type="text" class="form-control" name="date" id="date" placeholder="Enter news date" value="<?=$item->date?>" >
                    </div>

                    <div class="form-group">
                        <label for="title">News</label>
                        <input type="text" class="form-control" name="news" id="news" placeholder="Enter news news" value="<?=$item->title?>" >
                    </div>

                    <div class="form-group">
                        <label for="title">Summary</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter news name" value="<?=$item->title?>" >
                    </div>

                    <div class="form-group">
                        <label for="title">Tags</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter news name" value="<?=$item->title?>" >
                    </div>

                    <div class="form-group">
                        <label for="title">URL</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter news name" value="<?=$item->title?>" >
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
