/**
 * Created by Dearvee on 2017/5/10.
 */

function isCN(str){
    var reg = /^[\u4E00-\u9FA5]+$/;
    if(!reg.test(str)){
        //alert("不是中文");
        return false;
    }
    //alert("中文");
    return true;
}


function get_str(string) {
    var value = string;
    value = value.replace(/<script>([\s\S]+)<\/script>/g, "");//remove js code
    value = value.replace(/(<\/?.+?>|\s)/g, "");//去除标签符号&空白符
    return value;
}

function get_count(string) {
    var str=get_str(string);
    var count=[];

/*
    var value = document.getElementById('body').innerHTML;//英文单词
    value = value.replace(/<script>([\s\S]+)<\/script>/g, "");//remove js code
    value = value.replace(/(<\/?.+?>)/g, " ");//去除标签符号&空白符
    value=value.split(/[\s]/g)
    console.log(value);
    for (let v=0;v<value.length;v++)
        if (!isCN(value[v])&&value[v].length>=4) {
        console.log(value[v]);
            if (isNaN(count[value[v]]))
                count[value[v]] = 0;
            if (count[value[v]] >= 0)
                count[value[v]]++;
        }*/

    for (var len=2;len<5;len++) {//最小和最大长度
        for (var i = 0; i <= str.length - len; i++) {
            var key = str.substr(i, len);
            if (!isCN(key)||key.length==3||key.length==5||
                key.search("的")!=-1||//排除虚词，可酌情添加
                key.search("个")!=-1||
                key.search("们")!=-1)
                continue;
            if (isNaN(count[key]))
                count[key] = 0;
            if (count[key] >= 0)
                count[key]++;
        }
    }


    return count;
}

function get_list(string,word,size) {
    var count=get_count(string);

    var list=[];
    var i=0;
    for (var key in count){
        list[i]=[];
        list[i][0]=key;
        list[i][1]=count[key]*size;
        i++;
    }
    list.sort(function (a,b) {//按出现次数排序
        return b[1]-a[1];
    });
    list=list.slice(0,word);
    console.log(list);
    return list;
}