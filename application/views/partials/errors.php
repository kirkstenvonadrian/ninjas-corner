<?php if (empty($errors)) return; // No errors to show ?>

<ul class="errors">
	<?php foreach ($errors as $field => $error) { ?>
		<li><?php echo $error ?></li>
	<?php } ?>
</ul>
