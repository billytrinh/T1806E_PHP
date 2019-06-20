<?php

namespace App\Http\Controllers;

use App\A;
use App\Author;
use App\Book;
use App\Nxb;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Pusher\Pusher;

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
        if(!Auth::check()){
            redirect("login");
        }
        $authors =  Author::Where("active",1)->get();
        $nxbs = Nxb::Where("active",1)->get();
        return view("book_form",compact("authors","nxbs"));
    }

    public function bookValidate(){
        return [
            'book_name' => ['required', 'string','min:10', 'max:255', 'unique:book'],
            'author'    => ['required'],
            'nxb'       => ['required'],
            'qty'       => ['required','numeric','min:1']
        ];
    }

    public function bookSave(Request $request){

        $this->validate($request,$this->bookValidate());
        $url_image = null;
        if($request->hasFile("image")){
            $file = $request->file("image");
            $name = time().$file->getClientOriginalName();
            $file->move("upload",$name);
            $url_image = "upload/".$name;
        }

        Book::create(
            [
                "book_name"=> $request->get("book_name"),
                "image" => $url_image,
                "author_id"=> $request->get("author"),
                "nxb_id"=> $request->get("nxb"),
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

    public function books(Request $request){
//        $books = Book::all();
        $page = $request->get("page")?$request->get("page"):1;
        $limit = $request->get("limit")?$request->get("limit"):10;
        $offset = ($page-1)*$limit;
//        $books = Book::where("qty",">",100)->where("book_id","<",200)
//            ->orderBy("qty","ASC")->orderBy("book_name","DESC")
//            ->skip($offset)->take($limit)->get(); // ASC - DESC
        $books = Book::orderBy("book_id","ASC")->orderBy("book_name","DESC")
            ->paginate(10); // ASC - DESC

        return view("books",compact("books"));
    }

    public function bookDelete($book_id){
        $book = Book::find($book_id);
        $book->delete();

        return redirect("book");
    }

    public function authors(){
        $authors = Author::paginate(20);
        return view("authors",compact("authors"));
    }

    public function pushNotify(Request $request){
        sendMessage("group_class","my-event",["message"=>"hello"]);
        return "Send notify";
    }

    public function authorDetail(Request $request){
        $order = Order::find(1);
       // dd($order->getProducts);
        foreach ($order->getProducts as $product){
            //dd($product->pivot);
            echo $product->product_name."so luong: ".$product->pivot->qty."<br/>";
        }
        die;

//        DB::table("product_order")->insert([
//            "product_id"=> 1,
//            "order_id"  =>1,
//            "qty"   => 1
//        ]);
//
        $author_id = $request->get("author_id");
        $author = Author::find($author_id);

        return view("author_detail",compact("author"));

    }
}
