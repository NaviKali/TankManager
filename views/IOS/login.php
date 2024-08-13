[Start]
<link rel="stylesheet" href="#css#jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" href="#css#mui.css">
<link rel="stylesheet" href="#css#tank.css">
<style lang="less">
    .mui-inner-wrap {
        background: url("#img#wallpaper1723444488322.jpg") no-repeat top;
        background-size: cover;
        background-clip: content-box;
        width: 100vw;
        height: 100vh;
        overflow: hidden;
    }

    .BottomBlock {
        width: 100%;
        height: 10%;
    }

    .BlackGround {
        width: 100%;
        height: 10%;
        background-color: black;
        opacity: 0.5;
        position: absolute;
        z-index: 555;
    }

    .buttonList {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        position: absolute;
        width: 100%;
        bottom: 10px;
    }

    .buttonList button {
        width: 48%;
    }

    .Top {
        position: absolute;
        top: 0;
        width: 100%;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        backdrop-filter: blur(20px);
        box-shadow: 0px 0px 40px 10px #FC9471;
    }

    .Top h4 {
        text-align: center;
        color: white;
    }

    .TopShow {
        width: 90%;
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        align-content: center;
        font-size: 20px;
        padding: 20px;
        letter-spacing: 10px;
        font-weight: bold;
        border-bottom: 2px solid black;
    }

    #buttonThis {
        margin-top: 20px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        align-content: center;
    }
</style>



<!-- 侧滑导航根容器 -->
<div class="mui-off-canvas-wrap mui-draggable">
    <!-- 菜单容器 -->
    <aside class="mui-off-canvas-left">
        <div class="mui-scroll-wrapper" style="background-color:white">
            <div class="mui-scroll">
                <!-- 顶部显示 -->
                <div class="TopShow" id="TopTitle">登录</div>
                <div class="mui-input-group" style="margin-top:10px">
                    <div class="mui-input-row">
                        <label>用户名：</label>
                        <input type="text" class="mui-input-clear" placeholder="请输入用户名" id="account_user">
                    </div>
                    <div class="mui-input-row">
                        <label>密码：</label>
                        <input type="password" class="mui-input-clear " placeholder="请输入密码" id="account_password">
                    </div>
                </div>
                <!-- 按钮 -->
                <div id="buttonThis">
                    <button type="button" class="mui-btn mui-btn-success mui-btn-outlined"
                        onclick="LoginClick()">登录</button>

                </div>
            </div>
        </div>
    </aside>
    <!-- 主页面容器 -->
    <div class="mui-inner-wrap">
        <!-- 标题 -->
        <div class="Top">
            <h4>$-TK["title"]-$</h4>
        </div>
        <!-- 底部选择 -->
        <div class="BottomBlock">
            <div class="buttonList">
                <button type="button" class="mui-btn mui-btn-success" onclick="LoginView()">登录</button>
                <button type="button" class="mui-btn mui-btn-primary" onclick="RegistrationView()">注册</button>
            </div>
        </div>





    </div>
</div>








<script src="#js#jquery.min.js"></script>
<script src="#js#mui.js"></script>
<script src="#js#tank.js"></script>
<script src="#service#Login.js"></script>
<script>
    /**
     * 类型
     * 1:登录
     * 2:注册
     */
    let type = 1;

    document.body.onload = function () {

    }

    /**
     * 点击登录
     */
    function LoginClick() {
        ILogin("#request#Login/AccountLogin", { login_user: document.getElementById("account_user").value, login_password: document.getElementById("account_password").value })
    }
    /**
     * 点击注册
     */
    function RegistrationClick() {
        IRegistrationAccount("#request#Login/RegistrationAccount", { login_user: document.getElementById("account_user").value, login_password: document.getElementById("account_password").value })
    }


    function LoginView() {
        type = 1;
        VerLoginOrRegistration()
        mui('.mui-off-canvas-wrap').offCanvas('show');
    }
    function RegistrationView() {
        type = 2;
        VerLoginOrRegistration()
        mui('.mui-off-canvas-wrap').offCanvas('show');
    }

    /**
     * 判断登录和注册
     */
    function VerLoginOrRegistration() {
        if (type == 1) {
            document.getElementById("TopTitle").innerHTML = "登录";
            document.getElementById("buttonThis").innerHTML = `<button type="button" class="mui-btn mui-btn-success mui-btn-outlined"
                        onclick="LoginClick()">登录</button>`
        }
        else if (type == 2) {
            document.getElementById("TopTitle").innerHTML = "注册";
            document.getElementById("buttonThis").innerHTML = `<button type="button" class="mui-btn mui-btn-success mui-btn-outlined"
                        onclick="RegistrationClick()">注册</button>`

        }
    }
</script>
[/Start]