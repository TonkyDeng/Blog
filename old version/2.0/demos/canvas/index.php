<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/24
 * Time: 17:00
 */
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Canvas Edit</title>
  <style>
html{
    width: 100%;
    height: 100%;
}
    body{
    width:100%;
    height: 100%;
    overflow: hidden;
}
    .board{
    width:800px;
    }
    .canvas{
    width:800px;
      height:650px;
      background: #eee;
      float: left;
      box-shadow: 2px 2px 10px #ddd;
      cursor: url("12.png"),auto;
    }
      .edit{
    height:650px;
          display: inline-block;
          position: absolute;
          padding: 0;
          margin: 0;
          list-style: none;
      }
      .edit li{
    padding: 5px;
      }
  </style>
  <script src="jquery-3.2.1.min.js"></script>
  <script>
      var canDraw = false;
      var drawColor="#000";
      var drawWidth="10";
      window.onload=function() {
          initDraw();
      }

      function initDraw() {
          setDrawStyle();
          setDrawType("free");
      }
      function draw(x0, y0, x1, y1) {//画直线
          var canvas = document.getElementById("canvas");
          var ctx = canvas.getContext("2d");
          ctx.lineWidth = drawWidth;
          ctx.strokeStyle = drawColor;
          ctx.lineCap = "round";
          ctx.beginPath();
          ctx.moveTo(x0, y0);
          ctx.lineTo(x1, y1);
          ctx.stroke();
          ctx.closePath();
      }

      function setDrawStyle() {
          var dColor = document.getElementById('drawColor');//画笔颜色
          dColor.oninput = function () {
              drawColor = dColor.value;
          }

          var dView = document.getElementById('viewDWidth');
          var dWidth = document.getElementById('drawWidth');//画笔宽度
          dWidth.oninput = function () {
              drawWidth = dWidth.value;
              dView.innerText = dWidth.value;
          }
      }
      function setDrawType(type) {
          var canvas = document.getElementById("canvas");
          if (type === "free") {//freeDraw
              $("#canvas").bind("mousedown", function (ed) {
                  var beginX = ed.clientX;
                  var beginY = ed.clientY;
                  canDraw = true;
                  $("#canvas").bind("mousemove", function (em) {
                      if (canDraw) {
                          draw(beginX, beginY, em.clientX, em.clientY);
                          beginX = em.clientX;
                          beginY = em.clientY;
                      }
                      else {
                          beginX = em.clientX;
                          beginY = em.clientY;
                      }
                  });
              });
              $(document.body).bind("mouseup", function () {
                  canDraw = false;
              });
          }
          if (type === "line") {//lineDraw
              var first = true;
              var beginX, beginY, endX, endY;
              $("#canvas").bind("click", function (ec) {
                  if (first) {
                      beginX = ec.clientX;
                      beginY = ec.clientY;
                      endX = ec.clientX;
                      endY = ec.clientY;
                      first = false;
                  }
                  else {
                      endX = ec.clientX;
                      endY = ec.clientY;
                      first = true;
                  }
                  draw(beginX, beginY, endX, endY);
              });
          }
      }

      function selDrawType() {
          var events=event.srcElement.id;
          alert(events);
          $("#canvas").unbind();
          setDrawType(events);
      }
  </script>
</head>
<body>

<div class="board">
    <canvas id="canvas" class="canvas" width="800" height="650"></canvas>
    <ul class="edit">
        <li>
            <ul style="list-style: none;padding: 5px;" onclick="selDrawType();">
                <li>形状</li>
                <p>
                <li id="free" style="display: inline;background: #eee;cursor: pointer;">Free</li>
                <li id="line" style="display: inline;background: #eee;cursor: pointer;">Line</li>
            </ul>
        </li>
        <li>
            <label>宽度:</label>
            <input type="range" id="drawWidth" value="10" min="1" max="100"/>
            <span id="viewDWidth">10</span>
        </li>
        <li>
            <label>颜色:</label>
            <input type="color" id="drawColor"/>
        </li>
    </ul>
</div>
</body>
</html>
