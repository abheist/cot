<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
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
            <div class="profHeader">
                <div class="profHeaderUpper">
                    <div class="profHeaderLogo" style="background: url(../front/app/logoBlue.png); background-size: 50px 50px; background-position: center; background-repeat: no-repeat;"></div>
                    <div class="profHeaderSearch">
                        <input type="text" class="profHeaderSearchInput" placeholder="Search">
                    </div>
                    <div class="profHeaderMainMenu">
                       
                        @if(Auth::check())
                         <a href="/cotblog/public" class="mainMenuItemList mainMenuItem1">Home</a>
                            
                            {{ link_to_route('profile','Profile',Auth::user()->id,['class' => 'mainMenuItemList mainMenuItem2'])}}

                            <a href="#" class="mainMenuItemList mainMenuItem3">Connection</a>
                            <a href="#" class="mainMenuItemList mainMenuItem4">Questions</a>
                            <a href="blog" class="mainMenuItemList mainMenuItem5">Blog</a>
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
                    <!--
                    <div class="profDropDown">
                        <a href="#" class="profDropDownInner" style="background: url(../front/app/images/profilepic.jpg); background-size: 50px 50px; width: 50px; height: 50px; align-self: center; margin: 0px auto; border-radius: 100%;"></a>
                        <!--
                        <div class="profDropDownItems">
                            <a href="#" class="insideDropDown">Edit Profile</a>
                            <a href="#" class="insideDropDown">Help</a>
                            <a href="#" class="insideDropDown">Logout</a>
                        </div>
                        
                    </div>
                    -->
                </div>
                <!--
                <div class="profHeaderLower">
                    <div class="profHeaderLowerLinks">
                        <a href="#" class="lowerLinksList lowerListItems1">Posts</a>
                        <a href="#" class="lowerLinksList lowerListItems2">Background</a>
                        <a href="#" class="lowerLinksList lowerListItems3">Recommendations</a>
                        <a href="#" class="lowerLinksList lowerListItems4">Following</a>
                        <a class="headerEmpty"></a>
                    </div>
                </div>
                -->
            </div>
            @yield('content')
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
