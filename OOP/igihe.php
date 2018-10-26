<?php 
	session_start();
	if (isset($_SESSION['name'])){
	}
	else{
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="images/icon.jpeg" />
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style/cssigihe.css">
	<link rel="stylesheet" type="text/css" href="font/web-fonts-with-css/css/fontawesome-all.min.css">
</head>
<body>
	<div id="header">
		     <div id="menu">
		     	<a href="#"><i class="fa fa-bars"></i></a>
		     </div>
		 <div id="logo">
		 	<img src="images/igihe.png">
		 </div>
		 <div id="linq">
		 	<div id="up"> 
		 		<?php echo '<a href="profile.php" target= "_blank">Update</a>'  ?>
		 	 </div>
		 	<div id="reg"> <?php 
		 		echo '<a href="newuser.php" target= "_blank" tyle="padding: 20px;">Register</a>';
		 	 ?> </div>
		 	 <div id="return">
		 	 	<a href="ajaxPass.php" target="_blank">AjaxPass</a>
		 	 </div>
		 	 <div id="all">
		 	 	<a href="allusers.php" target="_blank">AllUsers</a>
		 	 </div>
		 	 <div id="map">
		 	 	<a href="country_Map/index.php" target="_blank">Map</a>
		 	 </div>
		 	<div id="log">
		 		<span><?php  
		 		if (isset($_SESSION['name'])) 
				{
					echo 'welcome::   ' .$_SESSION['name'];
					echo "<br>";
					echo "&nbsp";
					echo '<a href="logout.php?signout" style = "text-decoration: none;">Log out</a>';
					if ((time()-$_SESSION['lastLogin'])>3600) {
						session_destroy();
						header("location: logout.php");
					}
				}
				else
				{
					header("location:index.php");
				}
				echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
				echo '<a href="ajax.php" target= "_blank">Profile</a>';
		 		?></span>
		 	</div>
		 </div>
		</div> 
	<div id="main">
			<!-- MUSHIKIWABO-->
        <div id="mushikiwabo">
			<img src="images/mushikiwabo.png" >
		</div>
		<div id="louise">
			<div id="text"><a href="#"><p>U Rwanda ntabwo rurimo gusabiriza impunzi Mushikiwabo</p></a> </div>
			<div id="icons">
			<a href="#"><i id="comment1" class="fa fa-2x fa-comment" style="width: 10px;"></i></a>
			<i id="clock1" class="fa fa-clock" >1 hour ago</i>
			<a href="#"><i id="Share1" class="fa fa-share-alt" style="width: 10px;">Share</i></a>
			</div>
		</div><hr>
		      <!-- KANIMBA-->
        <div id="kanimba">
			<img src="images/kanimba.png" >
		</div>
		<div id="francois">
			<div id="text"><a href="#"><p>Umusaruro mbumbe w'igihugu wiyongereye ku rugero rwa 6.1% mu 2017</p></a> </div>
			<div id="icons">
			<a href="#"><i id="comment2" class="fa fa-2x fa-comment" style="width: 10px;"></i></a>
			<i id="clock2" class="fa fa-clock" >17 hours ago</i>
			<a href="#"><i id="Share2" class="fa fa-share-alt" style="width: 10px;">Share</i></a>
			</div>
		</div><hr>
		 			 <!-- IMPUNZI -->
		 <div id="impunzi">
			<img src="images/impunzi.png" >
		</div>
		<div id="impu">
			<div id="text"><a href="#"><p>Mushikiwabo yaburiye impunzi z'Abarundi zinjiranye mu Rwanda'imyitwrire idasanzwe  y'idini'</p></a> </div>
			<div id="icons">
			<a href="#"><i id="comment3" class="fa fa-2x fa-comment" style="width: 10px;"></i></a>
			<i id="clock3" class="fa fa-clock" >20 hours ago</i>
			<a href="#"><i id="Share3" class="fa fa-share-alt" style="width: 10px;">Share</i></a>
			 </div>
		</div><hr>
   <!-- CONVENTION -->
		 <div id="conve">
		    <img src="images/convention.png">
		    <a href="#"><p>Abakuru b'ibihugu barenga 26<br/> bategerejwe mu Rwanda mu nama<br/> idasanzwe ya AU (Video)</p></a>
		    <i id="Share6" class="fa fa-share-alt" style="width: 10px;">Share</i>
		    <i id="comment6" class="fa fa-2x fa-comment" style="width: 10px;"></i>
		    <i id="clock6" class="fa fa-clock">21 hours ago</i>
		    </div><hr/>
       <!-- UGANDAN -->
       <div id="lou">
       		<div id="text">
       			<a href="#"><p>Mushikiwabo yashimangiye ko u<br/> Rwanda rutarumva impamvu<br/> abaturage barwo bahohoterwa muri<br/> Uganda</p></a><br/><br/>
       			<a href="#"><i id="comment9" class="fa fa-2x fa-comment" style="width: 10px;"></i></a>
       			<a href="#"><i id="clock9" class="fa fa-clock">21 hours ago</i></a>
       			<a href="#"><i id="Share9" class="fa fa-share-alt" style="width: 10px;">Share</i></a>
       		</div>
       </div><hr/>
          <!-- SOLAR PANNEL -->
		   <div id="pannel">
		    <img src="images/solar pannel.png">
		    <a href="#"><p>U Rwanda rugiye kubaka uruganda <br/> rwa mbere mu karere ruzatanga<br/> MW 30 ziva ku mirasire y'izuba</p></a>
		    <i id="Share6" class="fa fa-share-alt" style="width: 10px;">Share</i>
		    <i id="comment6" class="fa fa-2x fa-comment" style="width: 10px;"></i>
		    <i id="clock6" class="fa fa-clock">22 hours ago</i>
		    </div><hr/>
     			<!-- SATELLITE-->
		<div id="icyoga"> 
              <img src="images/icyogajuru.png" width="100%" height="200"">
              <a href="#"><p>U Rwanda rwinjiye mubufatanye n'ibindi bihugu mu mushinga wo kubaka icyogajuru</p></a>
              <div id="you" >
              	<span id="comment"><a href="#"><i class="fa fa-2x fa-comment"></i></a></span>
              	<span id="clock" ><i class="fa fa-clock">Yesterday</i></span>
              	<span id="Share" ><a href="#" style="text-decoration: none;" ><i class="fa fa-share-alt"></i>Share</a></span>
               </div>
		</div><hr/>
				<!-- KIM -->
		<div id="kwamamaza">
			<div id="text"><h3><b>KWAMAMAZA</b></h3></div>
			<div id="kim">
				<img id="univer" src="images/kwamamaza.png">
			</div><hr>
                 <!-- MAN-U-->
     		<div id="man-u">
		    <img src="images/man-u.png">
		    <a href="#"><p>Champions League: Manchester  United yakozwe mu jisho na Sevilla  iyisezerera muri 1/8</p></a>
		    <i id="Share" class="fa fa-share-alt" style="width: 10px;">Share</i>
		    <i id="comment" class="fa fa-2x fa-comment" style="width: 10px;"></i>
		    <i id="clock" class="fa fa-clock" style="width: 10px;">08:46'</i>
		    </div>
		     <hr/>
		     <!-- SENTORE-->
		     <div id="man-u">
		    <img src="images/sentore.png" width="300">
		    <a href="#"><p>Nyina wa Jules Sentore yitabye<br/> Imana</p></a>
		    <i id="Share" class="fa fa-share-alt" style="width: 10px;">Share</i>
		    <i id="comment" class="fa fa-2x fa-comment" style="width: 10px;"></i>
		    <i id="clock" class="fa fa-clock-o" style="width: 10px;">08:43'</i>
		    </div><hr>
     		</div>
     	<div id="inkuru-zamamaza">
     		<div id="title"><p > <b>Inkuru Zamamaza</b></p></div>
     		<div id="amavuta">
     			<div id="photo">
     			<img src="images/abagore.png"> 
     			</div>
     			<div id="text">
     				<p>Ku munsi w'abagore: Sebamed  yagabanyijeho 25% kumavuta  akuraho amaribori n'imiti isukura mu  kanwa </p>
     			</div><hr/>
     			</div>
     			<div id="kcb">
     			<div id="photo">
     				<img src="images/kcb.png">
     			</div>
     			<div id="text">
     				<p>KCB yatangije gahunda yise 'Igire' izafasha urubyiruko 100 gutangiza imishinga yarwo</p>
     			</div>
     		</div><hr/>
     		<div id="canal">
     			<div id="photo">
     				<img src="images/canal.png">
     			</div>
     			<div id="text">
     				<p>Canal+ yorohereje abakiriya bayo<br/> kubona dekoderi n'ifatabuguzi <br/> ryayo ry'ukwezi</p>
     			</div>
     		</div><hr/>
     	<div id="rubavu">
     			<div id="photo">
     				<img src="images/amavuta-rubavu.png">
     			</div>
     			<div id="text">
     				<p>Mukabatesi uba mu Bibiligi yaguriye ubucuruzi bw'amavuta yo kwisiga i Rubavu</p>
     			</div>
     		</div><hr/>
     		<div id="izindi">
     				<a href="#"><p>Soma izindi</p></a>
     			</div>
     		</div><hr>
   			<div id="amamaza">
					<p>Kwamamaza</p>     			
     		</div><hr>
     		<div id="bestnews">
     			<div id="text">
     				<p><br/>BEST NEWS WORD PRESS</p></div>
     			<div id="numb">
     				<p>728×90</p>
     			</div></div><hr>
     			<div id="last">
     				<div id="left">
     					<a href="#"><i class="fa fa-envelope" id="message"> &nbsp Twandikire</i></a>
     					<a href="#"><i class="fa fa-phone" m>&nbsp Duhamagare kuri<br/> 4546</i></a>
     				</div>
     				<div id="center">
     					<img src="images/igihefooter.png">
     				</div>
     				<div id="right">
     					<a href="#"><i class="fa fa-bullhorn">&nbspKwamamaza</i></a>
     					<a href="#"><i class="fa fa-shield">&nbspAbo turi bo</i></a>
     				</div>
     			</div><hr>
	</div>
	</div>
</div>  
</body>
</html>