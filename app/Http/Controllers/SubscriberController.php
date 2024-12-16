<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers= Subscriber::latest()->filter(request(['name','search']))->select('email','slug','created_at')->latest()->paginate(10);
        return view('admin.subscriber.index',compact('subscribers'));
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $subscriber = Subscriber::whereSlug($slug)->first();
        $subscriber->delete();
        return redirect()->route('subscribers')->with('message','Subscriber deleted successfully');
    }
}
