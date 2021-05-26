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

function language_codes()
{
    return array(
        'en', 'fr', 'he', 'hu', 'id', 'it', 'ja', 'kk', 'ko_kr', 'lt', 'lv', 'nl', 'no', 'pl', 'pt', 'ro', 'ru', 'sk', 'sv', 'th', 'tr', 'uk', 'vi', 'ta_in', 'sr_yu', 'pt_br', 'sr_sr',
    );
}

function dynamic_url_internationalization()
{
    $site_url = get_site_url();
    $array_site_url = explode('.', $site_url);
    $pop_array_url = array_pop($array_site_url);
    if (in_array($pop_array_url, language_codes())) {
        $array_diff_url = array_diff($array_site_url, [$pop_array_url]);
        $dynamic_url = implode('.', $array_diff_url);
    } else $dynamic_url = $site_url;
    return $dynamic_url;
}
