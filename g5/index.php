<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>

<script src="/js/masonry.pkgd.min.js"></script>
<script src="/js/imagesloaded.pkgd.min.js"></script>


<?php

$bo_table ="tobplatform"; //원하는 테이블 id 입력
$write_table = "g5_write_{$bo_table}";
$board = sql_fetch(" select * from {$g5['board_table']} where bo_table = '$bo_table' ");
if (G5_IS_MOBILE) {
    $board_skin_path    = get_skin_path('board', $board['bo_mobile_skin']);
    $board_skin_url     = get_skin_url('board', $board['bo_mobile_skin']);
} else {
    $board_skin_path    = get_skin_path('board', $board['bo_skin']);
    $board_skin_url     = get_skin_url('board', $board['bo_skin']);
} 
?>
<?php
include_once(G5_BBS_PATH.'/board.php');
include_once(G5_PATH.'/tail.php');
?>