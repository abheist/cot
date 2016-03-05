@extends('main')




@section('title')

{{ $user->fname }} {{ $user->lname }} | Cotanz

@stop




@section('head')

{{ Html::style('css/profile.css') }}

@stop

@section('content')
                    <div class="mainBox">
                        <div class="leftBox">
                            <div class="personOverviewBox">
                                <div class="personOverviewBoxItems basicProfInfo">
                                    <div class="personProfilePic" style="background: url({{ asset('user_profile_pics/'.$user->profile->profile_pic ) }}); background-size: cover; background-position: center;">
                                    </div>
                                    <h3 class="profileName">{{ $user->fname }} {{ $user->lname }}</h3>
                                    <h4 class="profileTagLine">{{ $user->profile->tagline }}</h4>
                                    <h5 class="currentLocation">{{ $user->profile->location }}</h5>
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
                                @if($user->profile->github||$user->profile->linkedin||$user->profile->website)
                                <div class="personOverviewBoxItems personLinks">
                                    
                                    @if($user->profile->linkedin)
                                    <a href="https://www.linkedin.com/{{ $user->profile->linkedin }}" class="personLinksItems personLinksItems1">
                                        <i class="fa fa-linkedin-square fa-2x personLinksInnerItems"></i>
                                    </a>
                                    @endif

                                    @if($user->profile->github)
                                    <a href="https://github.com/{{ $user->profile->github }}" class="personLinksItems personLinksItems2">
                                        <i class="fa fa-github-square fa-2x personLinksInnerItems"></i>
                                    </a>
                                    @endif

                                    @if($user->profile->website)
                                    <a href="http:://{{ $user->profile->website }}" class="personLinksItems personLinksItems3">
                                        <i class="fa fa-user fa-2x personLinksInnerItems"></i>
                                    </a>
                                    @endif

                                    @if($user->profile->twitter)
                                    <a href="https://twitter.com/{{ $user->profile->twitter }}" class="personLinksItems personLinksItems4">
                                        <i class="fa fa-twitter fa-2x personLinksInnerItems"></i>
                                    </a>
                                    @endif
                                </div>
                                @endif
                                <div class="personOverviewBoxItems personResume">
                                    <h4 class="downloadResume">Download Resume</h4>
                                </div>
                            </div>
                        </div>
                        <div class="middleBox">
                            <div class="middleBoxInner">
                                @if($user->blog && $user->blog->articles)
                                <div class="personPosts">
                                    <h4 class="postHeading">POSTS</h4>
                                    <div class="personPostLinksOuter">
                                        @foreach($user->blog->articles as $article)
                                        <div class="personPostsLink">
                                            <div class="personPostPic" style="background: url({{ asset('article_pics/'.$article->cover_pic) }}); height: 150px; background-size: cover; background-position: center; border-radius: 4px;"></div>
                                            <div class="personPostHeading">
                                                <h4>{{ $article->article_title }}</h4></div>
                                            <div class="personPostTime">
                                               

                                                <!--Change the time-->
                                                <h6>January 15, 2016</h6></div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                @if($user->profile->bio || $user->countExp!=0 || $user->countEdu!=0 || $user->countSki!=0 || $user->countInt!=0 || $user->countPro!=0)
                                <div class="profBackground">
                                    <div class="profBackgroundInner">
                                        <h4 class="backgroundHeading">BACKGROUND</h4>
                                        <div class="backgroundData">
                                            @if($user->profile->bio)
                                            <div class="profEachBox">
                                                <div class="profBackgroundInnerUpper">
                                                    <i class="fa fa-file-text fa-2x profBackgroundInnerUpperLeft"></i>
                                                    <h4 class="profBackgroundInnerUpperRight">SUMMARY</h4>
                                                </div>
                                                <div class="profSummaryData">
                                                    <div class="profDataBlank">
                                                        <div class="sideLineHelloLeft"></div>
                                                        <div class="sideLineHelloRight">
                                                            <div class="sideLineCircle"></div>
                                                            <div class="sideLineLine"></div>
                                                            <div class="sideLineCircle"></div>
                                                        </div>
                                                    </div>
                                                    <div class="profSummaryDataRight">
                                                       <p> {{ $user->profile->bio }} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            @if($user->countExp!=0)
                                            <div class="profEachBox">
                                                <div class="profBackgroundInnerUpper">
                                                    <i class="fa fa-suitcase fa-2x profBackgroundInnerUpperLeft"></i>
                                                    <h4 class="profBackgroundInnerUpperRight">EXPERIENCE</h4>
                                                </div>
                                                <div class="profSummaryData">
                                                    <div class="profDataBlank">
                                                        <div class="sideLineHelloLeft"></div>
                                                        <div class="sideLineHelloRight">
                                                            <div class="sideLineCircle"></div>
                                                            <div class="sideLineLine"></div>
                                                            <div class="sideLineCircle"></div>
                                                        </div>
                                                    </div>
                                                    <div class="profSummaryDataRight">
                                                        @foreach($user->experience as $experience)
                                                        <div class="profEachJob">
                                                            <div class="profEachExp">
                                                                <h4 class="expPeriod">
                                                                {{ $experience->experience_start_year }} - {{ $experience->experience_end_year }}</h4>
                                                                <h3 class="expPosition">{{ $experience->position }}</h3>
                                                                <h3 class="expCompany">{{ $experience->company->company_name }}</h3>
                                                            </div>
                                                            <div class="expLogo" style="background: url({{ asset('company_logos/'.$experience->company->company_logo) }}); background-size: contain; background-repeat: no-repeat; pakground-position: center;">
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            @if($user->countEdu!=0)
                                            <div class="profEachBox">
                                                <div class="profBackgroundInnerUpper">
                                                    <i class="fa fa-graduation-cap fa-2x profBackgroundInnerUpperLeft"></i>
                                                    <h4 class="profBackgroundInnerUpperRight">EDUCATION</h4>
                                                </div>
                                                <div class="profSummaryData">
                                                    <div class="profDataBlank">
                                                        <div class="sideLineHelloLeft"></div>
                                                        <div class="sideLineHelloRight">
                                                            <div class="sideLineCircle"></div>
                                                            <div class="sideLineLine"></div>
                                                            <div class="sideLineCircle"></div>
                                                        </div>
                                                    </div>
                                                    <div class="profSummaryDataRight">
                                                        @foreach($user->education as $education)
                                                        <div class="profEachJob">
                                                            <div class="profEachExp">
                                                                <h4 class="expPeriod">{{ $education->college_start_year }} - {{ $education->college_end_year }}</h4>
                                                                <h3 class="expPosition">{{ $education->college->college_name }}</h3>
                                                                <h3 class="expCompany">{{ $education->courseMajor->course->course_name }}, {{ $education->courseMajor->course_major_name }}</h3>
                                                            </div>
                                                            <div class="expLogo" style="background: url({{ asset('college_logos/'.$education->college->college_logo) }}); background-size: contain; background-repeat: no-repeat; pakground-position: center;">
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            @if($user->countSki!=0)
                                            <div class="profEachBox">
                                                <div class="profBackgroundInnerUpper">
                                                    <i class="fa fa-lightbulb-o fa-2x profBackgroundInnerUpperLeft"></i>
                                                    <h4 class="profBackgroundInnerUpperRight">SKILLS</h4>
                                                </div>
                                                <div class="profSummaryData">
                                                    <div class="profDataBlank">
                                                        <div class="sideLineHelloLeft"></div>
                                                        <div class="sideLineHelloRight">
                                                            <div class="sideLineCircle"></div>
                                                            <div class="sideLineLine"></div>
                                                            <div class="sideLineCircle"></div>
                                                        </div>
                                                    </div>
                                                    <div class="profSummaryDataRight">
                                                        <div class="skillsOuter">
                                                            @foreach($user->skill as $skill)
                                                            <div class="singleSkill">{{ $skill->skill->skill_name }}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            @if($user->countInt!=0)
                                            <div class="profEachBox">
                                                <div class="profBackgroundInnerUpper">
                                                    <i class="fa fa-star fa-2x profBackgroundInnerUpperLeft"></i>
                                                    <h4 class="profBackgroundInnerUpperRight">INTERESTS</h4>
                                                </div>
                                                <div class="profSummaryData">
                                                    <div class="profDataBlank">
                                                        <div class="sideLineHelloLeft"></div>
                                                        <div class="sideLineHelloRight">
                                                            <div class="sideLineCircle"></div>
                                                            <div class="sideLineLine"></div>
                                                            <div class="sideLineCircle"></div>
                                                        </div>
                                                    </div>
                                                    <div class="profSummaryDataRight">
                                                        <div class="skillsOuter">
                                                            @foreach($user->interest as $interest)
                                                            <div class="singleSkill">{{ $interest->interest->skill_name }}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            @if($user->countPro!=0)
                                            <div class="profEachBox">
                                                <div class="profBackgroundInnerUpper">
                                                    <i class="fa fa-bar-chart fa-2x profBackgroundInnerUpperLeft"></i>
                                                    <h4 class="profBackgroundInnerUpperRight">PROJECTS</h4>
                                                </div>
                                                <div class="profSummaryData">
                                                    <div class="profDataBlank">
                                                        <div class="sideLineHelloLeft"></div>
                                                        <div class="sideLineHelloRight">
                                                            <div class="sideLineCircle"></div>
                                                            <div class="sideLineLine"></div>
                                                            <div class="sideLineCircle"></div>
                                                        </div>
                                                    </div>
                                                    <div class="profSummaryDataRight">
                                                        @foreach($user->projects as $project)
                                                        <div class="profEachProject">
                                                            <div class="profEachExp">
                                                                <h3 class="expPosition">{{ $project->project_title }}</h3>
                                                                <h4 class="expPeriod">{{ $project->project_started }} - {{ $project->project_ended }}</h4>
                                                                <p class="projectDetail">{{ $project->project_desc }}</p>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($user->countRec!=0)
                                <div class="personPosts">
                                    <h4 class="postHeading">RECOMMENDATIONS</h4>
                                    <div class="personPostLinksOuter">
                                        @foreach($user->recommendations as $recommendation)
                                        <div class="personPostsLink">
                                            <div class="personRecc">
                                                "{{ $recommendation->recommendation }}"
                                            </div>
                                            <div class="personPostHeading">
                                                <h4><a href="{{ action('userController@show',['username' => $recommendation->recommender->user_name]) }}">{{ $recommendation->recommender->fname }} {{ $recommendation->recommender->lname }}</a></h4></div>
                                            <div class="personPostTime">
                                                <h6></h6></div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="rightBox"></div>
                    </div>
@stop
                    