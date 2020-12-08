<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/tail.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/tail.php');
    return;
}
?>
	<footer>
		<div>
			<div class="top">
				<div class="left">
					<ul>
						<li><a href="">home</a></li>
						<li><a href="">about</a></li>
						<li><a href="">wedding</a></li>
					</ul>
					<p class="center">customer cente</p>
					<p class="call">000-000-000</p>
					<p class="add">[123, Dosan-daero, Gangnam-gu, Seoul, Republic of Korea]</p>
					<p class="weekday">weekday  11:00 ~ 13:00  /  17:00 ~ 19:00<br>weekend  9:30 ~ 19:00</p>
				</div>
				<div class="right">
					<a href="">to B inc</a>
				</div>
			</div>

			<div class="bottom">
				<p class="copyright">Copyright ⓒ to B.inc All Rights Reserved.</p>
				<ul>
					<li><a href=""><img src="/img/ico_facebook.png"></a></li>
					<li><a href=""><img src="/img/ico_insta.png"></a></li>
					<li><a href=""><img src="/img/ico_kakao.png"></a></li>
					<li><a href=""><img src="/img/ico_blog.png"></a></li>
				</ul>
			</div>
		</div>
	</footer>


	<script src="http://code.jquery.com/jquery-latest.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>

	<script>
		jQuery(document).ready(function($) {
			$window = $(window);

        // 다음 섹션이 브라우저 하단으로부터 200px 만큼 보여질때
        var delayPosition = 200,
            // 현재 브라우저의 높이값
            windowheight; 

        // 브라우저의 크기가 변하면 대상 엘리먼트의 위치값을 다시 할당
        $window.on('resize', function() {
        	insertTargetPosition();
        });

        // 스크롤이 이동할때
        $window.on('scroll', function() {
          // 현재의 위치 = 스크롤이 이동한 값 + 윈도우 높이 - 처음에 선언한 지연 위치값(200);
          var position = $window.scrollTop() + windowheight - delayPosition;

          // 아직 활성화되지 않은 타겟 엘리먼트를 순회하여
          $('.target-section.ready').each(function() {
            // 활성화되어 있지 않고 타겟의 위차값이 현재 위치값보다 작으면
            if(!$(this).hasClass('active') && $(this).data('offsetTop') < position) {
              // 활성화
              $(this).addClass('active');
              // 활성화 된 엘리먼트는 이후 타겟에서 제외
              $(this).removeClass('ready');
          }
      });
      });

        function insertTargetPosition() {
          windowheight = $window.height(); // 브라우저의 높이값 할당
          $('.target-section').each(function() { // 모든 대상 엘리먼트에
            $(this).data('offsetTop', ($(this).offset().top)); // 각자의 위치 값을 할당
        });
      }

      (function init() {
          // 최초 진입시 각 섹션의 위치값을 할당
          // 컨텐츠 중에 이미지 파일이 있거나 비동기로 가져오는 값이 있다면, 대상 요소들이 모두 불러진 후에
          // 각 섹션의 위치값을 다시 할당해 줘어야 합니다.
          insertTargetPosition();
      })();
  });
</script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!--	<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>  -->


<script type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- script -->
<script>
	/* 네비게이션 */
	var slideSubmenu = new SlideSubmenu($('#pm2'));

	function SlideSubmenu($this){
		$('#pm2').on('mouseenter', function(){
			$('#pm2').find('div').stop().css('height','auto').slideDown('fast');
		});

		$('.nav_btn').on('click', function(){
			$('#pm2').find('div').stop().css('height','auto').slideDown('fast');
		});

		$('.top_menu').on('mouseleave', function(){
			$('#pm2').find('div').stop().css('height','auto').slideUp('fast');
		});
	}

	var bannerOffset = $( '.top_menu' ).offset();
	$( window ).scroll( function() {
		if ( $( document ).scrollTop() > bannerOffset.top ) {   
			$( '.top_menu' ).addClass( 'fixed' );
			$( '.top_logo' ).addClass( 'active' );
			$( '#pm2').addClass( 'active' );
		}
		else {
			$( '.top_menu' ).removeClass( 'fixed' );
			$( '.top_logo' ).removeClass( 'active' );
			$( '#pm2').removeClass( 'active' );
		}
	});



	/* 모바일 네비게이션 */
	jQuery(function($){

		$('.nav_btn').on('click',function(){
			$('#nav_mobile').css({right:0});
			$('.nav_bg').css({opacity:1, visibility:'visible'});
		});

		function closeMenu(){
			$('#nav_mobile').css({right:'-100%'});
			$('.nav_bg').css({opacity:0, visibility:'hidden'});
		};

		$('.nav_bg').click(closeMenu);
		$('.close_btn').click(closeMenu);


		var toggleSubmenu = new ToggleSubmenu($('#nav_mobile'));

		function ToggleSubmenu($this){
			$this.find('[data-role=toggle] > a').on('click',function(){
				var
				$li = $(this).parent()
				,$lis = $li.siblings()
				;

				$lis.removeClass('active').children('div').slideUp(200);
				$li.toggleClass('active').children('div').slideToggle(200);

				return false;
			});
		};
	});



	
</script>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_PATH."/tail.sub.php");
?>