<h1>Sign in</h1>
<?php echo Form::open() ?>

<?php if($error): ?>
    <br/>
	<ul class="errors">
  	<li>Your username or password is incorrect.</li>
	</ul>
<?php endif; ?>

	<p>
		<?php echo Form::label('username', 'Your username:') ?>
		<?php echo Form::input('username', $post['username'], array('id' => 'username')) ?>
	</p>

	<p>
		<?php echo Form::label('password', 'Your password:') ?>
		<?php echo Form::password('password', NULL, array('id' => 'password')) ?>
		<?php echo HTML::anchor(Route::get('user')->uri(array('action' => 'reset_password')), 'Lost password?') ?>
	</p>

	<p>
		<?php echo Form::checkbox('remember', '1', ! empty($post['remember']), array('id' => 'remember')) ?>
		<?php echo Form::label('remember', 'Keep me signed in on this computer') ?>
	</p>

	<p>
		<?php echo Form::submit(NULL, 'Sign in') ?>
	</p>

<?php echo Form::close() ?>