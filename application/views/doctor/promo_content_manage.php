<?php
  $info = $this->db->get_where('fend_promocontent', array(
    'promo_id' => $promo_id
  ));
    $pres_info = $info->result_array();
   
    foreach ($pres_info as $row):
?>
<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/promocontent');?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_promo_content_list');?>
    </a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="white-box m-t-10">
      <h3 class="box-title m-b-30"><?php echo $page_title; ?></h3>
      <form action="<?php echo site_url('doctor/promocontent/manage/'.$row['promo_id']);?>" method="post" enctype="multipart/form-data">

        <div class="row">
          <div class="col-md-6">
            <div class="form-group" id = "icon-picker-area">
                  <label for="font_awesome_class"><?php echo get_phrase('icon_picker'); ?></label>
                  <input type="text" id ="font_awesome_class" name="font_awesome_class" class="form-control icon-picker"  value="<?php echo $row['promo_image']; ?>" autocomplete="off">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('promo_title'); ?></label>
                <input type="text" class="form-control" placeholder="<?php echo get_phrase('promo_title');?>"
                  name="promo_title" value="<?php echo $row['promo_title'];?>" id="promo_title">
              </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('promo_description'); ?></label>
                <textarea name="promo_description" class="form-control" rows="3"
                placeholder="<?php echo get_phrase('promo_description');?>"><?php echo $row['promo_description']?></textarea>
              </div>
          </div>          
        </div>
        <div class="row">
          <div class="col-md-4">            
              <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light">
                      <i class="fa fa-save"></i>
                      <?php echo get_phrase('edit_promo_content'); ?>
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


