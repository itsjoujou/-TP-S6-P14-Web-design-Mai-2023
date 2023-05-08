@extends('layouts.layout')

@section('title'){{ $article->title }}@endsection

@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url({{ $article->picture }}); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-6">
                <div class="post-entry text-center">
                    <h1 class="mb-4">{{ $article->title }}</h1>
                    <div class="post-meta align-items-center text-center">
                        <span class="d-inline-block mt-1">By <span class="text-capitalize text-decoration-underline">{{ $article->user->first_name }} {{ $article->user->last_name }}</span></span>
                        <span>&nbsp;-&nbsp; {{ $article->udpated_on->format('M. jS, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">

        <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h2 class="posts-entry-title">SUMMARY</h2>
                    </div>
                    <small class="post-content-body text-muted ">
                        {{ $article->summary }}
                    </small>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h2 class="posts-entry-title">CONTENT</h2>
                    </div>
                    <div class="post-content-body">
                        {!!$article->content!!}
                    </div>
                </div>

                <div class="pt-3">
                    <p>Category:  <a href="{{ route('articles.index') }}">{{ $article->article_category->category_label }}</a></p>
                </div>
            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box">
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        @foreach ($categories as $category)
                            <li><a href="{{ route('articles.index') }}" aria-label="Read more articles about {{ $category->category_label }}">{{ $category->category_label }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- END sidebar -->

        </div>

    </div>
</section>
@endsection
