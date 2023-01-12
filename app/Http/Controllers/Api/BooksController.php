<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;


class BooksController extends Controller
{
        public function index(Book $books)
        {
            $data = ["books" => $books -> all()];
            return response() -> json($data);

        }
}
