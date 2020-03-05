<?php


namespace Kernel;


class Request
{
    public static function postContent()
    {
        if ('POST' !== $_SERVER['REQUEST_METHOD']){
            return false;
        }
        $data = file_get_contents('php://input');
        if ($data){
            return json_decode($data, true);
        }

        return null;
    }

    public static function getSchemeAndHost()
    {
        var_dump();
        return sprintf('%s://%s', $_SERVER['REQUEST_SCHEME'], $_SERVER['HTTP_HOST']);
    }
}