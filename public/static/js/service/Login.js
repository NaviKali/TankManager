/**
 * 登录接口
 */
async function ILogin(url, param) {
    DefineRequest("POST", url, param, function (res) {
        if (isRequestSuccess(res)) {
            //*储存Token
            sessionStorage.setItem("token", res.data.token);
            //*存储登录Guid
            localStorage.setItem("login_guid", res.data.login_guid);
            /**
             * 存储页面
             */
            localStorage.setItem("page", "Home");
            setTimeout(() => {
                To("indexPage")
            }, 1000);
        }
    });
}
/**
 * 免密登录接口
 */
async function IFreePasswordLogin(url, param) {
    DefineRequest("POST", url, param, function (res) {
        if (isRequestSuccess(res)) {
            setTimeout(() => {
                To("HomePage")
            }, 1000);
        }
    });
}
/**
 * 注册账号
 */
async function IRegistrationAccount(url, param) {
    DefineRequest("POST", url, param, function (res) {
        console.log(res);

    });
}
