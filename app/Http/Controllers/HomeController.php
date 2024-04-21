<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\WellcomeNotification;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    public function index()
    {

        $users = User::get();
        $post =[
            'title'=>'post title',
            'slug'=>'post-slug'
        ];

        foreach($users as $user){
            $user->notify(new WellcomeNotification($post));
        }

        dd('done');
        return view('welcome');
    }
}
