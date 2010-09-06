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
                ->bind('errors', $errors);

        // No login error by default
        $error = FALSE;

        // Check if the form was submitted
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

    public function action_signup()
    {
        // The user is already logged in
        if ($this->auth->logged_in())
        {
                Message::set(Message::NOTICE, 'If you want to sign up somebody else, please, sign out yourself first.');
                $this->request->redirect('');
        }

        // Show form
        $this->template->content = View::factory('user/signup')
                ->bind('post', $post)
                ->bind('errors', $errors);

        // Form submitted
        if ($_POST)
        {
                // Try to sign the user up
                if ($this->user->signup($post = $_POST))
                {
                        // Automatically log the user in
                        $this->auth->force_login($post['username']);

                        Message::set(Message::SUCCESS, 'Thanks for signin up. You are now logged in.');
                        $this->request->redirect('');
                }

                $errors = $post->errors();
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
