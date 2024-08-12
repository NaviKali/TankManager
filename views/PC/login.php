[Start]
<link rel="stylesheet" href="#css#bootstrap.min.css">
<link rel="stylesheet" href="#css#tank.css">
<style>
    body {
        background: url("#img#wallpaper1723444488322.jpg") no-repeat top;
        background-size: cover;
        background-clip: content-box;
        width: 100vw;
        height: 100vh;
        overflow: hidden;
    }

    button:hover {
        transition: all 0.6s;
        transform: scale(1.1);
    }

    .top-block {
        width: 400px;
        margin: auto;
        filter: drop-shadow(5px 5px 10px #80888A);

    }

    .buttonList {
        h3 {
            text-align: center;
            border-bottom: 2px solid #F57859;
            width: 500px;
            margin: auto;
            padding: 20px;
            color: white;
            letter-spacing: 5px;
        }

        backdrop-filter: blur(3px);
        border-radius: 15px;
        box-shadow: 0px 0px 40px 10px #FC9471;

        p {
            text-align: center;
            padding: 20px;
            color: white;
            letter-spacing: 5px;
        }
    }
</style>

<!-- 按钮选择 -->
<div class="container mt-3 buttonList">
    <h3>$-TK["title"]-$</h3>
    <div class="d-flex p-3 text-white top-block" style="justify-content:space-around">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#LoginDialog"
            id="ClickLoginDialog">
            登录
        </button>
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#FreeLoginDialog"
            id="ClickLoginDialog">
            免密登录
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#LoginDialog"
            id="ClickLoginDialog">
            注册
        </button>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#LoginDialog"
            id="ClickLoginDialog">
            后台详情
        </button>
    </div>
    <p>版权 @：$-TK["copyright"]-$</p>
</div>

<!-- 登录模态框 -->
<div class="modal fade" id="LoginDialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">登录</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 mt-3">
                    <label for="user" class="form-label">账号</label>
                    <input type="user" class="form-control" id="user" placeholder="请输入账号" name="user">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">密码</label>
                    <input type="password" class="form-control" id="password" placeholder="请输入密码" name="password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="LoginClick()">登录</button>
            </div>
        </div>
    </div>
</div>
<!-- 免密模态框 -->
<div class="modal fade" id="FreeLoginDialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">免密登录</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 mt-3">
                    <label for="user" class="form-label">免密账号名</label>
                    <input type="user" class="form-control" id="freepassword_user" placeholder="请输入免密账号名" name="user">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"
                    onclick="FreeLoginClick()">登录</button>
            </div>
        </div>
    </div>
</div>


<script src="#js#bootstrap.bundle.min.js"></script>
<script src="#js#jquery.min.js"></script>
<script src="#js#tank.js"></script>
<script src="#service#Login.js"></script>
<script>

    /**
     * 登录
     */
    function LoginClick() {
        ILogin("#request#Login/AccountLogin", { login_user: document.getElementById("user").value, login_password: document.getElementById("password").value })
    }
    /**
     * 免密登录
     */
    function FreeLoginClick() {
        IFreePasswordLogin("#request#Login/ConfidentialityLogin", { user: freepassword_user.value });
    }
</script>
[/Start]