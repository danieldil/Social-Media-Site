<link rel="stylesheet" type="text/css" href="style.css" />
<html>
<div id="welcome">
 <strong>Super Car Sunday Forums! </strong>
</div>
<br><br><br><br>
Here is your profile
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<div id ="logoutp"><a href="logout.php">Log Out </a> </div>
<?php
echo ucfirst($firstname)."<br>";

 if(!getUserField('pic_uploaded'))
	{ 
		include 'uploadprompt.php';
	}
	else
	{
	echo "<br>";
	$pic_name = getUserField('pic_name');
	?>
	Profile Picture <br>
	<img src="<?php echo "uploads/".$pic_name;?>" height="202" width="240">
	<br>Change your profile picture <form action="index.php" method="GET">
		<input type="submit" value="Here"name="ch">
		</form>
	<?php
	}
	if(isset($_GET['ch']))
		{
			if($_GET['ch']=='Here')
			{
				$query = "UPDATE `first`.`users` SET `pic_uploaded` = '0' WHERE `id` = '".$_SESSION['user_id']."'";
				mysql_query($query);
				header( "refresh:.001;url= index.php" );
			}
		}
	?>
	
	
	
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script typ="text/javascript">
function Slider(){
$(".slider #1").show("fade",500);
	$("#users #01").show(0).delay(3500).hide(0);
	$("#02").hide(0);
	$("#03").hide(0);
	$("#04").hide(0);
	$("#05").hide(0);
	
	$(".slider #1").delay(2500).hide("slide",{direction:"left"},500);
var sc = $(".slider img").size();
var count = 2;

setInterval(function(){
	$(".slider #"+count).show("slide",{direction:"right"},500);
	$(".slider #"+count).delay(2500).hide("slide",{direction:"left"},500);
	$("#users #0"+count).show(0).delay(3500).hide(0);
	if(count==sc){
		count = 1;
		}
	else{count = count+1;}
	},3500);
}

$(function(){$( '.dropdown' ).hover(
        function(){
            $(this).children('.sub-menu').slideDown(200);
        },
        function(){
            $(this).children('.sub-menu').slideUp(200);
        }
    );
});
</script>
</head>
<body onload="Slider();">
<!--
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script type="text/javascript" src="jquery00.js"></script>
	<script type="text/javascript" src="ticker00.js"></script>
	<script type="text/javascript">
$(function(){
	$('#fade').list_ticker({
			speed:2500,
			effect:'fade'
		});
	});
</script>













<script type="text/javascript" src="jquery00.js"></script>
	<script type="text/javascript" src="ticker00.js"></script>

<button id="btn1">toggle fast</button>
<button id="btn2">toggle slow</button>

<div id="box" style="background:#98bf21;height:100px;width:100px;margin:6px;"></div>-->

	
	
	<!--
		<div id = "menu_container">
		Here is a list of cars<br> Click the one you care about <br>
		<a href="fav.php?topic=Acura"> Acura </a><br>
		<a href="fav.php?topic=AstonMartin"> AstonMartin </a><br>
		<a href="fav.php?topic=Audi"> Audi </a><br>
		<a href="fav.php?topic=bmw"> Bmw </a><br>
		<a href="fav.php?topic=cadillac"> Cadillac </a><br>
		<a href="fav.php?topic=chevrolet"> Chevrolet </a><br>
		<a href="fav.php?topic=chrysler"> Chrysler </a><br>
		<a href="fav.php?topic=ferrari"> Ferrari </a><br>
		<a href="fav.php?topic=ford"> Ford </a><br>
		<a href="fav.php?topic=lancers"> Lancer </a><br>
		<a href="fav.php?topic=mclarens"> Mclarens </a><br>
		<a href="fav.php?topic=posts"> Mustang </a><br>
		</div>
		-->
		<style>
#may ul {
	background:#333;
	color:#fff;
	padding:10px 20px;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	width:100px;
	display:none;
}

#may ul li {
	list-style:none;
	font-family:verdana;
	font-size:3vw;
	display:none;
}
		</style>
		
		<!-- now we select the usernames and the pictures from the database for the OTHER USER'S YOU MAY KNOW section-->
		<?php
		$array = array();
		$parray = array();
		$loop = mysql_query("SELECT `username`,`pic_name` FROM `users`")
		or die (mysql_error());
			$x=0;
			while ($row = mysql_fetch_array($loop))
				{
				//$query_run = mysql_query("SELECT `username` FROM `users`");// WHERE `id` = '1'");
				//echo "- ' ".$row['post']." ' -";
				$array[$x] = $row['username'];
				$parray[$x]= $row['pic_name'];
				?>
				<!--<img src="<?php// echo "uploads/".mysql_result(mysql_query("SELECT `pic_name` FROM `users` WHERE `id` = '".$row['user_id']."'"),0,'pic_name');?>" height="24" width="24">-->
				<?php
				$x++;
			//echo $array[0];
				}
				$randarr = array();
				for ($i = 0; $i <= 5; $i++) {
					$randarr[$i] = rand(0,15);
				} 
				?>



		<br>
	Other User's you may know!
	<div id="users">
	<div id="01" ><?php echo $array[$randarr[0]];?></div>
	<div id="02" ><?php echo $array[$randarr[1]];?></div>
	<div id="03" ><?php echo $array[$randarr[2]];?></div>
	<div id="04" ><?php echo $array[$randarr[3]];?></div>
	<div id="05" ><?php echo $array[$randarr[4]];?></div>
	</div>

<style type = "text/css">
.slider{
width:23vw;
height:23vw;
overflow:hidden;
margin:30px auto;
background-image:url(120430.gif);
background-repeat:no-repeat;
background-position:center;
}
.slider img{
width:23vw;
height 23vw;
display:none;
}
</style>
<div class="slider">
		<img id="1" src="<?php echo "uploads/".$parray[$randarr[0]]; ?>"border="0"alt="pic1"/>
		<img id="2" src="<?php echo "uploads/".$parray[$randarr[1]]; ?>"border="0"alt="pic2"/>
		<img id="3" src="<?php echo "uploads/".$parray[$randarr[2]]; ?>"border="0"alt="pic3"/>
		<img id="4" src="<?php echo "uploads/".$parray[$randarr[3]]; ?>"border="0"alt="pic4"/>
		<img id="5" src="<?php echo "uploads/".$parray[$randarr[4]]; ?>"border="0"alt="pic5"/>
	</div>

</body>
<nav>
    <ul>
        <li class="dropdown">
            <a href="#">Cars</a>
            <ul class="sub-menu">
				<a href="fav.php?topic=Acura"> Acura </a><br></li>
	<li>	<a href="fav.php?topic=AstonMartin"> AstonMartin </a><br></li>
	<li>	<a href="fav.php?topic=Audi"> Audi </a><br></li>
	<li>	<a href="fav.php?topic=bmw"> Bmw </a><br></li>
	<li>	<a href="fav.php?topic=cadillac"> Cadillac </a><br></li>
	<li>	<a href="fav.php?topic=chevrolet"> Chevrolet </a><br></li>
	<li>	<a href="fav.php?topic=chrysler"> Chrysler </a><br></li>
	<li>	<a href="fav.php?topic=ferrari"> Ferrari </a><br></li>
	<li>	<a href="fav.php?topic=ford"> Ford </a><br></li>
	<li>	<a href="fav.php?topic=lancers"> Lancer </a><br></li>
	<li>	<a href="fav.php?topic=mclarens"> Mclarens </a><br></li>
	<li>	<a href="fav.php?topic=posts"> Mustang </a><br></li>
            </ul>
        </li>
    </ul>
</nav>
</html>