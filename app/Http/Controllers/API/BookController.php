<?php

namespace App\Http\Controllers\API;

use App\Book;
use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ticket_id' => 'required',
            'user_id' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], 422);
        }
        $id = $request->input('id');
        if ($id == null) {
            $book = new Book();
            $book->ticket_id = $request->input('ticket_id');
            $book->user_id = $request->input('user_id');
            $book->price = $request->input('price');
            $book->status = $request->input('status');
            $book->save();
            return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' => $book],200);

        }else{
            $book = Book::find($id);
            $book->ticket_id = $request->input('ticket_id');
            $book->user_id = $request->input('user_id');
            $book->price = $request->input('price');
            $book->status = $request->input('status');
            $book->save();
            return response()->json(['status' => true, 'message' => 'Update Successfully', 'data' => $book],200);

        }
    }

    public function BookedUserList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'booked' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], 422);
        }
        $book = $request->input('booked');
        if ($book == 1) {
            $user = Book::select(DB::raw('book.id as booked_id,users.id as user_id,book.price,book.ticket_id,users.name,users.mobile,users.business_name,users.city'))->leftjoin('users', 'users.id', 'book.user_id')->get();
            return response()->json(['status' => true, 'message' => 'Data', 'data' => $user],200);

        }
        else{
            $user = Book::select(DB::raw('book.id as booked_id,users.id as user_id,book.price,book.ticket_id,users.name,users.mobile,users.business_name,users.city'))->leftjoin('users', 'users.id', 'book.user_id')->get();
            return response()->json(['status' => true, 'message' => 'Data', 'data' => $user],200);

        }


    }

    public function showList()
    {
        $showlist = Ticket::all();
        return response()->json(['status' => true, 'message' => 'Data', 'data' => $showlist],200);

    }

    public function bookNow(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ticket_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], 422);
        }
        $ticket_id = $request->input('ticket_id');
        $bookNow = Book::where('ticket_id',$ticket_id)->get();
        return response()->json(['status' => true, 'message' => 'Data', 'data' => $bookNow],200);

    }

    public function statusShow(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], 422);
        }
        $status = $request->input('status');
            $show = Book::where('status',$status)->get();
        return response()->json(['status' => true, 'message' => 'Data', 'data' => $show],200);

    }
}
