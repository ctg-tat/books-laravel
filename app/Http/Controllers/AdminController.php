<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function changeStatus(Book $books){
        return view('admin', compact('books'));
    }

    public function show(){
        $books = Book::query()
            ->where('status' , '=', 'unpublished')
            ->get();

        if($books === null){
            return redirect()->route('home');
        }

        return view('admin', compact('books'));
    }
}
