<?php
  $info = $this->db->get_where('fend_qualification', array(
    'qualification_id' => $qualification_id
  ));
    $pres_info = $info->result_array();
   
    foreach ($pres_info as $row):
?>
<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/qualification');?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_qualification_list');?>
    </a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="white-box m-t-10">
      <h3 class="box-title m-b-30"><?php echo $page_title; ?></h3>
      <form action="<?php echo site_url('doctor/qualification/manage/'.$row['qualification_id']);?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('qualification_title'); ?></label>
                <input type="text" class="form-control" placeholder="<?php echo get_phrase('qualification_title');?>"
                  name="qualification_title" value="<?php echo $row['qualification_title'];?>" id="qualification_title">
              </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('description'); ?></label>
                <textarea name="description" class="form-control" rows="3"
                placeholder="<?php echo get_phrase('description');?>"><?php echo $row['description']?></textarea>
              </div>
          </div>          
        </div>
        <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                  <label><?php echo get_phrase('image');?></label>
                  <input type="file" id="image" class="dropify" name="image"
                         data-default-file="<?php echo base_url('uploads/frontend/'.$row['image']);?>">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light">
                      <i class="fa fa-save"></i>
                      <?php echo get_phrase('edit_qualification'); ?>
                  </button>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
  endforeach;
?>

<script type="text/javascript">

  $(document).ready(function () {
        $('.dropify').dropify();
    });

</script>


