<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
<div class="bg-light lter b-b wrapper-md hidden-print">
  <h1 class="m-n font-thin h3">连接管理</h1>
</div>
<div class="wrapper-md control">
    <div class="panel panel-default">
        <div class="panel-heading font-bold">
            连接管理
        </div>
        <div class="panel-body">
        <!--顶部-->
      <div class="row wrapper">
        <div class="col-sm-5 m-b-xs">
            <div class="form-group">
              <input id="link" type="text" class="input-sm form-control" name="link" placeholder="链接，如：http://127.0.0.1/eval.php">
            </div>
            <div class="form-group">
              <input id="pass" type="text" class="input-sm form-control" name="pass" placeholder="密码，如：password">
            </div>
             <div class="form-group">
                <button class="btn btn-sm btn-primary" onclick="addLink()" type="submit">添加连接</button>
             </div>
        </div>
      </div>
        <!--顶部-->
    <!--列表-->
    <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>链接</th><th>密码</th><th>操作</th></tr></thead>
         <tbody>
         
                    <?php
                    if (isset($_COOKIE["webshell"]))
                    {
                        foreach ($_COOKIE["webshell"] as $link => $pass)
                        {
                        echo "<tr><td>".htmlentities($link)."</td><td>".htmlentities($pass)."</td><td><a onclick=\"delLink('".htmlentities($link)."')\" class=\"btn btn-danger btn-xs\">删除</a></td></tr>";
                        }
                    }
                    ?>

        
        </tbody>
    </div>
    <!--列表-->
    </div>
  </div>  