<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CartRepositoryInterface;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartRepository implements CartRepositoryInterface
{
    public function add(array $data)
    {
        return DB::transaction(function () use ($data) {
            $cart = Cart::where('user_id', $data['user_id'])
                ->where('product_id', $data['product_id'])
                ->first();

            if ($cart) {
                $cart->quantity += $data['quantity'];
                $cart->save();
            } else {
                $cart = Cart::create($data);
            }

            return $cart;
        });
    }
    public function get($user_id)
    {
        return Cart::where('user_id', $user_id)->with('product')->get();
    }
    public function update($id, $quantity)
    {
        $quantity = max(1, (int) $quantity);
        return Cart::where('id', $id)->update(['quantity' => $quantity]);
    }
    public function getCount($user_id)
    {
        return Cart::where('user_id', $user_id)->count();
    }
    public function delete($id)
    {
        return Cart::where('id', $id)->delete();
    }
}
