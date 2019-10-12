<?php
if ($handle = opendir('./txt/')) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
			$fileContent = file_get_contents('./txt/' . $file);
            $content[$file] = $fileContent;
        }
    }
    closedir($handle);
}
?>
<!DOCTYPE html>

<head>
	<link href="favicon.png" rel="icon" type="image/png" />
	<title>goose</title>
	<style type="text/css">
		* {margin:0;border:0;padding:0;}
		html {height:100%;}
		body {
			background:radial-gradient(70% 150%, ellipse cover, #ccdf55 0%,#17bfc1 100%);
			background:-webkit-radial-gradient(70% 150%, ellipse cover, #ccdf55 0%,#18c0c2 100%);
			background:-moz-radial-gradient(70% 150%, ellipse cover, #ccdf55 0%,#17bfc1 100%);
			background:-o-linear-gradient(45deg,#ccdf55 0%,#17bfc1 100%) fixed;
			background:-ms-radial-gradient(70% 150%, ellipse cover, #ccdf55 0%,#17bfc1 100%);
			background-attachment:fixed;
			font-family:'Andale Mono',monospace;
			color:#fff;
			padding:0;
			overflow-y:scroll;
		}
		header {width:500px;top:90px;left:50%;margin-left:-250px;font-family:monospace;margin-bottom:-70px;position:absolute;z-index:-20;}
		header .shiny {line-height:92px;top:0;}
		.shiny:hover {opacity:0.9;}
		header .shinies#sundot {margin-left:15px;}
		header .shiny#sun {font-size:80px;}
		header .shiny#highdot {font-size:70px;vertical-align:30px;}
		header .shinies#stars {position:relative;top:-55px;margin-left:30px;}
		header .shiny#asterisk {font-size:38px;vertical-align:15px;}
		header .shiny#star {font-size:36px;}
		header .shinies#mooncloud {margin-left:80px;position:relative;top:-55px;}
		header .shiny#lowdot {font-size:36px;margin-right:-30px;position:relative;top:0;}
		header .shiny#moon {font-size:100px;position:relative;top:15px;}
		header .shiny#cloud {font-size:80px;vertical-align:text-top;}

		::-webkit-scrollbar              {width:9px;height:9px;background:-webkit-linear-gradient(bottom, #8fd57a, #46c8a7)}
		::-webkit-scrollbar-button       {}
		::-webkit-scrollbar-corner       {background:#89d47e;}
		::-webkit-resizer                {background:#18c29b;}
		::-webkit-scrollbar-track        {}
		::-webkit-scrollbar-track-piece  {}
		::-webkit-scrollbar-thumb        {background:rgba(255,255,255,0.3);}


		.button {padding:16px;width:120px;margin:0 auto;border:#fff 2px solid;box-shadow:5px 5px 0px 0px rgba(255,255,255,0.3);-webkit-transition:all 0.1s linear;-moz-transition:all 0.1s linear;-o-transition:all 0.1s linear;height:24px;}
		.button p {font-size:20px;text-align:center;}
		.button:hover {box-shadow:8px 8px 0px 0px rgba(255,255,255,0.3);-webkit-transition:all 0.1s linear;-moz-transition:all 0.1s linear;-o-transition:all 0.1s linear;cursor:pointer;}

		.page {margin-top:240px!important;display:none;min-height:300px;}
		.buttons {width:680px;margin:0 auto;}
		.buttons a {float:left;margin-right:106px;margin-bottom:50px;}
		.buttons a:nth-child(3n+0) {margin-right:0;}

		.button.big {width:480px;height:auto;}
		.button.big:hover {cursor:auto!important;}

		a {text-decoration:none;color:#fff;}
		p a:hover,#contact a:hover,a.b:hover {/*text-decoration:line-through;*/font-style:italic;}

		#nfo .button.big {background:rgba(0,0,0,0.15);margin-bottom:30px;}
		#nfo p#nfotxt {width:380px;font-size:16px;margin:0 auto;padding:10px;text-align:left;padding-bottom:0px;}
		pre {font-family:"Courier New",monospace;}

		.clear {clear:both;display:block;text-align:center;width:100px;margin:0 auto;opacity:0.5;font-size:20px;padding:10px;}

		.page.pix {width:680px;margin:0 auto;}
		.node {width:300px;height:200px;border:#fff 2px solid;box-shadow:5px 5px 0px 0px rgba(255,255,255,0.3);-webkit-transition:all 0.1s linear;-moz-transition:all 0.1s linear;-o-transition:all 0.1s linear;float:left;padding:0;overflow:hidden;margin-bottom:50px;position:relative;}
		.node:nth-child(2n-1) {margin-right:70px;}
		.node:hover {box-shadow:8px 8px 0px 0px rgba(255,255,255,0.3);-webkit-transition:all 0.1s linear;-moz-transition:all 0.1s linear;-o-transition:all 0.1s linear;cursor:pointer;}
		.node .name {background:#fff;color:#18c0c2;padding:2px 4px 4px 4px;font-size:13px;}
		.node .thumb {width:300px;height:179px;opacity:0.3;}
		.node .thumb:hover {opacity:0.7;}
		.node .hide {display:none;height:159px;width:280px;padding:10px;font-size:14px;position:relative;}
		.node .b {position:absolute;bottom:0;left:0;clear:both;height:20px;outline:2px #fff solid;width:280px;padding:10px 10px 7px 10px;}
		.node .b:after {content:'\27AB';float:right;font-size:34px;margin-right:7px;margin-top:-10px;}
		.node .b:hover {font-style:italic;}

		#gtb .node:nth-child(2n) {margin-right:70px;}
		#gtb .node:nth-child(2n-1) {margin-right:0px;}

		p.blurb {margin-bottom:45px;}

		.page.img {width:880px;}
		.img .node {width:240px;height:160px;margin-right:70px;}
		.img .node:nth-child(3n+1) {margin-right:0;}
		.img .node .thumb {height:160px;opacity:0.7;}
		.img .node .thumb:hover {opacity:1;}

		a.back {font-size:30px;text-align:center;width:680px;opacity:0.5;margin:0 auto;display:block;clear:both;padding-bottom:30px;}
		a.back:hover {text-decoration:none!important;opacity:0.8;font-style:normal!important;}

		#lab ul {margin-left:40px;margin-top:-0.7em;}
		#lab p {padding-bottom:1em;}
		#lab a:hover {text-decoration:underline;}

	</style>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="hashchange.min.js"></script>
	<link rel="stylesheet" href="jquery.fancybox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="jquery.fancybox.pack.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('.page').hide();

		function reset_shinies() {
			$('#stars').animate({top: '-55px'},500);
			$('#moon').animate({top: '15px'},500);
			$('#lowdot').animate({top: '0px'},500);
		}

		$(window).hashchange(function(){
			var hash = location.hash;
			if (hash == '#/hello/') {
				$('.page').not('#choose').hide();
				$('#choose').fadeIn('normal');
				$('#moon').animate({top: '15px'},500);  //moon reset
				$('#lowdot').animate({top: '0px'},500); //lowdot reset
				$('#stars').animate({top: '-10px'},500);
				return false
			} else if (hash == '#/nfo/') {
				$('.page').not('#nfo').hide();
				$('#nfo').fadeIn('normal');
				$('#stars').animate({top: '-10px'},500);
				$('#moon').animate({top: '0px'},500);
				return false
			} else if (hash == '#/work/') {
				$('.page').not('#work').hide();
				$('#work').fadeIn('normal');
				$('#stars').animate({top: '-10px'},500);
				$('#moon').animate({top: '40px'},500);
				return false
			} else if (hash == '#/go/') {
				$('.page').not('#contact').hide();
				$('#contact').fadeIn('normal');
				$('#stars').animate({top: '-10px'},500);
				$('#moon').animate({top: '40px'},500);
				$('#lowdot').animate({top: '15px'},500);
				return false
			} else if (hash == '#/code/') {
				$('.page').not('#code').hide();
				$('#code').fadeIn('normal');
				$('#stars').animate({top: '-10px'},500);
				$('#moon').animate({top: '40px'},500);
				return false
			} else if (hash == '#/png/') {
				$('.page').not('#png').hide();
				$('#png').fadeIn('normal');
				$('#stars').animate({top: '-10px'},500);
				$('#moon').animate({top: '40px'},500);
				return false
			} else if (hash == '#/gtb/') {
				$('.page').not('#gtb').hide();
				$('#gtb').fadeIn('normal');
				$('#stars').animate({top: '-10px'},500);
				$('#moon').animate({top: '40px'},500);
				return false
			} else if (hash == '#/gif/') {
				$('.page').not('#gif').hide();
				$('#gif').fadeIn('normal');
				$('#stars').animate({top: '-10px'},500);
				$('#moon').animate({top: '40px'},500);
				return false
			} else if (hash == '#/glitch/') {
				$('.page').not('#glitch').hide();
				$('#glitch').fadeIn('normal');
				$('#stars').animate({top: '-10px'},500);
				$('#moon').animate({top: '40px'},500);
				return false
			} else if (hash == '#/lab/') {
				$('.page').not('#lab').hide();
				$('#lab').fadeIn('normal');
				$('#stars').animate({top: '-10px'},500);
				$('#moon').animate({top: '40px'},500);
				return false
			} else if (hash == '#/') {
				$('.page').not('#hello').hide();
				$('#hello').fadeIn('normal');
				reset_shinies(); //full reset
				return false
			} else if (hash == '') {
				window.location.hash = '#/';
			}
	    	//end window hashchange function
	    });
	    $(window).hashchange();

		$('.thumb').each(function(n) {
	        var bg = 'url(' + $(this).attr("data-src") + ')';
	        var pos = $(this).attr('data-pos');
	        $(this).css({
	        	'background-image': bg,
	        	'background-position': pos
	        });
	    });

	    $('.thumb').parent().hover(function(){
	    	var shift = $(this).children('.thumb').attr('data-pos-shift');
	    	var split = shift.split(" ");
	    	var posx = split[0];
	    	var posy = split[1];
		    $(this).children('.thumb').animate({
			    'background-position-x': posx,
			    'background-position-y': posy
		    },200);
	    },function(){
		    var back = $(this).children('.thumb').attr('data-pos');
	    	var split = back.split(" ");
	    	var posx = split[0];
	    	var posy = split[1];
		    $(this).children('.thumb').animate({
			    'background-position-x': posx,
			    'background-position-y': posy
		    },200);

	    });

	    $('.node').click(function(){
		    $(this).children('.hide').slideToggle(100);
	    });

	    $('#png .node a').fancybox({
		    'padding':2,
		    'margin':30,
		    'nextEffect':'none',
		    'prevEffect':'none',
		    'openEffect':'none',
		    'closeEffect':'none',
		    'closeClick': true,
		    'arrows': false,
		    helpers:{
			    overlay:{
				    showEarly:true
				}
			},
			'preload':8
	    });
	    $('#glitch .node a').fancybox({
		    'padding':2,
		    'margin':30,
		    'nextEffect':'none',
		    'prevEffect':'none',
		    'openEffect':'none',
		    'closeEffect':'none',
		    'closeClick': true,
		    'arrows': false,
		    helpers:{
			    overlay:{
				    showEarly:true
				}
			},
			'preload':8
	    });
	    $('#gif .node a').fancybox({
		    'padding':2,
		    'margin':30,
		    'nextEffect':'none',
		    'prevEffect':'none',
		    'openEffect':'none',
		    'closeEffect':'none',
		    'arrows': false,
		    helpers:{
			    overlay:{
				    showEarly:true
				}
			}
	    });

	});
	</script>
</head>
<body>
	<header>
		<span class="shinies" id="sundot">
			<span class="shiny" id="sun">&#9728;</span>
			<span class="shiny" id="highdot">&#176;</span>
		</span>
		<span class="shinies" id="stars">
			<span class="shiny" id="asterisk">*</span>
			<span class="shiny" id="star">&#10032;</span>
		</span>
		<span class="shinies" id="mooncloud">
			<span class="shiny" id="lowdot">&#12290;</span>
			<span class="shiny" id="moon">&#8226;</span>
			<span class="shiny" id="cloud">&#9729;</span>
		</span>
	</header>

	<section class="page" id="hello">
		<a href="#/hello/"><div class="button">
			<p>hello</p>
		</div></a>
	</section>
	<section class="page buttons" id="choose">
		<a href="#/nfo/"><div class="button">
			<p>.nfo</p>
		</div></a>
		<a href="#/work/"><div class="button">
			<p>/work</p>
		</div></a>
		<a href="#/go/"><div class="button">
			<p>&#9742;</p>
		</div></a>
	</section>
	<section class="page" id="nfo">
		<div class="button big">
			<!--<p>.nfo</p>
			<p>i'm goose &#9996; or alex baldwin and i make radical internet things and also art. i think a lot of thoughts. i work for gtb records. i like plants</p>-->
			<pre>
 &#9608;&#9608;&#9608;&#9608;&#9619;&#9619;&#9618;   &#9608;&#9608;&#9608;&#9608;&#9619;&#9619;&#9618;   &#9608;&#9608;&#9608;&#9608;&#9619;&#9619;&#9618;   &#9608;&#9608;&#9608;&#9608;&#9619;&#9619;&#9618;   &#9608;&#9608;&#9608;&#9608;&#9619;&#9619;&#9618;
&#9617;&#9608;        &#9617;&#9608;     &#9608;  &#9617;&#9608;     &#9608;  &#9617;&#9608;        &#9617;&#9608;     &#9608;
&#9617;&#9608;        &#9617;&#9608;     &#9608;  &#9617;&#9608;     &#9608;  &#9617;&#9608;        &#9617;&#9608;     &#9608;
&#9617;&#9608;   &#9619;&#9608;&#9608;  &#9617;&#9608;     &#9608;  &#9617;&#9608;     &#9608;  &#9617;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;  &#9617;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;
&#9617;&#9608;     &#9608;  &#9617;&#9608;     &#9608;  &#9617;&#9608;     &#9608;  &#9617;&#9617;&#9617;&#9617;&#9617;&#9617;&#9617;&#9608;  &#9617;&#9608;
&#9617;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;  &#9617;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;  &#9617;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;  &#9617;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;  &#9617;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;&#9608;
&#9617;&#9617;&#9617;&#9617;&#9617;&#9617;&#9617;   &#9617;&#9617;&#9617;&#9617;&#9617;&#9617;&#9617;   &#9617;&#9617;&#9617;&#9617;&#9617;&#9617;&#9617;   &#9617;&#9617;&#9617;&#9617;&#9617;&#9617;&#9617;   &#9617;&#9617;&#9617;&#9617;&#9617;&#9617;&#9617;

&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9565;&#9562;&#9552;&#9552;&#9552;&#9552;&#9552;&#9565; &#9617;&#9617; &#9562;&#9552;&#9552;&#9552;&#9552;&#9552;&#9565;&#9562;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;&#9552;</pre>

      <p id="nfotxt">i'm goose (or <i>alex baldwin</i>) and i do
      radical INTERNET things and also ART.
      i think a lot of THOUGHTS. i work for
      <a href="http://gtbrecs.com/">GTB RECORDS</a>. i also like PLANTS &#10047; &#9895;</p>
		</div>
		<a class="back" href="#/hello/">&#8617;</a>
	</section>
	<section class="page buttons" id="contact">
		<a target="_blank" href="http://twitter.com/cubeghost"><div class="button">
			<p>twitter</p>
		</div></a>
		<a target="_blank" href="http://flickr.com/gooseyinthesky"><div class="button">
			<p>flickr</p>
		</div></a>
		<a target="_blank" href="http://vimeo.com/goosey"><div class="button">
			<p>vimeo</p>
		</div></a>
		<a target="_blank" href="https://github.com/goosey"><div class="button">
			<p>github</p>
		</div></a>
		<a target="_blank" href="mailto:hello@goose.im"><div class="button">
			<p>email</p>
		</div></a>
		<a target="_blank" href="http://last.fm/user/goosegooseduck"><div class="button">
			<p>last.fm</p>
		</div></a>
		<a class="back" href="#/hello/">&#8617;</a>
	</section>

	<section class="page buttons" id="work">
		<a href="#/code/"><div class="button">
			<p>&#60;code&#62;</p>
		</div></a>
		<a href="#/png/"><div class="button">
			<p>.png</p>
		</div></a>
		<a href="#/gtb/"><div class="button">
			<p>GTB</p>
		</div></a>
		<a href="#/gif/"><div class="button">
			<p>.gif</p>
		</div></a>
		<a href="#/glitch/"><div class="button">
			<p>/glitch/</p>
		</div></a>
		<a href="#/lab/"><div class="button">
			<p>&#9762; &#9851;</p>
		</div></a>
		<a class="back" href="#/hello/">&#8617;</a>
	</section>
	<section class="page pix" id="code">
		<div class="node">
			<p class="name">chorus.goose.im</p>
			<p class="hide">a lightweight, txt-file based content management system, built in PHP and originally released back in 2010. recently completely overhauled to look and work 10 times better.
				<a class="b" href="http://chorus.goose.im/" target="_blank">download it!</a>
			</p>
			<div class="thumb" data-src="thumb/chorus.png" data-pos="100% 100%" data-pos-shift="0% 30%"></div>
		</div>
		<div class="node">
			<p class="name">gtbrecs.com</p>
			<p class="hide">complete website overhaul! a new look to mirror a new direction we're taking as a label, as well as a new wordpress-based backend (i &lt;3 custom post types) to make the release process simpler and prettier.
				<a class="b" href="http://gtbrecs.com/" target="_blank">check it OUT</a>
			</p>
			<div class="thumb" data-src="thumb/gtbnew.png" data-pos="0% 0%" data-pos-shift="100% 70%"></div>
		</div>
		<div class="node">
			<p class="name">chromosphere theme</p>
			<p class="hide">on my birthday this year i came across screenshots of <a href="http://www.flickr.com/photos/ozguy89/3739062292/in/faves-gooseyinthesky/" target="_blank">macintosh system 1.0</a> and became captivated by the thought of dotted drop shadows- this is the resulting tumblr theme. <br>
				<a class="b" href="http://www.tumblr.com/theme/38385" target="_blank">see it here</a>
			</p>

			<div class="thumb" data-src="thumb/ursa.png" data-pos="0% 60%" data-pos-shift="20% 0%"></div>
		</div>
		<div class="node">
			<p class="name">mass_tag_replacer.php</p>
			<p class="hide">a tool that takes every post on your tumblr tagged with one tag and replaces that tag with a different tag! tags. so many tags.<br>
				<a class="b" href="http://dev.goose.im/tags/" target="_blank">replace tags!</a>
			</p>

			<div class="thumb" data-src="thumb/masstag.png" data-pos="0% 0%" data-pos-shift="60% 100%"></div>
		</div>
		<!--<div class="node">
			<p class="name">what.gtbrecs.com</p>
			<p class="hide">part of a sticker/viral marketing thing for <a href="http://gtbrecs.com/" target="_blank">GTB Records</a>. randomizes a curated list of backronyms to answer the ultimate question: "what does GTB stand for?"
				<a class="b" href="http://what.gtbrecs.com/" target="_blank">discover the truth</a>
			</p>
			<div class="thumb" data-src="thumb/gtbwhat.png" data-pos="50% 1%" data-pos-shift="60% 73%"></div>
		</div>-->
		<div class="node">
			<p class="name">pixel_goose.html</p>
			<p class="hide">an SVG powered, oversimplified character builder. built to eventually lead into an HTML5 puzzle platformer that i might finish someday.<br>
				<a class="b" href="http://dev.goose.im/pixel/" target="_blank">try it out!</a>
			</p>
			<div class="thumb" data-src="thumb/pixelgoose.png" data-pos="27% 96%" data-pos-shift="27% 50%"></div>
		</div>
		<!--<div class="node">
			<p class="name">remember_to_tag.user.js</p>
			<p class="hide">a tampermonkey extension (and constant work-in-progress) to remind you what to tag things with when on tumblr.<br>
				<a class="b" href="http://userscripts.org/scripts/show/157033" target="_blank">get it on userscripts.org</a>
			</p>
			<div class="thumb" data-src="thumb/remembertotag.png" data-pos="78% 30%" data-pos-shift="78% 80%"></div>
		</div>-->
		<div class="node">
			<p class="name">make.goose.im</p>
			<p class="hide">make-a-goose, my first (and far more featured) SVG powered character builder, including a save feature and at least one badly-hidden easter egg.
				<a class="b" href="http://make.goose.im/" target="_blank">play it here!</a>
			</p>
			<div class="thumb" data-src="thumb/makeagoose.png" data-pos="92% 20%" data-pos-shift="32% 34%"></div>
		</div>
		<!--<div class="node">
			<p class="name">whatgame.html</p>
			<p class="hide">an HTML5 platformer being built on melonJS. at some point it will evolve into a puzzle platformer involving... ghosts? i guess? maybe?
				<a class="b" href="http://dev.goose.im/whatgame" target="_blank">play the demo</a>
			</p>
			<div class="thumb" data-src="thumb/game.png" data-pos="48% 60%" data-pos-shift="70% 20%"></div>
		</div>-->

		<a class="back" href="#/work/">&#8617;</a>
	</section>
	<section class="page pix img" id="png">
		<a class="back" href="#/work/">&#8617;</a>
		<?php echo $content['png.txt']; ?>
		<a class="back" href="#/work/">&#8617;</a>
	</section>
	<section class="page pix" id="gtb">
		<p class="blurb">work that i've done for <a href="http://gtbrecs.com">GTB RECORDS</a>, an internet label/collective full of amazing people and incredible amounts of talent. i work on website stuff, merchandise, and design, and help out with day-to-day operations.</p>
		<div class="node">
			<p class="name">gtbrecs.com</p>
			<p class="hide">complete website overhaul! a new look to mirror a new direction we're taking as a label, as well as a new wordpress-based backend (i &lt;3 custom post types) to make the release process simpler and prettier.
				<a class="b" href="http://gtbrecs.com/" target="_blank">check it OUT</a>
			</p>
			<div class="thumb" data-src="thumb/gtbnew.png" data-pos="0% 0%" data-pos-shift="100% 70%"></div>
		</div>
		<div class="node">
			<p class="name">what.gtbrecs.com</p>
			<p class="hide">part of a sticker/viral marketing thing. randomizes a curated list of backronyms to answer the ultimate question: "what does GTB stand for?"
				<a class="b" href="http://what.gtbrecs.com/" target="_blank">discover the truth</a>
			</p>
			<div class="thumb" data-src="thumb/gtbwhat.png" data-pos="50% 1%" data-pos-shift="60% 73%"></div>
		</div>
		<div class="node">
			<p class="name">future tshirt design</p>
			<p class="hide">getting tshirts printed is expensive! but we're ready for when the time comes. shh
				<a class="b" href="http://store.gtbrecs.com/merch" target="_blank">buy stickers instead</a>
			</p>
			<div class="thumb" data-src="thumb/gtbshirts.png" data-pos="0% 0%" data-pos-shift="0% 70%"></div>
		</div>
		<div class="node">
			<p class="name">GTB stickers</p>
			<p class="hide">glorious 3.5" vinyl black-and-white stickers printed for us by <a href="https://www.stickerguy.com/">the sticker guy</a>.
				<a class="b" href="http://store.gtbrecs.com/merch" target="_blank">buy some!</a>
			</p>
			<div class="thumb" data-src="thumb/gtbstickers.png" data-pos="10% 60%" data-pos-shift="50% 10%"></div>
		</div>

		<a class="back" href="#/work/">&#8617;</a>
	</section>
	<section class="page pix img" id="gif">
		<a class="back" href="#/work/">&#8617;</a>
		<?php echo $content['gif.txt']; ?>
		<a class="back" href="#/work/">&#8617;</a>
	</section>
	<section class="page pix img" id="glitch">
		<a class="back" href="#/work/">&#8617;</a>
		<?php echo $content['glitch.txt']; ?>
		<a class="back" href="#/work/">&#8617;</a>
	</section>
	<section class="page pix" id="lab">
		<p>experimental</p>
		<p>
			<ul>
				<li><a href="http://data.goose.im/">data.goose.im</a></li>
				<li><a href="http://dev.goose.im/">dev.goose.im</a></li>
				<li><a href="http://mangouste.net/p/">old experiments</a></li>
			</ul>
		</p>
		<p>old things</p>
		<p>
			<ul>
				<li><a href="http://goose.im/old/">mangouste.net/goose.im old page</a></li>
				<li><a href="http://goose.im/old_blue/">goose.im old blue page with the squares</a></li>
				<li><a href="http://unedible.com/">unedible.com</a> - <a href="http://unedible.com/old/V1/">V1</a> - <a href="http://unedible.com/old/V2/">V2</a> - <a href="http://unedible.com/old/V3/">V3</a></li>
				<li><a href="http://mangouste.net/tumblfix">one time my school network blocked assets.tumblr.com but not the rest of tumblr so i made this</a></li>
				<li><a href="http://mangouste.net/tectMapSnakey/">why is this minecraft map on my web server</a></li>
				<li><a href="http://unedible.com/alice">last incarnation of my personal site pre-mangouste.net</a></li>
				<li><a href="http://sushi.unedible.com/login">windows xp login page</a></li>
				<li><a href="http://sushi.unedible.com/foohover">only god knows why i didn't put a captcha on this (2009 or 2010)</a></li>
				<li><a href="http://sushi.unedible.com/filmstripper">some kind of template (2009)</a></li>
				<li><a href="http://unedible.com/fwee/">for the love of god how many times did i try to start a web agency as a teenager</a></li>
				<li><a href="http://unedible.com/papier/">some other template</a></li>
			</ul>
		</p>
		<a class="back" href="#/work/">&#8617;</a>
		<!--<span class="clear">&#9786;</span>-->
	</section>

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
