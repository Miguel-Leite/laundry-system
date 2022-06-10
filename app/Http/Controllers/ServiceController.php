<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * function create
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $service = Service::create($request->all());
        if ($service) return redirect(null,201)->route('pages.serviceCreate')->with('success','Adicionado com sucesso!');
        return redirect(null,403)->route('pages.serviceCreate')->with('danger','Não foi possível adicionar o serviço!');
    }

    /**
     * function update
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $service = Service::find($id);
        if (!$service) return redirect()->back()->with('danger','Não foi encontrar o serviço!');
        $service->update($request->all());
        return redirect()->back()->with('success','Actualizado com sucesso!');
    }

    /**
     * function delete
     *
     * @param Service $service
     * @return void
     */
    public function delete(Service $service)
    {
        if (!$service) return redirect()->back()->with('danger','Não foi encontrar o serviço!');
        $service->delete();
        return redirect()->back()->with('success','Serviço removido com sucesso!');
    }
}
