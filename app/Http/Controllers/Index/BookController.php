<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use App\Models\ComplexDiscount;
use App\Models\Courts;
use App\Models\SportComplex;
use App\Models\SportTypes;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        return view('index.book-calendar');
    }

    public function create()
    {
        return view('index.add-book');
    }

    public function store(Request $request)
    {

    }
}
