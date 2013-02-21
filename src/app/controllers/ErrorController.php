<?php
class ErrorController extends Controller
{
    public function errorAction()
    {
        die(var_dump($this));
    }
}



