<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo site_url('staff/appointment');?>"
                   class="waves-effect <?php if ($page_name == 'appointment' || $page_name == 'appointment_new') echo 'active';?>">
                    <i class="icon-speedometer fa-fw"></i>
                    <span class="hide-menu"><?php echo get_phrase('appointment'); ?></span>
                </a>
            </li>
        </ul>
    </div>
</div>
