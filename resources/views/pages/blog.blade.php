<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cotanz</title>
    <link rel="icon" href="../front/app/logoBlack.png">
    <link rel="apple-touch-icon" href="../front/app/logoBlack.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- build:css styles/vendor.css -->
    <!-- bower:css -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.css">
    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:css styles/main.css -->
    {!! Html::style("../front/app/styles/profile.css") !!}
    {!! Html::style("../front/app/styles/main.css") !!}
    <!-- endbuild -->
</head>

<body>
    <!--[if lt IE 10]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="profContainer">
        <div class="profInnerContainer">
             <div class="profHeaderUpper">
                    <div class="profHeaderLogo" style="background: url(../front/app/logoBlue.png); background-size: 50px 50px; background-position: center; background-repeat: no-repeat;"></div>
                    <div class="profHeaderSearch">
                        <input type="text" class="profHeaderSearchInput" placeholder="Search">
                    </div>
                    <div class="profHeaderMainMenu">
                        <a href="/cotblog/public" class="mainMenuItemList mainMenuItem1">Home</a>
                        <a href="#" class="mainMenuItemList mainMenuItem2">Profile</a>
                        <a href="#" class="mainMenuItemList mainMenuItem3">Connection</a>
                        <a href="#" class="mainMenuItemList mainMenuItem4">Questions</a>
                        <a href="blog" class="mainMenuItemList mainMenuItem5">Blog</a>
                        @if(Auth::check())
                            <a href="create" class="mainMenuItemList mainMenuItem5">Create</a>
                            <a href="logout" class="mainMenuItemList mainMenuItem5">Logout</a>
                        @else
                            <a href="register" class="mainMenuItemList mainMenuItem5">Sign Up</a>
                            <a href="login" class="mainMenuItemList mainMenuItem5">Sign In</a>
                        @endif
                    </div>
                    <div class="profHeaderIcons">
                        <a href="#" class="profHeaderIconsList"><i class="fa fa-envelope fa-lg"></i></a>
                        <a href="#" class="profHeaderIconsList"><i class="fa fa-inbox fa-lg"></i></a>
                        <a href="#" class="profHeaderIconsList"><i class="fa fa-tasks fa-lg"></i></a>
                    </div>
                    <div class="profDropDown">
                        <a href="#" class="profDropDownInner" style="background: url(../front/app/images/profilepic.jpg); background-size: 50px 50px; width: 50px; height: 50px; align-self: center; margin: 0px auto; border-radius: 100%;"></a>
                        <!--
                        <div class="profDropDownItems">
                            <a href="#" class="insideDropDown">Edit Profile</a>
                            <a href="#" class="insideDropDown">Help</a>
                            <a href="#" class="insideDropDown">Logout</a>
                        </div>
                        -->
                    </div>
                </div>
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
        </div>
    </div>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <!-- build:js scripts/vendor.js -->
    <!-- bower:js -->
    <script src="/bower_components/jquery/dist/jquery.js"></script>
    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:js scripts/main.js -->
    <script src="scripts/main.js"></script>
    <!-- endbuild -->
</body>

</html>
