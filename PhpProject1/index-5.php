
<!DOCTYPE HTML>
<html lang="pl-PL">
<head>
<meta charset="UTF-8">
<title>Heaven</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css">
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script type="text/javascript" src="js/sprites.js"></script>
<script type="text/javascript" src="js/gSlider.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<!--[if lt IE 7]> <div style=' clear: both; height: 59px; padding:0 0 0 15px; position: relative;'> <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div> <![endif]-->
<!--[if lt IE 9]><script src="js/html5.js" type="text/javascript"></script><![endif]-->
<!--[if IE]><link href="css/ie_style.css" rel="stylesheet" type="text/css" /><![endif]-->
</head>
<body id="page6">
<div id="main">
	<header>
		<nav>
			<ul>
			<li ><a href="index.html">O nas</a></li>
			<li><a href="index-1.html">Audio</a></li>
			<li><a href="index-2.html">Video</a></li>
			<li><a href="index-3.html">Galeria</a></li>
			<li><a href="index-4.html">Kontakt</a></li>
			<li class="active"><a href="index-5.php">Goście</a></li>
                        <li  ><a href="panel_admin.php">Admin</a></li>
                        </ul>
	</nav>
	
</header>
  <article id="content">F
	<div class="col-1">
		<div class="p2">
		<h2>Nowe Zdjęcia</h2>
		<img src="images/col-1-img.jpg" class="p1" alt=""> <a href="index-3.html" class="more">Więcej</a></div>
		<div class="p2">
		<h2>Nowy Film</h2>
		<a href="video/video_AS3.swf?width=512&amp;height=288&amp;fileVideo=temp_video.flv"><img class="p1" src="images/col1-video-thumb1.jpg" alt=""></a>
		<div class="alc"><a href="index-2.html">Więcej Filmów</a></div>
		</div>
	</div>
	<div class="col-2">
		<h2>Księga gości</h2>
		
                    <h3>Dobrze bawiłeś się z naszym zespołem? Zostaw Wpis!</h3>
                    <div class="table-border">
		<table class="dates">
			<tr >
		<td> TUTAJ WYŚWIETLAM WPISY</td>
			</tr>
<tr>
    <td><form id="form" action="php/post.php" method="post" enctype="multipart/form-data"> 
            <fieldset>
                <label><span class="form">Imie:</span><input name="imie" type="text" pattern="[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{3,20}" required title="Minimum 3 litery. Cyfry nie są dozwolone."/></label><br>
                     <div>Wiadomość:</div>
                    <textarea  rows="10" cols="75" name="wiadomosc" placeholder="Tutaj wpisz wiadomość, którą chcesz nam przekazać. " required title="To pole nie może być puste."></textarea>
                             <input type="submit" value="Wyślij"  name="wyslij" class="more" /> 
                             <input type="reset" value="Wyczyść" class="more"  /> 
        </fieldset>
        </form></td>
			
</tr>
			
                        
		</table>
                        
                        <?php 

                        require_once("php/config.php");


                        $data= array();
                        $strSql = "SELECT `imie`,`wiadomosc`,`data` from `wiadomosci` order by `id` desc";
                        $result = $mySqli->query($strSql);


                        while($rs = $result->fetch_array()) { $data[] = $rs; }


                        $intCnt = count($data);


                        ?>
                        <table width="100%">
                            <?php for($iRow=0;$iRow<$intCnt;$iRow++) { ?>
                            <tr>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <td><?php echo $data[$iRow]["imie"].'      '.date("Y-m-d H:i",$data[$iRow]["data"]);?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td><?php echo $data[$iRow]["wiadomosc"];?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="2" height="20"><hr size="1" /></td>
                                        </tr>
                                    </table>
                            </tr>
                            <?php } ?>
                        </table>

                        
		</div>
          
		
	</div>
	<div class="col-3">
		<h2>Ostatnie Wpisy</h2>
		<div class="und">
		<p>Coś tam coś tam, do uzupełnienia<br>
			<a href="index-5.php">1h temu</a></p>
		<p>Coś tam coś tam, do uzupełnienia<br>
			<a href="index-5.php">23h temu</a></p>
		<p>Coś tam coś tam, do uzupełnienia<br>
			<a href="index-5.php">2d 7h temu</a></p>
		<p>Coś tam coś tam, do uzupełnienia<br>
			<a href="index-5.php">15d 7h temu</a></p>
		<p>Coś tam coś tam, do uzupełnienia<br>
			<a href="index-5.php">25d 7h temu</a></p>
		</div>
		
		<h2>ZNAJDŹ NAS!</h2>
		<ul class="soc-ico">
		<li><a href="https://www.facebook.com/grupaheaven?fref=ts"><img src="images/facebook.png" alt=""></a></li>
		<li><a href="#"><img src="images/twitter.png" alt=""></a></li>
		<li><a href="#"><img src="images/myspace.png" alt=""></a></li>
		<li><a href="#"><img src="images/linkedin.png" alt=""></a></li>
		</ul>
	</div>
  </article>
  <div class="af clear"></div>
</div>
<footer>
	<span>
            <a>GRUPA MUZYCZNA HEAVEN. grupaheaven@go2.pl tel. 608 330 811</a><br>
            <a>Dumnie wspierane przez WordPressa</a>
	</span>
</footer>
<script type="text/javascript">Cufon.now();
$(function(){
	$('nav,.more,.header-more').sprites();

	$('.header-slider').gSlider({
		prevBu:'.hs-prev',
		nextBu:'.hs-next'
	});
	
	$('a[rel=prettyPhoto]').each(function(){
		var th=$(this),
			pb;
		th
			.append(pb=$('<span class="playbutt"></span>').css({opacity:.7}));
		pb
			.bind('mouseenter',function(){
				$(this)
					.stop()
					.animate({opacity:.9});
			})
			.bind('mouseleave',function(){
				$(this)
					.stop()
					.animate({opacity:.7});
			});
	})
	.prettyPhoto({theme:'dark_square'});
});
</script>
</body>
</html>