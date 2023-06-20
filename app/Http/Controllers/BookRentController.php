<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where([
            ['id', '!=', 1],
            ['status', '!=', 'inactive']
        ])->get();
        $books = Book::all();
        return view('book-rent', ['users' => $users], ['books' => $books]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(5)->toDateString();

        $book = Book::query()->findOrFail($request->book_id)->only('status');

        if ($book['status'] == 'in stock') {
            $count = RentLog::where('user_id', $request->user_id)->where('actual_return_date', NULL)->count();
            if ($count >= 5) {
                return redirect('book-rent')->withErrors('Peminjam Telah mencapai limit peminjaman buku');
            }

            $isBookBorrowed = RentLog::where('user_id', $request->user_id)
                ->where('book_id', $request->book_id)
                ->where('actual_return_date', null)
                ->exists();

            if ($isBookBorrowed) {
                return redirect('book-rent')->withErrors('Peminjam sudah meminjam buku ini sebelumnya');
            }

            try {
                DB::beginTransaction();
                RentLog::create($request->all());
                $book = Book::query()->findOrFail($request->book_id);
                $book->save();
                DB::commit();
                return redirect('book-rent')->withSuccess('Buku Boleh Dipinjamkan');
            } catch (\Throwable $th) {
                DB::rollBack();
            }
        } else {
            return redirect('book-rent')->withErrors('Buku Tidak Boleh Dipinjamkan');

        }
    }

    public function return(Request $request)
    {
        $users = User::where([
            ['id', '!=', 1],
            ['status', '!=', 'inactive']
        ])->get();
        $books = Book::all();
        return view('rent-return', ['users' => $users], ['books' => $books]);
    }

    public function storeReturn(Request $request)
    {
        $rent = RentLog::where([
            ['user_id', $request->user_id],
            ['book_id', $request->book_id],
            ['actual_return_date', null]
        ]);

        $rentData = $rent->first();
        $countRent = $rent->count();

        if ($countRent == 1) {
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();
            return redirect('rent-return')->withSuccess('Buku Berhasil Dikembalikan');
        } else {
            return redirect('rent-return')->withErrors('Buku Tidak Berhasil Dikembalikan');
        }
    }
}
