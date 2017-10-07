<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="jquery,ui,easy,easyui,web">
	<meta name="description" content="easyui help you build your web page easily!">
	<title>jQuery EasyUI Demo</title>
	<link rel="stylesheet" type="text/css" href="http://www.w3cschool.cc/try/jeasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="http://www.w3cschool.cc/try/jeasyui/themes/icon.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="http://www.w3cschool.cc/try/jeasyui/jquery.easyui.min.js"></script>
	<style>
		.panel-body{
			background:#f0f0f0;
		}
		.panel-header{
			background:#fff url('images/panel_header_bg.gif') no-repeat top right;
		}
		.panel-tool-collapse{
			background:url('images/arrow_up.gif') no-repeat 0px -3px;
		}
		.panel-tool-expand{
			background:url('images/arrow_down.gif') no-repeat 0px -3px;
		}
	</style>
</head>
<body>
<div id="wrapper1" style="margin:0 auto;position:relative;width:1024px;height:auto;background:#7190E0">

<ul id="menu" style="list-style-type:none;margin:0;padding:0;overflow:hidden;">

<style>
/*#menu1{
.li
{
float:left;
}
.a:link,a:visited
{
display:block;
width:120px;
font-weight:bold;
color:#FFFFFF;
background-color:#bebebe;
text-align:center;
padding:4px;
text-decoration:none;
text-transform:uppercase;
}
.a:hover,a:active
{
background-color:#cc0000;
}
}*/
</style>


<li id="menu1"><a href="#home">Home</a></li>
<li class="menu2"><a href="#news">News</a></li>
<li class="menu3"><a href="#contact">Contact</a></li>
<li class="menu4"><a href="#about">About</a></li>
</ul>

</div>
<div id="wrapper2" style="margin:0 auto;position:relative;width:1024px;height:auto;background:#7190E0">
	<div style="width:200px;height:1024px;background:#7190E0;padding:5px;">
		
        <div class="easyui-panel" title="Picture Tasks" collapsible="true" style="width:200px;height:auto;padding:10px;">
			View as a slide show<br/>
			Order prints online<br/>
            Order prints online<br/>
            Order prints online<br/>
            Order prints online<br/>
            Order prints online<br/>
            Order prints online<br/>
            Order prints online<br/>
			Print pictures
		</div>
		<br/>
		<div class="easyui-panel" title="File and Folder Tasks" collapsible="true" style="width:200px;height:auto;padding:10px;">
			Make a new folder<br/>
			Publish this folder to the Web<br/>
			Share this folder
		</div>
		<br/>
		<div class="easyui-panel" title="Other Places" collapsible="true" collapsed="true" style="width:200px;height:auto;padding:10px;">
			New York<br/>
			My Pictures<br/>
			My Computer<br/>
			My Network Places
		</div>
		<br/>
		<div class="easyui-panel" title="Details" collapsible="true" style="width:200px;height:auto;padding:10px;">
			My documents<br/>
			File folder<br/><br/>
			Date modified: Oct.3rd 2010
		</div>
	</div>
</div>
   
</body>
</html>