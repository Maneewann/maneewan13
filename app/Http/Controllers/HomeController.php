<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
       return view('home');
    }
    public function show($id){

    }
    public function create()
    {
        $post = Catagory::paginate(5);
        $data =[
            'posta' => $cagories
        ];
        return view('home',$data);

    }

    public function store(Request $request){
        $detail = $request->input("detail");
        $category_id = $request->input("category_id");
        $post=  new Post();
        $post->user_id = 1;
        $post->status = 0;
        $post-> detail = $detail;
        $post-> category_id = $category_id;
        $post->save();
        return redirect('/');

    }

    public function update($id){

    }

    public function delete($id){
        if($id == ""){
            return redirect('/');
        }

        $post = Post::find($id);
        $post->delete();

        return redirect('/');


      

    }

}
