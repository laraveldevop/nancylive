<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'detail' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], 422);
        }
        $id = $request->input('id');
        if ($id == null) {
            $ticket = new Ticket();
            $ticket->name = $request->input('title');
            $ticket->detail = $request->input('detail');
            $ticket->date = $request->input('date');
            $ticket->time = $request->input('time');
            $ticket->price = $request->input('price');
            $ticket->type = $request->input('type');
            $ticket->silver_price = $request->input('silver_price');
            $ticket->golden_price = $request->input('golden_price');
            $ticket->platinum_price = $request->input('platinum_price');
            $image_path = Storage::disk('public')->put('ticket', $request->file('image'));
            $thumbnailpath = public_path('storage/' . $image_path);
            $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save($thumbnailpath);
            $ticket->image = $image_path;
            $ticket->save();
            return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' => $ticket],200);

        } else {
            $ticket = Ticket::find($id);
            $ticket->name = $request->input('title');
            $ticket->detail = $request->input('detail');
            $ticket->date = $request->input('date');
            $ticket->time = $request->input('time');
            $ticket->price = $request->input('price');
            $ticket->type = $request->input('type');
            $ticket->silver_price = $request->input('silver_price');
            $ticket->golden_price = $request->input('golden_price');
            $ticket->platinum_price = $request->input('platinum_price');
            if (!empty($request->file('image'))) {
                $request->validate([
                    'image' => 'mimes:jpg,jpeg,png',
                ]);
                if (!empty($ticket->image)) {
                    $image_path = public_path() . '/storage/' . $ticket->image;
                    unlink($image_path);
                }
                //Update Image
                $image_path = Storage::disk('public')->put('ticket', $request->file('image'));
                $thumbnailpath = public_path('storage/' . $image_path);
                $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($thumbnailpath);
                $ticket->image = $image_path;
            }
            $ticket->save();
            return response()->json(['status' => true, 'message' => 'Update Successfully', 'data' => $ticket],200);


        }
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $product =  Ticket::where('id',$id)->first();
        if (isset($product)) {
            DB::table('book')->where('ticket_id', $id)->delete();
            Ticket::destroy($id);
            return response()->json(['status' => true, 'message' => 'Delete successfully.'], 200);
        }
        else {
            return response()->json(['status' => false, 'message' => 'Data Not Found.'], 422);
        }
    }
}
