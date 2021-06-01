<?php
class sidebar_left extends CWidget
{
    public function init()
    {
    }
    public function run()
    {
        $data = '';
        $this->render('sidebar_left', array('data' => $data));
    }
}
