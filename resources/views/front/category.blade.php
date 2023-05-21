@extends('front.layouts.master')
@section('title',$category->name)
@section('description',$category->name.' kategorisinde '. $category->articleCount->count().' adet yazı bulunuyor')
@section('content')


    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
            @include('front.widgets.categoryWidget')
            @foreach($articles as $article)
                <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{route('single', [$article->slug])}}">
                            <h2 class="post-title">{{$article->title}}</h2>
                            <h3 class="post-subtitle">{{$article->content}}</h3>
                        </a>
                        <p class="post-meta">
                            {{$article->created_at->diffForHumans();}}
                            Kategori:
                            <a href="{{route('category',$article->getCategory->slug)}}">{{$article->getCategory->name;}}</a>
                        </p>
                    </div>
            @endforeach

        </div>
    </div>

@endsection
