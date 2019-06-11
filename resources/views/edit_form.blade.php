@extends("book_layout")

@section("main_content")
    <form method="post" action="{{url("book/edit")}}">
        @csrf
        <input type="hidden" name="book_id" value="{{$book->book_id}}">
        <div class="form-group">
            <label>Tên sách</label>
            <input type="text" name="book_name" value="{{$book->book_name}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Tác giả</label>
            <input type="text" name="author" value="{{$book->author}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Nhà xuất bản</label>
            <input type="text" name="nxb" value="{{$book->nxb}}" class="form-control">
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input type="text" name="qty" value="{{$book->qty}}" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-warning">
                <span>Submit</span>
            </button>
        </div>
    </form>

 @endsection