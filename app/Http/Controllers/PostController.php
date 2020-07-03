<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Post;
use App\Photo;
use App\User;
use App\Traits\ApiResponser;
class PostController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //
    }

    /**
     * Return the list of post
     * @return Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Post::with('user','category','photo')->get();
       return $this->successResponse($posts); 
       
    }

     /**
     * create one new post
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'user_id'      => 'required',
            'category_id'  => 'required',
            'photo_id'     =>'required',
            'title'        =>'required',
            'body'         =>'required',
        ];
        $this->validate($request,$rules);

        $post = $request->all();
        $user_id = $post['user_id'];
        $user = User::find($user_id);

        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $post['photo_id'] = $photo->id;
        }
         
         $user->posts($user_id)->create($post);
         return $this->successResponse($post,Response::HTTP_CREATED);
    }

     /**
     * Obtain and show one Post
     * @return Illuminate\Http\Response
     */
    public function show($post)
    {
        $post = Post::findOrFail($post);

        return $this->successResponse($post);
    }

     /**
     * Update an existing post
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
        $rules = [
            'user_id'      => 'required',
            'category_id'  => 'required',
            'photo_id'     =>'required',
            'title'        =>'required',
            'body'         =>'required',
        ];
        $this->validate($request,$rules);

        $post = Post::findOrFail($post);

        $post->fill($request->all());

        if($post->isClean()){
            return $this->errorResponse('At least one value must change',Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $post->save();

        return $this->successResponse($post);
    }

     /**
     * Remove exisiting post
     * @return Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $post = Post::findOrFail($post);

        $post->delete();

        return $this->successResponse($post);
    }
}
