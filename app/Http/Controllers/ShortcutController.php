<?php

namespace App\Http\Controllers;

use App\Models\Shortcut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ShortcutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=$request->user();
        $shortcuts=$user->shortcuts()->get();

        return view('shortcuts.index',[
            'shortcuts'=>$shortcuts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'link'=>'required|max:255|min:3',
           
           
        ] );



        $shortcut = new Shortcut();
        $shortcut->link=$request->get('link');
        $shortcut->shortcut=Str::random(4);
        $shortcut->user_id=$request->user()->id;
        $shortcut->click=0;

        $shortcut->save();

        return redirect(route('shortcuts.index'))->with('success','The link has been shorten');

    }

    

    public function shortcuting($short)
    {
        $find = Shortcut::where('shortcut', $short)->first();
         $find->increment('click');
        return redirect($find->link);
    }
}
