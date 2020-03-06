<style type="text/css">
    .floatingHeader {
          position: fixed;
          top: 0;
          visibility: hidden;
        }
</style>

<div class="navbar-default sidebar persist-area" role="navigation" >
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav persist-header" id="side-menu">
            <li>
                <a href="<?php echo site_url('doctor/appointment');?>"
                   class="waves-effect <?php if ($page_name == 'appointment' || $page_name == 'appointment_new') echo 'active';?>">
                    <i class="icon-speedometer fa-fw"></i>
                    <span class="hide-menu"><?php echo get_phrase('appointment'); ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('doctor/prescription');?>"
                   class="waves-effect <?php if ($page_name == 'prescription' || $page_name == 'prescription_new') echo 'active';?>">
                    <i class="icon-speedometer fa-fw"></i>
                    <span class="hide-menu"><?php echo get_phrase('prescription'); ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('doctor/billing');?>"
                   class="waves-effect <?php if ($page_name == 'billing' || $page_name == 'invoice_view' || $page_name == 'invoice_new') echo 'active';?>">
                    <i class="icon-printer fa-fw"></i>
                    <span class="hide-menu"><?php echo get_phrase('billing'); ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('doctor/patient');?>"
                   class="waves-effect <?php if ($page_name == 'patient_profile' || $page_name == 'patient') echo 'active';?>">
                    <i class="ti-user fa-fw"></i>
                    <span class="hide-menu"><?php echo get_phrase('patient'); ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('doctor/chamber');?>"
                   class="waves-effect <?php if ($page_name == 'chamber' || $page_name == 'schedule') echo 'active';?>">
                    <i class="ti-direction fa-fw"></i>
                    <span class="hide-menu"><?php echo get_phrase('doctor'); ?></span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('doctor/settings');?>"
                   class="waves-effect <?php if ($page_name == 'settings') echo 'active';?>">
                    <i class="ti-direction fa-fw"></i>
                    <span class="hide-menu"><?php echo get_phrase('settings'); ?></span>
                </a>
            </li>
            <li> 
                <a href="#" class="waves-effect">
                    <span class="hide-menu">
                        Frontend Settings                        
                        &nbsp; <i class="fa fa-chevron-down"></i>
                    </span>
                </a>
                <ul class="nav nav-second-level">                   
                    <li>
                         <a href="<?php echo site_url('doctor/slidercontent');?>"
                           class="waves-effect <?php if ($page_name == 'slidercontent') echo 'active';?>">
                            <i class="ti-direction fa-fw"></i>
                            <span class="hide-menu"><?php echo get_phrase('slider_content'); ?></span>
                        </a>
                    </li>
                    <li>
                         <a href="<?php echo site_url('doctor/promocontent');?>"
                           class="waves-effect <?php if ($page_name == 'promocontent') echo 'active';?>">
                            <i class="ti-direction fa-fw"></i>
                            <span class="hide-menu"><?php echo get_phrase('promo_content'); ?></span>
                        </a>
                    </li>
                    <li>
                         <a href="<?php echo site_url('doctor/testimonial');?>"
                           class="waves-effect <?php if ($page_name == 'testimonial') echo 'active';?>">
                            <i class="ti-direction fa-fw"></i>
                            <span class="hide-menu"><?php echo get_phrase('testimonial'); ?></span>
                        </a>
                    </li> 
                    <li>
                         <a href="<?php echo site_url('doctor/qualification');?>"
                           class="waves-effect <?php if ($page_name == 'qualification') echo 'active';?>">
                            <i class="ti-direction fa-fw"></i>
                            <span class="hide-menu"><?php echo get_phrase('qualification'); ?></span>
                        </a>
                    </li> 
                    <li>
                         <a href="<?php echo site_url('doctor/blog');?>"
                           class="waves-effect <?php if ($page_name == 'blog') echo 'active';?>">
                            <i class="ti-direction fa-fw"></i>
                            <span class="hide-menu"><?php echo get_phrase('blog'); ?></span>
                        </a>
                    </li>                     
                </ul>
            </li>
            <li class="pull-right"> 
				<a href="#" class="waves-effect active" style="padding: 8px;">
					<span class="hide-menu">
						<?php echo $this->db->get_where('chamber', array(
                                'chamber_id' => get_settings('chamber_id')))->row()->name;?>
						&nbsp; <i class="fa fa-chevron-down"></i>
					</span>
					<div style="font-size: 10px; font-weight: 100; color: #989898;">
						<?php echo get_phrase('Doctor');?>
					</div>
				</a>
				<ul class="nav nav-second-level">
					<?php $chambers = $this->db->get('chamber')->result_array();
						foreach ($chambers as $chamber):
					?>
					<li>
						<a href="<?php echo site_url('doctor/change_chamber/'.$chamber['chamber_id']);?>" 
							class="waves-effect <?php if ($chamber['chamber_id'] == get_settings('chamber_id')) echo 'active'; ?>">
							<?php echo $chamber['name'];?>
						</a>
					</li>
					<?php endforeach;?>
				</ul>
			</li>
        </ul>
    </div>
</div>

<script type="text/javascript">
function UpdateTableHeaders() {
   $(".persist-area").each(function() {
   
       var el             = $(this),
           offset         = el.offset(),
           scrollTop      = $(window).scrollTop(),
           floatingHeader = $(".floatingHeader", this)
       
       if ((scrollTop > offset.top) && (scrollTop < offset.top + el.height())) {
           floatingHeader.css({
            "visibility": "visible"
           });
       } else {
           floatingHeader.css({
            "visibility": "hidden"
           });      
       };
   });
}

// DOM Ready      
$(function() {

   var clonedHeaderRow;

   $(".persist-area").each(function() {
       clonedHeaderRow = $(".persist-header", this);
       clonedHeaderRow
         .before(clonedHeaderRow.clone())
         .css("width", clonedHeaderRow.width())
         .addClass("floatingHeader");
         
   });
   
   $(window)
    .scroll(UpdateTableHeaders)
    .trigger("scroll");
   
});
</script>
