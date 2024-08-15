$(
require_once '../../config/Base.php';
use app\void\index as VoidIndex;
)$
<div class="top">
    <!-- 标题 -->
    <div class="title">$(echo (new VoidIndex)->getTitle();)$</div>
    <!-- 设置 -->
    <div class="setting">
        <div class="caozuo" onclick="toSetting()"><img src="#img#caozuo/setting.png" alt="">
        </div>
    </div>
</div>
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

    .title {
        color: white;
        font-size: 20px;
        font-weight: bold;
        letter-spacing: 4px;
    }

    .setting {
        height: 100%;
        width: 100px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        align-content: center;
    }

    .avatar {
        height: 100%;
        width: 50%;
        display: flex;
        align-items: center;
        align-content: center;
    }

    .avatar img {
        border-radius: 50px;
        width: 70%;
        height: 70%;
    }

    .caozuo {
        height: 100%;
        width: 50%;
        display: flex;
        align-items: center;
        align-content: center;
    }

    .caozuo img {
        border-radius: 50px;
        width: 70%;
        height: 70%;
    }
</style>
<script>
    /**
     * 跳转到设置页
     */
    function toSetting() {
        To("settingPage");
    }
</script>