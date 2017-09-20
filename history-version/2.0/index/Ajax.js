/**
 * Created by Dearvee on 2017/5/14.
 */
function getAjax(url) {
    var xmlHttp;
    if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    }
    else {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 & xmlHttp.status == 200) {
            document.getElementById("bodyInfo").innerHTML = xmlHttp.responseText;
            var state={
                title:"",
                url:""
            };
            window.history.pushState(state,"","");//改变地址栏url
        }
    }
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

window.addEventListener('popstate', function(e){
    if (history.state){
        getAjax("index/index.php");//无论到何方，都回到essay
    }
}, false);


window.onload = function () {

    getAjax("index/index.php");

    let headerView = false;
    document.getElementById('ctrl').onclick = function () {   //header
        let header = document.getElementById('header');
        let ctrl = document.getElementById('ctrl');
        if (headerView) {
            header.style.left = "-340px";
            header.style.opacity = "0.8";
            ctrl.innerHTML = ">>";
            headerView = false;
        }
        else {
            header.style.left = "0px";
            header.style.opacity = "1";
            ctrl.innerHTML = "<<";
            headerView = true;
        }
    }
}