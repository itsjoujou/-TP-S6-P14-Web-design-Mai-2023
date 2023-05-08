@extends('layouts.layout')

@section('title')
    
@endsection

@section('content')
<div class="section bg-light">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">EVERYTHING YOU NEED TO KNOW ABOUT AI</h2>
            </div>
        </div>

        <div class="row align-items-stretch retro-layout">
            @foreach ($articles as $article)
            <div class="col-md-4">
                <a href="{{ route('articles.show', ['slug' => $article->slugify()]) }}" class="h-entry mb-30 v-height gradient">
                    <div class="featured-img" style="background-image: url({{ $article->picture }}); background-size: cover; background-position: center;"></div>

                    <div class="text">
                        <span class="d-inline-block date">{{ $article->udpated_on->format('M. jS, Y') }}
                            <small>&nbsp;-&nbsp; {{ $article->user->first_name }} {{ $article->user->last_name }}</small>
                        </span>
                            
                        <h2>{{ $article->title }}</h2>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
