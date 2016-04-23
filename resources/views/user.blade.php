@extends('layouts.app')

@section('title')
    {{ $user->fname }} {{ $user->lname }} - CotQuora
@endsection

@section('content')
<div class="container spark-screen">
    
    <div class="container">
       <div class="col-md-2" id="userimage">
       
                <img src="/{{$userprofilepic}}" class="img-circle" alt="Profile Pic" height="150">
           
        </div>
         <div class="col-md-10">

            <h3>{{ $user->fname }} {{ $user->lname }}</h3>
            @if(($user->id==Auth::id()) && (empty($user->bio)))
                <a id="addbio" href="{{ route('user.addbio',$user->id)}}">Add Bio</a>
            @endif
             <h4 id="bio"> {{ $user->bio }} </h4>
          
            @if($user->id!=Auth::id())
                @if($follow==0)
                     <a id="follow" class="btn btn-primary">Follow</a>
                @else
                    <a id="follow" class="btn btn-danger">
                        Unfollow <span class="badge">{{ count($user->followers)}}</span>
                    </a>
                @endif
                
                <input type="hidden" id="token" value="{{ csrf_token()}}"></input>
             @endif

        </div>
    </div>
    <hr>
   <div class="well col-md-10 col-md-offset-1">
        <a href= {{ route('users.questions.show',$user->id)}} > Questions </a> | <a href= {{ route('users.show',$user->id)}} > Answers </a>
    </div>
    @if(!count($questions))
        <div class="container">
       <div class="col-md-12">
            <center><h3>{{ $user->fname }} has not asked any question yet.</h3></center>
        </div>
    </div>
    @endif
     @foreach($questions as $question)
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{route('questions.show',$question->id)}}"><h3>{{ $question->question }}</h3></a>
                        <a  target="_blank" style="text-decoration: none;" class="btn-link" href={{ route('users.show',$question->user->id) }}> <img src="../../profile_default.png" class="img-circle" width="30" height="30">
                         <span class="label label-info">{{ $question->user->fname }} {{ $question->user->lname }} </span></a> <br/>
                        <small> {{ date_format($question->created_at, 'g:i A \o\n l jS F Y') }} </small>
                    </div>
                    <div class="panel-body">
                        @if(count($question->answers))
                            @if(count($question->answers)>1)
                                {{ count($question->answers) }} Answers
                            @else
                                {{ count($question->answers) }} Answer
                            @endif
                            @foreach($question->answers as $answer)
                                <div class="well">
                                <a target="_blank" style="text-decoration: none;" class="btn-link" href={{ route('users.show',$question->user->id) }}> <img src="../../profile_default.png" class="img-circle" width="30" height="30">
                             <span class="label label-info">{{ $answer->user->fname }} {{ $answer->user->lname }} </span></a> <br/>
                                   
                                    {{ $answer->answer }} 
                                </div>
                            @endforeach
                          @else
                            No Answers Available
                        @endif
                       <a href="{{ route('answers.create',$question->id) }}" class="btn btn-info">Answer</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('scripts')
$("#follow").click(function(e){
            e.preventDefault();
            var content = $("#follow").html();
            console.log(content);
            $("#follow").append('<img src="/default.gif" height="30" width="30">');
            if(content=="Follow")
            {
                console.log(content);
                var usertofollow = {{$user->id}};
                var token = $("#token").val();
                console.log(usertofollow);
                var sendId = {
                    usertofollow:usertofollow,
                    _token:token
                }
                console.log("reached");
                $.ajax({
                     type: "POST",
                        url: "/follow",
                        data: sendId,
                        dataType: 'json',
                        success: function(data){
                          console.log("success");
                          var followers = data.followers;
                          $("#follow").html('Unfollow <span class="badge">'+followers+'</span>');
                            $("#follow").removeClass("btn-primary");
                            $("#follow").addClass("btn-danger");
                        }
                });
            }
            else
            {
                console.log("unfollow");
                var usertounfollow = {{$user->id}};
                var token = $("#token").val();
                console.log(usertounfollow);
                var sendId = {
                    usertounfollow:usertounfollow,
                    _token:token
                }
                console.log("reached here");
                $.ajax({
                    type: "POST",
                    url: "/unfollow",
                    data: sendId,
                    dataType: 'json',
                    success: function(data){
                        console.log("success");
                        $("#follow").html('Follow');
                        $("#follow").removeClass("btn-danger");
                        $("#follow").addClass("btn-primary");
                    }
                });
            }
       });
 $("#bio").hover(
            function(e){
                e.preventDefault();
                var userid = {{Auth::id()}}
                var viewuserid = {{$user->id}};
                if(userid==viewuserid)
                {
                    var route = 'user.addbio';
                    var link = '<a href=/profile/'+userid+'/addbio> <i title="Edit Bio" class="fa fa-pencil-square-o"></i></a>';
                    console.log(link);
                    $("#bio").append(link);
                }
           },
           function(e){
                e.preventDefault();
                $(this).find('a:first').remove();
           }

        );
 $("#userimage").hover(
            function(e){
                e.preventDefault();
                var userid = {{Auth::id()}}
                var viewuserid = {{$user->id}};
                if(userid==viewuserid)
                {
                    var route = 'user.addbio';
                    var link = '<a href=/profile/'+userid+'/addprofileimage> <i title="Change Profile Picture" class="fa fa-camera"></i></a>';
                    console.log(link);
                    $("#userimage").append(link);
                }
           },
           function(e){
                e.preventDefault();
                $(this).find('a:first').remove();
           }

        );

@endsection