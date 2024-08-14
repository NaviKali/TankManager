/**
 * 文件上传
 */
async function IUpload(url, param) {
    DefineRequest("POST", url, param, function (res) {
            console.log(res);
    });
}