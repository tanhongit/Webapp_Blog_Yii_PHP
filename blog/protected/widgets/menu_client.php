<?php
class menu_client extends CWidget
{
    public function init()
    {
    }
    public function run()
    {
        $data = '';
        $this->render('menu_client', array('data' => $data));
    }
}
    