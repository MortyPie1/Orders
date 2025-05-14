<?php

namespace App\Policies;

use App\Models\Driver;
use App\Models\Order;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Driver $driver): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Driver $driver, Order $order): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function update($user, Order $order)
    {
        return $user instanceof Driver || $user instanceof Admin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function store($user): bool
    {
        return $user instanceof Admin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Driver $driver, Order $order): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Driver $driver, Order $order): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Driver $driver, Order $order): bool
    {
        return false;
    }
}
