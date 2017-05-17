<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Like;

class postController extends Controller
{
     public function getDashBoard()
     {
          $posts = Post::orderBy('created_at', 'DESC')->get();

          return view('dashboard', compact('posts'));
     }

    public function postCreatePost(Request $request)
    {
         //validation
         $this->validate($request, [
              'body' => 'required|max:1000'
         ]);
         $post = new Post();
         $post->body = $request['body'];
         $message = 'there is An Error Please try Again';
         $savePosts = $request->user()->posts()->save($post);
         if($savePosts){
              $message = 'The Post Successfully created';
         }
         return redirect()->route('dashboard')->with(['message' => $message]);

    }

     public function getDeletePost($post_id)
     {
          $post = Post::where('id', $post_id)->first();
          if(Auth::user() != $post->user){
               return redirect()-back();
          }
          $post->delete();

          return redirect()->route('dashboard')->with(['message' => 'Successfully Deleted']);
     }

     public function postEditPost(Request $request)
     {
          //validation
         $this->validate($request, [
              'body' => 'required|max:1000'
         ]);

         $post = Post::find($request['post_id']);
         if(Auth::user() != $post->user){
              return redirect()-back();
         }
         $post->body = $request['body'];
         $post->update();

         return response()->json(['new_body' => $post->body], 200);

     }

     public function postLikePost(Request $request)
     {
          $postId = $request['postId'];

          $isLike = $request['isLike'] === 'true';

          $update = false;

          $post = Post::find($postId);

          if(!$post){
               return null;
          }

          $user = Auth::user();
          $like = $user->likes()->where('post_id', $postId)->first();

          if($like) {
               $alreadyLike = $like->like;
               $update = true;

               if($alreadyLike == $isLike){
                    $like->delete();
                    return null;
               }

          } else{
               $like = new Like();
          }
          $like->like = $isLike;
          $like->user_id = $user->id;
          $like->post_id = $post->id;

          if($update) {
               $like->update();
          } else {
               $like->save();
          }

          return null;
     }
}
