<?php

namespace tegar\Freshmarket\Controller;

use tegar\Freshmarket\app\View;

class HomeController
{

   


    function index()
    {

        View::render('Home/index', [
            "title" => "PHP Login Management"
        ],'dasboard-mode');
       
    }
}
