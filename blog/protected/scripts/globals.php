<?php
function get_BaseUrl()
{
    return Yii::app()->request->baseUrl;
}

function get_server_name()
{
    return $_SERVER['SERVER_NAME'];
}

function get_site_url()
{
    $protocol = 'http://';
    return $protocol . get_server_name();
}
