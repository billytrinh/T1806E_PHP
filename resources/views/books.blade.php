@extends("book_layout")
@section("main_content")
    <h1>Danh sách</h1>
    <a href="{{url("book/create")}}">Tao sach moi</a>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>NXB</th>
            <th>Qty</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->book_id}}</td>
                    <td>{{$book->book_name}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->nxb}}</td>
                    <td>{{$book->qty}}</td>
                    <td>
                        <a href="{{url("book/edit?book_id=".$book->book_id)}}">Edit</a>
                        |
                        <a href="{{url("book/delete/".$book->book_id)}}" onclick="return confirm('Xac dinh xoa?')"> Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
