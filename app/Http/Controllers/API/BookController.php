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
            $book->transaction_id = $request->input('transaction_id');
            $book->save();
            return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' => $book], 200);

        } else {
            $book = Book::find($id);
            $book->ticket_id = $request->input('ticket_id');
            $book->user_id = $request->input('user_id');
            $book->price = $request->input('price');
            $book->status = $request->input('status');
            $book->transaction_id = $request->input('transaction_id');
            $book->save();
            return response()->json(['status' => true, 'message' => 'Update Successfully', 'data' => $book], 200);

        }
    }


    public function showList(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], 422);
        }
        $user_id = $request->input('user_id');
        $booked = $request->input('booked');
        if ($user_id != null && $booked == null) {
            $showlist = Ticket::all();
            $book = Book::all();


            foreach ($showlist as $value) {
                foreach ($book as $item) {
                    if ($value->id == $item->ticket_id && $user_id == $item->user_id) {
                        $value['booked'] = 1;
                        break;
                    } else {
                        $value['booked'] = 0;
                    }
                }
            }

            return response()->json(['status' => true, 'message' => 'Available Data', 'data' => $showlist], 200);
        } elseif ($user_id != null && $booked != null) {

            if ($booked == 1) {
                $showlist = Book::select(DB::raw('ticket.*'))->leftjoin('ticket', 'book.ticket_id', 'ticket.id')->where('user_id', $user_id)->get();
                return response()->json(['status' => true, 'message' => 'Available Booked Show', 'data' => $showlist], 200);
            } else {
                $showlist = Book::select(DB::raw('ticket.*'))->join('ticket', 'ticket.id', '!=', 'book.ticket_id')->get();
                return response()->json(['status' => true, 'message' => 'Not Booked Show', 'data' => $showlist], 200);
            }
        } else {
            $showlist = Ticket::all();
            return response()->json(['status' => true, 'message' => 'Get All Show', 'data' => $showlist], 200);

        }

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
        $bookNow = Book::select(DB::raw('book.*,users.name as user_name,users.mobile,users.image'))->where('ticket_id', $ticket_id)->leftjoin('users','book.user_id','users.id')->get();
        return response()->json(['status' => true, 'message' => 'Data', 'data' => $bookNow], 200);

    }


}
