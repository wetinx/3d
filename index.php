<!DOCTYPE html>
<html>  <!--html的注释语法-->
<head>
<meta charset="utf-8">
<meta name="keywords" content="思维导图">
<meta name="description" content="脑图">
<meta name="robots" content="all" />
<meta name="author" content="wetin" />
<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta http-equiv="page-enter" content="revealtrans(duration=5.0,Transition=8)">
<!--meta HTTP-EQUIV="refresh" content="3; url=index.php" -->
<title>3D-元素周期表</title>
<link rel="Shortcut icon" href="ico/ico3232.ico" />  <!--标题图标地址-->
<link href="css/demo.css?v1" rel="stylesheet" media="all" />

<style>       /* CSS的注释语法是：(/ * ...... * /)*/
html, body {
	height: 100%;
}

body {
	background-color: #000000;
	margin: 0;
	font-family: Helvetica, sans-serif;;
	overflow: hidden;
}

a {
	color: #ffffff;
}

#info {
	position: absolute;
	width: 100%;
	color: #ffffff;
	padding: 5px;
	font-family: Monospace;
	font-size: 13px;
	font-weight: bold;
	text-align: center;
	z-index: 1;
}

#menu {
	position: absolute;
	bottom: 20px;
	width: 100%;
	text-align: center;
	font-family: verdana,Tahoma,Arial,Hei,"Microsoft Yahei",SimHei;
}

.element {          /*单一元素框架*/
	width: 120px;
	height: 160px;
	box-shadow: 0px 0px 12px rgba(0,255,255,0.5);
	border: 1px solid rgba(127,255,255,0.25);
	text-align: center;
	cursor: default;  //cursor 光标
}

.element:hover {  //hover盘旋
	box-shadow: 0px 0px 12px rgba(0,255,255,0.75);
	border: 1px solid rgba(127,255,255,0.75);
}

	.element .number {
		position: absolute;
		top: 20px;
		right: 20px;
		font-size: 12px;
		color: rgba(127,255,255,0.75);
	}

	.element .symbol {
		position: absolute;
		top: 40px;
		left: 0px;
		right: 0px;
		font-size: 60px;
		font-weight: bold;
		color: rgba(255,255,255,0.75);
		text-shadow: 0 0 10px rgba(0,255,255,0.95);
	}

	.element .details {
		position: absolute;
		bottom: 15px;
		left: 0px;
		right: 0px;
		font-size: 12px;
		color: rgba(127,255,255,0.75);
	}

button {
	color: rgba(127,255,255,0.75);
	background: transparent;
	outline: 1px solid rgba(127,255,255,0.75);
	border: 0px;
	padding: 5px 10px;
	cursor: pointer;
}
button:hover {
	background-color: rgba(0,255,255,0.5);
}
button:active {
	color: #000000;
	background-color: rgba(0,255,255,0.75);
}
</style>
</head>


<body>
<script src="js/three.min.js" ></script>
<script src="js/tween.min.js" ></script>
<script src="js/TrackballControls.js" ></script>
<script src="js/CSS3DRenderer.js" ></script>

<div id="container"></div>
<div id="info">3D-元素周期表</div>
<div id="menu">
<button id="table">表面</button>
<button id="sphere">球体</button>
<button id="helix">螺旋</button>
<button id="grid">网格</button>
</div>

<script>

var table = [
	"H", "Hydrogen", "1.00794", 1, 1,
	"He", "Helium", "4.002602", 18, 1,
	"Li", "Lithium", "#6.941", 1, 2,
	"Be", "Beryllium", "9.012182", 2, 2,
	"B", "Boron", "#10.811", 13, 2,
	"C", "Carbon", "#12.0107", 14, 2,
	"N", "Nitrogen", "#14.0067", 15, 2,
	"O", "Oxygen", "#15.9994", 16, 2,
	"F", "Fluorine", "18.9984032", 17, 2,
	"Ne", "Neon", "#20.1797", 18, 2,
	"Na", "Sodium", "22.98976...", 1, 3,
	"Mg", "Magnesium", "#24.305", 2, 3,
	"Al", "Aluminium", "26.9815386", 13, 3,
	"Si", "Silicon", "#28.0855", 14, 3,
	"P", "Phosphorus", "30.973762", 15, 3,
	"S", "Sulfur", "#32.065", 16, 3,
	"Cl", "Chlorine", "#35.453", 17, 3,
	"Ar", "Argon", "#39.948", 18, 3,
	"K", "Potassium", "#39.948", 1, 4,
	"Ca", "Calcium", "#40.078", 2, 4,
	"Sc", "Scandium", "44.955912", 3, 4,
	"Ti", "Titanium", "#47.867", 4, 4,
	"V", "Vanadium", "#50.9415", 5, 4,
	"Cr", "Chromium", "#51.9961", 6, 4,
	"Mn", "Manganese", "54.938045", 7, 4,
	"Fe", "Iron", "#55.845", 8, 4,
	"Co", "Cobalt", "58.933195", 9, 4,
	"Ni", "Nickel", "#58.6934", 10, 4,
	"Cu", "Copper", "#63.546", 11, 4,
	"Zn", "Zinc", "#65.38", 12, 4,
	"Ga", "Gallium", "#69.723", 13, 4,
	"Ge", "Germanium", "#72.63", 14, 4,
	"As", "Arsenic", "#74.9216", 15, 4,
	"Se", "Selenium", "#78.96", 16, 4,
	"Br", "Bromine", "#79.904", 17, 4,
	"Kr", "Krypton", "#83.798", 18, 4,
	"Rb", "Rubidium", "#85.4678", 1, 5,
	"Sr", "Strontium", "#87.62", 2, 5,
	"Y", "Yttrium", "88.90585", 3, 5,
	"Zr", "Zirconium", "#91.224", 4, 5,
	"Nb", "Niobium", "92.90628", 5, 5,
	"Mo", "Molybdenum", "#95.96", 6, 5,
	"Tc", "Technetium", "(98)", 7, 5,
	"Ru", "Ruthenium", "#101.07", 8, 5,
	"Rh", "Rhodium", "#102.9055", 9, 5,
	"Pd", "Palladium", "#106.42", 10, 5,
	"Ag", "Silver", "#107.8682", 11, 5,
	"Cd", "Cadmium", "#112.411", 12, 5,
	"In", "Indium", "#114.818", 13, 5,
	"Sn", "Tin", "#118.71", 14, 5,
	"Sb", "Antimony", "#121.76", 15, 5,
	"Te", "Tellurium", "127.6", 16, 5,
	"I", "Iodine", "126.90447", 17, 5,
	"Xe", "Xenon", "#131.293", 18, 5,
	"Cs", "Caesium", "#132.9054", 1, 6,
	"Ba", "Barium", "#132.9054", 2, 6,
	"La", "Lanthanum", "138.90547", 4, 9,
	"Ce", "Cerium", "#140.116", 5, 9,
	"Pr", "Praseodymium", "140.90765", 6, 9,
	"Nd", "Neodymium", "#144.242", 7, 9,
	"Pm", "Promethium", "(145)", 8, 9,
	"Sm", "Samarium", "#150.36", 9, 9,
	"Eu", "Europium", "#151.964", 10, 9,
	"Gd", "Gadolinium", "#157.25", 11, 9,
	"Tb", "Terbium", "158.92535", 12, 9,
	"Dy", "Dysprosium", "162.5", 13, 9,
	"Ho", "Holmium", "164.93032", 14, 9,
	"Er", "Erbium", "#167.259", 15, 9,
	"Tm", "Thulium", "168.93421", 16, 9,
	"Yb", "Ytterbium", "#173.054", 17, 9,
	"Lu", "Lutetium", "#174.9668", 18, 9,
	"Hf", "Hafnium", "#178.49", 4, 6,
	"Ta", "Tantalum", "180.94788", 5, 6,
	"W", "Tungsten", "#183.84", 6, 6,
	"Re", "Rhenium", "#186.207", 7, 6,
	"Os", "Osmium", "#190.23", 8, 6,
	"Ir", "Iridium", "#192.217", 9, 6,
	"Pt", "Platinum", "#195.084", 10, 6,
	"Au", "Gold", "196.966569", 11, 6,
	"Hg", "Mercury", "#200.59", 12, 6,
	"Tl", "Thallium", "#204.3833", 13, 6,
	"Pb", "Lead", "207.2", 14, 6,
	"Bi", "Bismuth", "#208.9804", 15, 6,
	"Po", "Polonium", "(209)", 16, 6,
	"At", "Astatine", "(210)", 17, 6,
	"Rn", "Radon", "(222)", 18, 6,
	"Fr", "Francium", "(223)", 1, 7,
	"Ra", "Radium", "(226)", 2, 7,
	"Ac", "Actinium", "(227)", 4, 10,
	"Th", "Thorium", "232.03806", 5, 10,
	"Pa", "Protactinium", "#231.0588", 6, 10,
	"U", "Uranium", "238.02891", 7, 10,
	"Np", "Neptunium", "(237)", 8, 10,
	"Pu", "Plutonium", "(244)", 9, 10,
	"Am", "Americium", "(243)", 10, 10,
	"Cm", "Curium", "(247)", 11, 10,
	"Bk", "Berkelium", "(247)", 12, 10,
	"Cf", "Californium", "(251)", 13, 10,
	"Es", "Einstenium", "(252)", 14, 10,
	"Fm", "Fermium", "(257)", 15, 10,
	"Md", "Mendelevium", "(258)", 16, 10,
	"No", "Nobelium", "(259)", 17, 10,
	"Lr", "Lawrencium", "(262)", 18, 10,
	"Rf", "Rutherfordium", "(267)", 4, 7,
	"Db", "Dubnium", "(268)", 5, 7,
	"Sg", "Seaborgium", "(271)", 6, 7,
	"Bh", "Bohrium", "(272)", 7, 7,
	"Hs", "Hassium", "(270)", 8, 7,
	"Mt", "Meitnerium", "(276)", 9, 7,
	"Ds", "Darmstadium", "(281)", 10, 7,
	"Rg", "Roentgenium", "(280)", 11, 7,
	"Cn", "Copernicium", "(285)", 12, 7,
	"Uut", "Unutrium", "(284)", 13, 7,
	"Fl", "Flerovium", "(289)", 14, 7,
	"Uup", "Ununpentium", "(288)", 15, 7,
	"Lv", "Livermorium", "(293)", 16, 7,
	"Uus", "Ununseptium", "(294)", 17, 7,
	"Uuo", "Ununoctium", "(294)", 18, 7
];

var camera, scene, renderer;  //相机，场景，渲染器
var controls;

var objects = [];
var targets = { table: [], sphere: [], helix: [], grid: [] };

init();
animate();

function init() {

	camera = new THREE.PerspectiveCamera( 40, window.innerWidth / window.innerHeight, 1, 10000000 );
//透视相机（THREE.PerspectiveCamera）
//在Threejs中场景就只有一种，用THREE.Scene来表示，要构件一个场景也很简单，只要new一个对象就可以了-->
//设置摄像机camera (0) 声明全局的变量（对象）；(1) 设置透视投影的相机；(2) 设置相机的位置坐标；
//(3) 设置相机的上为「z」轴方向；//(4) 设置视野的中心坐标。
//1.放大倍数（设置透视投影的相机,默认情况下相机的上方向为Y轴，右方向为X轴，沿着Z轴朝里）
//2（视野角：fov 纵横比：aspect 3相机离视体积最近的距离：near 4相机离视体积最远的距离：far）
//camera.position.x = 0;//设置相机的位置x坐标
//camera.position.y = 50;//设置相机的位置y坐标
//camera.position.z = 100;//设置相机的位置z坐标
//camera.up.x = 0;//设置相机的上为「x」轴方向
// camera.up.y = 1;//设置相机的上为「y」轴方向
// camera.up.z = 0;//设置相机的上为「z」轴方向
// camera.lookAt( {x:0, y:0, z:0 } );//设置视野的中心坐标
//http://www.cnblogs.com/shawn-xie/archive/2012/08/16/2642553.html  THREE.PerspectiveCamera透视相机


	camera.position.z = 3000;
	//camera.position.z = 100;//设置相机的位置z坐标

	scene = new THREE.Scene();
	//场景就是一个三维空间。 用 [Scene] 类声明一个叫 [scene] 的对象


	// table 平面

	for ( var i = 0; i < table.length; i += 5 ) {

		var element = document.createElement( 'div' );  //element要素
		element.className = 'element';  //类的名称
		element.style.backgroundColor = 'rgba(0,127,127,' + ( Math.random() * 0.5 + 0.25 ) + ')';
    //RGBA是代表Red（红色） Green（绿色） Blue（蓝色）和 Alpha透明度/不透明度,ranom随机数（0-1）
		var number = document.createElement( 'div' );
		number.className = 'number';
		number.textContent = (i/5) + 1;
		element.appendChild( number );

		var symbol = document.createElement( 'div' );
		symbol.className = 'symbol';
		symbol.textContent = table[ i ];
		element.appendChild( symbol ); //appendchild 添加子节点

		var details = document.createElement( 'div' );
		details.className = 'details';
		details.innerHTML = table[ i + 1 ] + '<br>' + table[ i + 2 ];
		element.appendChild( details );

		var object = new THREE.CSS3DObject( element ); //CSS3DRenderer.js(css3模型渲染器)
		object.position.x = Math.random() * 4000 - 2000;
		object.position.y = Math.random() * 4000 - 2000;
		object.position.z = Math.random() * 4000 - 2000;
		scene.add( object );

		objects.push( object );

		//

		var object = new THREE.Object3D();
		object.position.x = ( table[ i + 3 ] * 140 ) - 1330;
		object.position.y = - ( table[ i + 4 ] * 180 ) + 990;

		targets.table.push( object );

	}

	// sphere 球

	var vector = new THREE.Vector3();  //vector矢量

	for ( var i = 0, l = objects.length; i < l; i ++ ) {    //物体。长度

		var phi = Math.acos( -1 + ( 2 * i ) / l );  //数学反弦函数
		var theta = Math.sqrt( l * Math.PI ) * phi;  //math.sqrt数学平方根,math.pi数学圆周率

		var object = new THREE.Object3D();  //定义一个新的3d物体

		object.position.x = 800 * Math.cos( theta ) * Math.sin( phi );
		object.position.y = 800 * Math.sin( theta ) * Math.sin( phi );
		object.position.z = 800 * Math.cos( phi );

		vector.copy( object.position ).multiplyScalar( 2 );  //multiplyScalar乘以标量

		object.lookAt( vector );

		targets.sphere.push( object );

	}

	// helix 螺旋

	var vector = new THREE.Vector3();  //vector矢量

	for ( var i = 0, l = objects.length; i < l; i ++ ) {

		var phi = i * 0.175 + Math.PI;  //math.pi数学圆周率

		var object = new THREE.Object3D();

		object.position.x = 900 * Math.sin( phi );
		object.position.y = - ( i * 8 ) + 450;
		object.position.z = 900 * Math.cos( phi );

		vector.x = object.position.x * 2;
		vector.y = object.position.y;
		vector.z = object.position.z * 2;

		object.lookAt( vector );

		targets.helix.push( object );

	}

	// grid 格子

	for ( var i = 0; i < objects.length; i ++ ) {

		var object = new THREE.Object3D();

		object.position.x = ( ( i % 5 ) * 400 ) - 800;
		object.position.y = ( - ( Math.floor( i / 5 ) % 5 ) * 400 ) + 800;
		object.position.z = ( Math.floor( i / 25 ) ) * 1000 - 2000;

		targets.grid.push( object );

	}

	//

	renderer = new THREE.CSS3DRenderer();  //渲染器
	renderer.setSize( window.innerWidth, window.innerHeight );
	renderer.domElement.style.position = 'absolute';
	//renderer的domElement元素,表示渲染器中的画布,所有的渲染都是画在domElement上的,
	document.getElementById( 'container' ).appendChild( renderer.domElement );
  //appendChild表示将这个domElement挂接在body下面
	//

	controls = new THREE.TrackballControls( camera, renderer.domElement );
	//TrackballControls.js(场景控制器?，鼠标控制场景)
	controls.rotateSpeed = 0.5;    //rotate旋转  鼠标控制
	controls.minDistance = 5;      //相机离object最近距离
	controls.maxDistance = 600000;  //相机离object最远距离
	controls.addEventListener( 'change', render );
	//addEventListener加入事件监听ender提交change改变


	//以下单击table(平面)
	var button = document.getElementById( 'table' );
	button.addEventListener( 'click', function ( event ) {

		transform( targets.table, 2000 );

	}, false );

	//以下单击sphere(球体)
	var button = document.getElementById( 'sphere' );
	button.addEventListener( 'click', function ( event ) {

		transform( targets.sphere, 2000 );

	}, false );

  //以下单击helix(螺旋)
	var button = document.getElementById( 'helix' );
	button.addEventListener( 'click', function ( event ) {

		transform( targets.helix, 2000 );

	}, false );

 //以下单击grid(网格)
	var button = document.getElementById( 'grid' );
	button.addEventListener( 'click', function ( event ) {

		transform( targets.grid, 2000 );

	}, false );



	transform( targets.table, 5000 );

	//

	window.addEventListener( 'resize', onWindowResize, false );

}

function transform( targets, duration ) {  //duration 持续，期间

	TWEEN.removeAll();  //TWEEN两者之间

	for ( var i = 0; i < objects.length; i ++ ) {

		var object = objects[ i ];
		var target = targets[ i ];

		new TWEEN.Tween( object.position )
			.to( { x: target.position.x, y: target.position.y, z: target.position.z }, Math.random() * duration + duration )
			.easing( TWEEN.Easing.Exponential.InOut )  //Exponential指数、幂数
			.start();

		new TWEEN.Tween( object.rotation )  //rotation 旋转
			.to( { x: target.rotation.x, y: target.rotation.y, z: target.rotation.z }, Math.random() * duration + duration )
			.easing( TWEEN.Easing.Exponential.InOut )
			.start();

	}

	new TWEEN.Tween( this )
		.to( {}, duration * 2 )
		.onUpdate( render ) //render提供
		.start();

}

function onWindowResize() {   //resize调整大水

	camera.aspect = window.innerWidth / window.innerHeight;  //aspect方面、宽高比、纵横比
	camera.updateProjectionMatrix();  //Matrix矩阵

	renderer.setSize( window.innerWidth, window.innerHeight );  //renderer渲染器

	render();  //render提供

}

function animate() {

	requestAnimationFrame( animate );  //requestAnimationFrame可以获得最佳的图形性能

	TWEEN.update();   //TWEEN两者之间

	controls.update();

}

function render() {

	renderer.render( scene, camera );

}

</script>
</body>
</html>
