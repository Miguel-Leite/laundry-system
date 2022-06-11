<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface IToWash
{
    public function serializer_data(array $data): array;
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