<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title m-b-30"><?php echo get_phrase('settings'); ?></h3>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form action="<?php echo site_url('doctor/settings/update'); ?>"
                          method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo get_phrase('doctor_name'); ?></label>
                                    <input type="text" class="form-control"name="doctor_name"
                                           value="<?php echo get_settings('doctor_name');?>" required>
                                </div>
                                <div class="form-group">
                                    <label><?php echo get_phrase('doctor_email'); ?></label>
                                    <input type="email" class="form-control"name="doctor_email"
                                           value="<?php echo get_settings('doctor_email');?>" required>
                                </div>
                                <div class="form-group">
                                    <label><?php echo get_phrase('chamber'); ?></label>
                                    <select class="selectpicker" data-style="form-control" name="chamber_id">
                                        <?php $chambers = $this->db->get('chamber')->result_array();
                                        $current_chamber = get_settings('chamber_id');
                                        foreach ($chambers as $row):
                                            ?>
                                            <option value="<?php echo $row['chamber_id'];?>"
                                                <?php if ($current_chamber == $row['chamber_id']) echo 'selected';?>>
                                                <?php echo $row['name'];?>
                                            </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?php echo get_phrase('currency'); ?></label>
                                    <select class="selectpicker" data-style="form-control" name="currency">
                                            <option value="USD">
                                                USD
                                            </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?php echo get_phrase('language'); ?></label>
                                    <select class="selectpicker" data-style="form-control" name="language">
                                        <option value="english">
                                            <?php echo get_phrase('english');?>
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo get_phrase('logo');?></label>
                                    <input type="file" id="input-file-now-custom-1" class="dropify" name="logo"
                                           data-default-file="<?php echo base_url('uploads/'.get_settings('logo'));?>">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                        <i class="fa fa-save"></i>
                                        <?php echo get_phrase('update_settings'); ?>
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.dropify').dropify();
    });
</script>
