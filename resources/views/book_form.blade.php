@extends("book_layout")

@section("main_content")

    <form class="form-horizal" method="post" action="{{url("/book/create")}}">
        @csrf
        <div class="form-group">
            <label>Tên sách</label>
            <input type="text" name="book_name" class="form-control" value="{{old("book_name")}}">
            @if($errors->has("book_name"))
                <p style="color:red"><i>{{$errors->first("book_name")}}</i></p>
            @endif
        </div>
        <div class="form-group">
            <label>Tác giả</label>
            <input type="text" name="author" class="form-control" value="{{old("author")}}">
            @if($errors->has("author"))
                <p style="color:red"><i>{{$errors->first("author")}}</i></p>
            @endif
        </div>
        <div class="form-group">
            <label>Nhà xuất bản</label>
            <input type="text" name="nxb" class="form-control" value="{{old("nxb")}}">
            @if($errors->has("nxb"))
                <p style="color:red"><i>{{$errors->first("nxb")}}</i></p>
            @endif
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input type="text" name="qty" class="form-control" value="{{old("qty")}}">
            @if($errors->has("qty"))
                <p style="color:red"><i>{{$errors->first("qty")}}</i></p>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-warning">
                <span>Submit</span>
            </button>
        </div>
    </form>

@endsection