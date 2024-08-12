const verRequestSuccess = 200;
const verRequestWarning = 404;
const verTokenError = 502;






/**
 * 媒体查询适配
 * @param width 宽度 必填
 * @param url 跳转路径 必填
 */
function MediaConfigView(width, url) {
    if (window.innerWidth < width) {
        let to = "./index?mediaType=" + url;
        location.href = to
    }
}
/**
 * 跳转当前级别页面
 */
function To(url) {
    location.href = `./${url}`;
}

/**
 * 创建一条iframe引入
 */
function CreateIframeHTML(iframeSrc, NameOrUrl, Id) {
    let node = document.createElement("iframe");
    node.src = iframeSrc + NameOrUrl;
    node.frameborder = 0
    node.id = Id;
    document.body.appendChild(node)
}

/**
 * 创建一条加载Html
 * @param iframeSrc 路径 视图层配置项 配置 必填
 */
function CreateLoadingHTML(iframeSrc) {
    CreateIframeHTML(iframeSrc, "Component/loading.html", "LOADING")
}
/**
 * 验证是否请求成功
 * @param res 请求后的数据 必填
 */
function isRequestSuccess(res) {
    return res.code == verRequestSuccess ? true : false;
}


/**
 * 关闭加载Html
 */
function ClonseLoadingHTML() {
    document.getElementById("LOADING").remove();
}

/**
 * 创建一条信息提示框
 * @param type 类型 必填
 * @param data 内容 必填
 * @param outtime 渲染时长 选填 默认为4s
 */
function CreateAlert(type, data, outtime = 4000) {
    let node = document.createElement("div")
    node.classList = `alert alert-${type} tank-alert`;
    node.innerHTML = data;
    document.body.appendChild(node)
    setTimeout(() => {
        node.style.left = "15px"
        setTimeout(() => {
            node.style.left = "-300px"
            setTimeout(() => {
                node.remove();
            }, 1000);
        }, outtime);
    }, 1000);
}
/**
 * 创建一条成功信息提示框
 * @param data 内容 必填
 * @param outtime 渲染时长 选填 默认为4s
 */
function CreateSuccessAlert(data, outtime = 4000) {
    CreateAlert('success', data, outtime)
}
/**
 * 创建一条错误信息提示框
 * @param data 内容 必填
 * @param outtime 渲染时长 选填 默认为4s
 */
function CreateDangerAlert(data, outtime = 4000) {
    CreateAlert('danger', data, outtime)
}

/**
 * 定义请求
 * !前提要先引入jquery.js
 * @param type 请求类型 必填
 * @param url 请求路径 必填
 * @param param 请求参数 必填
 * @param response 相应数据 必填
 */
function DefineRequest(type, url, param, response) {
    new Promise((res, rej) => {
        if (type == "GET" || type == "get") {
            $.get(url, param, function (data, status) {
                VerTokenErrorHandle(data)
                if (isRequestSuccess(data)) {
                    CreateSuccessAlert(data.msg)
                    return res(response(data, status));
                } else {
                    CreateDangerAlert(data, msg)
                    return response(data, status);
                }
            });
        }
        else if (type == "POST" || type == "post") {
            $.ajax({
                headers: {
                    "Content-Type": "application/json",
                    "token": sessionStorage.getItem("token"),
                },
                url: url,
                type: type,
                data: JSON.stringify(param),
                success: function (data) {
                    VerTokenErrorHandle(data)
                    if (isRequestSuccess(data)) {
                        CreateSuccessAlert(data.msg)
                        return res(response(data));
                    } else {
                        CreateDangerAlert(data.msg)
                        return res(response(data));
                    }
                }
            })
        }
    })
}


/**
 * Token验证失败处理
 * @param res 请求返回数据 必填
 */
function VerTokenErrorHandle(res) {
    if (res.code == verTokenError) {
        sessionStorage.clear()
        localStorage.clear();
        To("LoginPage");
    }
}