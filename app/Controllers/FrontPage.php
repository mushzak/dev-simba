<?php

namespace App\Controllers;

use App\Controller;

class FrontPage extends Controller
{
    public function index()
    {
        return $this->view->fetch('index');
    }
}
