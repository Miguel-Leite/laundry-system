<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Clothings;
use App\Models\Fabric;
use App\Models\Service;
use App\Models\ToWash;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view("pages.auth.login");
    }

    public function forgotPassword()
    {
        return view("pages.auth.forgot-password");
    }

    public function home()
    {
        return view("pages.index");
    }

    public function userList()
    {
        $users = User::all();
        return view("pages.user.list",compact('users'));
    }

    public function userCreate()
    {
        return view("pages.user.create");
    }

    public function userUpdate($id)
    {
        $user = User::find($id);
        return view("pages.user.update",compact('user'));
    }

    public function categoryList()
    {
        $categories = Category::all();
        return view("pages.category.list",compact('categories'));
    }

    public function categoryCreate()
    {
        return view("pages.category.create");
    }

    public function categoryUpdate(int $id)
    {
        $category = Category::find($id);
        return view("pages.category.update",compact('category'));
    }

    public function fabricList()
    {
        $fabrics = Fabric::all();
        return view("pages.fabric.list",compact('fabrics'));
    }

    public function fabricCreate()
    {
        return view("pages.fabric.create");
    }

    public function serviceList()
    {
        $services = Service::all();
        return view("pages.service.list",compact('services'));
    }

    public function serviceCreate()
    {
        return view("pages.service.create");
    }

    public function clothingList()
    {
        $clothings = Clothings::getAllClothingsWithClient();
        return view("pages.clothing.list",compact('clothings'));
    }

    public function clothingCreate()
    {
        $fabrics = Fabric::all();
        $categories = Category::all();
        return view("pages.clothing.create",compact('fabrics','categories'));
    }

    public function toWashCreate()
    {
        $clothings = Clothings::getAllClothingsWithClient();
        $services = Service::all();
        return view("pages.toWash.create",compact('clothings','services'));
    }

    public function toWashList()
    {
        $toWashs = ToWash::getToWashs();
        return view("pages.toWash.list",compact('toWashs'));
    }
}
