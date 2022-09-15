@include('layouts.application')
@section('content')

    <main>
        <div class="container">    
            <div class="col-9">
                <div class="card">
                    <div class="top">
                        <div class="userDetails">
                            <div class="profilepic">
                                <div class="profile_img">
                                    <div class="image">
                                    <img src="img/cover 1.png" alt="img8">
                                    </div>
                                </div>
                            </div>
                            <h3>username
                                  <br>
                                  <span>place</span>
                          </h3>
                        </div>
                        <div>
                            <span class="dot">
                                <i class="fas fa-ellipsis-h"></i>
                            </span>
                        </div>
                    </div>
                    <div class="imgBx">
                        <<img src="img/cover 1.png" class="cover" alt="post-1">
                    </div>
                    <div class="post-content">
                    <div class="reaction-wrapper">
                        <img src="img/like.PNG" class="icon" alt="">
                        <img src="img/comment.PNG" class="icon" alt="">
                        <img src="img/send.PNG" class="icon" alt="">
                        <img src="img/save.PNG" class="save icon" alt="">
                    </div>
                    <a class="likes" href="#">1,012 likes</a>
                    <p><a class="description" href="#"></a><span><strong>username</strong> </span>caption</p>
                    <p class="post-time">2 minutes ago</p>
                </div>
                <div class="comment-wrapper">
                    <img src="img/smile.PNG" class="icon" alt="">
                    <input type="text" class="comment-box" placeholder="Add a comment">
                    <button class="comment-btn">post</button>
                </div>
            </div>
        
    
            </div>
        </div>
      

    </main>
