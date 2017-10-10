<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>jQuery UI 标签页（Tabs） - 通过 Ajax 获取内容</title>
  <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
  <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="/try/demo_source/jqueryui/style.css">
  <script>
  $(function() {
    $( "#tabs" ).tabs({
      beforeLoad: function( event, ui ) {
        ui.jqXHR.error(function() {
          ui.panel.html(
            "不能加载该标签页。如果这不是一个演示。" +
            "我们会尽快修复这个问题。" );
        });
      }
    });
  });
  </script>
  <style>
		#tabs {margin:0 auto;position:relative;width:1100px;height:auto; }
	</style>
</head>
<body>
 
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">预加载</a></li>
    <li><a href="ajax/threejs.php">three.js</a></li>
    <li><a href="ajax/content2.html">标签 2</a></li>
    <li><a href="ajax/content3-slow.php">标签 3 （慢的）</a></li>
    <li><a href="ajax/content4-broken.php">标签 4 （损坏的）</a></li>
  </ul>
  <div id="tabs-1">
    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
  </div>
</div>
 
 
</body>
</html>
