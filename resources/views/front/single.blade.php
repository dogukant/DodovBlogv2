@extends('front.layouts.master')
@section('title',$article->title)
@section('content')

    <!-- Page Header-->

    <!-- Main Content-->

    <div class="col-md-9 mx-auto">
        @include('front.widgets.categoryWidget')
            {{$article->content}}


        <p class="post-meta">
            {{$article->created_at->diffForHumans();}}
            Kategori:
            <a href="{{route('category',$article->getCategory->slug)}}">{{$article->getCategory->name;}}</a>
        </p>

@endsection

