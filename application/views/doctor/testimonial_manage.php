<?php
  $info = $this->db->get_where('fend_testimonial', array(
    'testimonial_id' => $testimonial_id
  ));
    $pres_info = $info->result_array();
   
    foreach ($pres_info as $row):
?>
<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/testimonial');?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_slider_content_list');?>
    </a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="white-box m-t-10">
      <h3 class="box-title m-b-30"><?php echo $page_title; ?></h3>
      <form action="<?php echo site_url('doctor/testimonial/manage/'.$row['testimonial_id']);?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('user_name'); ?></label>
                <input type="text" class="form-control" placeholder="<?php echo get_phrase('user_name');?>"
                  name="user_name" value="<?php echo $row['user_name'];?>" id="user_name">
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
                  <label><?php echo get_phrase('user_image');?></label>
                  <input type="file" id="js_sliderimage" class="dropify" name="user_image"
                         data-default-file="<?php echo base_url('uploads/frontend/'.$row['user_image']);?>">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light">
                      <i class="fa fa-save"></i>
                      <?php echo get_phrase('edit_testimonial'); ?>
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


