<?php
class slideshow extends CWidget
{
    public function init()
    {
    }
    public function run()
    {
        $data = '';
        $this->render('slideshow', array('data' => $data));
    }
}
