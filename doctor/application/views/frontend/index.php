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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0061)https://domainedelabourdonnais.com/en/history-process-vergers -->
<html xmlns="http://www.w3.org/1999/xhtml" class="js js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" style=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
<link rel="shortcut icon" href="https://domainedelabourdonnais.com/misc/favicon.ico" type="image/vnd.microsoft.icon">
<meta name="generator" content="Drupal 7 (http://drupal.org)">
<link rel="canonical" href="https://domainedelabourdonnais.com/en/history-process-vergers">
<link rel="shortlink" href="https://domainedelabourdonnais.com/en/node/142">
		<title>History &amp; Process | Domaine de Labourdonnais</title>
		<style type="text/css" media="all">
@import url("https://domainedelabourdonnais.com/modules/system/system.base.css?pfaev5");
@import url("https://domainedelabourdonnais.com/modules/system/system.menus.css?pfaev5");
@import url("https://domainedelabourdonnais.com/modules/system/system.messages.css?pfaev5");
@import url("https://domainedelabourdonnais.com/modules/system/system.theme.css?pfaev5");
</style>
<style type="text/css" media="all">
@import url("https://domainedelabourdonnais.com/modules/field/theme/field.css?pfaev5");
@import url("https://domainedelabourdonnais.com/modules/node/node.css?pfaev5");
@import url("https://domainedelabourdonnais.com/modules/user/user.css?pfaev5");
@import url("https://domainedelabourdonnais.com/sites/all/modules/youtube/css/youtube.css?pfaev5");
@import url("https://domainedelabourdonnais.com/sites/all/modules/views/css/views.css?pfaev5");
</style>
<style type="text/css" media="all">
@import url("https://domainedelabourdonnais.com/sites/all/modules/ctools/css/ctools.css?pfaev5");
@import url("https://domainedelabourdonnais.com/sites/all/modules/lightbox2/css/lightbox.css?pfaev5");
@import url("https://domainedelabourdonnais.com/modules/locale/locale.css?pfaev5");
</style>
<style type="text/css" media="all">
@import url("https://domainedelabourdonnais.com/sites/all/themes/chateau/css/style.css?pfaev5");
</style>
		<script type="text/javascript" async="" src="./doctor_files/ga.js.download"></script><script type="text/javascript" src="./doctor_files/jquery.min.js.download"></script>
<script type="text/javascript" src="./doctor_files/jquery.once.js.download"></script>
<script type="text/javascript" src="./doctor_files/drupal.js.download"></script>
<script type="text/javascript" src="./doctor_files/modernizr.js.download"></script>
<script type="text/javascript" src="./doctor_files/jquery.flexslider-min.js.download"></script>
<script type="text/javascript" src="./doctor_files/cchateau.js.download"></script>
<script type="text/javascript" src="./doctor_files/lightbox.js.download"></script>
<script type="text/javascript" src="./doctor_files/bigscreen.js.download"></script>
<script type="text/javascript" src="./doctor_files/mytheme.js.download"></script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
jQuery.extend(Drupal.settings, {"basePath":"\/","pathPrefix":"en\/","ajaxPageState":{"theme":"chateau","theme_token":"GVrujuWWEInZTf3Q3PgIPpfKaqdCVCwKJ9eNB7eMIhE","js":{"sites\/all\/modules\/jquery_update\/replace\/jquery\/1.10\/jquery.min.js":1,"misc\/jquery.once.js":1,"misc\/drupal.js":1,"sites\/all\/themes\/chateau\/js\/modernizr.js":1,"sites\/all\/themes\/chateau\/js\/jquery.flexslider-min.js":1,"sites\/all\/modules\/customchateau\/chateau\/cchateau.js":1,"sites\/all\/modules\/lightbox2\/js\/lightbox.js":1,"sites\/all\/themes\/chateau\/js\/bigscreen.js":1,"sites\/all\/themes\/chateau\/js\/mytheme.js":1},"css":{"modules\/system\/system.base.css":1,"modules\/system\/system.menus.css":1,"modules\/system\/system.messages.css":1,"modules\/system\/system.theme.css":1,"modules\/field\/theme\/field.css":1,"modules\/node\/node.css":1,"modules\/user\/user.css":1,"sites\/all\/modules\/youtube\/css\/youtube.css":1,"sites\/all\/modules\/views\/css\/views.css":1,"sites\/all\/modules\/ctools\/css\/ctools.css":1,"sites\/all\/modules\/lightbox2\/css\/lightbox.css":1,"modules\/locale\/locale.css":1,"sites\/all\/themes\/chateau\/css\/style.css":1}},"lightbox2":{"rtl":"0","file_path":"\/(\\w\\w\/)public:\/","default_image":"\/sites\/all\/modules\/lightbox2\/images\/brokenimage.jpg","border_size":10,"font_color":"000","box_color":"fff","top_position":"","overlay_opacity":"0.8","overlay_color":"000","disable_close_click":true,"resize_sequence":0,"resize_speed":400,"fade_in_speed":400,"slide_down_speed":600,"use_alt_layout":false,"disable_resize":false,"disable_zoom":false,"force_show_nav":false,"show_caption":true,"loop_items":false,"node_link_text":"View Image Details","node_link_target":false,"image_count":"Image !current of !total","video_count":"Video !current of !total","page_count":"Page !current of !total","lite_press_x_close":"press \u003Ca href=\u0022#\u0022 onclick=\u0022hideLightbox(); return FALSE;\u0022\u003E\u003Ckbd\u003Ex\u003C\/kbd\u003E\u003C\/a\u003E to close","download_link_text":"","enable_login":false,"enable_contact":false,"keys_close":"c x 27","keys_previous":"p 37","keys_next":"n 39","keys_zoom":"z","keys_play_pause":"32","display_image_size":"original","image_node_sizes":"()","trigger_lightbox_classes":"","trigger_lightbox_group_classes":"","trigger_slideshow_classes":"","trigger_lightframe_classes":"","trigger_lightframe_group_classes":"","custom_class_handler":0,"custom_trigger_classes":"","disable_for_gallery_lists":true,"disable_for_acidfree_gallery_lists":true,"enable_acidfree_videos":true,"slideshow_interval":5000,"slideshow_automatic_start":true,"slideshow_automatic_exit":true,"show_play_pause":true,"pause_on_next_click":false,"pause_on_previous_click":true,"loop_slides":false,"iframe_width":853,"iframe_height":480,"iframe_border":1,"enable_video":false}});
//--><!]]>
</script>
<style>
.block-displays{ position: relative; background: #FFFFFF; z-index: 990; }
body.effects .block-chateau-left h3{ min-height: 41px; }
body.effects .distillery-inner-text h3 span,
body.effects .breeding-block-right h3 span,
body.effects .block-orchard h3 span,
body.effects .block-chateau-left h3 span{ margin-left: -120px; opacity: 0; }
body.effects .block-orchard .text-desc,
body.effects .distillery-inner-text .text-desc,
body.effects .breeding-block-right .text-desc,
body.effects .block-chateau-left .text-desc{ margin-left: -200px; opacity: 0; }
body.effects .wedding-event-inner .region-vignette1{ margin-left: -167px; opacity: 0; }
body.effects .wedding-event-inner .region-vignette2{ margin-right: -167px; opacity: 0; }

body.effects .block-party-diner-bottom .text-desc,
body.effects .block-party-diner .block-party-diner-inner .text-desc,
body.effects .block-possibilities .text-desc,
body.effects .block-wedding-inner .text-desc{ margin-left: -167px; opacity: 0; }

body.effects .block-party-diner-bottom h3 span,
body.effects .block-party-diner .block-party-diner-inner h3 span,
body.effects .block-possibilities h3 span{ margin-left: -120px; opacity: 0; }

.breeding-block-right{ overflow: hidden; }
/*.menu{ position: relative; }*/
</style>

 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22654848-1']);
  _gaq.push(['_setCustomVar', 1, 'Page creation time and ram', '19', 3]);
  _gaq.push(['_setCustomVar', 2, 'Logged-in user', 'anonymous', 3]);
  
  
  
  _gaq.push(['_trackPageview']);
  
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

	</head>
	<body class="html not-front not-logged-in no-sidebars page-node page-node- page-node-142 node-type-event i18n-en role-anonymous-user with-subnav page-history-process-vergers section-history-process-vergers device-desktop lightbox-processed effects" style="zoom: 1;">
				<div id="mainContainer">
    <div class="header">
        <div class="menu-mob">
            <div class="menu-icon clearfix">
				<a href="https://domainedelabourdonnais.com/en"><img src="./doctor_files/logo-vergers.png" class="logoMob"></a>
				<a class="mn" href="https://domainedelabourdonnais.com/en"><img src="./doctor_files/menu-mob.png" class="imgMenuMob"></a>
				
    <div id="block-menu-menu-chateaumenu" class="block block-menu block-odd first last clearfix">
	<div class="block-inner2 clearfix">
							
		<div class="content">
			<ul class="clearfix"><li class="bk"><a href="https://domainedelabourdonnais.com/en/history-process-vergers#">&lt; Back</a></li><li class="first leaf home mid-753"><a href="https://domainedelabourdonnais.com/en" title="">Home</a></li>
<li class="expanded leisure-events mid-971"><a href="https://domainedelabourdonnais.com/en/node/106" title="">Leisure &amp; Events</a><span class="plus">+</span><div class="sub-menu-block"><ul class="clearfix"><li class="bk"><a href="https://domainedelabourdonnais.com/en/history-process-vergers#">&lt; Back</a></li><li class="first leaf the-ch-teau mid-970"><a href="https://domainedelabourdonnais.com/en/the-chateau">The Château</a></li>
<li class="leaf event-planning mid-653"><a href="https://domainedelabourdonnais.com/en/event-planning">Event Planning</a></li>
<li class="leaf conference mid-719"><a href="https://domainedelabourdonnais.com/en/conference-room" title="A contemporary and comfortable room awaits visitors who can watch a film on the château’s restoration with testimonials...">Conference</a></li>
<li class="leaf la-terrasse-la-corbeille mid-721"><a href="https://domainedelabourdonnais.com/en/la-terrasse">La Terrasse &amp; La Corbeille</a></li>
<li class="leaf labourdonnais-express mid-973"><a href="https://domainedelabourdonnais.com/en/labourdonnais-express">Labourdonnais Express</a></li>
<li class="leaf practical-infos mid-974"><a href="https://domainedelabourdonnais.com/en/opening-times-admission">Practical Infos</a></li>
<li class="last leaf gallery mid-975"><a href="https://domainedelabourdonnais.com/en/gallery">Gallery</a></li>
</ul></div></li>
<li class="expanded active-trail food-processing mid-652"><a href="https://domainedelabourdonnais.com/en/history-process-vergers" class="active-trail active">Food processing</a><span class="plus">+</span><div class="sub-menu-block"><ul class="clearfix"><li class="bk"><a href="https://domainedelabourdonnais.com/en/history-process-vergers#">&lt; Back</a></li><li class="first leaf active-trail history-process mid-980"><a href="https://domainedelabourdonnais.com/en/history-process-vergers" class="active-trail active">History &amp; Process</a></li>
<li class="last leaf products mid-934"><a href="https://domainedelabourdonnais.com/en/products-vergers">Products</a></li>
</ul></div></li>
<li class="expanded distillerie mid-714"><a href="https://domainedelabourdonnais.com/en/history-process-distillerie">Distillerie</a><span class="plus">+</span><div class="sub-menu-block"><ul class="clearfix"><li class="bk"><a href="https://domainedelabourdonnais.com/en/history-process-vergers#">&lt; Back</a></li><li class="first leaf history-process mid-981"><a href="https://domainedelabourdonnais.com/en/history-process-distillerie">History &amp; Process</a></li>
<li class="last leaf products mid-923"><a href="https://domainedelabourdonnais.com/en/products-distillerie">Products</a></li>
</ul></div></li>
<li class="expanded p-pini-re mid-924"><a href="https://domainedelabourdonnais.com/en/history-process-pepiniere">Pépinière</a><span class="plus">+</span><div class="sub-menu-block"><ul class="clearfix"><li class="bk"><a href="https://domainedelabourdonnais.com/en/history-process-vergers#">&lt; Back</a></li><li class="first leaf history-process mid-984"><a href="https://domainedelabourdonnais.com/en/history-process-pepiniere">History &amp; Process</a></li>
<li class="leaf products mid-941"><a href="https://domainedelabourdonnais.com/en/products-pepiniere">Products</a></li>
<li class="last leaf garden-accessories mid-978"><a href="https://domainedelabourdonnais.com/en/garden-accessories">Garden accessories</a></li>
</ul></div></li>
<li class="leaf news mid-987"><a href="https://domainedelabourdonnais.com/en/news" title="">News</a></li>
<li class="last leaf contact-us mid-703"><a href="https://domainedelabourdonnais.com/en/contact-us?dept=1">Contact Us</a></li>
</ul>		</div>
	</div>
</div> <!-- /block-inner /block -->
            </div>
        </div>
        <nav class="menu">
			<a class="navlogo" title="Home" href="https://domainedelabourdonnais.com/en">
				<span class="valign-it"></span>
				<img alt="logo" src="./doctor_files/logo-vergers.png">
			</a>
            
    
    <div id="block-menu-menu-chateaumenu" class="block block-menu block-odd first last clearfix">
	<div class="block-inner2 clearfix">
							
		<div class="content">
			<ul class="clearfix"><li class="bk"><a href="https://domainedelabourdonnais.com/en/history-process-vergers#">&lt; Back</a></li><li class="first leaf home mid-753"><a href="https://domainedelabourdonnais.com/en" title="">Home</a></li>
<li class="expanded leisure-events mid-971"><a href="https://domainedelabourdonnais.com/en/node/106" title="">Leisure &amp; Events</a><span class="plus">+</span><div class="sub-menu-block"><ul class="clearfix"><li class="bk"><a href="https://domainedelabourdonnais.com/en/history-process-vergers#">&lt; Back</a></li><li class="first leaf the-ch-teau mid-970"><a href="https://domainedelabourdonnais.com/en/the-chateau">The Château</a></li>
<li class="leaf event-planning mid-653"><a href="https://domainedelabourdonnais.com/en/event-planning">Event Planning</a></li>
<li class="leaf conference mid-719"><a href="https://domainedelabourdonnais.com/en/conference-room" title="A contemporary and comfortable room awaits visitors who can watch a film on the château’s restoration with testimonials...">Conference</a></li>
<li class="leaf la-terrasse-la-corbeille mid-721"><a href="https://domainedelabourdonnais.com/en/la-terrasse">La Terrasse &amp; La Corbeille</a></li>
<li class="leaf labourdonnais-express mid-973"><a href="https://domainedelabourdonnais.com/en/labourdonnais-express">Labourdonnais Express</a></li>
<li class="leaf practical-infos mid-974"><a href="https://domainedelabourdonnais.com/en/opening-times-admission">Practical Infos</a></li>
<li class="last leaf gallery mid-975"><a href="https://domainedelabourdonnais.com/en/gallery">Gallery</a></li>
</ul></div></li>
<li class="expanded active-trail food-processing mid-652"><a href="https://domainedelabourdonnais.com/en/history-process-vergers" class="active-trail active">Food processing</a><span class="plus">+</span><div class="sub-menu-block"><ul class="clearfix"><li class="bk"><a href="https://domainedelabourdonnais.com/en/history-process-vergers#">&lt; Back</a></li><li class="first leaf active-trail history-process mid-980"><a href="https://domainedelabourdonnais.com/en/history-process-vergers" class="active-trail active">History &amp; Process</a></li>
<li class="last leaf products mid-934"><a href="https://domainedelabourdonnais.com/en/products-vergers">Products</a></li>
</ul></div></li>
<li class="expanded distillerie mid-714"><a href="https://domainedelabourdonnais.com/en/history-process-distillerie">Distillerie</a><span class="plus">+</span><div class="sub-menu-block"><ul class="clearfix"><li class="bk"><a href="https://domainedelabourdonnais.com/en/history-process-vergers#">&lt; Back</a></li><li class="first leaf history-process mid-981"><a href="https://domainedelabourdonnais.com/en/history-process-distillerie">History &amp; Process</a></li>
<li class="last leaf products mid-923"><a href="https://domainedelabourdonnais.com/en/products-distillerie">Products</a></li>
</ul></div></li>
<li class="expanded p-pini-re mid-924"><a href="https://domainedelabourdonnais.com/en/history-process-pepiniere">Pépinière</a><span class="plus">+</span><div class="sub-menu-block"><ul class="clearfix"><li class="bk"><a href="https://domainedelabourdonnais.com/en/history-process-vergers#">&lt; Back</a></li><li class="first leaf history-process mid-984"><a href="https://domainedelabourdonnais.com/en/history-process-pepiniere">History &amp; Process</a></li>
<li class="leaf products mid-941"><a href="https://domainedelabourdonnais.com/en/products-pepiniere">Products</a></li>
<li class="last leaf garden-accessories mid-978"><a href="https://domainedelabourdonnais.com/en/garden-accessories">Garden accessories</a></li>
</ul></div></li>
<li class="leaf news mid-987"><a href="https://domainedelabourdonnais.com/en/news" title="">News</a></li>
<li class="last leaf contact-us mid-703"><a href="https://domainedelabourdonnais.com/en/contact-us?dept=1">Contact Us</a></li>
</ul>		</div>
	</div>
</div> <!-- /block-inner /block -->

        </nav>
    </div>
	<div class="mob-over"></div>
    <div id="content-wrap">
		<div id="content">
			<div class="tabs"></div>			<div class="region region-content">
    <div id="block-system-main" class="block block-system block-odd first last clearfix">
	<div class="block-inner2 clearfix">
							
		<div class="content">
			<article id="node-142" class="node node-event node-odd">
<div class="slideshowcontent">
        <div class="block-slideshow slideevent" style="height: 764px;">
        <ul class="slides">
			            <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
                <img class="imgslde" typeof="foaf:Image" src="./doctor_files/homepage-vergers-labourdonnais.jpg" width="1600" height="825" alt="" draggable="false">				<a class="slidelogo" title="Home" href="https://domainedelabourdonnais.com/en"><img alt="logo" src="./doctor_files/logo-vergers.png" draggable="false"></a>
				<div class="block-text">
					<h1><strong>Creating memorable authentic experiences</strong></h1>					<ul>
						<li class="info"></li>
						
											</ul>
				</div>
			</li>
                        <li style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;" class="">
                <img class="imgslde" typeof="foaf:Image" src="./doctor_files/vergers-labourdonnais-pineapple-process.jpg" width="1600" height="825" alt="" draggable="false">				<a class="slidelogo" title="Home" href="https://domainedelabourdonnais.com/en"><img alt="logo" src="./doctor_files/logo-vergers.png" draggable="false"></a>
				<div class="block-text">
					<h1><strong>Creating memorable authentic experiences</strong></h1>					<ul>
						<li class="info"></li>
						
											</ul>
				</div>
			</li>
                        <li style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;" class="">
                <img class="imgslde" typeof="foaf:Image" src="./doctor_files/vergers-labourdonnais-candies-process_0.jpg" width="1600" height="825" alt="" draggable="false">				<a class="slidelogo" title="Home" href="https://domainedelabourdonnais.com/en"><img alt="logo" src="./doctor_files/logo-vergers.png" draggable="false"></a>
				<div class="block-text">
					<h1><strong>Creating memorable authentic experiences</strong></h1>					<ul>
						<li class="info"></li>
						
											</ul>
				</div>
			</li>
                        <li style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;" class="">
                <img class="imgslde" typeof="foaf:Image" src="./doctor_files/vergers-labourdonnais-honey-process.jpg" width="1600" height="825" alt="" draggable="false">				<a class="slidelogo" title="Home" href="https://domainedelabourdonnais.com/en"><img alt="logo" src="./doctor_files/logo-vergers.png" draggable="false"></a>
				<div class="block-text">
					<h1><strong>Creating memorable authentic experiences</strong></h1>					<ul>
						<li class="info"></li>
						
											</ul>
				</div>
			</li>
                    </ul>
    </div>
    </div>


<div class="block-displays" style="margin-top: -540.625px;">
	<blockquote class="slogan">Creating memorable authentic experiences</blockquote>
	
<div id="block-el-4" class="block-event display-right el-4" style="">
	<div class="block-event-inner clearfix">
	
		<div class="block-event-txt">
							<h3 style=""><span> Book Appointment</span></h3>
			
							
							
			<!-- <div class="text-desc">
				<p style="text-align: justify;">In 1995 the Domaine de Labourdonnais embarked in a new adventure and started processing fruits from its orchards. Production took place in a small back yard shed, a few dozens of kilos of fruits were processed into jams and fruit pastes/candies using authentic family recipes. This “savoir faire” acquired years ago is still applied in a modern factory built in 2007. Our cooking methods retains all the benefits of the fruits without altering its natural colour and taste.</p><p style="text-align: justify;">A wide variety of products with different flavours such as jams, fruit pastes/candies, marmalades, fresh juices, fresh chili paste and sorbets under strict HACCP norms are available.</p><p style="text-align: justify;">Today, <em>Les Vergers de Labourdonnais</em> is established as a nationwide renowned brand. With more than 60 dedicated employees involved in this activity we supply most of the hotels in Mauritius. The products are also found in supermarkets and shops across the island. <em>Les Vergers de Labourdonnais</em> was awarded the “<strong>Blue Ribbon</strong>”, the “<strong>Innovators Award</strong>’’ and the ‘’<strong>Africa SME Award</strong>‘’ on the overall fruit processing plant. Impeccable quality is a vital part of every stage in our products’ journey.</p><p style="text-align: justify;">We put much emphasis and love in sourcing raw ingredients to ensure an authentic treat! Our dedicated Research and Development team is constantly working on innovative recipes and concept. We aspire to provide an endless authentic fruitful experience.</p><p style="text-align: justify;"><img src="./doctor_files/logos-chateau-group.png" width="400" height="110"></p>							</div> -->
		</div>
		
				
				<!-- <div class="block-event-img">
			<div class="top-img"><a href="./doctor_files/verger-factory-process.jpg" rel="lightbox[&#39;gallery-1&#39;][]" class="lightbox-processed"><img class="imgevent" typeof="foaf:Image" src="./doctor_files/verger-factory-process.jpg" width="700" height="467" alt=""></a></div>
			<div class="gall-inner"><ul><li class="gall-link gall-odd"><a href="https://domainedelabourdonnais.com/sites/default/files/blocks/verger-factory.jpg" rel="lightbox[&#39;gallery-1&#39;][]" class="lightbox-processed"><img class="gallery-image" typeof="foaf:Image" src="./doctor_files/verger-factory.jpg" width="400" height="267" alt=""></a></li><li class="gall-link gall-even"><a href="https://domainedelabourdonnais.com/sites/default/files/blocks/verger-tree-02.jpg" rel="lightbox[&#39;gallery-1&#39;][]" class="lightbox-processed"><img class="gallery-image" typeof="foaf:Image" src="./doctor_files/verger-tree-02.jpg" width="400" height="267" alt=""></a></li><li class="gall-link gall-odd"><a href="https://domainedelabourdonnais.com/sites/default/files/blocks/verger-juice-preparaion.jpg" rel="lightbox[&#39;gallery-1&#39;][]" class="lightbox-processed"><img class="gallery-image" typeof="foaf:Image" src="./doctor_files/verger-juice-preparaion.jpg" width="400" height="267" alt=""></a></li><li class="gall-link gall-even"><a href="https://domainedelabourdonnais.com/sites/default/files/blocks/verger-tree-01.jpg" rel="lightbox[&#39;gallery-1&#39;][]" class="lightbox-processed"><img class="gallery-image" typeof="foaf:Image" src="./doctor_files/verger-tree-01.jpg" width="400" height="267" alt=""></a></li></ul></div>		</div>
			</div> -->
	
	</div>
</div>
<div class="wedding-event"><div class="wedding-event-inner">
<div class="region-vignette1" style="opacity: 1.00684; margin-left: 0px;">
	<div class="vignetta content-left">
		<img title="Event planning" src="./doctor_files/0.png">
		<h2>Event planning</h2>
		<div class="text-desc">
			<a href="https://domainedelabourdonnais.com/en/event-planning">The Château de Labourdonnais offers tailored event planning to ensure your event happens just the way you want it to.</a>		</div>
	   <a href="https://domainedelabourdonnais.com/en/event-planning">READ MORE</a>	</div>
</div>
<div class="region-vignette2" style="opacity: 1.00684; margin-right: 0px;">
	<div class="vignetta content-left">
		<img title="Video" src="./doctor_files/1.png">
		<h2>Video</h2>
		<div class="text-desc">
			<a href="https://www.youtube.com/embed/jk4-VyfGARg?autoplay=1&amp;rel=0" rel="lightframe[|width:853px; height:480px;]" class="lightbox-processed">Enjoy a visit of "a château in a natural setting" where the history is beautifully merged with architecture, flora, orchards, cuisine and Mauritian expertise.</a>		</div>
	   <a href="https://www.youtube.com/embed/jk4-VyfGARg?autoplay=1&amp;rel=0" rel="lightframe[|width:853px; height:480px;]" class="lightbox-processed">TAKE A TOUR</a>	</div>
</div>
</div></div>
</article><!-- /article #node -->		</div>
	</div>
</div> <!-- /block-inner /block --></div>		</div>
	</div>
</div>

<div class="breadcrumbs">
	<div class="breadcrumb-inner">
		<p>You are here: </p><div class="breadcrumb"><a href="https://domainedelabourdonnais.com/en">Home</a><a href="https://domainedelabourdonnais.com/en/history-process-vergers" class="active">Food processing</a>History &amp; Process</div>	</div>
</div>

<div class="footer">
	<div class="contentTop">
		<div class="inner">
			<div class="region region-footer-contact">
    <div id="block-block-7" class="block block-block block-odd first last clearfix">
	<div class="block-inner2 clearfix">
							
		<div class="content">
			<p style="text-align: center;"><a href="https://www.facebook.com/domainedelabourdonnais/" target="_blank"><img src="./doctor_files/logo-facebook.png" alt="Facebook" title="Facebook" style="margin-right: 20px;" onmouseover="this.src=&#39;/sites/default/files/images/logo-facebook-hover.png&#39;;" onmouseout="this.src=&#39;/sites/default/files/images/logo-facebook.png&#39;;"></a> <a href="http://www.tripadvisor.com/Attraction_Review-g3331628-d2647572-Reviews-Chateau_De_Labourdonnais-Mapou.html" target="_blank"> <img src="./doctor_files/logo-tripadvisor.png" alt="TripAdvisor" title="TripAdvisor" style="margin-right: 20px;" onmouseover="this.src=&#39;/sites/default/files/images/logo-tripadvisor-hover.png&#39;;" onmouseout="this.src=&#39;/sites/default/files/images/logo-tripadvisor.png&#39;;"></a><img src="./doctor_files/logo-youtube.png" alt="YouTube" title="YouTube" style="margin-right: 20px;"><a href="https://twitter.com/Labourdonnais_" target="_blank"><img src="./doctor_files/logo-twitter.png" alt="Twitter" title="Twitter" style="margin-right: 20px;" onmouseover="this.src=&#39;/sites/default/files/images/logo-twitter-hover.png&#39;;" onmouseout="this.src=&#39;/sites/default/files/images/logo-twitter.png&#39;;"></a><a href="https://www.petitfute.com/" target="_blank"><img src="./doctor_files/logo-petit-fute.png" alt="Petit Futé" title="Petit Futé"></a></p>
<p style="text-align: center;"><span style="font-size: 14px;">Domaine de Labourdonnais, Mapou, Mauritius</span></p>
		</div>
	</div>
</div> <!-- /block-inner /block --></div>		</div>
	</div>
	<div class="contentBottom">
		<div class="inner">
			<div class="lang">
				<div class="region region-langswitch">
    <div id="block-locale-language" class="block block-locale block-odd first last clearfix">
	<div class="block-inner2 clearfix">
							
		<div class="content">
			<ul class="language-switcher-locale-url"><li class="en first active"><a href="https://domainedelabourdonnais.com/en/history-process-vergers" class="language-link active" xml:lang="en" title="History &amp; Process">English</a></li>
<li class="fr last"><a href="https://domainedelabourdonnais.com/fr/historique-vergers" class="language-link" xml:lang="fr" title="Historique">Français</a></li>
</ul>		</div>
	</div>
</div> <!-- /block-inner /block --></div>			</div>
			<div class="copyright">
				Copyright 2020. Domaine de Labourdonnais Powered by <a href="http://www.web-companies.com/" target="_blank">WEB Companies</a>			</div>
		</div>
	</div>
</div>			
<div id="lightbox2-overlay" style="display: none;"></div>      <div id="lightbox" style="display: none;" class="lightbox2-orig-layout">        <div id="outerImageContainer" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"><div id="modalContainer" style="display: none; padding: 10px;"></div><div id="frameContainer" style="display: none; padding: 10px;"></div><div id="imageContainer" style="display: none; padding: 10px;"><img id="lightboxImage" alt=""><div id="hoverNav"><a id="prevLink" title="Previous" href="https://domainedelabourdonnais.com/en/history-process-vergers#" style="padding-top: 10px;"></a><a id="nextLink" title="Next" href="https://domainedelabourdonnais.com/en/history-process-vergers#" style="padding-top: 10px;"></a></div></div><div id="loading"><a href="https://domainedelabourdonnais.com/en/history-process-vergers#" id="loadingLink"></a></div></div>        <div id="imageDataContainer" class="clearfix" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);">          <div id="imageData"><div id="imageDetails"><span id="caption"></span><span id="numberDisplay"></span></div><div id="bottomNav"><div id="frameHoverNav"><a id="framePrevLink" title="Previous" href="https://domainedelabourdonnais.com/en/history-process-vergers#" style="padding-top: 10px;"></a><a id="frameNextLink" title="Next" href="https://domainedelabourdonnais.com/en/history-process-vergers#" style="padding-top: 10px;"></a></div><a id="bottomNavClose" title="Close" href="https://domainedelabourdonnais.com/en/history-process-vergers#" style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"></a><a id="bottomNavZoom" href="https://domainedelabourdonnais.com/en/history-process-vergers#"></a><a id="bottomNavZoomOut" href="https://domainedelabourdonnais.com/en/history-process-vergers#"></a><a id="lightshowPause" title="Pause Slideshow" href="https://domainedelabourdonnais.com/en/history-process-vergers#" style="display: none;"></a><a id="lightshowPlay" title="Play Slideshow" href="https://domainedelabourdonnais.com/en/history-process-vergers#" style="display: none;"></a></div></div>        </div>      </div></body></html>