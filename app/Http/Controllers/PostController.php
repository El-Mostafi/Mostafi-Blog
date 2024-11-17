<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;

class PostController extends Controller
{
    public function index(){        
        return view('posts.index',[Post::all()]);

    }
    public function show(Post $posts){
        //$singlePostFromDB=Post::find($postId);//prferered
        //$singlePostFromDB=Post::where('id',$postId)->first();
        //$singlePostFromDB=Post::where('id',$postId)->get();
        //if(is_null($singlePostFromDB)){
        //    return to_route('posts.index');
        //}
        //$singlePostFromDB=Post::findOrFail($postId);--> si $postId est null il va afficher la page 404
       ;
       return view('posts.show',['post' => $posts]);

    }
    public function create(){
                
        return view('posts.create');

    }
    // public function store(){
    //       $title =request()->title;
    //       $description =request()->description;
    //       $postCreator =request()->postCreator;
    //       //l'insertion dans la basse de donne 
    //       //$post = new Post;
    //       //$post->title = $title;
    //       //$post->description = $description;
    //       //$post->save();
    //       request()->validate([
    //         'title'=> ['required','min:2'],
    //         'description'=> ['required','min:12'],
    //         'postCreator'=>['required','exists:users,id']
    //       ]);
    //       Post::create([
    //         'title' =>$title,
    //         'description' =>$description,
    //         'user_id' =>$postCreator
    //       ]);
    //     return to_route('posts.index');
    // }
    public function edite(Post $posts) {
        return view('posts.edite',['mypost'=>$posts]);

    }
  //   public function update($postId){
  //       request()->validate([
  //           'title'=> ['required','min:5'],
  //           'description'=> ['required','min:12'],
  //           'postCreator'=>['required','exists:users,id'],
  //         ]);
  //       $title =request()->title;
  //       $description =request()->description;
  //       $postCreator =request()->postCreator;
  //       $singlePostFromDB=Post::find($postId);
  //       $singlePostFromDB->update([
  //           'title' => $title,
  //           'description' => $description,
  //           'user_id' =>$postCreator
  //       ]);
        
  //     return to_route('posts.show',$singlePostFromDB->id);
  // }
  // public function destroy($postId){
  //   $singlePostFromDB=Post::find($postId); 
  //   $singlePostFromDB->delete();
  //   return to_route('posts.index');

  //   }
}
