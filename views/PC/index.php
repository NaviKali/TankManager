[Start]
<link rel="stylesheet" href="#css#bootstrap.min.css">
<link rel="stylesheet" href="#css#tank.css">
<style>
    body {
        width: 100vw;
        height: 100vh;
    }

    .main {
        height: 100%;
        width: 100%;
        overflow: hidden;
    }

    .main-top {
        width: 100%;
    }

    .main-body {
        display: flex;
        justify-content: left;
        align-items: top;
        height: 100%;
    }

    .main-body-left {
        background-color: var(--theme-color);
        height: 100%;
        width: 10%;
        border-radius: 0px 10px 0px 0px;
        overflow: hidden;
    }

    .main-body-right {
        height: 100%;
        width: 90%;
    }

    .menu-item {
        height: 65px;
        display: flex;
        justify-content: center;
        align-items: center;
        align-content: center;
        color: white;
        transition: all 1s;
        width: 100%;
        cursor: pointer;
    }

    .menu-item-more-item {
        height: 65px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        align-content: center;
        color: white;
        width: 100%;
    }

    .action {
        background-color: var(--theme-background) !important;
    }

    .menu-item-more {
        width: 100%;
        height: 100%;
    }

    .menu-item-children {
        height: 0px;
        overflow: hidden;
    }

    .more-tag {
        transition: all 0.3s;
        margin-left: 8px;
    }
</style>


<div class="main">
    <!-- 顶部 -->
    <div class="main-top">
        $(
        require_once '../../config/Base.php';
        use function tank\getViewUrl;
        self::Start("Component/top",[],[]);
        )$
    </div>
    <!-- Body -->
    <div class="main-body">
        <div class="main-body-left">
            <div class="menu" id="menu">
                @foreach($TK["menu"] as $k => $v)
                {
                $childrenMenu = '';
                if(count($v->children) == 0){
                echo '
                <div class="menu-item" to="'.$v->menu_to.'">
                    <p>'.$v->menu_name.'</p>
                </div>
                ';
                }else{
                foreach($v->children as $children_k => $children_v)
                {
                $childrenMenu .= '
                <div class="menu-item" to="'.$children_v->menu_to.'">
                    <p>'.$children_v->menu_name.'</p>
                </div>
                ';
                };
                echo '
                <div class="menu-item-more">
                    <div class="menu-item-more-item">
                        <p>'.$v->menu_name.'</p>
                        <p class="more-tag">></p>
                    </div>
                    <div class="menu-item-children">
                        '.
                        $childrenMenu
                        .'
                    </div>
                </div>
                ';
                }
                }foreach@
            </div>
        </div>
        <div class="main-body-right">
            <!-- 渲染 -->
            <iframe id="View" src="" style="position:unset"></iframe>
        </div>
    </div>
</div>











<!-- 用户填写表格 -->
<div class="modal fade" id="UserWriteTable">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">用户填写表格</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 mt-3">
                    <label for="user_name" class="form-label">用户姓名</label>
                    <input type="user_name" class="form-control" id="user_name" placeholder="请输入用户姓名" name="user_name">
                </div>
                <div class="mb-3">
                    <label for="user_phone" class="form-label">用户手机号</label>
                    <input type="user_phone" class="form-control" id="user_phone" placeholder="请输入用户手机号"
                        name="user_phone">
                </div>
                <div class="mb-3">
                    <label for="user_phone" class="form-label">用户性别</label>
                    <select class="form-select" id="user_sex">
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="user_phone" class="form-label">文件上传</label>
                    <div class="T-Upload">
                        <input id="user_avatar" class="T-Input-Upload" type="file" value="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="Over()">完成</button>
            </div>
        </div>
    </div>
</div>

<script src="#service#Upload.js"></script>
<script src="#service#User.js"></script>
<script src="#js#bootstrap.bundle.min.js"></script>
<script src="#js#jquery.min.js"></script>
<script src="#js#tank.js"></script>
<script>
    document.body.onload = function () {
        CreateLoadingHTML("#iframe#");
        MenuClick()
        MenuHoverStyleChange()
        StartView()
        UserWriteTable()
        CreateDialogButton("UserWriteTable");
        Upload("user_avatar","#request#")
    }
    document.body.onpageshow = function () {
        setTimeout(() => {
            ClonseLoadingHTML();
        }, 2000);
    }
    /**
     * 用户填表操作流程
     */
    function UserWriteTable()
    {
        IVerUserWirteUserTable("#request#User/VerUserWirteUserTable",{login_guid:localStorage.getItem("login_guid")})
    }

    /**
     * 渲染页面
     */
    function StartView() {
        document.getElementById("View").src = `#iframe#PC/${localStorage.getItem("page")}.php`;
    }

    /**
     * 菜单点击
     */
    function MenuClick() {
        let menus = document.getElementById("menu").querySelectorAll("div");
        for (let i = 0; i < menus.length; i++) {
            menus[i].onclick = function () {
                /**
                 * 单菜单
                 */
                if (menus[i].className == "menu-item") {
                    let allitems = document.getElementsByClassName("menu-item")
                    for (let a = 0; a < allitems.length; a++) {
                        allitems[a].classList = "menu-item";
                    }
                    menus[i].classList = menus[i].className + " action";

                    localStorage.setItem("page", menus[i].getAttribute("to"));
                    localStorage.setItem("pageName", menus[i].querySelector("p").textContent);
                }
                /**
                 * 多级菜单
                 */
                else if (menus[i].className == "menu-item-more" || menus[i].className == "menu-item-more menu-action") {
                    if (menus[i].className.includes("menu-action")) {
                        console.log(menus[i]);

                        menus[i].classList = "menu-item-more";
                        menus[i].getElementsByClassName("more-tag")[0].style.transform = "rotate(0deg)";
                        menus[i].getElementsByClassName("menu-item-children")[0].style.transition = "all 0.6s"
                        menus[i].getElementsByClassName("menu-item-children")[0].style.height = "0px"
                    } else {
                        menus[i].classList = menus[i].className + " menu-action"
                        let childrensonmenus = menus[i].getElementsByClassName("menu-item-children")[0].getElementsByClassName("menu-item");
                        menus[i].getElementsByClassName("more-tag")[0].style.transform = "rotate(90deg)";
                        menus[i].getElementsByClassName("menu-item-children")[0].style.transition = "all 0.6s"
                        menus[i].getElementsByClassName("menu-item-children")[0].style.height = childrensonmenus.length * 65 + "px"
                    }
                }
                StartView()
            }
        }
    }


    /**
     * 菜单触碰样式变色
     */
    function MenuHoverStyleChange() {
        let items = document.getElementsByClassName("menu-item")
        let moreitems = document.getElementsByClassName("menu-item-more")
        for (let i = 0; i < items.length; i++) {
            items[i].onmouseover = function () {
                items[i].style.backgroundColor = "var(--theme-background)";
            }
            items[i].onmouseout = function () {
                items[i].style.backgroundColor = "var(--theme-color)";
            }
        }
    }


</script>

[/Start]