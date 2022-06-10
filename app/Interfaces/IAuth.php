<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * IAuth interface
 */
interface IAuth
{

    /**
     * function login
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request);

    /**
     * function create
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request);

    /**
     * function update
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function update(Request $request, int $id);

    /**
     * function delete
     *
     * @param User $user
     * @return void
     */
    public function delete(User $user);

    /**
     * function logout
     *
     * @return void
     */
    public function logout(Request $request);
}
