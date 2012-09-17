<?php
error_reporting(0);

$data = json_decode(file_get_contents("data.json"), false);
$about = file_get_contents("about.html");
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title><?php echo $data->title?></title>
<meta name="description" content="<?php echo $data->description?>">
<meta property="og:image" content="<?php echo $data->fb_image?>">
<meta property="og:type" content="website">
<meta property="og:description" content="<?php echo $data->description?>">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<!--[if lt IE9]>
<script>document.location = "/resume"</script>
<![endif]-->
<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" href="favicon.png">
</head>
<body>
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
				    <?php foreach($data->social as $social):?>
				    <li><a target="_blank" class="<?php echo $social->name;?>" href="<?php echo $social->url;?>" title="<?php echo $social->title;?>"><?php echo $social->content;?></a>
				    <?php endforeach; ?>
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

<div id="about" class="page">
	<h1 class="title">About Me</h1>
	<article>
		<?php echo $about?>
	</article>
</div>

<a class="top show-on-mobile" href="#top">Back to top</a>

<div id="works" class="page">
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

<div id="experiments" class="page">
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
</body>
