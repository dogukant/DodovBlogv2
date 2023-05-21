@extends('back.layouts.master')
@section('content')

    <h1><div class="sidebar-brand-text mx-5 my-5">SİLİNENLER<sup>yazılar</sup><hr></div></h1>

    @if($articles->count() > 0)
    <div class="container px-4 px-lg-5">
        @foreach($articles as $article)
            <div class="list-group">
                <a class="list-group-item list-group-item-action">
                    Title: {{$article->title}}
                </a>
                <br>
                <div align="right">
                <a href="{{route('admin.recover', $article->id)}}" ><button type="submit" name="recover" class="btn btn-primary">Geri Yükle</button></a>
                    <form method="post" style="display: inline-block" action="{{route('admin.delete')}}">
                        @csrf
                        @method('DELETE')
                        <button value="{{$article->id}}" name="article_id" type="submit" class="btn btn-danger">Sil</button>
                    </form>
            </div>
            </div>
            <br>
        @endforeach
    </div>
    </div>
    <br>
    @else
        <h1>Silinen yazı bulunmuyor</h1>
        </div>
    @endif
@endsection
