<?php
function get_BaseUrl()
{
    return Yii::app()->request->baseUrl;
}

function get_server_name()
{
    // return $_SERVER['SERVER_NAME'];
    return $_SERVER['HTTP_HOST'];
}

function get_site_url()
{
    $protocol =  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";;
    return $protocol . get_server_name();
}
