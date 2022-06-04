<?php

namespace App\Http\Controllers;

use App\Interfaces\IAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthController extends Controller implements IAuth
{
    /**
     * function login (authentication)
     * 
     * credentials: email, password
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email'=> $request->email,'password'=> $request->password])){
            return redirect()->route('pages.home')->with('success','Usuario logado com sucesso!');
        }
        return redirect()->back()->with('danger','Não foi possível fazer o login. E-mail ou senha inválidas!');
    }

    /**
     * function create
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        // $request->validate([]);
        $data = $request->all();
        $data['isEmployee'] = 1;
        $data['isAdmin'] = (isset($data['isAdmin']) ? 1 : 0);
        if ($request->avatar && $request->avatar->isValid()){
            $avatarName = Str::of($request->name)->slug('-'). uniqid('-', true) . '.' . $request->avatar->getClientOriginalExtension();
            $avatar = $request->avatar->storeAs('assets/img/users',$avatarName);
            $data['avatar'] = $avatar;
            $data['password'] = '000000';
            $user = User::create($data);
            if ($user) redirect()->back()->with('success','Adicionado com sucesso!');
            if (Storage::exists($avatar)) Storage::delete($avatar);
            return redirect()->back()->with('danger','Não foi possível adicionar o usuario!');
        }
        return redirect()->back()->with('danger','Não foi possível carregar o arquivo!');
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
        
    }

    /**
     * function delete
     *
     * @param User $user
     * @return void
     */
    public function delete(User $user)
    {
        
    }

    /**
     * function logout
     *
     * @return void
     */
    public function logout()
    {
        
    }
}
