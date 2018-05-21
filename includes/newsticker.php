<!doctype html>
<html>


<head>
	<link rel="stylesheet" type="text/css" href="../css/jquery.smarticker.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style_news.css">
	</head>
<body>
<div style="background:#FFF !important; color:#000 !important">
<?php
$news_ticker = simplexml_load_file("http://www.brogaard.com/includes/news_ticker.xml");
$temp_count = count($news_ticker);
$count = $temp_count/4;
$count1 = (int)$count;
?>
</div>	
<!--<div class="container">-->
		
		<div class="content lightgray ">
			<div class="padding" style="padding: 0px 3px;">
				

				<div class="smarticker8" style="border-radius:0px !important">
					<ul>
                    <?php
					for($i=0;$i<$count1;$i++)
					{
					?>
						<li data-subcategory="<?=$news_ticker->title[$i]?>" data-category="<?=$news_ticker->date1[$i]?>" data-color="BE191F"><a target="_blank" href="<?php if($news_ticker->a1[$i] == ""){ echo "#";}else {echo str_replace('<','?',$news_ticker->a1[$i]);}?>"><?=$news_ticker->content[$i]?></a></li>
					<?php
                    }
                    ?>
						
					</ul>
				</div>
			</div>
		</div>
		
	<!--</div>-->
	<script type="text/javascript" src="../js/demo.js"></script>

	<script type="text/javascript">
	/*$('.smarticker1').smarticker({
		controllerType: 1
	});
	$('.smarticker2').smarticker({
		theme: 2,
		title: 'News Reader Title Section',
		speed: 2000,
		pausetime: 4000,
		shuffle:true
	});
	$('.smarticker3').smarticker({
		theme: 4,
		speed: 1500,
		pausetime: 3600,
		title: 'Latest News',
		rounded: true,
		animation: 'typing'
	});
	$('.smarticker4').smarticker({
		controllerType: 2,
		theme: 2,
		rounded: true,
		animation: 'fade',
		pausetime:1200,
		speed: 1500,
		direction: 'rtl',
		rssFeed: 'http://www.mehrnews.com/rss,http://ilna.ir/news/rss.cfm?id=4&subid=24,http://irna.ir//fa/rss.aspx?kind=45,http://www.farsnews.com/rss.php?srv=4,http://www.varzesh3.com/rss/',
		rssCats: 'آخرین اخبار,اقتصادی,موسیقی,ورزشی,عمومی',
		rssColors: '0d8800,cd2122,9b59b6,2980b9,34495e',
		rssSources: 'مهر,ایلنا,ایرنا,فارس,ورزش3',
		googleFont: false,
		googleApi:false,
		shuffle:true
	});

	$('.smarticker5').smarticker({
		theme:'2',
		shuffle:true,
		imagesPath:'images',
		rssFeed:'http://codecanyon.net/feeds/new-javascript-items.atom,http://codecanyon.net/feeds/new-wordpress-items.atom,http://graphicriver.net/feeds/new-web-elements-items.atom,http://graphicriver.net/feeds/new-graphics-items.atom,http://activeden.net/feeds/new-flash-items.atom,http://3docean.net/feeds/new-3d-models-items.atom',
		rssCats:'codecanyon.png,themeforest.png,graphicriver.png,graphicriver.png,activeden.png,3docean.png',
		rssSources:'envato.png,envato.png,envato.png,envato.png,envato.png,envato.png',
		rssColors:'2980b9,8e44ad,27ae60,27ae60,c0392b,16a085'
	});

	$('.smarticker6').smarticker({
		theme: 2,
		animation: 'typing',
		speed: 2000,
		pausetime: 5000,
		rounded: true,	
		catcolor: false,
		imagesPath:'images/'
	});
	$('.smarticker7').smarticker({
		controllerType: 2,
		theme: 3,
		animation: 'slide',
		speed: 1000,
		progressbar: true
	});*/

	$('.smarticker8').smarticker({
		theme: 4,
		controllerType: 1,
		animation: 'slide',
		speed: 1000,
		rounded: true,
		pausetime: 3000,
		shuffle:false
	});
	/*$('.smarticker9').smarticker({
		controllerType: 2,
		theme: 1,
		rounded: true,
		animation: 'fade',
		pausetime: 1500,
		speed: 1000
	});*/
	</script>
	</body>


</html>