<title>goose.im</title>

<link href="favicon.ico" rel="icon" type="image/png" />

<meta name="viewport" content="width=device-width, initial-scale=1" />

<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,500,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="fancy/jquery.fancybox.css?v=2.1.3" type="text/css" media="screen" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script type="text/javascript" src="fancy/jquery.fancybox.pack.js?v=2.1.3"></script>
<script type="text/javascript" src="jquery.ba-hashchange.js"></script>
<script type="text/javascript" src="detectmobilebrowser.js"></script>


<style type="text/css">
@font-face {
    font-family: 'JustVector';
    src: url('font/justvectorv2-webfont.eot');
    src: url('font/justvectorv2-webfont.eot?#iefix') format('eot'),
         url('font/justvectorv2-webfont.woff') format('woff'),
         url('font/justvectorv2-webfont.ttf') format('truetype'),
         url('font/justvectorv2-webfont.svg#webfontkw9J4lGf') format('svg');
    font-weight: normal;
    font-style: normal;

}

* {margin:0;padding:0;border:0;outline:0;}
body {background:#3CA7B1;font-family:Ubuntu,sans-serif;color:#111;}
h1 {
	width:800px;
	margin:0 auto;
	margin-top:10%;
	font-size:50px;
	
	transition: all 1s linear;
	-moz-transition: all 1s linear; 
	-webkit-transition: all 0.3s linear; 
	-o-transition: all 1s linear;
}
h1:hover {color:#444;}

.box {
	width:20%;
	height:40%;
	background:#eee;
	display:inline-block;
	margin:0;	
	vertical-align:bottom;
	position:relative;
}

.box > div {width:100%;height:100%;background:#3CA7B1;}

.box .blue {background:#3CA7B1;}
.box .lightblue {background:#4FB2BB;}
.box .darkblue {background:#36ADB8;}
.box .game {background:#3CA7B1 url('game.png') center center;cursor:pointer;}
.box .make {background:#3CA7B1 url('make.png') 20% 50%;cursor:pointer;}
.box .hex {background:#3CA7B1 url('hex.png') left center;cursor:pointer;}
.box .photo {background:#3CA7B1 url('photo.png') center bottom;cursor:pointer;}
.box .paint {background:#3CA7B1 url('paint2.png') 90% 70%;cursor:pointer;}
.box .self {background:#3CA7B1 url('self.png') 45% 15%;cursor:pointer;}
.box.hey {cursor:pointer;text-shadow:none!important;}
.box.captioned div+p {cursor:pointer;}

.box p {color:#fff;padding:0 10%;font-weight:700;position:absolute;bottom:10%;}
.box.hey p {font-size:48px;opacity:0.4;} /* padding:30px;padding-top:40%; */
.box.captioned p {font-size:10%;opacity:0;}
.box .game+p {top:10%!important;}
.box .paint+p {top:10%;}

.back {cursor:pointer;}

p.visible {opacity:1!important;}

.scrollwrap {width:100%;overflow:hidden;}

.bigwrap {width:500%;}

.wrap {display:block;float:left;width:20%;}
.clear {clear:both;}

.image {overflow:hidden;}
.image img {margin-top:-30%;margin-left:-30%;}
.photowrap .image img {margin-top:-60%;margin-left:-60%;}

.paintwrap .title p {top:10%!important;}

.text p {font-weight:500;line-height:130%;}

/* box_ten (small boxes) */

.tenwrap {width:100%;margin-left:0;}

.box_ten {
	width:10%;
	height:20%;
	background:#eee;
	display:inline-block;
	margin:0;	
	vertical-align:bottom;
	position:relative;
	font-family:JustVector,Ubuntu,sans-serif;
}

.box_ten > div {width:100%;height:100%;background:#3CA7B1;}

.box_ten .blue {background:#3CA7B1;}
.box_ten .lightblue {background:#4FB2BB;}
.box_ten .darkblue {background:#36ADB8;}
.box_ten p {font-size:110px;color:#eee;position:absolute;bottom:13%;width:100%;text-align:center;}
.box_ten.link {cursor:pointer;}

.twitter p {bottom:10%!important;}
.flickr p {bottom:13%!important;}
.vimeo p {bottom:20%!important;}
.aim p {bottom:26%!important;text-indent:-7%;}
.dribbble p {bottom:26%!important;}
.forrst p {bottom:26%!important;}

@-moz-document url-prefix() {

	.twitter p {bottom:-3%!important;}
	.flickr p {bottom:-1%!important;}
	.vimeo p {bottom:7%!important;}
	.aim p {bottom:12%!important;text-indent:-3%;}
	.dribbble p {bottom:5%!important;}
	.forrst p {bottom:12%!important;}
	.lastfm p {bottom:0!important;}

	.image img {margin-top:-10%;margin-left:-30%;}
	.photowrap .image img {margin-top:-10%;margin-left:-20%;}
}


.info {display:none;width:100%!important;background:#3CA7B1;}


/* -webkit-scrollbar */

::-webkit-scrollbar              {width:9px;height:9px;background:#3CA7B1;}
::-webkit-scrollbar-button       {}
::-webkit-scrollbar-corner       {background:#3CA7B1;}
::-webkit-resizer                {background:#3CA7B1;}
::-webkit-scrollbar-track        {}
::-webkit-scrollbar-track-piece  {}
::-webkit-scrollbar-thumb        {background:#eee;border-radius:20px;border:1px solid #3CA7B1;}

.fancybox-overlay, .fancybox-overlay-fixed {overflow:hidden!important;}


.mobile {display:none;}
.mobile .box {width:50%;height:30%;}
.mobile .box_ten {width:50%;height:30%;}
.mobile .captioned p {opacity:1;}
.mobile .hey p {opacity:1;}
.mobile .box .paint+p {bottom:10%!important;}


.text p b {font-weight:700;opacity:0.9;}
.text.cont p {top:10%!important;}

.mobile .infobox {width:100%!important;background:#3CA7B1;}

</style>

<script type="text/javascript">
(function(window) {

$(document).ready(function() {

//detect mobile
	var ismobile;
	var h2size;
	var h3size;
	var infosize;
	var linksize;
	var twittersize;

	if (jQuery.browser.mobile == true) {
		ismobile = 'yes';
		$('body > .scrollwrap').hide();
		$('body > .tenwrap').hide();
		$('.mobile').show();
		
		var boxwidth = ($(window).width()) / 2;
		
		$('.box').height(boxwidth);
		
		var h2size = boxwidth / 6;
		var h3size = boxwidth / 9;
		var infosize = boxwidth / 13;
		
		$('.box.hey p').css({
			'font-size': h2size
		});
		$('.box.captioned p, p.visible').css({
			'font-size': h3size
		});
		
		$('.box_ten').height(boxwidth);
		
		var linksize = boxwidth / 1.6;
		var twittersize = linksize * 1.2;
		
		$('.box_ten.link p').css({
			'font-size': linksize
		});
		$('.twitter p').css({
			'font-size': twittersize
		});
		
		$('.text p').css({
			'font-size': infosize
		});
		
		console.log($(window).width());
	} else {
			
		$('.box').height($('.box').width());
		
		var h2size = ($('.box').width()) / 6;
		var h3size = ($('.box').width()) / 9;
		var infosize = ($('.box').width()) / 13;
		
		$('.box.hey p').css({
			'font-size': h2size
		});
		$('.box.captioned p, p.visible').css({
			'font-size': h3size
		});
		
		$('.box_ten').height($('.box_ten').width());
		
		var linksize = ($('.box_ten').width()) / 1.6;
		var twittersize = linksize * 1.2;
		
		$('.box_ten.link p').css({
			'font-size': linksize
		});
		$('.twitter p').css({
			'font-size': twittersize
		});
		
		$('.text p').css({
			'font-size': infosize
		});
	}
	
//why do you insist on dumb code like this	
	$(window).resize(function() {
		$('.box').height($('.box').width());
		var h2size = ($('.box').width()) / 6;
		var h3size = ($('.box').width()) / 9;
		var infosize = ($('.box').width()) / 13;

		$('.box.hey p').css({
			'font-size': h2size
		});
		$('.box.captioned p, p.visible').css({
			'font-size': h3size
		});
		
		$('.box_ten').height($('.box_ten').width());
		var linksize = ($('.box_ten').width()) / 1.6;
		var twittersize = linksize * 1.2;
		$('.box_ten.link p').css({
			'font-size': linksize
		});
		$('.twitter p').css({
			'font-size': twittersize
		});
		$('.text p').css({
			'font-size': infosize
			});
	});

//end resizing clusterfuck	
	
	

	$('.img').fancybox({
		padding:					0,
		closeBtn:					false,
		arrows:						false,
		preload:					7,
		closeClick:					true,
		nextEffect:					'fade',
		prevEffect:					'fade'
	});
	$(".video").fancybox({
		type: 						'iframe',
		fitToView : 				true,
		padding:					0,
		closeBtn:					false,
		arrows:						false
	});

	$('.scrollwrap .box').hover(function() {
		$(this).children('div,img').animate({opacity:0.6},'50');
		$(this).children('.hey p, .captioned p').animate({opacity:1},'50');
	},function() {
		$(this).children('div,img').animate({opacity:1},'50');
		$(this).children('.hey p').animate({opacity:0.4},'50');
		$(this).children('.captioned p').animate({opacity:0},'50');
	});
	
	$('.tenwrap .box_ten').hover(function() {
		$(this).children('div').animate({opacity:0.6},'50');
	},function() {
		$(this).children('div').animate({opacity:1},'50');
	});

	$('.mobile .self').parent('.box').click(function() {
		$('.infobox').toggle();
	});
	
	$(window).hashchange(function(){
		var hash = location.hash;
		if (hash == '#/glitch/') {
			$('.bigwrap').css({
				'margin-left': '-100%'
			});
		} else if (hash == '#/paint/') {
			$('.bigwrap').css({
				'margin-left': '-200%'
			});
		} else if (hash == '#/photo/') {
			$('.bigwrap').css({
				'margin-left': '-300%'
			});
		} else if (hash == '#/info/') {
			$('.bigwrap').css({
				'margin-left': '-400%'
			});
		} else if (hash == '#/') {
			$('.bigwrap').css({
				'margin-left': '0'
			});
		} else if (jQuery.browser.mobile == false) {
			location.hash = '#/';
			//$('.bigwrap').css({
			//	'margin-left': '0'
			//});
		} else {
			
		}
    	//end window hashchange function
    });

	$(window).hashchange();


});

})(window);

// HEY YOU you need to make the image backgrounds actual images and the color backgrounds separate divs and those will be 100% height and width of the parent, and set the background of the parent to #eee, but the background of the page to the blue so that the issue with the extra pixel is solved 
</script>

<body>
<div class="scrollwrap">
<div class="bigwrap">
<div class="mainwrap wrap">
	<div class="box">
			<div class="blue"></div>
	</div><!--
	--><a href="#/glitch/"><div class="box captioned">
			<div class="hex"></div>
			<p>glitch art</p>
	</div></a><!--
	--><div class="box hey">
			<div class="lightblue"></div>
			<p>hey, i'm goose!!</p>
	</div><!--
	--><a href="#/info/"><div class="box captioned">		
			<div class="self"></div>
			<p>info</p>
	</div></a><!--
	--><div class="box">		
			<div class="darkblue"></div>
	</div><!--
	--><div class="box">		
			<div class="lightblue"></div>
	</div><!--
	--><div class="box">		
			<div class="darkblue"></div>
	</div><!--
	--><a href="http://archive.cubegho.st/make"><div class="box captioned">
			<div class="make"></div>
			<p>make-a-mongoose</p>
	</div></a><!--
	--><a href="http://dev.goose.im/whatgame/"><div class="box captioned">
			<div class="game"></div>
			<p>whatgame</p>
	</div></a><!--
	--><div class="box">		
			<div class="lightblue"></div>
	</div><!--
	--><div class="box">		
			<div class="darkblue"></div>
	</div><!--
	--><a href="#/paint/"><div class="box captioned">		
			<div class="paint"></div>
			<p>painting</p>
	</div></a><!--
	--><a href="#/photo/"><div class="box captioned">		
			<div class="photo"></div>
			<p>photography</p>
	</div></a><!--
	--><div class="box">		
			<div class="darkblue"></div>
	</div><!--
	--><div class="box">		
			<div class="blue"></div>
	</div>
</div><!--  end of mainwrap -->
<div class="glitchwrap wrap">
	<a href="#/"><div class="box back">
			<div class="blue"></div>
			<p class="visible">back</p>
	</div></a><!--
	--><div class="box title">
			<div class="darkblue"></div>
			<p class="visible">glitch art</p>
	</div><!--
	--><a href="glitch/polaroid.png" class="img" rel="glitch"><div class="box image">
			<img src="glitch/polaroid.png">
	</div></a><!--
	--><a href="glitch/sourapple.png" class="img" rel="glitch"><div class="box image">		
			<img src="glitch/sourapple.png">
	</div></a><!--
	--><a href="glitch/nothingwrong.png" class="img" rel="glitch"><div class="box image">		
			<img src="glitch/nothingwrong.png">
	</div></a><!--
	--><a href="glitch/intonature.png" class="img" rel="glitch"><div class="box image">		
			<img src="glitch/intonature.png">
	</div></a><!--
	--><a href="glitch/boobyking.png" class="img" rel="glitch"><div class="box image">		
			<img src="glitch/boobyking.png">
	</div></a><!--
	--><a href="glitch/bear.png" class="img" rel="glitch"><div class="box image">		
			<img src="glitch/bear.png">
	</div></a><!--
	--><a href="glitch/lighttexture.png" class="img" rel="glitch"><div class="box image">		
			<img src="glitch/lighttexture.png">
	</div></a><!--
	--><a href="glitch/jjjjjjj_hex.gif" class="img" rel="glitch"><div class="box image">		
			<img src="glitch/jjjjjjj_hex.gif">
	</div></a><!--
	--><a href="glitch/wigs_g.png" class="img" rel="glitch"><div class="box image">		
			<img src="glitch/wigs_g.png">
	</div></a><!--
	--><div class="box">		
			<div class="blue"></div>
	</div><!--
	--><div class="box">		
			<div class="lightblue"></div>
	</div><!--
	--><div class="box">		
			<div class="darkblue"></div>
	</div><!--
	--><div class="box">		
			<div class="blue"></div>
	</div>
</div><!--  end of glitchwrap -->
<div class="paintwrap wrap">
	<a href="#/"><div class="box back">
			<div class="blue"></div>
			<p class="visible">back</p>
	</div></a><!--
	--><a href="paint/fire.png" class="img" rel="paint"><div class="box image">
			<img src="paint/fire.png">
	</div></a><!--
	--><a href="paint/surf.png" class="img" rel="paint"><div class="box image">		
			<img src="paint/surf.png">
	</div></a><!--
	--><a href="paint/fig13.png" class="img" rel="paint"><div class="box image">		
			<img src="paint/fig13.png">
	</div></a><!--
	--><a href="paint/aftermath.png" class="img" rel="paint"><div class="box image">		
			<img src="paint/aftermath.png">
	</div></a><!--
	--><a href="paint/protozoa.png" class="img" rel="paint"><div class="box image">		
			<img src="paint/protozoa.png">
	</div></a><!--
	--><a href="paint/rising.png" class="img" rel="paint"><div class="box image">		
			<img src="paint/rising.png">
	</div></a><!--
	--><a href="paint/sunburst.png" class="img" rel="paint"><div class="box image">		
			<img src="paint/sunburst.png">
	</div></a><!--
	--><a href="paint/no.png" class="img" rel="paint"><div class="box image">		
			<img src="paint/no.png">
	</div></a><!--
	--><a href="paint/ah.png" class="img" rel="paint"><div class="box image">		
			<img src="paint/ah.png">
	</div></a><!--
	--><div class="box">		
			<div class="blue"></div>
	</div><!--
	--><div class="box title">
			<div class="darkblue"></div>
			<p class="visible">painting</p>
	</div><!--
	--><div class="box">		
			<div class="lightblue"></div>
	</div><!--
	--><div class="box">		
			<div class="darkblue"></div>
	</div><!--
	--><div class="box">		
			<div class="blue"></div>
	</div>
</div><!--  end of paintwrap -->
<div class="photowrap wrap">
	<a href="#/"><div class="box back">
			<div class="blue"></div>
			<p class="visible">back</p>
	</div></a><!--
	--><a href="http://farm9.staticflickr.com/8202/8258761853_289073886b_c.jpg" class="img" rel="photo"><div class="box image">
			<img src="http://farm9.staticflickr.com/8202/8258761853_289073886b.jpg">
	</div></a><!--
	--><a href="http://farm9.staticflickr.com/8062/8207873549_fb56afd7e1_b.jpg" class="img" rel="photo"><div class="box image">		
			<img src="http://farm9.staticflickr.com/8062/8207873549_fb56afd7e1_c.jpg">
	</div></a><!--
	--><a href="http://farm9.staticflickr.com/8049/8104294551_4fd209f468_c.jpg" class="img" rel="photo"><div class="box image">		
			<img src="http://farm9.staticflickr.com/8049/8104294551_4fd209f468_z.jpg">
	</div></a><!--
	--><a href="http://farm9.staticflickr.com/8053/8104306544_30feb99f9e_c.jpg" class="img" rel="photo"><div class="box image">		
			<img src="http://farm9.staticflickr.com/8053/8104306544_30feb99f9e_z.jpg">
	</div></a><!--
	--><a href="http://farm9.staticflickr.com/8476/8104292805_13950a47ef_c.jpg" class="img" rel="photo"><div class="box image">		
			<img src="http://farm9.staticflickr.com/8476/8104292805_13950a47ef_z.jpg">
	</div></a><!--
	--><a href="http://farm9.staticflickr.com/8010/7460924852_d1bdeba749_c.jpg" class="img" rel="photo"><div class="box image">		
			<img src="http://farm9.staticflickr.com/8010/7460924852_d1bdeba749_z.jpg">
	</div></a><!--
	--><a href="http://farm9.staticflickr.com/8291/7801526586_3955fc7a19_c.jpg" class="img" rel="photo"><div class="box image">		
			<img src="http://farm9.staticflickr.com/8291/7801526586_3955fc7a19_z.jpg">
	</div></a><!--
	--><a href="photo/im.jpg" class="img" rel="photo"><div class="box image">		
			<img src="photo/im.jpg">
	</div></a><!--
	--><a href="photo/intonature.png" class="img" rel="photo"><div class="box image">		
			<img src="photo/intonature.png">
	</div></a><!--
	--><a href="http://farm9.staticflickr.com/8145/7460937582_6645e39cd4_c.jpg" class="img" rel="photo"><div class="box image">		
			<img src="http://farm9.staticflickr.com/8145/7460937582_6645e39cd4_z.jpg">
	</div></a><!--
	--><a href="http://farm9.staticflickr.com/8486/8209387817_a746282083_c.jpg" class="img" rel="photo"><div class="box image">		
			<img src="http://farm9.staticflickr.com/8486/8209387817_a746282083_z.jpg">
	</div></a><!--
	--><div class="box title">
			<div class="darkblue"></div>
			<p class="visible">photography</p>
	</div><!--
	--><a href="https://player.vimeo.com/video/54156111" class="video" rel="photo"><div class="box image">		
			<img src="http://farm9.staticflickr.com/8473/8126314403_88e8ac0541_c.jpg">
			<p>&#9654;</p>
	</div></a><!--
	--><div class="box">		
			<div class="blue"></div>
	</div>
</div><!--  end of photowrap -->
<div class="infowrap wrap">
	<a href="#/"><div class="box back">
			<div class="darkblue"></div>
			<p class="visible">back</p>
	</div></a><!--
	--><div class="box">		
			<div class="blue"></div>
	</div><!--
	--><div class="box hey">
			<div class="lightblue"></div>
			<p>hey, i'm goose!!</p>
	</div><!--
	--><div class="box title">		
			<div class="blue"></div>
			<p class="visible">info</p>
	</div><!--
	--><div class="box">		
			<div class="darkblue"></div>
	</div><!--
	--><div class="box">		
			<div class="lightblue"></div>
	</div><!--
	--><div class="box text">		
			<div class="darkblue"></div>
			<p>i usually work with css, html, jquery, and php, but i also use photoshop, sketch, kidpix, hex fiend, a nikon d3100, pencils, paper, cardboard, and acrylic paint.</p>
	</div><!--
	--><div class="box text">		
			<div class="blue"></div>
			<p>i enjoy long walks on cold beaches at sunrise, the internet, technology, coding, drawing, glitchin', photography, fingerpainting, nice pairs of pants, ...</p>
	</div><!--
	--><div class="box">		
			<div class="lightblue"></div>
	</div><!--
	--><div class="box">		
			<div class="blue"></div>
	</div><!--
	--><div class="box">		
			<div class="darkblue"></div>
	</div><!--
	--><div class="box">		
			<div class="blue"></div>
	</div><!--
	--><div class="box text cont">		
			<div class="lightblue"></div>
			<p>... identity theory, learning stuff, wikipedia, minecraft, tumblr, organizing my bookmarks, new things, food, and smashing the kyriarchy.</p>
	</div><!--
	--><div class="box text cont">		
			<div class="darkblue"></div>
			<p>i do a lot of stuff. don't worry, it overwhelms me too. often.</p>
	</div><!--
	--><div class="box">		
			<div class="lightblue"></div>
	</div>
</div><!--  end of infowrap -->
<div class="clear"></div>
</div>
</div>
<div class="tenwrap">	
	<div class="box_ten">		   	<!-- 1 -->
			<div class="blue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 2 -->
			<div class="darkblue"></div>
	</div><!--
	--><a href="http://www.last.fm/user/goosegooseduck"><div class="box_ten link lastfm">
			<div class="blue"></div>
			<p>L</p>
	</div></a><!--
	--><div class="box_ten">			<!-- 4 -->
			<div class="lightblue"></div>
	</div><!--
	--><a href="http://flickr.com/gooseyinthesky"><div class="box_ten link flickr">
			<div class="lightblue"></div>
			<p>n</p>
	</div></a><!--
	--><a href="http://twitter.com/cubeghost"><div class="box_ten link twitter">
			<div class="darkblue"></div>
			<p>t</p>
	</div></a><!--
	--><div class="box_ten">			<!-- 7 -->
			<div class="blue"></div>
	</div><!--
	--><a href="http://forrst.me/goose"><div class="box_ten link forrst">
			<div class="lightblue"></div>
			<p>f</p>
	</div></a><!--
	--><div class="box_ten">			<!-- 9 -->
			<div class="darkblue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 10 -->
			<div class="blue"></div>
	</div><!--
	--><div class="box_ten">		   	<!-- 11 new row -->
			<div class="lightblue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 12 -->
			<div class="blue"></div>
	</div><!--
	--><a href="aim:goim?screename=gooseyinthesky"><div class="box_ten link aim">
			<div class="darkblue"></div>
			<p>A</p>
	</div></a><!--
	--><a href="http://vimeo.com/goosey"><div class="box_ten link vimeo">
			<div class="blue"></div>
			<p>v</p>
	</div></a><!--
	--><div class="box_ten">			<!-- 15 -->
			<div class="blue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 16 -->
			<div class="lightblue"></div>
	</div><!--
	--><a href="http://dribbble.com/goosey"><div class="box_ten link dribbble">
			<div class="darkblue"></div>
			<p>d</p>
	</div></a><!--
	--><div class="box_ten">			<!-- 18 -->
			<div class="blue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 19 -->
			<div class="blue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 20 -->
			<div class="darkblue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 21 new row -->
			<div class="blue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 22 -->
			<div class="blue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 23 -->
			<div class="blue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 24 -->
			<div class="lightblue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 25 -->
			<div class="blue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 26 -->
			<div class="blue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 27 -->
			<div class="lightblue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 28 -->
			<div class="darkblue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 29 -->
			<div class="blue"></div>
	</div><!--
	--><div class="box_ten">			<!-- 30 -->
			<div class="blue"></div>
	</div>
	<div class="clear"></div>
</div>	

<div class="mobile">
	<div class="box hey">
			<div class="lightblue"></div>
			<p>hey, i'm goose!!</p>
	</div><!--
	--><a href=""><div class="box captioned">		
			<div class="self"></div>
			<p>info</p>
	</div></a><!--
	--><div class="box infobox">
		<p>i make websites and a bunch of other stuff! you should come back here in a non-mobile browser, it's like, at <i>least</i> 10 times cooler.</p>
	</div><!--
	--><a href="http://m.flickr.com/#/photos/gooseyinthesky/sets/72157632135624534/"><div class="box captioned">
			<div class="hex"></div>
			<p>glitch art</p>
	</div></a><!--
	--><a href="http://m.flickr.com/#/photos/gooseyinthesky/sets/72157630468338054/"><div class="box captioned">		
			<div class="paint"></div>
			<p>painting</p>
	</div></a><!--
	--><a href="http://m.flickr.com/#/photos/gooseyinthesky/sets/72157630328766548/"><div class="box captioned">		
			<div class="photo"></div>
			<p>photography</p>
	</div></a><!--
	--><a href="http://make.goose.im/"><div class="box captioned">
			<div class="make"></div>
			<p>make-a-mongoose</p>
	</div></a><!--
	--><a href="http://dev.goose.im/whatgame/"><div class="box captioned">
			<div class="game"></div>
			<p>whatgame</p>
	</div></a><!--
	--><a href="http://twitter.com/gooseyinthesky"><div class="box_ten link twitter">
			<div class="darkblue"></div>
			<p>t</p>
	</div></a><!--
	--><a href="http://flickr.com/gooseyinthesky"><div class="box_ten link flickr">
			<div class="blue"></div>
			<p>n</p>
	</div></a><!--
	--><a href="http://vimeo.com/goosey"><div class="box_ten link vimeo">
			<div class="lightblue"></div>
			<p>v</p>
	</div></a><!--
	--><a href="http://forrst.me/goose"><div class="box_ten link forrst">
			<div class="lightblue"></div>
			<p>f</p>
	</div></a><!--
	--><a href="http://dribbble.com/goosey"><div class="box_ten link dribbble">
			<div class="darkblue"></div>
			<p>d</p>
	</div></a><!--
	--><a href="http://www.last.fm/user/goosegooseduck"><div class="box_ten link lastfm">
			<div class="blue"></div>
			<p>L</p>
	</div></a><!--
	--><a href="aim:goim?screename=gooseyinthesky"><div class="box_ten link aim">
			<div class="lightblue"></div>
			<p>A</p>
	</div></a>
</div>
<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0014/9869.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37168472-1']);
  _gaq.push(['_setDomainName', 'goose.im']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>