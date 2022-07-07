<?php
class latest_product extends CWidget
{
    public function init()
    {
    }
    public function run()
    {
        $data = '';
        $this->render('latest_product', array('data' => $data));
    }
}
    