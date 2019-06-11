<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function demo(){
        return view("demo_view");
    }

    public function bookCreate(){
        return view("book_form");
    }

    public function bookValidate(){
        return [
            'book_name' => ['required', 'string','min:10', 'max:255', 'unique:book'],
            'author'    => ['required', 'string','min:10', 'max:255'],
            'nxb'       => ['required'],
            'qty'       => ['required','numeric','min:1']
        ];
    }

    public function bookSave(Request $request){

        $this->validate($request,$this->bookValidate());

        Book::create(
            [
                "book_name"=> $request->get("book_name"),
                "author"=> $request->get("author"),
                "nxb"=> $request->get("nxb"),
                "qty"=> $request->get("qty"),
            ]
        )->save();
        return redirect("book");
    }



    public function bookEdit(Request $request){
        $book_id = $request->get("book_id");
        $book = Book::find($book_id);
        return view("edit_form",compact("book"));
    }

    public function bookUpdate(Request $request){
        //dd($request->all());
        $book = Book::find($request->get("book_id"));
        $book->update(
            [
                "book_name"=> $request->get("book_name"),
                "author"=> $request->get("author"),
                "nxb"=> $request->get("nxb"),
                "qty"=> $request->get("qty"),
            ]
        );
        return redirect("book");
    }

    public function books(){
        $books = Book::all();
        return view("books",compact("books"));
    }

    public function bookDelete($book_id){
        $book = Book::find($book_id);
        $book->delete();

        return redirect("book");
    }
}
