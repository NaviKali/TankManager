/**
 * 文件上传
 */
async function IUpload(url, param, id) {
    DefineRequest("POST", url, param, function (res) {
        if (isRequestSuccess(res)) {
            document.getElementById(id).querySelector("img").style.display = "block";
            document.getElementById(id).querySelector("img").src = res.data.url;
            document.getElementById(id).querySelector("img").setAttribute("file", res.data.file);
        }
    });
}