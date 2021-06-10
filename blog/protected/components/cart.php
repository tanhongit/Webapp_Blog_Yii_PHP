<?php
class Cart extends CActiveRecord
{
    static function addCart($id, $quality = 1)
    {
        $cart = Yii::app()->session['cart'];
        $productInfo = Product::model()->getDetail($id);

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

    static function getTotalQualityProductCart()
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

    static function totalPriceNotDiscount()
    {
        $cart = Yii::app()->session['cart'];
        if (!empty($cart)) {
            $total = 0.0;
            foreach ($cart as $value) {
                $total += $value['quality'] * $value['price'];
            }
            return $total;
        }
    }

    static function totalPrice()
    {
        if (!Yii::app()->session['cart_discount'] || empty(Yii::app()->session['cart_discount'])) {
            return Cart::totalPriceNotDiscount();
        } else {
            return Cart::totalPriceNotDiscount() - Yii::app()->session['cart_discount'];
        }
    }

    static function updateItem($id, $q)
    {
        $cart = Yii::app()->session['cart'];
        $productInfo = Product::model()->getDetail($id);
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

    static function deleteItem($id)
    {
        $cart = Yii::app()->session['cart'];
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
        }
        Yii::app()->session['cart'] = $cart; //set session again
    }

    static function cancelCoupon()
    {
        $session_price_coupon = Yii::app()->session['cart_discount'];

        if (isset($session_price_coupon) || $session_price_coupon > 0) {
            unset(Yii::app()->session['cart_discount']);
            Yii::app()->user->setState('coupon_cart_add_1', 'none');
            Yii::app()->session['result_add_coupon'] = 'Coupon has been canceled';
        }
        unset(Yii::app()->session['input_add_coupon']);
    }

    static function destroy()
    {
        $session_price_coupon = Yii::app()->session['cart_discount'];
        if (isset($session_price_coupon) || $session_price_coupon > 0) {
            unset(Yii::app()->session['cart_discount']);
        }
        Yii::app()->user->setState('coupon_cart_add_1', 'none');
        Yii::app()->session['result_add_coupon'] = '';
        unset(Yii::app()->session['cart']);
    }
}
