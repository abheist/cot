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
                            <h4 class="postHeading">POSTS</h4>
                            <div class="personPostLinksOuter">
                                <div class="personPostsLink">
                                    <div class="personPostPic" style="background: url(../front/app/images/postpic1.jpg); height: 150px; background-size: cover; background-position: center; border-radius: 4px;"></div>
                                    <div class="personPostHeading">
                                        <h4>My Name is Abhishek Sin..</h4></div>
                                    <div class="personPostTime">
                                        <h6>January 15, 2016</h6></div>
                                </div>
                                <div class="personPostsLink">
                                    <div class="personPostPic" style="background: url(../front/app/images/postpic2.jpg); height: 150px; background-size: cover; background-position: center; border-radius: 4px;"></div>
                                    <div class="personPostHeading">
                                        <h4>My name is Kapil Agrawal...</h4></div>
                                    <div class="personPostTime">
                                        <h6>January 15, 2016</h6></div>
                                </div>
                                <div class="personPostsLink">
                                    <div class="personPostPic" style="background: url(../front/app/images/postpic3.jpg); height: 150px; background-size: cover; background-position: center; border-radius: 4px;"></div>
                                    <div class="personPostHeading">
                                        <h4>My name is Baldev Patwari</h4></div>
                                    <div class="personPostTime">
                                        <h6>January 15, 2016</h6></div>
                                </div>
                            </div>
                        </div>
                        <div class="profBackground">
                            <div class="profBackgroundInner">
                                <h4 class="backgroundHeading">BACKGROUND</h4>
                                <div class="backgroundData">
                                    <div class="profEachBox">
                                        <div class="profBackgroundInnerUpper">
                                            <i class="fa fa-facebook-square fa-2x profBackgroundInnerUpperLeft"></i>
                                            <h4 class="profBackgroundInnerUpperRight">SUMMARY</h4>
                                        </div>
                                        <div class="profSummaryData">
                                            <div class="profDataBlank"></div>
                                            <div class="profSummaryDataRight">
                                                We Abhishek, Baldev & Kapil are making this because we want to help students to get to the new heights and touch the sky, because sky is the limit. This project was started with an idea of proving a platform to student to showcase their talent and creativity.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profEachBox">
                                        <div class="profBackgroundInnerUpper">
                                            <i class="fa fa-facebook-square fa-2x profBackgroundInnerUpperLeft"></i>
                                            <h4 class="profBackgroundInnerUpperRight">EXPERIENCE</h4>
                                        </div>
                                        <div class="profSummaryData">
                                            <div class="profDataBlank"></div>
                                            <div class="profSummaryDataRight">
                                                <div class="profEachJob">
                                                    <div class="profEachExp">
                                                        <h4 class="expPeriod">2015 - PRESENT</h4>
                                                        <h3 class="expPosition">Co-founder, CEO</h3>
                                                        <h3 class="expCompany">Apple Inc.</h3>
                                                    </div>
                                                    <div class="expLogo" style="background: url(../front/app/images/apple.png); background-size: contain; background-repeat: no-repeat; pakground-position: center;">
                                                    </div>
                                                </div>
                                                <div class="profEachJob">
                                                    <div class="profEachExp">
                                                        <h4 class="expPeriod">2015 - PRESENT</h4>
                                                        <h3 class="expPosition">Co-founder, CEO</h3>
                                                        <h3 class="expCompany">Apple Inc.</h3>
                                                    </div>
                                                    <div class="expLogo" style="background: url(../front/app/images/apple.png); background-size: contain; background-repeat: no-repeat; pakground-position: center;">
                                                    </div>
                                                </div>
                                                <div class="profEachJob">
                                                    <div class="profEachExp">
                                                        <h4 class="expPeriod">2015 - PRESENT</h4>
                                                        <h3 class="expPosition">Co-founder, CEO</h3>
                                                        <h3 class="expCompany">Apple Inc.</h3>
                                                    </div>
                                                    <div class="expLogo" style="background: url(../front/app/images/apple.png); background-size: contain; background-repeat: no-repeat; pakground-position: center;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profEachBox">
                                        <div class="profBackgroundInnerUpper">
                                            <i class="fa fa-facebook-square fa-2x profBackgroundInnerUpperLeft"></i>
                                            <h4 class="profBackgroundInnerUpperRight">EDUCATION</h4>
                                        </div>
                                        <div class="profSummaryData">
                                            <div class="profDataBlank"></div>
                                            <div class="profSummaryDataRight">
                                                <div class="profEachJob">
                                                    <div class="profEachExp">
                                                        <h4 class="expPeriod">2012 - 2016</h4>
                                                        <h3 class="expPosition">GLA University</h3>
                                                        <h3 class="expCompany">B-Tech, Computer Science & Engineering</h3>
                                                    </div>
                                                    <div class="expLogo" style="background: url(../front/app/images/gla.png); background-size: contain; background-repeat: no-repeat; pakground-position: center;">
                                                    </div>
                                                </div>
                                                <div class="profEachJob">
                                                    <div class="profEachExp">
                                                        <h4 class="expPeriod">2012 - 2016</h4>
                                                        <h3 class="expPosition">GLA University</h3>
                                                        <h3 class="expCompany">B-tech, Computer Science & Engineering</h3>
                                                    </div>
                                                    <div class="expLogo" style="background: url(../front/app/images/gla.png); background-size: contain; background-repeat: no-repeat; pakground-position: center;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profEachBox">
                                        <div class="profBackgroundInnerUpper">
                                            <i class="fa fa-facebook-square fa-2x profBackgroundInnerUpperLeft"></i>
                                            <h4 class="profBackgroundInnerUpperRight">SKILLS</h4>
                                        </div>
                                        <div class="profSummaryData">
                                            <div class="profDataBlank"></div>
                                            <div class="profSummaryDataRight">
                                                <div class="skillsOuter">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rightBox"></div>
            </div>
@stop