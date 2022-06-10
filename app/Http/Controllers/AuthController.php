<?php

namespace App\Http\Controllers;

use App\Interfaces\IAuth;
use App\Mail\UserSendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
            $request->session()->regenerate();
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
        $data = $request->all();
        $data['isEmployee'] = 1;
        $data['isAdmin'] = (isset($data['isAdmin']) ? 1 : 0);
        if ($request->avatar && $request->avatar->isValid()){
            $avatarName = Str::of($request->name)->slug('-'). uniqid('-', true) . '.' . $request->avatar->getClientOriginalExtension();
            $avatar = $request->avatar->storeAs('assets/img/users',$avatarName);
            $data['avatar'] = $avatar;
            $data['password'] = password_hash(rand(999,999999),PASSWORD_DEFAULT);
            $user = User::create($data);
            Mail::to($user->email)->send(new UserSendMail($user,['subject'=>'Bem-vindo ao sistema','view'=>'emails.sendMailUserPasssword','password'=> $data['password']]));
            if ($user) return redirect()->back()->with('success','Adicionado com sucesso!');
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
        $data = $request->all();
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('danger','Não foi encontrar o usuario!');
        }
        if ($request->avatar && $request->avatar->isValid()){
            if (Storage::exists($user->avatar)) Storage::delete($user->avatar);
            $avatarName = Str::of($request->name)->slug('-'). uniqid('-', true) . '.' . $request->avatar->getClientOriginalExtension();
            $avatar = $request->avatar->storeAs('assets/img/users',$avatarName);
            $data['avatar'] = $avatar;
        }
        Mail::to($user->email)->send(new UserSendMail($user,['subject'=>'Actualização dos dados pessoas',
        'view'=>'emails.sendMailUserUpdate']));
        $user->update($data);
        return redirect()->back()->with('success','Atualizado com sucesso!');
    }

    /**
     * function delete
     *
     * @param User $user
     * @return void
     */
    public function delete(User $user)
    {
        if (!$user) {
            return redirect()->back()->with('danger','Não foi encontrar o usuario!');
        }
        if (Storage::exists($user->avatar)) Storage::delete($user->avatar);
        $user->delete();
        return redirect()->back()->with('success','Removido com sucesso!');
    }

    /**
     * function logout
     *
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
        return redirect()->route('pages.index');        
    }
}
