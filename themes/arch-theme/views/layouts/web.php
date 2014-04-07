<!doctype html>
<html lang="en">
<head>
    <title><?php echo $CI->_page_title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- <link href='http://fonts.googleapis.com/css?family=Fauna+One|Quando|Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'> -->
    <link type="image/x-icon" href="<?php echo theme_url('favicon.ico') ?>" rel="Shortcut icon" />
    <link href="<?php echo theme_url('js/code-prettify/prettify.css') ?>" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo theme_url('css/bootstrap.css') ?>" rel="stylesheet" media="screen" />
    <link href="<?php echo theme_url('css/bootstrap-responsive.min.css') ?>" rel="stylesheet" media="screen" />
    <link href="<?php echo theme_url('css/web.css') ?>" rel="stylesheet" media="screen" />

    <script type="text/javascript" src="<?php echo theme_url('js/jquery-1.8.2.min.js') ?>"></script>
    <script type='text/javascript' src="<?php echo theme_url('js/code-prettify/prettify.js') ?>"></script>
    <script type="text/javascript" src="<?php echo theme_url('js/bootstrap.js') ?>"></script>
	

</head>
<body>
	<div id="headermenu">
		<div id='header-wrapper'>
			<div class='header section' id='header'>
				<div class='widget Header' id='Header1'>
					<div id='header-inner'>
						<div class='titlewrapper'>
							<h1 class='title pull-left'>
								<img src="<?php echo theme_url() ?>img/xinix.png">
								<a href='<?php echo site_url()?>'>XINIX-MOVIE</a>
							</h1>
							<div class="pull-right" id="menu-phone">
								<a ><img src="<?php echo theme_url() ?>img/menu-icon.png" alt=""></a>
							</div>
						</div>
						<div class="descriptionwrapper">
							<p class="description"><span></span></p>
						</div>
					</div>
				</div>
			</div>
			<div id='nav-wrapper'>
				<div id='nav'>
					<div class='page section' id='page'>
						<div class='widget PageList' id='PageList1'>
							<div class='widget-content'>
								<ul>
									<li><a href='<?php echo site_url()?>'><?php echo l('Home') ?></a></li>
									<li><a href='<?php echo site_url('web/category')?>'><?php echo l('Category') ?></a></li>
									<li><a href='<?php echo site_url('web/privacy')?>'>Privacy Policy</a></li>
									<li><a href='<?php echo site_url('web/request_movie')?>'>Request Film</a></li>
									<?php $USER = $CI->auth->get_user() ?>
									<?php if($USER['is_login']) : ?>
									<li><a href='<?php echo site_url('user/logout')?>'>Logout</a></li>
									<li><a href='<?php echo site_url('web/detail_user'.'/'.$USER['id'])?>'><span style="color: #02ADD8;"><?php echo $USER['username'] ?></span></a></li>
									<?php else : ?>
									<li><a href='<?php echo site_url('user/login')?>'>Login</a></li>
									<?php endif ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <section id="<?php echo empty($uri) ? 'body':'content-body'?>">
		<?php $uri = $this->uri->segment(1);?>
        <?php echo xview_error() ?>
        <?php echo xview_info() ?>
        <?php echo $this->load->view($CI->_view, $CI->_data, true) ?>

    </section>
	<div id="headermenu1">
		<div class="creditwrap">
			<div class="credit">
				<div style="float:left;text-align:left;">
					Copyright © 2014. <a class="sitename" href="<?php echo site_url()?>" title="XINIX-MOVIE">XINIX-MOVIE</a> - All Rights Reserved
				</div>
				<div style="float:left;text-align:center;">
					&nbsp;&nbsp;|<a class="sitename" href="<?php echo site_url('site/index')?>">&nbsp;&nbsp;Dashboard</a>
				</div>
				<div style="float:right;text-align:right;"> 
					Proudly powered by <a href="http://xinix.co.id">Xinix Technology</a>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	$(function(){
		$('#menu-phone').on('click', function(){
			$('#nav-wrapper').toggle(200);
		});
	});
</script>
</html>