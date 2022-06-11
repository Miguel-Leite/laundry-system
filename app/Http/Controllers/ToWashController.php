<?php

namespace App\Http\Controllers;

use App\Interfaces\IToWash;
use App\Models\Client;
use App\Models\Service;
use App\Models\ToWash;
use Illuminate\Http\Request;

class ToWashController extends Controller implements IToWash
{
    public function create(Request $request)
    {
        $data = $this->serializer_data($request->all());
        $towash = ToWash::create($data);
        if ($towash) return redirect()->back()->with('success','Lavagem adicionado com sucesso!');
        return redirect()->back()->with('danger','Não foi possível adicionar a lavagem!');
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

    public function serializer_data(array $data): array
    {
        $data = $data;
        $data['clients_id']= Client::getClientClothingById($data['clothings_id'])->client_id;
        $data['total'] = (int)Service::find($data['services_id'])->price;
        $data['total_paid'] = (int)$data['total_paid'];
        $data['clothings_id'] = (int)$data['clothings_id'];
        $data['services_id'] = (int)$data['services_id'];
        return $data;
    }
}
