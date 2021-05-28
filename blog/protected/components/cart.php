<?php
class Cart
{
    static function addCart($id, $quality = 1)
    {
        $cart = Yii::app()->session['cart'];
        $productInfo = Product::getDetailProduct($id);

        if (empty($cart)) {
            $cart[$id] = array(
                'quality' => $quality,
                'price' => $productInfo->price,
                'product_name' => $productInfo->name,
                'product_image' => $productInfo->image,
            );
        } else {
            if (array_key_exists($id, $cart)) {
                $cart[$id] = array(
                    'quality' => (int)$cart[$id]['quality'] + (int)$quality,
                    'price' => $productInfo->price,
                    'product_name' => $productInfo->name,
                    'product_image' => $productInfo->image,
                );
            } else {
                $cart[$id] = array(
                    'quality' => $quality,
                    'price' => $productInfo->price,
                    'product_name' => $productInfo->name,
                    'product_image' => $productInfo->image,
                );
            }
        }
        Yii::app()->session['cart'] = $cart;
    }
}
