<?php

namespace R2\Security\WordPress;

class Auth
{
    private $db;
    private $config;
    private $meta;
    private $user;

    public function __construct($db, array $config)
    {
        $this->db = $db;
        $this->config = $config;
    }

    public function getCurrentUser()
    {
        if (isset($this->user)) {
            return $this->user;
        }
        $cookieName = 'wordpress_logged_in_'.md5($this->config['site_url']);
        if (!isset($_COOKIE[$cookieName])
        || count($tmp = explode('|', $_COOKIE[$cookieName])) !== 4
        || $tmp[1] < time()) {
            return $this->user = false;
        }
        list($username, $expiration, $token, $hmac) = $tmp;
        $user = $this->db->query(
                "SELECT `u`.* ".
                "FROM `:p_users` AS `u` ".
                "WHERE `u`.`user_login` = :username",
                compact('username')
            )->fetchAssoc();
        if (!$user) {
            return $this->user = false;
        }
        $passFrag = substr($user['user_pass'], 8, 4);
        $salt = $this->config['LOGGED_IN_KEY'].$this->config['LOGGED_IN_SALT'];
        $key = hash_hmac('md5', $username.'|'.$passFrag.'|'.$expiration.'|'.$token, $salt);
        $hash = hash_hmac('sha256', $username.'|'.$expiration.'|'.$token, $key);
        if ($hash !== $hmac) {
            return $this->user = false;
        }
        $meta = $this->getMeta($user['ID'], 'session_tokens');
        if (empty($meta)) {
            return $this->user = false;
        }
        $sessions = unserialize($meta[0]);
        $hash_token = hash('sha256', $token);
        if (!isset($sessions[$hash_token]) || $sessions[$hash_token]['expiration'] < time()) {
            return $this->user = false;
        }
        return $this->user = $user;
    }

    private function getMeta($id, $key)
    {
        if (!isset($this->meta)) {
            $this->meta = new UserMeta($this->db);
        }
        return $this->meta->get($id, $key);
    }

    public function createNonce($action = -1)
    {
        $user = $this->getCurrentUser();
        $uid = $user ? intVal($user['ID']) : 0;
        $token = $this->getSessionToken();
        $i = ceil(time() / 43200); // 43200 == 24*60*60 / 2
        $salt = $this->config['NONCE_KEY'].$this->config['NONCE_SALT'];
        $hash = hash_hmac('md5', "$i|$action|$uid|$token", $salt);
        return substr($hash, -12, 10);
    }

    public function getSessionToken()
    {
        $cookieName = 'wordpress_logged_in_'.md5($this->config['site_url']);
        if (!empty($_COOKIE[$cookieName])
        && count($elements = explode('|', $_COOKIE[$cookieName])) == 4
        && !empty($elements[2])) {
            return $elements[2];
        }
        return '';
    }
}
