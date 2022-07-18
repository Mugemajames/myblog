<?php

namespace App\Http\Controllers;
use App\Models\content;
use App\Models\follow;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class ContentsController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myblog()
    {
        $id=Auth::user()->id;
        $User = content::all()->where('user_id',$id);
        return view('home',compact('User'));
    }

    public function index()
    {
        $id=Auth::user()->id;
        $User = User::all()->where('id','!=',$id);
        return view('klab.users',compact('User'));
    }
    //where('id', '!=', auth()->id())->get();
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('klab.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'title'=>'required|min:5|max:50',
            'content'=>'required|max:200',
            'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImagesName=time() .''. $request->name . '.' .
        $request->image->extension();
       $test= $request->image->move(public_path('images'), $newImagesName);
       //dd($test);

        $content=content::create([
        'title'=> $request->input('title'),
        'content'=>$request->input('content'),
        'user_id'=>$request->user_id = Auth::id(),
        'image'=>$newImagesName
        
        ]);
        $data=$content;
        Mail::to('mugemajames2000@gmail.com')->send (new SendMail($data));
        //dd($content);

        return view('klab.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=user::find($id);
        return view('klab.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(content $id)
    {
        $content=content::find($id)->first();
       
        return view('klab.edit')->with('content',$content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
    $request->validate([

        'title'=>'required|min:10|max:50',
        'content'=>'required|min:15',
        'image'=>'required|mimes:jpg,png,jpeg|max:5048'
    ]);
    $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Product::create($input);


    
    return redirect()->route('klab.users')->with('success','content created successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
       $contents=content::find($id);
       $contents->delete();

        return redirect('/klab/')->with('success','content has been deleted successfully');
        
    }
    public function likePost($id)
    {
        $post = content::find($id);
        if($post->liked()){
            $post->unlike();
            $post->save();
        }else{
            $post->like();
            $post->save();
        }
       

        return redirect()->back()->with('message','Post Like successfully!');
    }

    public function unlikePost($id)
    {
        $post = content::find($id);
        $post->unlike();
        $post->save();
        
        return redirect()->back()->with('message','Post Like undo successfully!');
    }
    public function follow($id){
        $foll=follow::create([
            'follow'=>1,
            'user'=>Auth::user()->id,
            'following'=>$id,
        ]);
        return redirect()->back();
    }
    public function unfollow($id){
        $follow=follow::where('follow',1)->where('user',Auth::user()->id)->where('following',$id);
        $follow->delete();
        return redirect()->back();
    }

}
