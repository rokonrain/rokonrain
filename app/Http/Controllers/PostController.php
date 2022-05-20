<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\District;
use App\Division;
use App\Thana;
use App\Union;
use Illuminate\Http\Request;

class PostController extends Controller
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


  public function index(Request $request)
  {
    $posts = Post::where([
      ['name', '!=', Null],
      [function ($query) use ($request) {
        if (($term = $request->term)) {
          $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
        }
      }]
    ])
      ->orderBy('id', 'desc')
      ->paginate(10);

    return view('layouts.index', compact('posts'))
      ->with('i', ($request->input('page', 1) - 1) * 10);
  }
  public function porters(Request $request)
  {
    $posts = Post::where([
      ['name', '!=', Null],
      [function ($query) use ($request) {
        if (($term = $request->term)) {
          $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
        }
      }]
    ])
      ->orderBy('id', 'desc')
      ->paginate(10);

    return view('layouts.porters', compact('posts'))
      ->with('i', ($request->input('page', 1) - 1) * 10);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $posts = Post::all();
    $divisions = Division::with('district', 'thanas')->get();
    $districts = District::with('division')->get();
    $thanas = Thana::with('district')->get();
    $unions = Union::with('district')->get();



    $categories = Category::all();
    return view('layouts.create', compact('categories', 'divisions', 'districts', 'thanas', 'unions', 'posts'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, ['photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
    $post = new Post;
    $data = $request->all();
    $post->category_id = $data['category_id'];
    $post->name = $data['name'];
    $post->father = $data['father'];
    $post->mother = $data['mother'];
    $post->village = $data['village'];
    $post->post = $data['post'];
    $post->union = $data['union'];
    $post->thana = $data['thana'];
    $post->district = $data['district'];
    $post->division = $data['division'];
    $post->pvillage = $data['pvillage'];
    $post->ppost = $data['ppost'];
    $post->punion = $data['punion'];
    $post->pthana = $data['pthana'];
    $post->pdistrict = $data['pdistrict'];
    $post->pdivision = $data['pdivision'];
    $post->nid = $data['nid'];
    $post->mobile = $data['mobile'];
    $post->emergency_contact = $data['emergency_contact'];
    $post->relation = $data['relation'];

    if ($request->hasFile('photo')) {
      $image = $request->file('photo');
      $name = $image->getClientOriginalName();
      $destinationPath = public_path('/storage');
      $imagePath = $destinationPath . "/" .  $name;
      $image->move($destinationPath, $name);
      $post->photo = $name;
    }
    $post->save();
    return redirect()->route('posts.index')
      ->with('success', 'Porter created successfully!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $post = Post::find($id);
    return view('layouts.show', compact('post'));
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $post = Post::find($id);
    $divisions = Division::with('district', 'thanas')->get();
    $categories = Category::all();
    return view('layouts.edit', compact('categories', 'post', 'divisions'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $post = Post::find($id);
    $data = $request->all();

    if ($request->hasFile('photo')) {
      $image = $request->file('photo');
      $name = $image->getClientOriginalName();
      $destinationPath = public_path('/storage');
      $imagePath = $destinationPath . "/" .  $name;
      $image->move($destinationPath, $name);
      $post->photo = $name;
      $post->category_id = $data['category_id'];
      $post->name = $data['name'];
      $post->father = $data['father'];
      $post->mother = $data['mother'];
      $post->village = $data['village'];
      $post->post = $data['post'];
      $post->union = $data['union'];
      $post->thana = $data['thana'];
      $post->district = $data['district'];
      $post->division = $data['division'];
      $post->pvillage = $data['pvillage'];
      $post->ppost = $data['ppost'];
      $post->punion = $data['punion'];
      $post->pthana = $data['pthana'];
      $post->pdistrict = $data['pdistrict'];
      $post->pdivision = $data['pdivision'];
      $post->nid = $data['nid'];
      $post->mobile = $data['mobile'];
      $post->emergency_contact = $data['emergency_contact'];
      $post->relation = $data['relation'];
    } else {
      $post->category_id = $data['category_id'];
      $post->name = $data['name'];
      $post->father = $data['father'];
      $post->mother = $data['mother'];
      $post->village = $data['village'];
      $post->post = $data['post'];
      $post->union = $data['union'];
      $post->thana = $data['thana'];
      $post->district = $data['district'];
      $post->division = $data['division'];
      $post->pvillage = $data['pvillage'];
      $post->ppost = $data['ppost'];
      $post->punion = $data['punion'];
      $post->pthana = $data['pthana'];
      $post->pdistrict = $data['pdistrict'];
      $post->pdivision = $data['pdivision'];
      $post->nid = $data['nid'];
      $post->mobile = $data['mobile'];
      $post->emergency_contact = $data['emergency_contact'];
      $post->relation = $data['relation'];
    }
    $post->save();
    return redirect()->route('posts.index')
      ->with('success', 'Porter updated successfully!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $post = Post::find($id);
    $post->delete();
    return redirect()->route('posts.index');
  }
  
}
