<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

run_event('pre_head');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/head.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<header id="header">
		<div class="nav_menu top_menu">
			<span></span>
			<div class="nav_menu_inner">
				<div class="container_1">
					<p>B2B/B2C Dual Platform</p>
				</div>
				<div class="container_2">
					<div class="logo">
						<h1><a href="http://tobplatform.com/g5/" target="_self" class="top_logo"></a></h1>
					</div>
					
				</div>
				<div class="container_3">
					<a class="nav_btn" >
						<span></span><span></span><span></span>
					</a>
					<div class="pm2_wrap">
						<div id="pm2" class="basic">
							<ul class="dep1">
								<li>
									<a href="#" target="_self">home</a>
								</li>
								<li>
									<a href="#" target="_self">about</a>
								</li>
								<li>
									<a href="#" target="_self">wedding</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div id="nav_mobile" style="right: -100%;">
			<div class="nav_wrap">
				<div class="nav_top_menu">
					<a class="logo"></a>
					<a class="close_btn"></a>
				</div>
				<div class="pm2m">
					<ul class="dep1">
						<li data-role="toggle">
							<a href="#" target="_self">home</a>
						</li>
						<li data-role="toggle">
							<a href="#" target="_self">about</a>
						</li>
						<li data-role="toggle">
							<a href="#" target="_self">wedding</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>