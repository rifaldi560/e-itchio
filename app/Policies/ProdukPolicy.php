<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProdukPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        // Admin dan user biasa boleh create
        return in_array($user->role, ['admin', 'user']);
    }

    public function update(User $user, Produk $produk)
    {
  return $user->role === 'admin' || $user->id === $produk->user_id;
    }

    public function delete(User $user, Produk $produk)
    {
        return $user->role === 'admin' || $user->id === $produk->user_id;
    }
}
