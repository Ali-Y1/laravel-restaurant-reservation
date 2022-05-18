<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\feedback;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WelcomeController extends Controller
{
    public function index()
    {
        $specials = Category::where('name', 'specials')->first();
        $menus = Menu::all();

        return view('welcome', compact('specials'),compact('menus'));
    }
    public function thankyou()
    {
        return view('thankyou');
    }
    public function feedback(Request $request){
        $fedback = new feedback();
        $fedback->name = $request->name;
        $fedback->email = $request->email;
        $fedback->menu_id = Menu::where('name',$request->dish)->pluck('id')[0];
        $fedback->rating = $request->rating;
        $fedback->save();
        return redirect('/');
    }

}
