<?php

class Controller
{
    public function loadView($view)
    {
        require $view;
    }
}
