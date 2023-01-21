<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        return view('comment.index', [
            'comments' => Comment::orderBy('updated_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comment.create');
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
            'name' => ['required', 'unique:comments', 'max:255'],
            'theme' => ['required'],
            'comment' => ['required'],
            'pages' => ['required'],
        ]);


        Comment::create([
            'name' => $request-> name,
            'theme' => $request->theme,
            'comment' => $request->comment,
            'pages' => $request->pages,
            'image_path' => $request->image
        ]);

        return redirect(route('comment.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//
        return view('comment.show', [
            'comment' => Comment::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('comment.edit', [
            'comment' => Comment::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
                'name' => ['required', 'unique:comments', 'max:255'],
                'theme' => ['required'],
                'comment' => ['required'],
                'pages' => ['required'],
            ]);

            Comment::where('id', $id)->update([
                'name' => $request-> name,
                'theme' => $request->theme,
                'comment' => $request->comment,
                'pages' => $request->pages,
                'image_path' => $request->image
            ]);
        return redirect(route('comment.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect(route('comment.index'));
    }
}
