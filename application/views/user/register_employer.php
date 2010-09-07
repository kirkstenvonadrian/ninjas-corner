<h1>Employer Registration</h1>

<?php echo Form::open() ?>

	<?php include Kohana::find_file('views', 'partials/errors') ?>

<fieldset>
<p>
    <?php echo Form::label('username', 'Your username:*') ?>
    <?php echo Form::input('username', $post['username'], array('id' => 'username')) ?>
</p>

<p>
    <?php echo Form::label('email', 'Your e-mail:*') ?>
    <?php echo Form::input('email', $post['email'], array('id' => 'email', 'type' => 'email')) ?>
</p>

<p>
    <?php echo Form::label('password', 'Your password:*') ?>
    <?php echo Form::password('password', NULL, array('id' => 'password')) ?>
</p>

<p>
    <?php echo Form::label('password_confirm', 'Your password again:*') ?>
    <?php echo Form::password('password_confirm', NULL, array('id' => 'password_confirm')) ?>
</p>
</fieldset>

<fieldset>
<p>
    <?php echo Form::label('company', 'Business Name:*') ?>
    <?php echo $employer->input('company')?>
</p>

<p>
    <?php echo Form::label('description', 'Description:*') ?>
    <br />
    <?php echo $employer->input('description')?>
</p>

<p>
    <?php echo Form::label('website', 'Company Website:*') ?>
    <?php echo $employer->input('website')?>
    <?php echo Form::label('website', 'e.g. http://www.example.com') ?>
</p>

<p>
    <?php echo Form::label('person', 'Contact Person:*') ?>
    <?php echo $employer->input('person')?>
</p>

<p>
    <?php echo Form::label('address', 'Address:*') ?>
    <?php echo $employer->input('address')?>
</p>

<p>
    <?php echo Form::label('city', 'City:*') ?>
    <?php echo $employer->input('city')?>
</p>

<p>
    <?php echo Form::label('zipcode', 'Zip Code:*') ?>
    <?php echo $employer->input('zipcode')?>
</p>

<p>
    <?php echo Form::label('country', 'Country:*') ?>
    <?php echo $employer->input('country')?>
</p>

<p>
    <?php echo Form::label('telephone', 'Telephone Number:*') ?>
    <?php echo $employer->input('telephone')?>
</p>

</fieldset>
<p>
    <?php echo Form::submit(NULL, 'Sign up') ?>
</p>

<?php echo Form::close() ?>