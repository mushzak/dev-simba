<?php

namespace App\Controllers;

use App\Controller;

class Account extends Controller
{
    public function index()
    {
        return $this->view->fetch('registration.index');
    }

    public function confirmEmail(array $vars)
    {
        $success = false;
        list($email, $sid) = @explode('-', $vars['code']);
        $email = filter_var(base64_decode($email), FILTER_VALIDATE_EMAIL);
        if ($sid && $email) {
            $time = $this->db->query(
                "SELECT MAX(`sended_time`) FROM `:p_emails` WHERE `sid` = :sid AND `email` = :email",
                compact('sid', 'email')
            )->result();
            if ($time && strtotime($time) > time() - 86400) {
                $success = true;
            }
        }
        if (!$success) {
            $this->message('Wrong email address or expired link. Please try again.');
        }
        $this->db->query("UPDATE `:p_emails` SET `confirmed` = 1 WHERE `email`=:email", compact('email'));
        $this->redirect('/account/');
    }
}
