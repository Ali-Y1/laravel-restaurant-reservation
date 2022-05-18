<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\feedback;


class FeedbacksController extends Controller
{
    public function index()
    {
        $feed = feedback::all();
        return view('admin.feedbacks.index',compact('feed'));
    }
}
