<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\RentLog;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        $rentlog = RentLog::with(['user', 'book'])->orderBy('user_id')->get();
        return view('dashboard', ['book_count' => $bookCount, 'category_count' => $categoryCount, 'user_count' => $userCount, 'rentlog' => $rentlog]);
    }

}
