<?php

namespace App\Http\Controllers;

use App\Interfaces\IClothings;
use App\Models\Client;
use App\Models\Clothings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClothingsController extends Controller implements IClothings
{
    public function create(Request $request) 
    {
        $data_clothing = [
            'name' => $request->clothing_name,
            'color' => $request->color,
            'size' => $request->size,
            'iron' => $request->iron,
            'categories_id' => $request->categories_id,
            'fabrics_id' => $request->fabrics_id,
            'description' => $request->description,
        ];
        $data_client = [
            'name' => $request->client_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ];
        if ($request->image && $request->image->isValid())
        {
            $imageName = Str::of($request->name)->slug('-'). uniqid('-', true) . '.' . $request->image->getClientOriginalExtension();
            $image = $request->image->storeAs('assets/img/clothings',$imageName);
            $data_clothing['image'] = $image;
            $client = Client::create($data_client);
            $data_clothing['clients_id'] = $client->id;
            // dd($data_clothing);
            $clothings = Clothings::create($data_clothing);
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
            $imageName = Str::of($request->name)->slug('-'). uniqid('-', true) . '.' . $request->image->getClientOriginalExtension();
            $image = $request->image->storeAs('assets/img/clothings',$imageName);
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
