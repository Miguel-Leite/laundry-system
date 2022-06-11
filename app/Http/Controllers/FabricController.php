<?php

namespace App\Http\Controllers;

use App\Interfaces\IFabrics;
use App\Models\Fabric;
use Illuminate\Http\Request;

class FabricController extends Controller implements IFabrics
{
    public function create(Request $request)
    {
        $fabric = Fabric::create($request->all());
        if ($fabric) return redirect()->back()->with('success','Tecido adicionado com sucesso!');
        return redirect()->back()->with('danger','Não foi possível adicionar o tecido!');
    }

    public function update(Request $request, int $id)
    {
        $fabric = Fabric::find($id);
        if (!$fabric) return redirect()->back()->with('danger','Não foi possível localizar o tecido!');
        $fabric->update($request->all());
        return redirect()->back()->with('success','Tecido actualizado com sucesso!');
    }

    public function delete(int $id)
    {
        $fabric = Fabric::find($id);
        if (!$fabric) return redirect()->back()->with('danger','Não foi possível localizar o tecido!');
        return redirect()->back()->with('success','Tecido removido com sucesso!');
    }
}
