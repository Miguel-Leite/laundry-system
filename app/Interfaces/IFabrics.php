<?php


namespace App\Interfaces;

use App\Models\Fabric;
use Illuminate\Http\Request;

/**
 * interface IFabrics
 */
interface IFabrics
{
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
     * @param int $id
     * @return void
     */
    public function delete(int $id);
}