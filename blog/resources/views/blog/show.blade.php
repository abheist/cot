@extends('main')




@section('title')

{{ $blog->blog_name }} | Cotanz

@stop




@section('head')

{{ Html::style('css/blog.css') }}

@stop


@section('content')
    <!-- blog division -->
    <div class="blog-division"></div>
    <div class="blog-c">
        <header>
            <a href="#blogLink">
                <div class="blog-logo" style="background: url({{ asset('images/logoBlueBlock.png') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
            </div>
            </a>
            <h1>{{ $blog->blog_name }}</h1>
            <h2>{{ $blog->blog_desc }}</h2>
        </header>
        <section>
            <div class="featured-list">
                <h6 class="blog-featured-heading">FEATURED</h6>
                <div class="featured-posts">
                    @foreach($blog->pop_articles as $article)
                     <a href="" class="fp-each">
                        <div class="fp-each-1">
                            <div class="fp-image" style="background: url({{ asset('article_pics/'.$article->cover_pic) }}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                            <h2 class="fp-heading">{{ $article->article_title }}</h2>
                            <!-- only contain 158 characters and three dots ... -->
                            <h3 class="fp-description"> {{ $article->article_desc }}</h3>
                            <!-- @if($article->tags)
                            <div class="fp-tags">
                                @foreach($article->tags as $tag)
                                <a href="#" class="fp-each-tag">{{ $tag }}</a>
                                @endforeach
                            </div>
                            @endif -->
                            <!--Change the time-->
                            <h4 class="fp-timing">2 day ago</h4>
                            <h5></h5>
                        </div>
                    </a>
                    @endforeach                    
                </div>
            </div>
            <div class="bottom-section">
                <div class="all-posts">
                    <h3 class="blog-featured-heading">ALL POSTS</h3>
                    <div class="all-blog-post">
                        @foreach($blog->latest_articles as $article)
                        <div class="eb-post">
                            <a href="#person">
                                <div class="eb-about">
                                    <div class="eb-post-pic-upper">
                                        <div class="eb-about-pic" style="background: url({{ asset('user_profile_pics/'.$blog->user->profile->profile_pic) }}); background-repeat: no-repeat; background-size: cover; background-position: center; border-radius: 100%;"></div>
                                    </div>
                                    <div class="eb-about-right">
                                        <div class="eb-about-name">{{ $blog->user->fname }} {{ $blog->user->lname }}</div>

                                        <!--fix the date-->
                                        <div class="eb-about-date">Fab 29, 2016</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#post">
                                <div class="eb-pic" style="background: url({{ asset('article_pics/'.$article->cover_pic) }}); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                                <h1 class="eb-heading">{{ $article->article_title }}</h1>
                                <h2 class="eb-desc">{{ $article->desc }}</h2>
                            </a>
                            <div class="eb-post-stats">
                                <a href="#like">
                                    <div class="eb-post-like" style="background: url({{ asset('images/star.svg') }} ); background-size: cover; background-position: center;"></div>
                                </a>
                                <div href="#" class="eb-like-count">1.2K</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="about-person">
                    <h3 class="blog-featured-heading">ABOUT ME</h3>
                    <div class="about-blogger">
                        <a href="#bloggerprofile">
                            <div class="blogger-pic-name">
                                <div class="blogger-pic" style="background: url({{ asset('user_profile_pics/'.$blog->user->profile->profile_pic) }}); background-position: center; background-repeat: no-repeat; background-size: cover"></div>
                                <div class="blogger-name">{{ $blog->user->fname.' '.$blog->user->lname }}</div>
                            </div>
                        </a>
                        <div class="blogger-desc">{{ $blog->user->profile->bio }}</div>
                        <a href="#blogger-profile" class="blogger-more-info-button">More Information</a>
                        <div class="blogger-follower">
                            <h4>FOLLOWERS</h4>

                            <!--Change it-->
                            <h5>25K</h5>
                        </div>
                        <div class="blogger-links-upper">
                            <div class="blogger-follow-link">Links</div>
                            <div class="blogger-links">
                                <a href="#" class="personLinksItems personLinksItems1">
                                    <i class="fa fa-linkedin-square fa-2x personLinksInnerItems"></i>
                                </a>
                                <a href="#" class="personLinksItems personLinksItems2">
                                    <i class="fa fa-github-square fa-2x personLinksInnerItems"></i>
                                </a>
                                <a href="#" class="personLinksItems personLinksItems3">
                                    <i class="fa fa-user fa-2x personLinksInnerItems"></i>
                                </a>
                                <a href="#" class="personLinksItems personLinksItems4">
                                    <i class="fa fa-flickr fa-2x personLinksInnerItems"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop