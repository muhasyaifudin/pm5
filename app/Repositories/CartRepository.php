<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Cart;

class CartRepository
{
    public function getCartByUserId(int $userId): ?Cart
    {
        return Cart::where('user_id', $userId)->first();
    }

    public function addProductToCart(int $userId, int $productId, int $quantity): Cart
    {
        $cart = Cart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);

        return $cart;
    }

    public function deleteProductFromCart(int $userId, int $productId): bool
    {
        $cart = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->delete();

        return $cart;
    }

    public function updateProductQuantityInCart(int $userId, int $productId, int $quantity): bool
    {
        $cart = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->update(['quantity' => $quantity]);

        return $cart;
    }

    public function clearCart(int $userId): bool
    {
        $cart = Cart::where('user_id', $userId)
            ->delete();

        return $cart;
    }
}