/**
 * 登录接口
 */
async function ILogin(url, param, response) {
    DefineRequest("POST", url, param, function (res) {
        //*储存Token
        sessionStorage.setItem("token", res.data.token);
        //*存储登录Guid
        localStorage.setItem("login_guid", res.data.login_guid);
        setTimeout(() => {
            To("HomePage")
        }, 1000);
    });
}