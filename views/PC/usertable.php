[Start]
$(
header("Content-Type:text/html");
)$
<link rel="stylesheet" href="#css#bootstrap.min.css">
<link rel="stylesheet" href="#css#tank.css">



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
                        @foreach($TK["user_sex_list"] as $k => $v){
                        echo '<option value="'.$v.'">'.$k.'</option>';
                        }foreach@
                    </select>
                </div>
                <div class="mb-3">
                    <label for="user_phone" class="form-label">头像上传</label>
                    <div class="T-Upload" id="user_avatar">
                        <input class="T-Input-Upload" type="file" value="">
                        <img class="T-Upload-Image" src="" alt="">
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
        UserWriteTable()

        Upload("user_avatar", "#request#")
    }
    document.body.onpageshow = function () {
        setTimeout(() => {
            ClonseLoadingHTML();
        }, 2000);
    }


    /**
       * 填写完用户信息表格
       */
    function Over() {
        INewUserWriteUserTable("#request#User/NewUserWriteUserTable", {
            login_guid: localStorage.getItem("login_guid"),
            user_name: document.getElementById("user_name").value,
            user_sex: document.getElementById('user_sex').value.trim(),
            user_phone: document.getElementById("user_phone").value,
            user_avatar: getUploadImageAttrOfFile("user_avatar"),
        })
    }
    /**
     * 用户填表操作流程
     */
    function UserWriteTable() {
        IVerUserWirteUserTable("#request#User/VerUserWirteUserTable", { login_guid: localStorage.getItem("login_guid") })
    }
</script>

[/Start]