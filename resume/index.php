<?php
error_reporting(0);

$data = json_decode(file_get_contents("../data.json"), false);
$about = file_get_contents("../about.html");
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Nick Shvelidze</title>
    <meta name="description" content="Free HTML5 responsive Resume template by Nick Shvelidze">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <article>

        <h1>Nick Shvelidze</h1>

        <section id="links">
            <a target="_blank" href="http://blog.nicksh.com" title="My Blog">
                Blog
            </a>
            
            <?php foreach($data->social as $social):?>
	        <a target="_blank" href="<?php echo $social->url;?>" title="<?php echo $social->title;?>"><?php echo $social->name;?></a>
	    <?php endforeach; ?>
        </section>

        <section id="about">
            <h2>About</h2>

            <p>
                <?php echo $about?>
	    </p>
        </section>

        <section id="works">
            <h2>Works</h2>
            <ul>
		<?php foreach($data->works as $item):?>
		<li>			
			<h3><a href="<?php echo $item->url?>" title="<?php echo $item->title?>" target="_blank"><?php echo $item->title?></a></h3>
			<p><?php echo $item->description?>
		</li>
		<?php endforeach;?>
            </ul>
        </section>
        
        <section id="experiments">
            <h2>Experiments</h2>
            <ul>
		<?php foreach($data->experiments as $item):?>
		<li>			
			<h3><a href="<?php echo $item->url?>" title="<?php echo $item->title?>" target="_blank"><?php echo $item->title?></a></h3>
			<p><?php echo $item->description?>
		</li>
		<?php endforeach;?>
            </ul>
        </section>

    </article>
</body>
