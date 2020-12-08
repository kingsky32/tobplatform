<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>

	<script src="http://code.jquery.com/jquery-latest.min.js"></script>


	<!-- html5shiv -->
	<script src="js/html5shiv.js"></script>


	<!-- ie checker -->
	<script src="js/ie-checker.js"></script>

	<!--[if IE 8]>
	<script type="text/javascript">
		alert("Please Upgrade Your BROWSER !");
	</script>
<![endif]-->

<div class="brand_top brand10" style="background-image: url('<?php echo $view['file'][1]['path'].'/'.$view['file'][1]['file']; ?>')">
    <img src="<?php echo $view['file'][2]['path'].'/'.$view['file'][2]['file']; ?>" class="subtop">
</div>

<!-- 

    0 - 썸네일
    1 - top background
    2 - logo
    content - 글

    3
    .
    .   슬라이드 이미지
    .
    500

 -->

<div id="wrap">
<div class="brand">
    <img src="<?php echo $view['file'][2]['path'].'/'.$view['file'][2]['file']; ?>" class="br_logo">
    <?php if ($update_href) { ?><div><a href="<?php echo $update_href ?>">수정<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div><?php } ?>
    <?php if ($delete_href) { ?><div><a href="<?php echo $delete_href ?>" oncdivck="del(this.href); return false;">삭제<i class="fa fa-trash-o" aria-hidden="true"></i></a></div><?php } ?>
    <p>
        <?php echo get_view_thumbnail($view['content']); ?>
    </p>
    <div class="slider-for">
        <?php
            for ($i=3; $i<=count($view['file']) - 2; $i++) {
                echo '<div>
                    <img src="'.$view['file'][$i]['path'].'/'.$view['file'][$i]['file'].'" class="hori">
                </div>';
            }
        ?>
    </div>
    <div class="slider-nav">
    <?php
        for ($i=3; $i<=count($view['file']) - 2; $i++) {
            echo '<div>
                <img src="'.$view['file'][$i]['path'].'/'.$view['file'][$i]['file'].'" class="hori">
            </div>';
        }
    ?>
    </div>


    <script type="text/javascript" src="/slick/slick.min.js"></script>
    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            arrows: true,
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToScroll: 1,
            fade: false,
            asNavFor: '.slider-nav',

        });
        $('.slider-nav').slick({
            slidesToShow:9,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            arrows: false,
            dots: false,
            centerMode: true,
            focusOnSelect: true,

            responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 7,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    centerMode: true,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    centerMode: true,
                    slidesToScroll: 1
                }
            }
            ]



        });
    </script>
    </div>
</div>

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>
</script>
<!-- } 게시글 읽기 끝 -->
