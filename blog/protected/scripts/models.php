<?php

function getIDBySlugView($option_name, $option_id)
{
    $test_request_url = explode('/', get_request_url());

    $the_key_url = 0;

    foreach ($test_request_url as $key => $value) {
        if ($option_name == $value) {
            $the_key_url = $key;
        }
    }

    $data_slug = Slug::model()->getBySlug($test_request_url[$the_key_url + 1]);

    $id = 0;

    if (!empty($data_slug)) {
        foreach ($data_slug as $value) {
            $id = $value[$option_id . "_id"];
        }
    }
    return $id;
}
