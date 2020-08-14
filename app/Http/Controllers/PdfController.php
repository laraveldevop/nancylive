<?php

namespace App\Http\Controllers;

use App\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdf = DB::table('pdf')
            ->select(DB::raw('pdf.id,pdf.pdf_name,pdf.file,pdf.detail,pdf.price,pdf.token,category.cat_name'))
            ->leftJoin('category', 'pdf.cat_id', '=', 'category.cat_id')
            ->orderBy('pdf_name','ASC')
            ->get()
            ->toArray();
        return view('container.pdf.index')->with(compact('pdf'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('category')
            ->select(array('cat_id', 'cat_name'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'pdf')
            ->orderBy('cat_name', 'ASC')
            ->get()
            ->toArray();

        return view('container.pdf.create')->with('action', 'INSERT')->with('category',$category);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'pdf_name' => 'required',
            'detail' => 'required',
            'price' => 'required|numeric',
            'file' => 'required|mimes:pdf,docx',

        ]);

        $pdf = new  Pdf();
        $pdf->cat_id = $request->input('category_id');
        $pdf->pdf_name = $request->input('pdf_name');
        $pdf->detail = $request->input('detail');
        $pdf->price = $request->input('price');
        $pdf->token = $request->has('token');
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('pdf', $request->file('file'));
            $pdf->file = $path;

        }

        $pdf->save();
        return redirect('pdf');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function show(Pdf $pdf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function edit(Pdf $pdf)
    {
        $category = DB::table('category')
            ->select(array('cat_id', 'cat_name'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'pdf')
            ->orderBy('cat_name', 'ASC')
            ->get()
            ->toArray();

        return view('container.pdf.create')->with('action', 'UPDATE')->with(compact('pdf','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pdf $pdf)
    {
        $request->validate([
            'category_id' => 'required',
            'pdf_name' => 'required',
            'detail' => 'required',
            'price' => 'required|numeric',


        ]);

        $pdf->cat_id = $request->input('category_id');
        $pdf->pdf_name = $request->input('pdf_name');
        $pdf->detail = $request->input('detail');
        $pdf->price = $request->input('price');
        $pdf->token = $request->has('token');
        if (!empty($request->hasFile('file'))) {
            $request->validate([
                'file' => 'mimes:pdf,docx',
            ]);
            $path =  Storage::disk('public')->put('pdf', $request->file('file'));
            if (!empty($pdf->file)){
                $image_path = public_path().'/storage/'.$pdf->file;
                unlink($image_path);
            }
            //Update Image
            $pdf->file = $path;
        }
        $pdf->save();
        return redirect('pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function destroy($pdf)
    {
        Pdf::destroy($pdf);
        return redirect('pdf');
    }

    public function ads(Request $request)
    {
        if($request->val == 1){
            DB::table('pdf')
                ->where('id', $request->id)
                ->update(['token' => 0,'updated_at'=>now()]);
            DB::table('advertise')->where('pdf_id', '=', $request->id)->delete();

        } else {
            DB::table('pdf')
                ->where('id', $request->id)
                ->update(['token' => 1]);
            DB::table('advertise')
                ->updateOrInsert(
                    ['pdf_id' =>  $request->id],
                    ['pdf_id' => $request->id,'updated_at'=>now()]
                );
        }

        return response()->json([
            'val' => 'sucsses'
        ]);
    }
}
