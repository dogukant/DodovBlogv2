@extends('back.layouts.master')
@section('content')

    <div class="col-md-6 mx-auto">
        <form method="post" action="{{route('admin.categoriesedit', $categories->id)}}">
            <ul class="list-group">
                <label>Kategori</label>
                <li class="list-group-item disabled">{{$data->name}}</li>
            </ul>
            <br>
        </form>
        <div align="right">
        <form method="post" style="display: inline-block" action="{{route('admin.categorydelete')}}">
            @csrf
            @method('DELETE')
            <button value="{{$data->id}}" name="category_id" type="submit" class="btn btn-danger">Sil</button>
        </form>
        </div>
            <br>
            @if($data->articles->count())
            <input type="hidden" name="category_id" value="{{$data->id}}">
            <label>Yazılar</label>
                @foreach($data->articles as $article)
                    <div class="list-group">
                        <a href="{{route('admin.edit', $article->id)}}" class="list-group-item list-group-item-action">
                            Title: {{$article->title}}
                        </a>
                    <br>
                    </div>
                    </div>
            @endforeach
        <br>
    </div>

                @else <h2>Bu kategoriye ait yazı bulunamadı </h2>
    </div>
    </div>


@endif
@endsection
