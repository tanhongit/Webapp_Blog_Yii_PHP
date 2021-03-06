<?php
function get_BaseUrl()
{
    return Yii::app()->request->baseUrl;
}

/**
 * @return mixed
 */
function get_server_name()
{
    // return $_SERVER['SERVER_NAME'];
    return $_SERVER['HTTP_HOST'];
}

function get_request_url()
{
    return $_SERVER['REQUEST_URI'];
}

function get_site_url()
{
    $protocol =  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
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

function convert_number_to_words($number)
{

    $hyphen      = ' ';
    $conjunction = '  ';
    $separator   = ' ';
    $negative    = 'âm ';
    $decimal     = ' phẩy ';
    $dictionary  = array(
        0                   => 'Không',
        1                   => 'Một',
        2                   => 'Hai',
        3                   => 'Ba',
        4                   => 'Bốn',
        5                   => 'Năm',
        6                   => 'Sáu',
        7                   => 'Bảy',
        8                   => 'Tám',
        9                   => 'Chín',
        10                  => 'Mười',
        11                  => 'Mười một',
        12                  => 'Mười hai',
        13                  => 'Mười ba',
        14                  => 'Mười bốn',
        15                  => 'Mười năm',
        16                  => 'Mười sáu',
        17                  => 'Mười bảy',
        18                  => 'Mười tám',
        19                  => 'Mười chín',
        20                  => 'Hai mươi',
        30                  => 'Ba mươi',
        40                  => 'Bốn mươi',
        50                  => 'Năm mươi',
        60                  => 'Sáu mươi',
        70                  => 'Bảy mươi',
        80                  => 'Tám mươi',
        90                  => 'Chín mươi',
        100                 => 'trăm',
        1000                => 'ngàn',
        1000000             => 'triệu',
        1000000000          => 'tỷ',
        1000000000000       => 'nghìn tỷ',
        1000000000000000    => 'ngàn triệu triệu',
        1000000000000000000 => 'tỷ tỷ'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

function get_price_apply_i18n($price)
{
    //check lang code
    $data_lang_code = LanguageCode::model()->getAll();
    $code_postal = '';

    $lang_code = '';
    !empty(Yii::app()->language) ? $lang_code = Yii::app()->language : $lang_code = 'en';

    foreach ($data_lang_code as $value) {
        $lang_code == $value['first_code'] && $code_postal = $value['second_code'];
    }

    //check currency code
    $data_current_rate = CurrencyRate::model()->getAll();
    $current_rate = 0.0;
    foreach ($data_current_rate as $value) {
        Yii::app()->params->currency == $value['currency_code'] && $current_rate = $value['rate'];
    }

    $currency_price = $price * $current_rate;

    //get price i18n
    $number = new CNumberFormatter($lang_code . '_' . $code_postal);
    echo $number->formatCurrency($currency_price, Yii::app()->params->currency);
}

function return_price_apply_i18n($price)
{
    //check lang code
    $data_lang_code = LanguageCode::model()->getAll();
    $code_postal = '';

    $lang_code = '';
    !empty(Yii::app()->language) ? $lang_code = Yii::app()->language : $lang_code = 'en';

    foreach ($data_lang_code as $value) {
        $lang_code == $value['first_code'] && $code_postal = $value['second_code'];
    }

    //check currency code
    $data_current_rate = CurrencyRate::model()->getAll();
    $current_rate = 0.0;
    foreach ($data_current_rate as $value) {
        Yii::app()->params->currency == $value['currency_code'] && $current_rate = $value['rate'];
    }

    $currency_price = $price * $current_rate;

    //get price i18n
    $number = new CNumberFormatter($lang_code . '_' . $code_postal);
    return $number->formatCurrency($currency_price, Yii::app()->params->currency);
}

function get_total_price_cart_i18n()
{
    //check currency code
    $data_current_rate = CurrencyRate::model()->getAll();
    $current_rate = 0.0;
    foreach ($data_current_rate as $value) {
        Yii::app()->params->currency == $value['currency_code'] && $current_rate = $value['rate'];
    }
    $currency_price = Cart::totalPrice() * $current_rate;
    $currency_price = round($currency_price, 0);
    return  $currency_price;
}

function time_elapsed_string($datetime, $full = false)
{
    $now_time = new DateTime;
    $ago_time = new DateTime($datetime);
    $diff = $now_time->diff($ago_time);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array('y' => 'year', 'm' => 'month', 'w' => 'week', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second');
    foreach ($string as $key => &$value) {
        if ($diff->$key) {
            $value = $diff->$key . ' ' . $value . ($diff->$key > 1 ? 's' : '');
        } else {
            unset($string[$key]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function slug($str)
{
    $str = convert_name($str);
    $str = strtolower($str); //mb_strtolower($str, 'UTF-8');
    $str = str_replace(' ', '-', $str);
    return $str;
}

function convert_name($str)
{
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
    $str = preg_replace("/( )/", '-', $str);
    return $str;
}

function getOptionSlug($option_id, $id)
{
    $slug = '';
    foreach (Slug::model()->getByOptionID($option_id, $id) as $value_2) {
        $slug = $value_2['slug'];
    }
    return $slug;
}

function getSubStrString($string, $length)
{
    if (strlen($string) < $length) {
        $name =  $string;
    } else $name = substr($string, 0, $length) . '...';
    return $name;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
