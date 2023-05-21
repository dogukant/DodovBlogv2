@extends('back.layouts.master')
@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1><div class="sidebar-brand-text mx-5 my-5">YAZILAR<sup>articles</sup><hr></div></h1>

    @if($articles)
    <div class="container px-4 px-lg-5">
@foreach($articles as $article)
    <div class="list-group">
        <a href="{{route('admin.edit', $article->id)}}" class="list-group-item list-group-item-action">
            Title: {{$article->title}}
        </a>
        <div class="row">
        <div class="col-sm-4 d-inline-block" align="left">
        Kategori: {{$article->getCategory->name}}
        </div>
            <div class="col-sm-8 d-inline-block"  align="right">
                Oluşturulma Tarihi: {{$article->created_at->diffForHumans()}}
        </div>

    </div>
            <br>
        @endforeach
    @else
        <H1>AKTİF YAZI BULUNMAMAKTADIR</H1>
    </div>
    </div>
    @endif
@endsection
