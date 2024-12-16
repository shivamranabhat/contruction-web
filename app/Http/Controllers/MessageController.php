<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages= Message::latest()->filter(request(['name','search']))->select('name','email','slug','created_at')->latest()->paginate(10);
        return view('admin.message.index',compact('messages'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $message = Message::whereSlug($slug)->first();
        return view('admin.message.details',compact('message'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $message = Message::whereSlug($slug)->first();
        $message->delete();
        return redirect()->route('messages')->with('message','Message deleted successfully');
    }
}