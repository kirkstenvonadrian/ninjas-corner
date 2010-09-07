<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Template_Website 
{
    public function action_signin()
    {
        // User is already logged in
        if($this->auth->logged_in())
        {
            Message::set(Message::NOTICE, 'You are already signed in');
            Request::instance()->redirect('');
        }

        // Show sign in form
        $this->template->content = View::factory('user/signin')
                ->bind('post', $post) // Used to repopulate form fields
                ->bind('error', $error);

        // No login error by default
        $error = FALSE;

        // Check if the form was submitted
        if ($_POST)
        {
                // See if user checked 'Stay logged in'
                $remember = isset($_POST['remember']) ? TRUE : FALSE;

                // Try to log the user in
                if (! Auth::instance()->login($_POST['username'], $_POST['password'], $remember))
                {
                        // There was a problem logging in
                        $error = TRUE;
                }

                // Redirect to the index page if the user was logged in successfully
                if (Auth::instance()->logged_in())
                {
                        Request::instance()->redirect('');
                }
        }
    }

    public function action_register_jobseeker()
    {
        // The user is already logged in
        if ($this->auth->logged_in())
        {
            Message::set(Message::NOTICE, 'If you want to sign up somebody else, please, sign out yourself first.');
            $this->request->redirect('');
        }

        // Show form
        $this->template->content = View::factory('user/register_jobseeker')
                ->bind('post', $post)
                ->bind('errors', $errors);

        // Create an instance of Model_Auth_User
        $user = Jelly::factory('user');
        // Create an instance of Model_Applicant
        $applicant = Jelly::factory('applicant');

        // Check if the form was submitted
        if ($_POST)
        {
            $user->set(Arr::extract($_POST, array(
                    'email', 'username', 'password', 'password_confirm'
            )));

            $applicant->set(Arr::extract($_POST, array(
                    ''
            )));

            // Save the user id into applicants table
            $applicant->user = $user->id;
            
            // Add the 'login' role to the user model
            $user->add('roles', 1); // login role - always included
            $user->add('roles', 2); // applicant role - attached when registered as applicant

            try
            {
                    // Try to save our user model
                    $user->save();
                    // Try to save out applicant model
                    $applicant->save();

                    Message::set(Message::SUCCESS, 'You are now registered! Please signin below');
                    
                    // Redirect to the index page
                    Request::instance()->redirect('user/signin');
            }
            // There were errors saving our user model
            catch (Validate_Exception $e)
            {
                    // Load custom error messages from `messages/forms/user/register.php`
                    $errors = $e->array->errors('forms/user/register');
            }
        }
    }

     public function action_register_employer()
    {
        // The user is already logged in
        if ($this->auth->logged_in())
        {
            Message::set(Message::NOTICE, 'If you want to sign up somebody else, please, sign out yourself first.');
            $this->request->redirect('');
        }

        // Show form
        $this->template->content = View::factory('user/register_employer')
                ->bind('post', $post)
                ->bind('employer', $employer)
                ->bind('errors', $errors);

        // Create an instance of Model_Auth_User
        $user = Jelly::factory('user');

        // Create an instance of Model_Employer
        $employer = Jelly::factory('employer');

        // Check if the form was submitted
        if ($_POST)
        {
            $user->set(Arr::extract($_POST, array(
                    'email', 'username', 'password', 'password_confirm'
            )));

            $employer->set(Arr::extract($_POST, array(
                    'company', 'description', 'website', 'person', 'address', 'city', 'zipcode', 'country',
                    'telephone'
            )));

            // Add the 'login' role to the user model
            $user->add('roles', 1); // login role - always included
            $user->add('roles', 3); // employer role - attached when registered as employer

            // Validate Employer data fields
            // This is a manual check because I cant find any way to do this with jelly using 2 models
            $field = Validate::factory($_POST)
                ->filter(TRUE, 'trim')
                ->rule('company', 'not_empty')
                ->rule('description', 'not_empty')
                ->rule('website', 'not_empty')
                ->rule('website', 'url')
                ->rule('person', 'not_empty')
                ->rule('address', 'not_empty')
                ->rule('city', 'not_empty')
                ->rule('zipcode', 'not_empty')
                ->rule('zipcode', 'numeric')
                ->rule('country', 'not_empty')
                ->rule('telephone', 'not_empty');
            
            if($field->check()) {
                try
                    {
                        // Try to save our user model
                        $user->save();

                        // Save User Id to Employer table
                        $employer->user = $user->id;

                        // Try to save our employer model
                        $employer->save();

                        Message::set(Message::SUCCESS, 'You are now registered! Please signin below');
                        // Redirect to the index page
                        Request::instance()->redirect('user/signin');
                    }
                    // There were errors saving our user model
                    catch (Validate_Exception $e)
                    {
                        // Load custom error messages from `messages/forms/user/register.php`
                        $errors = $e->array->errors('forms/user/register');
                    }

            } else {
                // There were errors while posting the employers field - show errors
                $errors = $field->errors('forms/user/register');
            }

        }
    }

    public function action_signout()
    {
        if ( ! $this->auth->logged_in())
        {
            Message::set(Message::NOTICE, 'Take it easy. You are already signed out.');
            $this->request->redirect('');
        }

        $this->auth->logout();

        Message::set(Message::SUCCESS, 'You are now signed out. Bye!');
        $this->request->redirect('');
    }
}// End of Class
?>
