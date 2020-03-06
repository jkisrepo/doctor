<?php
  $info = $this->db->get_where('fend_slidercontent', array(
    'promo_id' => $promo_id
  ));
    $pres_info = $info->result_array();
   
    foreach ($pres_info as $row):
?>
<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/slidercontent');?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_slider_content_list');?>
    </a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="white-box m-t-10">
      <h3 class="box-title m-b-30"><?php echo $page_title; ?></h3>
      <form action="<?php echo site_url('doctor/slidercontent/manage/'.$row['promo_id']);?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('tag_title'); ?></label>
                <input type="text" class="form-control" placeholder="<?php echo get_phrase('tag_title');?>"
                  name="tag_title" value="<?php echo $row['tag_title'];?>" id="tag_title">
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('title'); ?></label>
                <input type="text" class="form-control" placeholder="<?php echo get_phrase('title');?>"
                  name="title" value="<?php echo $row['title'];?>" id="title">
              </div>
          </div>          
        </div>
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('short_description'); ?></label>
                <textarea name="short_description" class="form-control" rows="3"
                placeholder="<?php echo get_phrase('short_description');?>"><?php echo $row['short_description']?></textarea>
              </div>
          </div>          
        </div>
        <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                  <label><?php echo get_phrase('slider_image');?></label>
                  <input type="file" id="js_sliderimage" class="dropify" name="slider_image"
                         data-default-file="<?php echo base_url('uploads/frontend/'.$row['slider_image']);?>">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light">
                      <i class="fa fa-save"></i>
                      <?php echo get_phrase('edit_slider_content'); ?>
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


