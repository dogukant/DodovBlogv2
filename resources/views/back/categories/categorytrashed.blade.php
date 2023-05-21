@extends('back.layouts.master')
@section('content')

    <h1><div class="sidebar-brand-text mx-5 my-5">SİLİNENLER<sup>kategori</sup><hr></div></h1>

    @if($categories->count() > 0)
    <div class="container px-4 px-lg-5">
        @foreach($categories as $category)
            <div class="list-group">
                <a class="list-group-item list-group-item-action">
                    Kategori Adı: {{$category->name}}
                </a>
                <br>
                <div align="right">
                    <a href="{{route('admin.categoryrecover', $category->id)}}" ><button type="submit" name="recover" class="btn btn-primary">Geri Yükle</button></a>
                    <form method="post" style="display: inline-block" action="{{route('admin.categoryforcedelete')}}">
                        @csrf
                        @method('DELETE')
                        <button value="{{$category->id}}" name="category_id" type="submit" class="btn btn-danger">Sil</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    <br>
    @else

        <h1>Silinen kategori bulunmuyor</h1>
    </div>

    @endif
@endsection
