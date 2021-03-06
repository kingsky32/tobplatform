<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<div id="wrap" class="main_page">
    <?php if ($write_href) { ?>
    <ul class="btn_bo_user">
        <li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li>
    </ul>
    <?php } ?>
    <img src="/img/tobinc.png" class="main" />
    <div class="target-section section"></div>
    <form name="fboardlist"  id="fboardlist" action="<?php echo G5_BBS_URL; ?>/board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
        <input type="hidden" name="stx" value="<?php echo $stx ?>">
        <input type="hidden" name="spt" value="<?php echo $spt ?>">
        <input type="hidden" name="sst" value="<?php echo $sst ?>">
        <input type="hidden" name="sod" value="<?php echo $sod ?>">
        <input type="hidden" name="page" value="<?php echo $page ?>">
        <input type="hidden" name="sw" value="">

        <div class="grid">
            <div class="grid-sizer"></div>
            <?php for ($i = count($list) - 1; $i >= 0; $i--) {

                $classes = array();

                $classes[] = 'gall_li';
                $classes[] = 'col-gn-'.$bo_gallery_cols;

                if( $i && ($i % $bo_gallery_cols == 0) ){
                    $classes[] = 'box_clear';
                }

                if( $wr_id && $wr_id == $list[$i]['wr_id'] ){
                    $classes[] = 'gall_now';
                }

                $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);
                if($thumb['src']) {
                    $img_content = '<input type="image" src="'.$thumb['src'].'" />';
                } else {
                    $img_content = '<span class="no_image" style="'.$line_height_style.'">no image</span>';
                }
                ?>

                <div class="grid-item">
                    <a
                    href="<?php echo $list[$i]['href'] ?>"
                    class="target-section ready section0"
                    >
                    <?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?>
                    <p><?php echo $list[$i]['subject'] ?></p>
                    </a>
                </div>

            <?php }?>
            <?php if (count($list) == 0) { echo "<div class=\"empty_divst\">게시물이 없습니다.</div>"; } ?>
        </div>
    </form>
</div>


<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>

<script>
  jQuery(document).ready(function ($) {
    $window = $(window);

    // 다음 섹션이 브라우저 하단으로부터 200px 만큼 보여질때
    var delayPosition = 200,
      // 현재 브라우저의 높이값
      windowheight;

    // 브라우저의 크기가 변하면 대상 엘리먼트의 위치값을 다시 할당
    $window.on("resize", function () {
      insertTargetPosition();
    });

    // 스크롤이 이동할때
    $window.on("scroll", function () {
      // 현재의 위치 = 스크롤이 이동한 값 + 윈도우 높이 - 처음에 선언한 지연 위치값(200);
      var position = $window.scrollTop() + windowheight - delayPosition;

      // 아직 활성화되지 않은 타겟 엘리먼트를 순회하여
      $(".target-section.ready").each(function () {
        // 활성화되어 있지 않고 타겟의 위차값이 현재 위치값보다 작으면
        if (!$(this).hasClass("active") && $(this).data("offsetTop") < position) {
          // 활성화
          $(this).addClass("active");
          // 활성화 된 엘리먼트는 이후 타겟에서 제외
          $(this).removeClass("ready");
        }
      });
    });

    function insertTargetPosition() {
      windowheight = $window.height(); // 브라우저의 높이값 할당
      $(".target-section").each(function () {
        // 모든 대상 엘리먼트에
        $(this).data("offsetTop", $(this).offset().top); // 각자의 위치 값을 할당
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
<!-- script -->
<script>
  /* 네비게이션 */
  var slideSubmenu = new SlideSubmenu($("#pm2"));

  function SlideSubmenu($this) {
    $("#pm2").on("mouseenter", function () {
      $("#pm2").find("div").stop().css("height", "auto").slideDown("fast");
    });

    $(".nav_btn").on("click", function () {
      $("#pm2").find("div").stop().css("height", "auto").slideDown("fast");
    });

    $(".top_menu").on("mouseleave", function () {
      $("#pm2").find("div").stop().css("height", "auto").slideUp("fast");
    });
  }

  var bannerOffset = $(".top_menu").offset();
  $(window).scroll(function () {
    if ($(document).scrollTop() > bannerOffset.top) {
      $(".top_menu").addClass("fixed");
      $(".top_logo").addClass("active");
      $("#pm2").addClass("active");
    } else {
      $(".top_menu").removeClass("fixed");
      $(".top_logo").removeClass("active");
      $("#pm2").removeClass("active");
    }
  });

  /* 모바일 네비게이션 */
  jQuery(function ($) {
    $(".nav_btn").on("click", function () {
      $("#nav_mobile").css({ right: 0 });
      $(".nav_bg").css({ opacity: 1, visibility: "visible" });
    });

    function closeMenu() {
      $("#nav_mobile").css({ right: "-100%" });
      $(".nav_bg").css({ opacity: 0, visibility: "hidden" });
    }

    $(".nav_bg").click(closeMenu);
    $(".close_btn").click(closeMenu);

    var toggleSubmenu = new ToggleSubmenu($("#nav_mobile"));

    function ToggleSubmenu($this) {
      $this.find("[data-role=toggle] > a").on("click", function () {
        var $li = $(this).parent(),
          $lis = $li.siblings();
        $lis.removeClass("active").children("div").slideUp(200);
        $li.toggleClass("active").children("div").slideToggle(200);

        return false;
      });
    }
  });
</script>
<script>
  var msnry = new Masonry(".grid", {
    itemSelector: ".grid-item",
    columnWidth: ".grid-sizer",
    percentPosition: true,
    gutter: 10,
  });
  imagesLoaded(".grid").on("progress", function () {
    msnry.layout();
  });
</script>