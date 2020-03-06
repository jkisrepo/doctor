<div class="row">
  <div class="col-sm-12">
    <a href="<?php echo site_url('doctor/blog_new');?>" 
      class="fcbtn btn btn-success btn-1d">
      <i class="fa fa-plus"></i> &nbsp; <?php echo get_phrase('new_blog');?>
    </a>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="white-box m-t-10">
      <h3 class="box-title m-b-30"><?php echo $page_title; ?></h3>
      <div class="table-responsive">
        <table id="myTable" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th><?php echo get_phrase('title'); ?></th>
              <th><?php echo get_phrase('date'); ?></th>
              <th><?php echo get_phrase('options'); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $count = 1;
              $blog = $this->db->get('fend_blog')->result_array();
              foreach ($blog as $row):
            ?>
            <tr>
              <td><?php echo $count++; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo date('Y-M-d', $row['timestamp']) ; ?></td>
              <td>
                <a href="<?php echo site_url('doctor/blog_manage/' . $row['blog_id']);?>"
                  class="fcbtn btn btn-info btn-outline btn-1d btn-sm">
                  <?php echo get_phrase('manage_blog'); ?>
                </a>
                <button type="button" onclick="delete_blog('<?php echo $row['blog_id'];?>')"
                  class="fcbtn btn btn-danger btn-outline btn-1d btn-sm">
                  <?php echo get_phrase('delete'); ?>
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  $(document).ready(function() {
    $('#myTable').DataTable({
      "pageLength": 50
    });
  });

  function delete_blog(blog_id) {
    swal({
      title: "Are you sure?",
      text: "The blog and it's content will be deleted permanently !",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonClass: 'btn-warning',
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    }, function () {
      swal("Deleted!", "The blog is deleted", "success");
      setTimeout(function() {
        window.location = "<?php echo site_url('doctor/blog/delete/');?>" + blog_id;
      }, 1000);
    });
  }

</script>
