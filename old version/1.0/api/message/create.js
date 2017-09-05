function createBoard(able,message,pos,color) {

    /*var default_pos = (Math.random() * 1200).toString() + "px*" + (Math.random() * 600).toString() + "px";
     var default_background = "rgb(" + parseInt(Math.random() * 255).toString() + ","
     + parseInt(Math.random() * 255).toString() + ","
     + parseInt(Math.random() * 255).toString() + ")";//random color
     */

    if (!color)
        color="#666666";

    var boarder = document.createElement("textarea");
    var style = document.createAttribute("class");
    style.value = "boarder_css";
    boarder.setAttribute("name","boarder");
    boarder.setAttributeNode(style);
    //boarder.style.background = default_background;
    boarder.style.background = color;
    boarder.setAttribute("placeholder", "在这里输入文本");

    var order = document.createElement("span");
    var style=document.createAttribute("class");
    style.value = "order_css";
    order.setAttributeNode(style);

    if(able) {

        var partent = document.createElement("span");
        var style=document.createAttribute("class");
        style.value="parent_css";
        partent.setAttributeNode(style);
        //partent.style.left = default_pos.split('*')[0];
        //partent.style.top = default_pos.split('*')[1];
        //partent.style.background = default_background;
        partent.style.left = pos.split('*')[0];
        partent.style.top = pos.split('*')[1];
        partent.style.background = color;
        partent.style.zIndex=j++;

        var form = document.createElement("form");
        form.setAttribute("action","submit.php");
        form.setAttribute("target","action");

        var pos_color=document.createElement("input");
        pos_color.setAttribute("type","text");
        pos_color.setAttribute("name","pos_color");
        pos_color.style.display="none";


        var colors = document.createElement("input");
        colors.setAttribute("type", "color");
        var style = document.createAttribute("class");
        style.value = "able_css";
        colors.setAttributeNode(style);
        colors.style.width = "50px";
        colors.style.right = "50px";
        colors.style.outline = "none";
        colors.value = "#666666";

        colors.oninput = function () {
            partent.style.background = colors.value;
            boarder.style.background = colors.value;
        }

        var submit = document.createElement("input");
        submit.setAttribute("type","submit");
        var style=document.createAttribute("class");
        style.value="able_css";
        submit.setAttributeNode(style);
        submit.style.width="50px";
        submit.style.height="22px";
        submit.innerHTML="留言";
        submit.addEventListener("click",function () {
            submit_flag=true;
            partent.style.display="none";
            pos=partent.style.left.toString()+"*"+partent.style.top.toString();
            color=colors.value;
            pos_color.value=pos+color;
            createBoard(false,boarder.value,pos,color);
        });


        form.appendChild(pos_color);
        form.appendChild(submit);
        form.appendChild(colors);
        form.appendChild(boarder);
        partent.appendChild(form);
        document.body.appendChild(partent);

        var d = partent;

    }
    else{
        boarder.value=message;
        boarder.style.cursor="move";
        //boarder.style.left = default_pos.split('*')[0];
        //boarder.style.top = default_pos.split('*')[1];
        boarder.style.left = pos.split('*')[0];
        boarder.style.top = pos.split('*')[1];
        boarder.style.zIndex=j++;
        boarder.readOnly="true";
        boarder.appendChild(order);
        document.body.appendChild(boarder);

        var d = boarder;
    }

    i++;
    var b = document.getElementById('body');

    d.addEventListener("mousedown", function (ed) {//enable move
        d.style.zIndex = j++;

        var flag;
        var dl = d.offsetLeft;
        var dt = d.offsetTop;
        if((able&&(ed.clientY-dt<20||ed.clientY-dt>160||ed.clientX-dl<20||ed.clientX-dl>205))||!able) {
            flag = true;
        }
        b.addEventListener("mousemove", function (em) {
            if (flag) {
                d.style.left = dl + em.clientX - ed.clientX + "px";
                d.style.top = dt + em.clientY - ed.clientY + "px";
            }
        });

        b.addEventListener("mouseup", function () {
            flag = false;
        });
    });

}