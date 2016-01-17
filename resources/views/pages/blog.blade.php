@extends('main')

@section('content')

            <div class="mainBox">
                <div class="leftBox">
                    <div class="personOverviewBox">
                        <div class="personOverviewBoxItems basicProfInfo">
                            <div class="personProfilePic" style="background: url(../front/app/images/profilepic.jpg); background-size: cover; background-position: center;">
                            </div>
                            <h3 class="profileName">@if(Auth::check()) {{ Auth::user()->fname }} {{ Auth::user()->lname }} @else Steve Jobs @endif</h3>
                            <h4 class="profileTagLine">Founder of Apple & Next</h4>
                            <h5 class="currentLocation">Cupertino, CA</h5>
                            <button class="followButton">Follow</button>
                            <button class="connectButton">Connect</button>
                        </div>
                        <div class="personOverviewBoxItems personFollowInfo">
                            <div class="personFollowItems personFollowItems1">
                                <h4 class="personFollowItemsInner1">500</h4>
                                <h5 class="personFollowItemsInner2">Connections</h5>
                            </div>
                            <div class="personFollowItems personFollowItems2">
                                <h4 class="personFollowItemsInner1">200</h4>
                                <h5 class="personFollowItemsInner2">Followers</h5>
                            </div>
                        </div>
                        <div class="personOverviewBoxItems personLinks">
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
                        <div class="personOverviewBoxItems personResume">
                            <h4 class="downloadResume">Download Resume</h4>
                        </div>
                    </div>
                </div>
                <div class="middleBox">
                    <div class="middleBoxInner">
                        <div class="personPosts">
                            <h4 class="postHeading">BLOGS</h4>
                            
                            
                            @foreach($blogs as $blog)
                                <div class="personPostLinksOuter">
                                <div class="personPostsLink">
                                    <div class="personPostHeading">
                                        <h4>{{$blog->blog_title}}</h4></div>
                                    <div class="personPostTime">
                                        <h6>{{date_format($blog->created_at,'l, H:i A')}} </h6></div>
                                         <div class="personPostTime">
                                        <h6> By: {{$blog->user->fname}} {{$blog->user->lname}}</h6></div>
                                    {{$blog->blog_body}}
                                </div>
                            </div><hr/>
                            @endforeach
                          
                        
                        </div>

                    </div>
                </div>
                <div class="rightBox"></div>
            </div>
 
 @stop
