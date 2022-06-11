<?php

namespace App\Http\Controllers;

use App\Interfaces\IToWash;
use App\Models\ToWash;
use Illuminate\Http\Request;

class ToWashController extends Controller implements IToWash
{
    public function create(Request $request)
    {
        $towash = ToWash::create($request->all());
        if ($towash) return redirect()->back()->with('success','Lavagem adicionado com sucesso!');
        return redirect()->back()->with('danger','Não foi adicionar a lavagem!');
    }

    public function update(Request $request, int $id)
    {
        $towash = ToWash::find($id);
        if (!$towash) return redirect()->back()->with('danger','Não foi localizar a lavagem!');
        $towash->update($request->all());
        return redirect()->back()->with('success','Lavagem actualizado com sucesso!');
    }

    public function delete(int $id)
    {
        $towash = ToWash::find($id);
        if (!$towash) return redirect()->back()->with('danger','Não foi localizar a lavagem!');
        $towash->delete();
        return redirect()->back()->with('success','Lavagem removido com sucesso!');
    }
}
