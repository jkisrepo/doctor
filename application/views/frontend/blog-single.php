<!DOCTYPE html>

<?php $data = $this->db->get_where('fend_blog', array('blog_id' =>  $blog_id))->row();

// print '<pre/>';
// print_r($data);exit();
$BlogSettings = $this->db->get('fend_blog')->result_array();

$userdata = $this->db->get('users')->row();
$email = get_user_info_by_id($userdata->user_id, 'email');
$phone = get_user_info_by_id($userdata->user_id, 'phone');
$SliderContentSettings = $this->db->get('fend_slidercontent')->result_array();
$PromoContentSettings = $this->db->get('fend_promocontent')->result_array();
$ChambersList = $this->db->get('chamber')->result_array();
$TestimonialSettings = $this->db->get('fend_testimonial')->result_array();
$Qualification = $this->db->get('fend_qualification')->row();
$BlogSettings = $this->db->get('fend_blog')->result_array();
$address = $this->chamber_model->get_address();

if (is_array($address)) {
  # code...
  $text_address = "";
  foreach ($address as $key => $value) {
  # code...
  $text_address .=  $value['address'].' ';
  }
}

?>
<html lang="en">
  <head>
    <title><?php echo get_user_info_by_id($userdata->user_id,'name');?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('uploads/favicon.png');?>">
    <?php include 'include_frontend_top.php';?>
  </head>
  <body>
    <nav class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row">
      <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
          <div class="col-lg-2 pr-4 align-items-center">
            <!-- <a class="navbar-brand" href="/">Dr.<span>care</span></a> -->
            <img src="<?php echo base_url()?>uploads/favicon.png">
          </div>
          <div class="col-lg-10 d-none d-md-block">
            <div class="row d-flex">
              <div class="col-md-4 pr-4 d-flex topper align-items-center">
                <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
                <span class="text">Address: <?php echo !empty($text_address) ? $text_address: ""?></span>
              </div>
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                <span class="text">Email: <?php echo !empty($email) ? $email:''; ?></span>
              </div>
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                <span class="text">Phone: <?php echo !empty($phone) ? $phone:''; ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
	    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container d-flex align-items-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="oi oi-menu"></span> Menu
              </button>
            
            <div class="collapse navbar-collapse" id="ftco-nav">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a href="#Home" class="nav-link pl-0">Home</a></li>
                <li class="nav-item"><a href="#About" class="nav-link">About</a></li>
                <li class="nav-item"><a href="#Testmonial" class="nav-link">Testmonial</a></li>
                <li class="nav-item"><a href="#chambers" class="nav-link">Chambers</a></li>
                <li class="nav-item"><a href="#blog" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
              </ul>
            </div>
          </div>
      </nav> -->
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread"><?php echo $data->title?></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="index.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section">
			<div class="container">
				<div class="row">
          <div class="col-lg-8 ftco-animate">
            <h2 class="mb-3">#<?php echo $data->blog_id?>. <?php echo $data->title?></h2>
            <p>
              <img src="<?php echo base_url()?>uploads/frontend/<?php echo $data->image ;?>" alt="" class="img-fluid">
            </p>
            <p><?php echo $data->description;?></p>
           
          </div> <!-- .col-md-8 -->

          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <!-- <div class="sidebar-box ftco-animate">
            	<h3>Category</h3>
              <ul class="categories">
                <li><a href="#">Neurology <span>(6)</span></a></li>
                <li><a href="#">Cardiology <span>(8)</span></a></li>
                <li><a href="#">Surgery <span>(2)</span></a></li>
                <li><a href="#">Dental <span>(2)</span></a></li>
                <li><a href="#">Ophthalmology <span>(2)</span></a></li>
              </ul>
            </div> -->

            <div class="sidebar-box ftco-animate">
              <h3>Popular Articles</h3>
              <?php foreach ($BlogSettings as $row): ?>
                <div class="block-21 mb-4 d-flex">
                  <a class="blog-img mr-4" style="background-image: url(<?php echo base_url()?>uploads/frontend/<?php echo $row['image'] ;?>);"></a>
                  <div class="text">
                    <h3 class="heading"><a href="<?php echo base_url().'doctor/blog_detail/'.$row["blog_id"]?>"><?php echo $row['title'] ;?></a></h3>
                    <div class="meta">
                      <div><a href="#"><span class="icon-calendar"></span> <?php echo date('d-M-Y', $row['timestamp'])?></a></div>
                      <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                      
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
             
            </div>

            <!-- <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <ul class="tagcloud m-0 p-0">
                <a href="#" class="tag-cloud-link">Medical</a>
                <a href="#" class="tag-cloud-link">Hospital</a>
                <a href="#" class="tag-cloud-link">Nurse</a>
                <a href="#" class="tag-cloud-link">Doctor</a>
                <a href="#" class="tag-cloud-link">Medicine</a>
                <a href="#" class="tag-cloud-link">Facilities</a>
                <a href="#" class="tag-cloud-link">Staff</a>
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
            	<h3>Archives</h3>
              <ul class="categories">
              	<li><a href="#">December 2018 <span>(30)</span></a></li>
              	<li><a href="#">Novemmber 2018 <span>(20)</span></a></li>
                <li><a href="#">September 2018 <span>(6)</span></a></li>
                <li><a href="#">August 2018 <span>(8)</span></a></li>
              </ul>
            </div> -->


            <div class="sidebar-box ftco-animate">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div><!-- END COL -->
        </div>
			</div>
		</section>

    <footer id="contact" class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2 logo"><span><?php echo get_user_info_by_id($userdata->user_id,'name');?></span></h2>
              <p><?php echo $Qualification->qualification_title?></p>
            </div>
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text"><?php echo !empty($text_address) ? $text_address: ""?></span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?php echo !empty($phone) ? $phone:''; ?></span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><?php echo !empty($email) ? $email:''; ?></span></a></li>
                </ul>
              </div>

              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Services</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Deparments</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
              </ul>
            </div>
           <!--  <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Neurolgy</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Dentist</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Ophthalmology</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Cardiology</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Surgery</a></li>
              </ul>
            </div> -->
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <?php foreach ($BlogSettings as $row){ ?>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url('<?php echo base_url()?>uploads/frontend/<?php echo $row['image']?>');"></a>
                <div class="text">
                  <h3 class="heading"><a href="<?php echo base_url().'doctor/blog_detail/'.$row["blog_id"]?>"><?php echo $row['title']; ?></a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> <?php echo date('d-M-Y', $row['timestamp'])?></a></div>
                  </div>
                </div>
              </div>
            <?php }?>
              
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Opening Hours</h2>
              <h3 class="open-hours pl-4"><span class="ion-ios-time mr-3"></span>We are open 24/7</h3>
            </div>
            <!-- <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Subscribe Us!</h2>
              <form action="#" class="subscribe-form">
                <div class="form-group">
                  <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="form-control submit px-3">
                </div>
              </form>
            </div> -->
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <<?php include 'include_frontend_bottom.php';?>
    
  </body>
</html>