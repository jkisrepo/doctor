<?php $chamber_info = $this->db->get_where('chamber',array('chamber_id'=>$chamber_id))->row();?>

<div class="row" id="staff_inputs">
  <div class="col-lg-12">
    <div class="white-box">      
      <form class="" action="<?php echo site_url('doctor/createstaff/create');?>" 
        method="post">
        <input type="hidden" name="chamber" id="chamber" value="<?php echo $chamber_info->chamber_id;?>" >
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label><?php echo get_phrase('name'); ?></label>
              <input type="text" class="form-control" placeholder="<?php echo get_phrase('staff_name');?>"
                name="name" value="" id="staffName" required>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('email'); ?></label>
                <input type="text" class="form-control" placeholder="<?php echo get_phrase('email');?>"
                  name="email" value="" id="email">
              </div>
            </div>
        </div>        
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('password'); ?></label>
                <input type="password" class="form-control" placeholder="<?php echo get_phrase('password');?>"
                  name="password" value="" id="password">
              </div>
            </div>
        </div>        
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo get_phrase('phone'); ?></label>
                <input type="text" class="form-control" placeholder="<?php echo get_phrase('phone');?>"
                  name="phone" value="" id="phone">
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-1">
            <div class="form-group">
              <label style="color: #fff;">savebutton</label>
              <button type="submit" class="btn btn-success btn-block">
                <?php echo get_phrase('save'); ?>
              </button>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group">
              <label style="color: #fff;">closebutton</label>
              <button type="button" class="btn btn-default btn-block"
                onclick="hide_inputs()">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/chamber');?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_chamber_list');?>
    </a>
  </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="white-box m-t-10">
          <div class="row">
              <div class="col-md-6">
                <h3 class="box-title m-b-30"><?php echo 'manage '.$page_title.' of '.$chamber_info->name; ?></h3>
              </div>
              <div class="col-md-4"></div>
              <div class="col-md-2">
                <button type="button" id="add_staff_button" class="btn btn-info btn-1d">
                  <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('add_staff'); ?>
                </button>
              </div>
          </div>

          <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th><?php echo get_phrase('name'); ?></th>
              <th><?php echo get_phrase('email'); ?></th>
              <th><?php echo get_phrase('phone'); ?></th>
              <th><?php echo get_phrase('action'); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $count = 1;
              $whereArray = array('user_type' => 2, 'chamber' => $chamber_info->chamber_id);
              $chambers = $this->db->get_where('staffusers',$whereArray)->result_array();
              foreach ($chambers as $row):
            ?>
            <tr>
              <td><?php echo $count++; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['phone']; ?></td>
              <td>
                <a href="<?php echo site_url('doctor/editstaff/'.$row['chamber'].'/'.$row['user_id']);?>"
                  class="fcbtn btn btn-info btn-outline btn-1d btn-sm">
                  <?php echo get_phrase('edit_staff'); ?>
                </a> 
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      </div>
    </div>
</div>

<script type="text/javascript">

  $(document).ready(function() {
    
    $('#staff_inputs').hide();

    $('#add_staff_button').click(function() {
      $('#staff_inputs').show(200);
    });

  });

  function hide_inputs() {
    $('#staffName').val('');
    $('#email').val('');
    $('#password').val('');
    $('#phone').val('');
    $('#staff_inputs').hide(200);
  }

</script>



