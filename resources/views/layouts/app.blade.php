<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('home') }}">
                    Cot-Quora
                </a>
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('home') }}">Home</a></li>
                     <li><a href="{{ route('users.show',Auth::id()) }}">Dashboard</a></li>
                    <li><a href="{{ route('ask.create') }}">Create</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->fname }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('users.show',Auth::id()) }}"><i class="fa fa-btn"></i>Profile</a>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    
    <script type="text/javascript">
    var tagid;
     function setid(){
        var focus = document.activeElement;
        tagid='#'+focus.id;
        console.log(tagid);
     }

        function selectTag(val){
            console.log(val);
            $(tagid).val(val);
           $("#suggestion-box").html("");
           $("#suggestion-box").hide();
        }

        $("document").ready(function(){
            console.log("here");
            $(document).on('keyup',"input:text", function(e){
                var keyword = $(this).val();
                console.log("key"+keyword.length);

                if(keyword.length>0){
                e.preventDefault();
                var sendData = {
                    keyword:keyword,
                    _token:$(this).data('token')
                }
                 $.ajax({
                    type: "POST",
                    url: "/cotblog/public/readtags",
                    data: sendData,
                    dataType: 'json',
                    success: function(data){
                      console.log(data.success);
                      console.log(data);
                      $("#suggestion-box").show();
                      $("#suggestion-box").html(data.html);
                    }
                });
            }
            else{
                $('#suggestion-box').html("");
                $("#suggestion-box").hide();
            }
            });
        });

        $("#addtag").click(function(){
            console.log('Add Tag Clicked');
            var form = $(this).closest('form');
            var current_tags= form.find('input:text').length;
            if(current_tags<3){
                var x = $(this).closest('.form-group').nextAll('#askbtn');  
                $.each(x,function(i,val){
                    val.remove(); 
                });
                $("#suggestion-box").remove();
               form.append(' <div id="atag" class="form-group"><label class="col-md-4 control-label">Tag'+(current_tags+1)+' </label><div class="col-md-6"><input type="text" onfocus="setid();" data-token="{{ csrf_token() }}" class="form-control" id="tag'+(current_tags+1)+'" name="tag'+(current_tags+1)+'">');
               form.append('<div class="col-md-6 col-md-offset-4" id="suggestion-box"></div>');
            }
           
            $.each(x,function(i,val){
                    form.append(val); 
                });
        });

        $("#deltag").click(function(){
            console.log("delete tag pressed");
            var lasttag = $(this).closest('.form-group').nextAll("#atag").filter(':last');
            lasttag.remove()
        });

       

        
    </script>
</body>
</html>
