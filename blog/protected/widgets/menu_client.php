<?php
class menu_client extends CWidget
{
    public function init()
    {
    }
    public function run()
    {
        $data = Yii::app()->session['cart'];
        // print_r('<pre>');
        // print_r($data);die;
        $total_quality_cart = Cart::getTotalQualityProductCart();

        $this->render(
            'menu_client',
            array(
                'data' => $data,
                'total_quality_cart' => $total_quality_cart,
            )
        );
    }
}
