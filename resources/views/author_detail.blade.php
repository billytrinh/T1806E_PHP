@extends("book_layout")
@section("main_content")
    <h1>{{$author->author_name}}</h1>

    <h2>Các cuốn sách của tác giả:</h2>
    @foreach($author->getBooks as $book)
        <p><a href="#">{{$book->book_name}}</a></p>
    @endforeach

    <h2>Một cuốn sách tiêu biểu:</h2>
    <p><a href="#">{{$author->oneBook->book_name}}</a> </p>

    <h2>Những nhà xuất bản đã in sách của tác giả này:</h2>
    @foreach($author->getNxbs as $nxb)
    <p><a href="#">{{$nxb->nxb_name}}</a></p>
    @endforeach
@endsection
