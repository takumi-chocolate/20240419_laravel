<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //indexアクションでは、Book::allで全レコードを呼び出し、$itemsという変数に渡してる//
    public function index() {
        $items = Book::with('author')->get();
        return view('book.index', ['items' => $items]);
    }

    //addアクションではフォーム用のページに遷移するように設定//
    public function add() {
        return view('book.add');
    }

    //createアクションは送信された値をBooksテーブルに追加//
    public function create(Request $request) {
        $this -> validate($request, Book::$rules);
        $form = $request->all();
        Book::create($form);
        return redirect('/book');

    }
    
}
