<?php
require_once '../../config/Base.php';
use app\void\index as VoidIndex;
?>
<div class="top">
    <!-- 标题 -->
    <div class="title"><?php echo (new VoidIndex)->getTitle();  ?></div>
    <!-- 设置和头像 -->
     <div class="setting">
        
     </div>
</div>
<link rel="stylesheet" href="../../public/static/css/tank.css">
<style>
    body {
        margin: 0px;
    }

    .top {
        height: 50px;
        background-color: var(--theme-background);
        display: flex;
        padding-left: 20px;
        justify-content: space-between;
        align-items: center;
        align-content: center;
    }
    .title{
        color: white;
        font-size: 20px;
        font-weight: bold;
        letter-spacing: 4px;
    }
</style>
<script>



</script>