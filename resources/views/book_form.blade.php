@extends("book_layout")

@section("main_content")

    <form class="form-horizal" method="post" action="{{url("/book/create")}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên sách</label>
            <input type="text" name="book_name" class="form-control" value="{{old("book_name")}}">
            @if($errors->has("book_name"))
                <p style="color:red"><i>{{$errors->first("book_name")}}</i></p>
            @endif
        </div>
        <div class="form-group">
            <label>Ảnh bìa</label>
            <input type="file" name="image" class="form-control" value="{{old("image")}}"/>
        </div>
        <div class="form-group">
            <label>Tác giả</label>
            <select name="author" class="form-control">
                <option value="">Chọn tác giả</option>
                @foreach($authors as $author)
                    <option @if(old("author") == $author->author_id) selected @endif value="{{$author->author_id}}">{{$author->author_name}}</option>
                @endforeach
            </select>
            @if($errors->has("author"))
                <p style="color:red"><i>{{$errors->first("author")}}</i></p>
            @endif
        </div>
        <div class="form-group">
            <label>Nhà xuất bản</label>
            <select name="nxb" class="form-control">
                <option value="">Chọn nhà xuất bản</option>
                @foreach($nxbs as $nxb)
                    <option @if(old("nxb") == $nxb->nxb_id) selected @endif value="{{$nxb->nxb_id}}">{{$nxb->nxb_name}}</option>
                @endforeach
            </select>
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