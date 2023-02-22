<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'content' => 'required|min:10',
            'year' => 'required|min:4',
            'price' => 'required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->error());
        }

        $img_path = null;

        if ($request->file('photo')){
            $img_path = $request->file('photo')->store('/public/images');
        }

        Book::query()->create([
            'img_path' => $img_path,
            'author_id' => Auth::user()->getAuthIdentifier()
        ] + $validator->validated());

        return redirect()->route('home');
    }

    public function show(string $id)
    {
        $book = Book::query()->find($id);

        if($book === null){
            return redirect()->route('home');
        }

        $book->view_count += 1;
        $book->save();

        return view('single', [
            'book' => $book
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'content' => 'required|min:10',
            'year' => 'required|min:4',
            'price' => 'required',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors());
        }

        $validated = $validator->validated();

        if($request->file('photo')){
            $request->validate(['photo' => 'mimes:png,jpeg,jpg']);
            $path = $request->file('photo')->store('public/images');
            $validated['img_path'] = $path;
        }

        $book->update($validated);

        return redirect()->route('book', $book->id);
    }

    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect()->route('home');
    }

    public function setStatus(Book $book, string $status){
        $book->update(['status' => $status]);

        return redirect()->route('admin');
    }

    public function setStatusPublished(Book $book){
        return $this->setStatus($book, 'published');
    }

    public function setStatusBlocked(Book $book){
        return $this->setStatus($book, 'blocked');
    }
}
