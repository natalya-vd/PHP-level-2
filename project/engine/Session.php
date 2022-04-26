<?php

namespace app\engine;

class Session
{
    protected $session = [];

    public function __construct()
    {
        $this->parseRequest();
    }

    protected function parseRequest()
    {
        $this->session = $_SESSION;
    }

    public function sessionDestroy()
    {
        session_destroy();
    }

    public function sessionRegenerate()
    {
        session_regenerate_id();
    }

    public function setSession($name, $value)
    {
        $_SESSION[$name] = $value;
        $this->session[$name] = $value;
    }

    public function getSession()
    {
        return $this->session;
    }

    public function getSessionId()
    {
        return session_id();
    }
}