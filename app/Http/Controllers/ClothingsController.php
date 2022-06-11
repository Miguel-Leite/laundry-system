<?php

namespace App\Http\Controllers;

use App\Interfaces\IClothings;
use App\Models\Clothings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClothingsController extends Controller implements IClothings
{
    public function create(Request $request) 
    {
        $data = $request->all();
        if ($request->image && $request->image->isValid())
        {
            $imageName = Str::of($request->name)->slug('-'). uniqid('-', true) . '.' . $request->avatar->getClientOriginalExtension();
            $image = $request->avatar->storeAs('assets/img/clothings',$imageName);
            $data['image'] = $image;
            $clothings = Clothings::create($data);
            if ($clothings) return redirect()->back()->with('success','Adicionado com sucesso!');
            return redirect()->back()->with('danger','Não foi possível adicionar o vestuario!');
        }
        return redirect()->back()->with('danger','Não foi possível carregar o arquivo!');
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $clothings = Clothings::find($id);
        if (!$clothings) return redirect()->back()->with('danger','Não foi possível localizar o vestuario!');
        if ($request->image && $request->image->isValid())
        {
            if (Storage::exists($clothings->image)) Storage::delete($clothings->image);
            $imageName = Str::of($request->name)->slug('-'). uniqid('-', true) . '.' . $request->avatar->getClientOriginalExtension();
            $image = $request->avatar->storeAs('assets/img/clothings',$imageName);
            $data['image'] = $image;
            $clothings->update($data);
            return redirect()->back()->with('success','Adicionado com sucesso!');
        }
        
    }

    public function delete(int $id)
    {
        $clothings = Clothings::find($id);
        if (!$clothings) return redirect()->back()->with('danger','Não foi possível localizar o vestuario!');
        if (Storage::exists($clothings->image)) Storage::delete($clothings->image);
        $clothings->delete();
        return redirect()->back()->with('success','Vestuario removido com sucesso!');
    }

}
