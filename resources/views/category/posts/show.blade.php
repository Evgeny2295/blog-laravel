@extends('layouts.blog')

@section('content')
    <main id="main">
        <div class="container">
            <h1 class="title main__title">Новости на тему: {{mb_strtolower($category->title)}}</h1>
            <div class="main__content">
                <div>
                    <div class="main__posts">
                        @foreach($posts as $post)
                            <div class="main__post">
                                <a href="{{route('post.show',$post->id)}}">
                                    <img src="{{url('storage/'.$post->main_image)}}" alt="blog post">
                                </a>
                                <div class="main__post-category-with-like">
                                    <p class="blog-post-category">Категория:{{mb_strtolower($post->category->title)}}</p>
                                    <div class="main__post-like">
                                        @auth()
                                            <form action="{{route('post.like.store',$post->id)}}" method="POST">
                                                @csrf
                                                <span>{{$post->liked_users_count}}</span>
                                                <button type="submit" class="border-0 bg-transparent">
                                                    @if(!empty(auth()->user()->likedPosts) && auth()->user()->likedPosts->contains($post->id))
                                                        <i class="fas fa-heart"></i>
                                                    @else
                                                        <i class="far fa-heart"></i>
                                                    @endif
                                                </button>
                                            </form>
                                        @endauth
                                        @guest()
                                            <div>
                                                <span>{{$post->liked_users_count}}</span>
                                                <i class="far fa-heart"></i>
                                            </div>
                                        @endguest
                                    </div>
                                </div>
                                <a href="{{route('post.show',$post->id)}}" class="main__post-link">
                                    <h6 class="blog-post-title">{{$post->title}}</h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="main__posts-pagination">
                        {{$posts->links()}}
                    </div>
                </div>
                <div class="main__liked-posts">
                    <h3 class="main__liked-posts-title">Топ посты</h3>
                    @foreach($likedPosts as $likedPost)
                        <ul class="main__liked-posts-list">
                            @foreach($likedPosts as $likedPost)
                                <li>
                                    <a href="{{route('post.show',$likedPost->id)}}" class="">
                                        <img src="{{url('storage/'.$likedPost->main_image)}}" alt="blog post">
                                        <h6 class="post-title">{{$likedPost->title}}</h6>
                                    </a>
                                </li>
                            @endforeach()
                        </ul>
                    @endforeach
                    <img src="" alt="">
                    <p class="main__liked-posts-title"></p>
                </div>
            </div>
        </div>
    </main>


@endsection