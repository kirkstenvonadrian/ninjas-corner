<!DOCTYPE html>

<html lang="en">
<head>

	<meta charset="utf-8" />
	<title><?php echo HTML::chars($title) ?></title>

	<link rel="stylesheet" href="<?php echo URL::site('media/css/ninjas-corner.css') ?>" />

</head>
<body>

	<?php echo Message::render() ?>

	<div style="padding:1em; background:yellow; text-align:center;">
		<strong>Ninjas-Corner is still under construction.</strong><br />
	</div>

	<div id="header">
		<p id="identity">Ninjas Corner</p>
	</div><!-- #header -->

	<div id="content">
		<?php echo $content ?>
	</div><!-- #content -->

	<div id="footer">
		<p>
			© <?php echo date('Y') ?> —
			Powered by <a href="http://kohanaframework.org/">Kohana</a> v<?php echo Kohana::VERSION ?> 
		</p>
	</div><!-- #footer -->

        <p>
        <!-- Dont Delete - needed for Development -->
	<?php if (Kohana::$environment !== Kohana::PRODUCTION) { ?>
		<div id="kohana-profiler">
			<?php echo View::factory('profiler/stats') ?>
			<p>$_GET = <?php echo Kohana::debug($_GET) ?></p><hr />
			<p>$_POST = <?php echo Kohana::debug($_POST) ?></p><hr />
			<p>$_COOKIE = <?php echo Kohana::debug($_COOKIE) ?></p><hr />
			<p>$_SESSION = <?php echo Kohana::debug(Session::instance()->as_array()) ?></p><hr />
			<!-- <p>$_SERVER = <?php echo Kohana::debug($_SERVER) ?></p> -->
		</div><!-- #kohana-profiler -->
	<?php } ?>
        <!-- End Profiling-->
        </p>
</body>
</html>