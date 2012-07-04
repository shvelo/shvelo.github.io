<?php
error_reporting(0);
$data = json_decode(file_get_contents("data.json"), false);
$about = file_get_contents("about.html");
?>
<!DOCTYPE html>
<meta charset="utf-8">
<title><?php echo $data->title?></title>
<meta name="description" content="<?php echo $data->description?>">
<meta property="og:image" content="<?php echo $data->fb_image?>">
<meta property="og:type" content="website">
<meta property="og:description" content="<?php echo $data->description?>">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" href="favicon.png">

<!--[if lt IE9]>
<div class="ie-bg" onclick="this.parentNode.removeChild(this)">
    <div class="ie-must-die">IE MUST DIE</div>
</div>
<![endif]-->

<nav class="main">
	<ul>
		<li><a href="#top">Top</a>
		<li><a href="#about">About</a>
		<li><a href="#works">Works</a>
		<li><a href="#experiments">Experiments</a>
		<li><a href="//blog.nicksh.com" target="_blank">Blog</a>
	</ul>
</nav>

<header id="top">
	<div class="middle">
		<h1 class="name"><a href="//nicksh.com">Nick Shvelidze</a></h1>
		<div class="social">
			<div class="links">
				<ul>
					<li><a target="_blank" class="facebook" href="<?php echo $data->social->facebook->url?>" title="<?php echo $data->social->facebook->title?>">f</a>
					<li><a target="_blank" class="twitter" href="//www.twitter.com/shvelo96" title="@shvelo96 on Twitter">t</a>
					<li><a target="_blank" class="gplus" href="//www.nicksh.com/plus" title="Nick Shvelidze on Google+">g+</a>
					<li><a target="_blank" class="linkedin" href="//www.linkedin.com/in/shvelo" title="Nick Shvelidze on LinkedIn">Li</a>
					<li><a target="_blank" class="tumblr" href="//nicksh.tumblr.com/" title="Nicksh on Tumblr">tu</a>
				</ul>
			</div>
		</div>	
	</div>
</header>

<nav class="mobile show-on-mobile">
	<ul>
		<li><a href="#about">About</a>
		<li><a href="#works">Works</a>
		<li><a href="#experiments">Experiments</a>
		<li><a href="//blog.nicksh.com" target="_blank">Blog</a>
	</ul>
</nav>

<div id="about">
	<h1 class="title">About Me</h1>
	<article>
		<?php echo $about?>
	</article>
</div>

<a class="top show-on-mobile" href="#top">Back to top</a>

<div id="works">
	<h1 class="title">My Works</h1>
	<div class="grid">
		<?php foreach($data->works as $item):?>
		<div class="tile">			
			<div class="thumb" style="background-image: url('<?php echo $item->image?>')">
				<div class="over">
					<div class="text">
						<h3><a href="<?php echo $item->url?>" title="<?php echo $item->title?>" target="_blank"><?php echo $item->title?></a></h3>
						<p><?php echo $item->description?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach;?>
	</div>
</div>

<a class="top show-on-mobile" href="#top">Back to top</a>

<div id="experiments">
	<h1 class="title">My Experiments</h1>
	<div class="grid">
		<?php foreach($data->experiments as $item):?>
		<div class="tile">			
			<div class="thumb" style="background-image: url('<?php echo $item->image?>')">
				<div class="over">
					<div class="text">
						<h3><a href="<?php echo $item->url?>" title="<?php echo $item->title?>" target="_blank"><?php echo $item->title?></a></h3>
						<p><?php echo $item->description?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach;?>
	</div>
</div>

<a class="top show-on-mobile" href="#top">Back to top</a>

<script src="js/all.js"></script>