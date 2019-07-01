<!--
======================================================
==                                                  ==
==   写这段代码的时候，只有上帝和我知道它是干嘛的   ==
==   现在只有上帝知道，所以我并不指望你能看懂下面   ==
==   的内容。                                       ==
==                                     ----陌小离   ==
==                                     2018/12/09   ==
==                                                  ==
======================================================
-->
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8" />
  <title>中国菜刀Web版 - 中国菜刀，黑客之刃！</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.css.net/libs/animate.css/3.5.1/animate.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.css.net/libs/font-awesome/4.5.0/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.css.net/libs/simple-line-icons/2.2.4/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/html/css/font.css" type="text/css" />
  <link rel="stylesheet" href="https://template.down.swap.wang/ui/angulr_2.0.1/html/css/app.css" type="text/css" />
  <link rel="stylesheet" href="https://admin.down.swap.wang/assets/plugins/toastr/toastr.min.css" type="text/css" />
  <!--必须引入的-->
  <script src="http://cdn.bootcss.com/jquery/1.12.3/jquery.min.js"></script>
  <link rel="stylesheet" href="code/lib/codemirror.css">
  <script src="code/lib/codemirror.js"></script>
  <!--引入编程语言-->
  <script src="code/mode/php/php.js"></script>
  <script src="code/mode/clike/clike.js"></script>
  <script src="code/mode/javascript/javascript.js"></script>
  <!--引入css文件，用以支持主题-->
  <link rel="stylesheet" href="code/theme/eclipse.css">
  <link rel="stylesheet" href="code/theme/seti.css">
  <link rel="stylesheet" href="code/theme/dracula.css">

  <!--支持代码折叠-->
  <link rel="stylesheet" href="code/addon/fold/foldgutter.css"/>
  <script src="code/addon/fold/foldcode.js"></script>
  <script src="code/addon/fold/foldgutter.js"></script>
  <script src="code/addon/fold/brace-fold.js"></script>
  <script src="code/addon/fold/comment-fold.js"></script>

  <!--全屏模式-->
  <link rel="stylesheet" href="code/addon/display/fullscreen.css">
  <script src="code/addon/display/fullscreen.js"></script>

  <!--括号匹配-->
  <script src="code/addon/edit/matchbrackets.js"></script>

  <!--自动补全-->
  <link rel="stylesheet" href="code/addon/hint/show-hint.css">
  <script src="code/addon/hint/show-hint.js"></script>
  <script src="code/addon/hint/anyword-hint.js"></script>
  <script src="http://cdn.bootcss.com/jquery/1.12.3/jquery.min.js"></script>
  <script src="layer/layer.js"></script>
  <script src="//caidao.moleft.cn/code/webshell.js"></script>
</head>
<body>
<div class="app app-header-fixed  ">
  <!-- header -->
  <header id="header" class="app-header navbar" role="menu">
          <!-- navbar header -->
      <div class="navbar-header bg-dark">
        <button class="pull-right visible-xs dk" ui-toggle="show" target=".navbar-collapse">
          <i class="glyphicon glyphicon-cog"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle="off-screen" target=".app-aside" ui-scroll="app">
          <i class="glyphicon glyphicon-align-justify"></i>
        </button>
        <!-- brand -->
        <a href="/" class="navbar-brand text-lt">
          <i class="fa fa-btc"></i>
          <img src="https://template.down.swap.wang/ui/angulr_2.0.1/html/img/logo.png" alt="." class="hide">
          <span class="hidden-folded m-l-xs">中国菜刀</span>
        </a>
        <!-- / brand -->
      </div>
      <!-- / navbar header -->

      <!-- navbar collapse -->
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
        <!-- buttons -->
        <div class="nav navbar-nav hidden-xs">
          <a href="#" class="btn no-shadow navbar-btn" ui-toggle="app-aside-folded" target=".app">
            <i class="fa fa-dedent fa-fw text"></i>
            <i class="fa fa-indent fa-fw text-active"></i>
          </a>
        </div>
        <!-- / buttons -->
      </div>
      <!-- / navbar collapse -->
  </header>
  <!-- / header -->
  <!-- aside -->
  <aside id="aside" class="app-aside hidden-xs bg-dark">
      <div class="aside-wrap">
        <div class="navi-wrap">

          <!-- nav -->
          <nav ui-nav class="navi clearfix">
            <ul class="nav">
              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>导航</span>
              </li>
              <li>
                <a href="./">
                  <i class="glyphicon glyphicon-home icon text-primary-dker"></i>
          <b class="label bg-info pull-right">N</b>
                  <span class="font-bold">站点首页</span>
                </a>
              </li>
              
              <li class="line dk"></li>
              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span>功能</span>
              </li>
        <li>
                <a href="?link">
                  <i class="fa fa-link"></i>
                  <span>连接管理</span>
                </a>
              </li>
        <li>
                <a href="?file">
                  <i class="fa fa-file"></i>
                  <span>文件管理</span>
                </a>
              </li>
        <li>
                <a href="?terminal">
                  <i class="fa fa-terminal"></i>
                  <span>虚拟终端</span>
                </a>
              </li>
        <li>
              <li class="line dk hidden-folded"></li>

              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">          
                <span>帮助</span>
              </li>
              <li>
                <a href="http://wpa.qq.com/msgrd?v=3&uin=1805765171&site=qq&menu=yes" target="blank">
                  <i class="fa fa-qq"></i>
                  <span>联系作者</span>
                </a>
              </li>
              <li>
                <a href="https://jq.qq.com/?_wv=1027&k=5EIL4p5" target="blank">
                  <i class="glyphicon glyphicon-map-marker"></i>
                  <span>总群交流</span>
                </a>
              </li>

            </ul>
          </nav>
          <!-- nav -->
          <!-- aside footer -->
          <div class="wrapper m-t">
            <div class="text-center-folded">
              <span class="pull-right pull-none-folded">56%</span>
              <span class="hidden-folded">Server Pressure</span>
            </div>
            <div class="progress progress-xxs m-t-sm dk">
              <div class="progress-bar progress-bar-info" style="width: 56%;">
              </div>
            </div>
            <div class="text-center-folded">
              <span class="pull-right pull-none-folded">48%</span>
              <span class="hidden-folded">Server Memory</span>
            </div>
            <div class="progress progress-xxs m-t-sm dk">
              <div class="progress-bar progress-bar-primary" style="width: 48%;">
              </div>
            </div>
          </div>
          <!-- / aside footer -->
        </div>
      </div>
  </aside>
  <!-- / aside -->
  <!-- content -->
<?php
if(isset($_GET['link'])){
  include './view/link.php';
}
else if(isset($_GET['file'])){
  include './view/file.php';
}
else if(isset($_GET['hack'])){
  include './view/hack.php';
}
else if(isset($_GET['terminal'])){
  include './view/terminal.php';
}
else{
  include './view/main.php';
}
?>
  <!-- / content -->

  <!-- footer -->
  <footer id="footer" class="app-footer" role="footer">
        <div class="wrapper b-t bg-light">
      <span class="pull-right">Powered by <a href="/" target="_blank">陌小离</a></span>
      &copy; 2016-<?php echo @date('Y'); ?> Copyright.
    </div>
  </footer>
  <!-- / footer -->

</div>

<script src="https://template.down.swap.wang/ui/angulr_2.0.1/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://template.down.swap.wang/ui/angulr_2.0.1/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="https://template.down.swap.wang/ui/angulr_2.0.1/html/js/ui-load.js"></script>
<script src="https://template.down.swap.wang/ui/angulr_2.0.1/html/js/ui-jp.config.js"></script>
<script src="https://template.down.swap.wang/ui/angulr_2.0.1/html/js/ui-jp.js"></script>
<script src="https://template.down.swap.wang/ui/angulr_2.0.1/html/js/ui-nav.js"></script>
<script src="https://template.down.swap.wang/ui/angulr_2.0.1/html/js/ui-toggle.js"></script>
<script src="http://ie.swapteam.cn/ie.js"></script>
<script type="text/javascript">
console.log('                                                O                                                             ');
console.log('                  :L               @X            @@            .7uOB@@@@@B@@0                                 ');
console.log('                   1@@@@@           @:            @@iM@@@@     @@::@@7@@@OFvLBZ            @r           @j    ');
console.log('           7@@@,       @@           @@        @@@@7@@i@@:          @      Y@@M           @@@@           @L    ');
console.log('        @@@G   @@     @             @@              ,@@  :        @@  v S@L  @@         @7  ,@          @     ');
console.log('           @   @S   7@@,i           @M           @  @, @@@@       @M  @@     @@       7@@    @@   @@   i@     ');
console.log('           @ i@    @@Z:i7M@@   .@   @7          @@@@    @@        @  1@@U@@@u@       @@@PPLr;@@   @@   @@     ');
console.log('          i@@@   @@        @@  @0   @   @@     @@@      @r       q@  @@@@@@@@@      @@      .@@   @@   @@     ');
console.log('          @@   @@@, @@@@0,  @ M@    @    @@    @@   M@@@@i,      @@   ,    :@      F@  @@XG@@     @    @@     ');
console.log('          @O  @@ @@     M@u@@ @     @      @@   @@@@@@@  .j@@i   @.    @O  @@@     @   @.        i     @F     ');
console.log('          @@;@   @@    @@@ i@@@    .@       F   L@  @@  M@   @q  @    @@   @@ @@      @@      ,@@      @      ');
console.log('          @@     @@     @@   @@     @          @        J@          @@M              @         @       @      ');
console.log('          @E     @@  @@@    @@      @         @@   :@@@@7@@  @@ @@   @@    @    @@    .@u .X@@@        @      ');
console.log('          @O     L@@@@    L@@M      @         @@   @@     @  @, E@  i@     @     L@     rB@1           @      ');
console.log('           @7                       @i        @@            @@      @     @@                           0      ');
console.log('                                                                                                              ');
</script>
</body>
</html>