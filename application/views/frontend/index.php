<!DOCTYPE html>
<html lang="en">


<?php
//print_r($address);


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

<head>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('uploads/favicon.png');?>">
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/backend/bootstrap/dist/css/bootstrap.min.css');?>" > -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <?php include 'include_frontend_top.php';?>
</head>
<style type="text/css">
	.panel-group .panel-heading {    
	    background:  #3498db;
	    border:#f1c40f;
	    color:black;
	}
	.panel-group .panel-heading a:hover {
	  color: white;
	}

</style>



<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <nav class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
    			<div class="col-lg-2 pr-4 align-items-center">
		    		<!-- <a class="navbar-brand" href="/">Dr.<span>care</span></a> -->
		    		<a href="<?php echo base_url()?>frontend"><img src="<?php echo base_url()?>uploads/favicon.png"></a>
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

   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
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
	</nav>


	 <section id="Home" class="home-slider owl-carousel">
	 	<?php foreach ($SliderContentSettings as $row): ?>
      <div class="slider-item" style="background-image:url(<?php echo base_url()?>uploads/frontend/<?php echo $row['slider_image'];?>);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 text ftco-animate">
            <h1 class="mb-4"><?php echo $row['tag_title']?> <span><?php echo $row['title']?></span></h1>
            <h3 class="subheading"><?php echo $row['short_description']?></h3>
          </div>
        </div>
        </div>
      </div>

      <!-- <div class="slider-item" style="background-image:url(<?php echo base_url()?>assets/frontend/images/bg_2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 text ftco-animate">
            <h1 class="mb-4">We Care <span>About Your Health</span></h1>
            <h3 class="subheading">Your Health is Our Top Priority with Comprehensive, Affordable medical.</h3>
          </div>
        </div>
        </div>
      </div> -->
  	<?php endforeach; ?>
    </section>

    <section class="ftco-services ftco-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<?php foreach ($PromoContentSettings as $row): ?>
				          <div class="col-md-3 d-flex services align-self-stretch p-4 ftco-animate">
				            <div class="media block-6 d-block text-center">
				              <div class="icon d-flex justify-content-center align-items-center">
				            		<span class="flaticon-doctor"></span>
				            		<!-- <span class="<?php echo $row['font_awesome_class']?>"></span> -->
				              </div>
				              <div class="media-body p-2 mt-3">
				                <h3 class="heading"><?php echo $row['promo_title']?></h3>
				                <p><?php echo $row['promo_description']?></p>
				              </div>
				            </div>      
				          </div>
				       <?php endforeach;?>		   
        		</div>
			</div>
	</section>

	<section id="About" class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url(<?php echo base_url()?>uploads/frontend/<?php echo $Qualification->image?>);">
					</div>
					<div class="col-md-7 wrap-about py-4 py-md-5 ftco-animate">
	          <div class="heading-section mb-5">
	          	<div class="pl-md-5 ml-md-5">
		          	<span class="subheading">About <?php echo get_user_info_by_id($userdata->user_id,'name');?></span>
		            <h2 class="mb-4" style="font-size: 28px;"><?php echo $Qualification->qualification_title?></h2>
	            </div>
	          </div>
	          <div class="pl-md-5 ml-md-5 mb-5">
							<p><?php echo $Qualification->description?></p>							
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-intro" style="background-image: url(<?php echo base_url()?>assets/frontend/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<h2>We Provide Free Health Care Consultation</h2>
						<p class="mb-0">Your Health is Our Top Priority with Comprehensive, Affordable medical.</p>
						<p></p>
					</div>
					<div class="col-md-3 d-flex align-items-center">
						<p class="mb-0"><a href="#" class="btn btn-secondary px-4 py-3">Free Consutation</a></p>
					</div>
				</div>
			</div>
		</section>

		

	<section id="Testmonial" class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
          	<span class="subheading">Testimonials</span>
            <h2 class="mb-4">Our Patients Says About Us</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-8">
            <div class="carousel-testimony owl-carousel">
            	<?php foreach ($TestimonialSettings as $row):?>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(<?php echo base_url()?>uploads/frontend/<?php echo $row['user_image']?>)">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p><?php echo $row['description']?></p>
                    <p class="name"><?php echo $row['user_name']?></p>
                    <!-- <span class="position">Farmer</span> -->
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    

    <section  class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="chambers" style="background-image: url(<?php echo base_url()?>assets/frontend/images/bg_3.jpg);" >
    	<div class="container" style="max-width: 1550px;">
    		<div class="row">
    			<div class="col-md-6 py-5 pr-md-5">
	          <div class="heading-section heading-section-white ftco-animate mb-5">
	          	<span class="subheading">Consultation</span>
	            <h2 class="mb-4">Free Consultation</h2>
	            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	          </div>
	          <form action="#" class="appointment-form ftco-animate">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" class="form-control" placeholder="First Name">
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Last Name">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		    					<div class="form-field">
          					<div class="select-wrap">
			                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
			                      <select name="" id="" class="form-control">
			                      	<option value="">Select Your chamber</option>
			                      	<?php foreach ($ChambersList as $row){ ?>
			                        <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>			                        
			                    	<?php }?>
			                      </select>
			                    </div>
		              		</div>
		    				</div>
	    					
	    					<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Phone">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-md-calendar"></span></div>
		            		<input type="text" class="form-control appointment_date" placeholder="Date">
	            		</div>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-ios-clock"></span></div>
		            		<input type="text" class="form-control appointment_time" placeholder="Time">
	            		</div>
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		              <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
		            </div>
		            <div class="form-group ml-md-4">
		              <input type="submit" value="Appointment" class="btn btn-secondary py-3 px-4">
		            </div>
	    				</div>
	    			</form>
    			</div>

    	 <?php $days = array(0 => 'sunday', 1 => 'monday', 2=>'tuesday', 3=> 'wednesday', 4=> 'thursday', 5=> 'friday', 6 =>'saturday'); ?>
       
    			<div class="col-lg-6 p-5 bg-counter aside-stretch">
						<h3 class="vr">About <?php echo get_user_info_by_id($userdata->user_id,'name'); ?> Facts</h3>
    			

		          <div class="panel-group" id="accordion">
		          	<?php foreach ($ChambersList as $row) {?>

		          		<?php 
    					$chamber_info = $this->db->get_where('chamber',array('chamber_id'=>$row['chamber_id']))->row();    							
    					$schedule = $chamber_info->schedule !='' ?((array)json_decode($chamber_info->schedule)):array();
    					?>
					    <div class="panel panel-default">
					      <div class="panel-heading">
					        <h4 class="panel-title">
					          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row['chamber_id'];?>"><?php echo $row['name'];?></a>
					        </h4>
					      </div>
					      <div id="collapse<?php echo $row['chamber_id'];?>" class="panel-collapse collapse in">
					        <div class="panel-body">
					        	<table class="table">
					        		<thead>
									    <tr>
									      <th scope="col">day</th>
									      <th scope="col">open/close</th>
									      <th scope="col">Morning</th>
									      <th scope="col">Afternoon</th>
									      <th scope="col">Evening</th>
									    </tr>
									</thead>
					        	<tbody>
					        	<?php foreach($days as $key => $day){ ?>
						        	<tr>                  
						                <td><?php echo get_phrase($day); ?></td>  						              	
						                <td><?php $open = (isset($schedule[$key]->status))? $schedule[$key]->status:'closed'; 
						                  echo $open; ?>
						                
						                <td>  <?php 
						                			$morning_open = (isset($schedule[$key]->morning_open))?$schedule[$key]->morning_open:'';
						                			$morning_close = (isset($schedule[$key]->morning_close))?$schedule[$key]->morning_close:'';
						                			echo $morning_open.' '.$morning_close;
						                		?>
						                </td>
						                <td>  
						                  <?php 
						                  		$afternoon_open = (isset($schedule[$key]->afternoon_open))?$schedule[$key]->afternoon_open:'';
						                  		$afternoon_close = (isset($schedule[$key]->afternoon_close))?$schedule[$key]->afternoon_close:'';
						                  		echo $afternoon_open.' '.$afternoon_close;
						                  ?>
						                </td>
						                <td>  
						                  <?php $evening_open = (isset($schedule[$key]->evening_open))?$schedule[$key]->evening_open:'';
						                  		$evening_close = (isset($schedule[$key]->evening_close))?$schedule[$key]->evening_close:'';
												echo $evening_open.' '.$evening_close;
						                  ?> 
						                </td>
						            </tr>    
					            <?php }?>	
					            </tbody>
					        </table>
					        </div>
					      </div>
					    </div>
					<?php } ?>
	          	</div>
          </div>
        </div>
    	</div>
    </section>

   

		<section id="blog" class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
		          <div class="col-md-8 text-center heading-section ftco-animate">
		          	<span class="subheading">Blog</span>
		            <h2 class="mb-4">Recent Blog</h2>
		            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
		          </div>
		        </div>
			<div class="row">

				<?php foreach ($BlogSettings as $row): ?>
		          <div class="col-md-4 ftco-animate">
		            <div class="blog-entry">
		              <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url()?>uploads/frontend/<?php echo $row['image']?>');">
						<div class="meta-date text-center p-2">
		                  <span class="day"><?php echo date('d', $row['timestamp'])?></span>
		                  <span class="mos"><?php echo date('M', $row['timestamp'])?></span>
		                  <span class="yr"><?php echo date('y', $row['timestamp'])?></span>
		                </div>
		              </a>	
		              <div class="text bg-white p-4">
		                <h3 class="heading"><a href="#"><?php echo $row['title']; ?></a></h3>
		                <p><?php echo $row['description']; ?></p>
		                <div class="d-flex align-items-center mt-4">
			                <p class="mb-0"><a href="<?php echo base_url().'doctor/blog_detail/'.$row["blog_id"]?>" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>			               
		                </div>
		              </div>
		            </div>
		          </div>
		      	<?php endforeach; ?>
          
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
                <li><a href="#Home"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="#About"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                <li><a href="#Testmonial"><span class="ion-ios-arrow-round-forward mr-2"></span>Testmonial</a></li>
                <li><a href="#chambers"><span class="ion-ios-arrow-round-forward mr-2"></span>chambers</a></li>
                <li><a href="#contact"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
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


<?php include 'include_frontend_bottom.php';?>
</body>

</html>
