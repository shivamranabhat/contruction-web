<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
    public function business()
    {
        return view('pages.business');
    }
    public function mission()
    {
        return view('pages.mission');
    }
    public function team()
    {
        return view('pages.team');
    }
    public function projects()
    {
        return view('pages.projects');
    }
    public function blogs()
    {
        return view('pages.blogs');
    }
    public function blog()
    {
        return view('pages.blog');
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
