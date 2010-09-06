<!DOCTYPE html>

<html lang="en">
<head>

	<meta charset="utf-8" />
	<title><?php echo HTML::chars($title) ?></title>

	<link rel="stylesheet" href="<?php echo URL::site('../media/css/ninjas-corner.css') ?>" />

</head>
<body>

	<div style="padding:1em; background:yellow; text-align:center;">
		<strong>Ninjas-Corner is still under construction.</strong><br />
	</div>

	<div id="header">
		<p id="identity">Ninjas Corner</p>
                <p>

			<?php if (Auth::instance()->logged_in()) { ?>
					Hello, <?php echo HTML::chars($user->username) ?> —
					<?php echo HTML::anchor(Route::get('user')->uri(array('action' => 'change_password')), 'Change password') ?> —
				<?php echo HTML::anchor(Route::get('user')->uri(array('action' => 'change_email')), 'Change email') ?> —
				<?php echo HTML::anchor(Route::get('user')->uri(array('action' => 'signout')), 'Sign out') ?>
			<?php } else { ?>
				<?php echo HTML::anchor(Route::get('user')->uri(array('action' => 'signin')), 'Sign in') ?> or Register as
                                <?php echo HTML::anchor(Route::get('user')->uri(array('action' => 'employer')), 'Employer') ?> |
				<?php echo HTML::anchor(Route::get('user')->uri(array('action' => 'jobseeker')), 'Jobseeker') ?>
			<?php } ?>
		</p>
	</div><!-- #header -->

	<div id="content">
            	<?php echo Message::render() ?>
		<?php echo $content ?>
	</div><!-- #content -->

        <div id="sidebar">
            <?php if(Auth::instance()->logged_in('applicant')) {?>
            You Are An Applicant
            <?php } elseif(Auth::instance()->logged_in('employer')) {?>
            You are a Employer
            <?php }?>

            This is the side bar
        </div><!-- End Sidebar-->
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