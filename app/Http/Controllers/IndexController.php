<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $books = Book::query()
            ->where('status', '=', 'published')
            ->orderByDesc('id')
            ->get();
        return view('index', compact('books'));
    }

    public function user(){
        return view('user');
    }

    public function add(){
        return view('add');
    }

    public function single(){
        return view('single');
    }

    public function update(Book $book){
        return view('update', compact('book'));
    }
}
