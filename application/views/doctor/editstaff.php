

<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/staff/'.$staffinfo->chamber);?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-arrow-left"></i> &nbsp; <?php echo get_phrase('back_to_staff_list');?>
    </a>
  </div>
</div>
<br>

<div class="row">
  <div class="col-lg-12">
    <div class="white-box">
    
      <div class="col-lg-12">
            <div class="white-box">
              <form class="" action="<?php echo site_url('doctor/createstaff/edit/'.$staffinfo->chamber.'/'.$staffinfo->user_id);?>" 
                method="post">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label><?php echo get_phrase('name'); ?></label>
                        <input type="text" class="form-control" placeholder="<?php echo get_phrase('staff_name');?>"
                          name="name" value="<?php echo $staffinfo->name?>" id="staffName" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label><?php echo get_phrase('email'); ?></label>
                          <input type="text" class="form-control" placeholder="<?php echo get_phrase('email');?>"
                            name="email" value="<?php echo $staffinfo->email?>" id="email">
                        </div>
                      </div>
                  </div>        
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label><?php echo get_phrase('password'); ?></label>
                          <input type="password" class="form-control" placeholder="<?php echo get_phrase('password');?>"
                            name="password" value="1234" id="password">
                        </div>
                      </div>
                  </div>        
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label><?php echo get_phrase('phone'); ?></label>
                          <input type="text" class="form-control" placeholder="<?php echo get_phrase('phone');?>"
                            name="phone" value="<?php echo $staffinfo->phone?>" id="phone">
                        </div>
                      </div>
                  </div>
                  <div class="row">
                  <div class="col-md-1">
                    <div class="form-group">
                      <label style="color: #fff;">savebutton</label>
                      <button type="submit" class="btn btn-success btn-block">
                        <?php echo get_phrase('update'); ?>
                      </button>
                    </div>
                  </div>                
                </div>
                </div>
              </form>
            </div>
          </div>
    </div>
  </div>
</div>

