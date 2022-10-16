@extends('layout.layout')
@section('contents')

        <!-- Banner  -->
        <div class="zol-banner zol-banner--blog t-pt-150 t-pb-150">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h2 class="mt-0 t-text-light">
                            Blog & News
                        </h2>
                        <ul class="t-list breadcrumbs d-flex justify-content-center align-items-center">
                            <li class="breadcrumbs__list">
                                <a href="#" class="t-link breadcrumbs__link t-link--light-alpha text-capitalize">
                                    home
                                </a>
                            </li>
                            <li class="breadcrumbs__list">
                                <a href="#" class="t-link breadcrumbs__link t-link--light-alpha text-capitalize">
                                    blog
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End -->

        <!-- Blog Post  -->
        <div class="t-pt-120 t-pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        <div class="row">
                            @php
                                $posts = DB::table('posts')->orderBy('id', 'desc')->get();
                            @endphp
                            @foreach($posts as $post)
                            <div class="col-12 t-mb-50">
                                <div class="blog-post border">
                                    <div class="blog-post__img">
                                        <a href="/blog-details/{{$post->slug}}" class="t-link blog-post__img-link w-100">
                                            <img src="{{$post->thumbnail}}" alt="zolfin" class="w-100 img-fluid">
                                        </a>
                                        <span class="blog-post__date d-flex flex-column align-items-center justify-content-center">
                                            <span class="blog-post__date-day d-block">
                                                {{ date('d', strtotime($post->date))}}
                                            </span>
                                            <span class="blog-post__date-month text-capitalize d-block">
                                                {{ date('F', strtotime($post->date))}}
                                            </span>
                                        </span>
                                    </div>
                                    <div class="blog-post__body">
                                        <h3 class="blog-post__title">
                                            <a href="/blog-details/{{$post->slug}}" class="t-link t-link--alpha blog-post__title-link">
                                                {{$post->title}}
                                            </a>
                                        </h3>
                                        <p class="t-mt-30 t-text-heading">
                                            @php
                                               $contents = explode(" ", $post->description);
                                               $contents_slice = array_slice($contents, 0, 40);
                                               $sort_contents = implode(" ", $contents_slice);
                                               echo $sort_contents . ' ...';
                                            @endphp
                                        </p>
                                    </div>
                                    <div class="blog-post__footer t-pb-30 t-pt-20">
                                        <ul class="t-list d-flex align-items-center blog-post__footer flex-wrap">
                                            <li class="blog-post__footer-list t-mb-15 t-mr-15">
                                                <a href="#" class="t-link blog-post__author d-flex align-items-center">
                                                    <span class="blog-post__author-img t-mr-8">
                                                        <img src="{{$post->author_img}}" alt="zolfin" class="img-fluid">
                                                    </span>
                                                    <span class="blog-post__author-name text-capitalize">
                                                        {{$post->author}}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="blog-post__footer-list t-mb-15 t-mr-15">
                                                <a href="#" class="t-link t-link--alpha sm-text blog-post__footer-link text-capitalize">
                                                    <i class="las la-tags"></i>
                                                    {{$post->category}}
                                                </a>
                                            </li>
                                            <li class="blog-post__footer-list t-mb-15 t-mr-15">
                                                <a href="#" class="t-link t-link--alpha sm-text blog-post__footer-link text-capitalize">
                                                    <i class="las la-calendar"></i>
                                                    {{ date('d F', strtotime($post->date))}}
                                                </a>
                                            </li>
                                            <li class="blog-post__footer-list t-mb-15 t-mr-15">
                                                <a href="#" class="t-link t-link--alpha sm-text blog-post__footer-link text-capitalize">
                                                    <i class="las la-clock"></i>
                                                    {{$post->read_count}} read
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="col-12">
                                <ul class="t-list zol-pagination d-flex flex-wrap">
                                    <li class="zol-pagination__list">
                                        <a href="#" class="t-link zol-pagination__card active">
                                            1
                                        </a>
                                    </li>
                                    <li class="zol-pagination__list">
                                        <a href="#" class="t-link zol-pagination__card">
                                            2
                                        </a>
                                    </li>
                                    <li class="zol-pagination__list">
                                        <a href="#" class="t-link zol-pagination__card">
                                            3
                                        </a>
                                    </li>
                                    <li class="zol-pagination__list">
                                        <a href="#" class="t-link zol-pagination__card">
                                            4
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Post End -->

        @include('components.other-page-footer-area-contents')
            @endsection