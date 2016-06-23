<?php

namespace App\Controllers;

use App\Controller;

class Questionnaire extends Controller
{
    public function index()
    {
        return $this->view->fetch('questionnaire.index');
    }

    public function individuals()
    {
        return $this->view->fetch('questionnaire.individuals');
    }

    public function institutions()
    {
        return $this->view->fetch('questionnaire.institutions');
    }

    public function plan()
    {
        session_start();

        // User have to answer the questions first
        if (empty($_SESSION['riskOptions'])) {
            $this->redirect('/questionnaire/');
        }
        $sid = md5(session_id());
        $answers = $_SESSION['riskOptions'];
        $time = date('Y-m-d H:i:s', time());
        $json = json_encode($answers, JSON_UNESCAPED_UNICODE);
		
        $this->db->query(
            "INSERT INTO `:p_answers`(`id`, `created_time`, `updated_time`, `answers`) VALUES(:sid, :time, :time, :json) ".
            "ON DUPLICATE KEY UPDATE `updated_time` = :time, `answers` = :json",
            compact('sid', 'time', 'json')
        );
        $askEmail = !isset($_SESSION['email']);
        $riskValue = $_SESSION['riskValue'];
		
		return $this->view->fetch('questionnaire.plan', compact('askEmail', 'riskValue'));
    }

    /**
     * Universal post request responder
     */
    public function post()
    {
        session_start();
        
        $action = isset($_POST['action']) &&
                  in_array($_POST['action'], ['index', 'choose', 'plan', 'confirm_email', 'open'])
            ? $_POST['action']
            : 'index';
        switch ($action) {
            // Go to questionnaire start point
            case 'index':
                $this->redirect('/questionnaire/');
                break;
            // One of possible way choosen
            case 'choose':
                if (isset($_POST['target']) && in_array($_POST['target'], ['individuals', 'institutions'])) {
                    $this->redirect('/questionnaire/'.$_POST['target'].'/');
                }
                break;
            // All answers given. Let's show plan
            case 'plan':
                // Limit answers by predefined list of options
                $defaults = [
                    'acc-type'                  => '',
                    'answer-product'            => '',
                    'answer-org-type'           => '',
                    'answer-investment-type'    => '',
                    'answer-priority'           => '',
                    'answer-looking-for'        => [],
                    'answer-age'                => '',
                    'answer-pretax-income'      => '',
                    'answer-household'          => '',
                    'answer-lnw'                => '',
                    'answer-concern'            => '',
                    'answer-response-to-loss'   => '',
                ];
                $options = array_intersect_key($_POST, $defaults) + $defaults;
                // Calc preferred risk
                if ($options['acc-type'] == 'institutions') {
                    $matrix = [
                        'consist' => ['sellAll' => '3.0', 'sellSome' => '3.5', 'keepAll' => '4.0', 'buyMore' => '4.5'],
                        'sustain' => ['sellAll' => '3.5', 'sellSome' => '6.5', 'keepAll' => '7.5', 'buyMore' => '8.0'],
                    ];
                    $row = $options['answer-priority'];
                    $col = $options['answer-response-to-loss'];
                } else {
                    $matrix = [
                        'loss' => ['sellAll' => '3.0', 'sellSome' => '3.5', 'keepAll' => '4.0', 'buyMore' => '4.5'],
                        'both' => ['sellAll' => '3.5', 'sellSome' => '6.5', 'keepAll' => '7.5', 'buyMore' => '8.0'],
                        'gain' => ['sellAll' => '4.5', 'sellSome' => '8.0', 'keepAll' => '8.0', 'buyMore' => '8.5'],
                    ];
                    $row = $options['answer-concern'];
                    $col = $options['answer-response-to-loss'];
                }
                $_SESSION['riskValue'] = isset($matrix[$row][$col]) ? $matrix[$row][$col] : '0.5';
                $_SESSION['riskOptions'] = $options;
                $this->redirect('/questionnaire/plan');
                break;
            // Save user email and send confirmition
            case 'confirm_email':
                if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $sid   = md5(session_id());
                    $email = $_POST['email'];
                    $subscribe = empty($_POST['subscribe']) || $_POST['subscribe'] == 'false' ? 0 : 1;
                    $subject = 'Your Simba Investment Plan';
                    $url = $this->getParameter('BASE_URL')
                         . '/account/confirm-email/'.rtrim(base64_encode($email), '=').'-'.$sid;
                    $message = $this->fetch('email.confirmition_email', compact('url'));
                    $_SESSION['email'] = $email;

                    $time = date('Y-m-d H:i:s', time());
                    $message = $this->linebreaks($message);
                    $this->db->query(
                        "INSERT INTO `:p_emails`(`sid`, `email`, `subscribe`, `sended_time`, `subject`, `body`) ".
                        "VALUES(:sid, :email, :subscribe, :time, :subject, :message)",
                        compact('sid', 'email', 'subscribe', 'time', 'subject', 'message')
                    );

                    $this->sendEmail($email, $subject, $message, true);
                    $this->returnJson(['result' => 'ok']);
                }
                break;
            // Plan is confirmed. Time to open new account
            case 'open':
                $this->redirect('/account/');
                break;
        }
        // This point will never reached, but who knows...
        throw new \InvalidArgumentException('Wrong action or parameters');
    }

    private function sendEmail($to, $subject, $message, $isHtml = false)
    {
        $EOL = "\r\n";
        $from = $this->getParameter('parameters.email_from');
        $subject = 	(preg_match('/(?:[^\x00-\x7F])/', $message) !== 1)
            ? $subject
            : ('=?UTF-8?B?'.base64_encode($message).'?=');
        $message = str_replace("\n", $EOL, str_replace("\0", '', $message));
        $headers =
            'From: '.$from.$EOL.
            'Date: '.gmdate('r').$EOL.
            'MIME-Version: 1.0'.$EOL.
            'Content-transfer-encoding: 8bit'.$EOL.
            'Content-type: '.($isHtml?'text/html':'text/plain').'; charset=utf-8'.$EOL.
            'X-Mailer: Simba Mailer';

        return \mail($to, $subject, $message, $headers);
    }
}
