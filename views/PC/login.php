[Start]
<link rel="stylesheet" href="#css#bootstrap.min.css">
<link rel="stylesheet" href="#css#tank.css">
<style>
    button:hover {
        transition: all 0.6s;
        transform: scale(1.2);
    }
</style>

<!-- 按钮选择 -->
<div class="container mt-3">
    <div class="d-flex p-3 bg-secondary text-white" style="justify-content:space-around">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#LoginDialog"
            id="ClickLoginDialog">
            登录
        </button>
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#LoginDialog"
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
</script>
[/Start]