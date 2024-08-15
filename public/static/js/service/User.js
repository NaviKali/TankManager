/**
 * 验证当前用户是否填写表格
 */
async function IVerUserWirteUserTable(url, param) {
    DefineRequest("POST", url, param, function (res) {
        if (res.code == 404) {
            CreateDialogButton("UserWriteTable");
        }else{
            To("indexPage");
        }
    });
}
/**
 * 添加当前用户填写表格
 */
async function INewUserWriteUserTable(url, param) {
    DefineRequest("POST", url, param, function (res) {
        if (isRequestSuccess(res)) {
            setTimeout(() => {
                To("indexPage");
            }, 1000);
        }
    });
}