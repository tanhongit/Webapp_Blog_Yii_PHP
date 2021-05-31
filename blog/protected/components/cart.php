<?php
class Cart
{
    static function addCart($id, $quality = 1)
    {
        $cart = Yii::app()->session['cart'];
        $productInfo = Product::getDetailProduct($id);

        if (empty($cart)) {
            $cart[$id] = array(
                'id' => $productInfo->id,
                'quality' => $quality,
                'price' => $productInfo->price,
                'product_name' => $productInfo->name,
                'product_image' => $productInfo->image,
            );
        } else {
            if (array_key_exists($id, $cart)) {
                $cart[$id] = array(
                    'id' => $productInfo->id,
                    'quality' => (int)$cart[$id]['quality'] + (int)$quality,
                    'price' => $productInfo->price,
                    'product_name' => $productInfo->name,
                    'product_image' => $productInfo->image,
                );
            } else {
                $cart[$id] = array(
                    'id' => $productInfo->id,
                    'quality' => $quality,
                    'price' => $productInfo->price,
                    'product_name' => $productInfo->name,
                    'product_image' => $productInfo->image,
                );
            }
        }
        Yii::app()->session['cart'] = $cart;
    }

    public function getTotalQualityProductCart()
    {
        $total = 0;
        if (!empty(Yii::app()->session['cart'])) {
            $data = Yii::app()->session['cart'];
            foreach ($data as $value) {
                $total += (int)$value['quality'];
            }
        }
        return $total;
    }

    static function updateItemCart($id, $q)
    {
        $cart = Yii::app()->session['cart'];
        $productInfo = Product::getDetailProduct($id);
        if ($q > 0) {
            if (array_key_exists($id, $cart)) {
                $cart[$id] = array(
                    'id' => $productInfo->id,
                    'quality' => (int)$q,
                    'price' => $productInfo->price,
                    'product_name' => $productInfo->name,
                    'product_image' => $productInfo->image,
                );
            }
        } else {
            unset($cart[$id]);
        }
        Yii::app()->session['cart'] = $cart; //set session again
    }

    static function deleteCartItem($id)
    {
        $cart = Yii::app()->session['cart'];
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
        }
        Yii::app()->session['cart'] = $cart; //set session again
    }
}
