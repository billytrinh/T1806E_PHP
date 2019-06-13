@extends("book_layout")
@section("main_content")
    <h1>Danh sách</h1>
    <a href="{{url("book/create")}}">Tao sach moi</a>
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Author Name</th>
        <th>Action</th>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{$author->author_id}}</td>
                <td>{{$author->author_name}}</td>
                <td>
                    <a href="{{url("author/detail?author_id=".$author->author_id)}}">Detail</a>
                    |
                    <a href="{{url("book/delete/".$author->author_id)}}" onclick="return confirm('Xac dinh xoa?')"> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $authors->links("paginator") !!}
@endsection
