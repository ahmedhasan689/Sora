@extends('layouts.Front-nav')


@section('title', 'Sora')


<!-- Gallary -->
<div class="container-fluid" style="margin-top: 70px;">
    <div class="row d-flex p-1">
        @foreach($posts as $post)
        <div class="col-md-3">
            <div class="card">
                <a href="#" data-toggle="modal" data-target="#myModal-{{ $post->id }}" data-id="{{ $post->id }}" class="img-click">
                    <!-- Image Element In Card -->
                    <img src="{{ asset('uploads') . '/' . $post->image_path }}" data-toggle="modal" data-target="#myModal" onclick="modalscript()" id="largImageGalley" class="image-post">
                    <!-- DropDown Element Doted DropDown Edit Button-->
                    @auth
                    @if ($post->user->id == Auth::user()->id)
                    <div class="dropdown" style="position: absolute;top: 10%;left: 10%">
                        <a class="btn saveInDevice" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h fa-lg pt-3"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="margin-left: 1px">
                            <a class="dropdown-item" href="{{ route('post.edit', ['id' => $post->id]) }}">تعديل</a>
                            <form action="{{ route('post.delete', ['id' => $post->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item">حذف</button>
                            </form>
                        </div>
                    </div>
                    @endif

                    @endauth

                    <!-- End Doted Element Save Button -->

                    <!-- Save the image in the archive -->


                    <!-- Text In Image -->
                    <a href="">
                        <div id="titleImage" class="text-post my-4 mx-2">{{ $post->name }}</div>
                    </a>

                    <!-- End parent Link in Card -->
                </a>

                <!-- Secound Element In Card Contain like and comment -->

                <div class="card-title d-flex">
                    <!-- image profile -->
                    <a href="#">
                        <span>
                            <img src="{{ asset('uploads') . '/' . $post->user->avatar }}" id="imageProfile" class="avatar-post mx-2">
                        </span>
                    </a>
                    <!-- name profile -->
                    <a href="#">
                        <span id="imageName" class="username-post">{{ $post->user->name }}</span>
                    </a>
                    <!-- group contain like and commend -->
                    <!-- <div class=" w-100 ml-3 mt-2">
                            <!-- like -->
                    <!-- <a href="#"><span><i class="fa fa-thumbs-o-up" aria-hidden="true" style="color: black"></i></span></a>
                            <span>45</span> -->
                    <!-- comment -->
                    <!-- <a href="#"><span><i class="fa fa-commenting-o" aria-hidden="true" style="color: black"></i></span></a>
                            <span>45</span> -->
                    <!-- </div>  -->
                </div>

            </div>

            <!-- <img src="https://images.pexels.com/photos/3889868/pexels-photo-3889868.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                <img src="https://images.pexels.com/photos/2091160/pexels-photo-2091160.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                <img src="https://images.pexels.com/photos/2019546/pexels-photo-2019546.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"> -->
        </div>
        @endforeach
    </div>
</div>




<!-- End Gallary -->
<!-- Model In Bootstrap -->
<div class="container">
    <div class="row">
        <!-- Begining Modal -->
        @foreach($posts as $post)
        <div class="modal fade bg-white" id="myModal-{{ $post->id }}">
            <!-- Modal Body -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-dialog bg-dark " role="document" style="width: 10px;height: 10px;margin-top: -30px;position: relative;">
            </div>


            <div class="row modal-body expand-sm allModel" id="mm">
                <div class="col-md-6  h-100 photo-parent w-100 ">
                    <!-- The Image -->
                    <img src="{{ asset('uploads') . '/' . $post->image_path }}" class="w-100 big-img" style="margin-left: 50px;" id="image">



                </div>
                <!-- Content Comment -->
                <div class="col-md-6">
                    <div class="container">
                        <div class="row">
                            <!-- Profile Content -->
                            <div class="d-flex flex-row-start mt-4 mr-4 col-md-6 " id="xx">
                                <!-- Image Profile -->
                                <div class="d-flex">
                                    <img src="{{ asset('uploads') . '/' . $post->user->avatar }}" class="rounded-circle  mt-3 pro-comment" id="modalProfile">
                                    <!-- Description Profile -->
                                    <p class="mt-4 mr-3" style="min-width: 120px;text-align: right;" id="nameProfile">
                                        <span class="nameProfile">
                                            {{ $post->user->name }}
                                        </span>
                                        <!-- Flowers Profile -->
                                        <br>
                                        <span class="d-flex flowers-comment">12متابع</span>
                                    </p>
                                    <!-- Like -->
                                    <span class="mt-4 mr-1 follow">
                                        <button class="btn btn-success">
                                            <p class="text">تابع</p>
                                        </button>
                                    </span>
                                </div>



                            </div>
                            <!-- End Coment Content -->

                            @php
                            $like_count = 0;
                            $dislike_count = 0;

                            $like_status = 'btn-secondary';
                            $dislike_status = 'btn-secondary';
                            @endphp

                            @foreach ($post->likes as $like)
                            @php
                            if($like->like == 1)
                            {
                            $like_count++;
                            }
                            if($like->like == 0)
                            {
                            $dislike_count++;
                            }

                            if(Auth::check())
                            if ($like->like == 1 && $like->user_id == Auth::user()->id)
                            {
                            $like_status = 'btn-success';
                            }
                            if(Auth::check())
                            if ($like->like == 0 && $like->user_id == Auth::user()->id)
                            {
                            $dislike_status = 'btn-danger';
                            }

                            @endphp
                            @endforeach

                            <div class="d-flex flex-row-end mt-5 mr-3 col-md-5">
                                <!-- Like Button -->
                                <button id="like" data-postid="{{ $post->id }}_l" class="like btn {{ $like_status }}" data-like="{{ $like_status }}" style="width: 300px;height: 30px;border-radius: 10px;">
                                    <div style="margin-top: -4px">
                                        <span class="like_count">
                                            {{ $like_count }}
                                        </span>
                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                        <span style="color: white">أعجاب</span>
                                    </div>
                                </button>
                                <!-- Save Button -->
                                <button id="dislike" data-postid="{{ $post->id }}_d" class="dislike btn {{ $dislike_status }}" style="width: 300px;height: 30px;border-radius: 10px; margin-right: 5px;">
                                    <div style="margin-top: -4px">
                                        <span class="dislike_count">
                                            {{ $dislike_count }}
                                        </span>
                                        <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                                        <span style="color: white">عدم الاعجاب</span>
                                    </div>
                                </button>


                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Title Modal -->
                                    <div class="description-modal">
                                        <h1 class="post-name" class="mr-5" id="modalTitle">
                                            {{ $post->name }}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Description -->
                                    <span class="mr-5 post-content" id="modalDescription">
                                        {{ $post->content }}
                                    </span>
                                </div>
                            </div>
                            <!-- Collapes Comment -->
                            <p data-toggle="collapse" data-target="#demo-{{ $post->id }}" class="col-md-12 post-comment">
                                التعليقات
                                <i class="fa fa-caret-down mr-3" aria-hidden="true"></i>
                            </p>
                            <div class="row">

                            </div>
                            <div dir='ltr' id="demo-{{ $post->id }}" class="collapse mt-5 post-comment" style="margin-right:-120px;">
                                <!-- Firest Element In Comment -->
                                @foreach($comments as $comment)
                                @if($comment->post->id == $post->id)
                                @if($comment)

                                <div class="comment-content" style="margin-bottom: 55px;">
                                    <!-- Name Comment -->
                                    <span class="username">
                                        {{ $comment->user->name }}
                                    </span>
                                    <!-- Image Comment -->
                                    <img src="{{ asset('uploads') . '/' . $comment->user->avatar }}" style="width: 30px;height: 30px;" class="rounded-circle">

                                    @auth
                                    @if($comment->user->id == Auth::user()->id)
                                    <div class="dropdown comment-settings d-flex">
                                        <a class="btn comment-btn saveInDevice" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>

                                        <div class="dropdown-menu comment-dropdown" aria-labelledby="dropdownMenuLink" style="margin-left: 1px">

                                            <form action="#" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <a class="dropdown-item" class="beforeClick" href="#">تعديل</a>
                                            </form>
                                            <a class="dropdown-item" href="#">حذف</a>
                                        </div>
                                    </div>
                                    @endif
                                    @endauth

                                    <!-- Description Comment -->
                                    <br>
                                    <span>
                                        <p id="beforeContent" class="comment" style="padding-right: 35px;">
                                            {{ $comment->content }}
                                        </p>
                                    </span>
                                    <!-- Like And Comment -->
                                    <div style="text-align: center; margin-top: -18px">
                                        <span style="font-size: 10px;color:#4F4F4F; ">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>

                                @else
                                <div dir='ltr' id="demo-{{ $post->id }}" class="collapse mt-5 post-comment" style="margin-right:-120px;">
                                    <h1>
                                        كن أول من يعلق على هذا المنشور
                                    </h1>
                                </div>
                                @endif
                                @endif
                                @endforeach

                                <!--  -->



                            </div>

                            @auth
                            <div class="row mt-4 w-100 end">
                                <form action="{{ route('comment.store') }}" method="POST">
                                    @csrf
                                    <div class="col-md-12 expand-sm">
                                        <input type="hidden" name="post_id" value="{{ $post->id  }}">

                                        <input type="hidden" name="user" value="{{ $post->user_id }}">

                                        <img src="{{ asset('uploads') . '/' . Auth::user()->avatar }}" style="width: 45px;height: 45px;position: absolute;right: 5px;" class="rounded-circle end-img">

                                        <textarea class="form-control comment-area" id="exampleFormControlTextarea1" rows="4" cols="45" placeholder="التعليق الخاص بك" name="comment"></textarea>
                                        </textarea>
                                        <button type="submit" class="btn btn-success comment-submit">
                                            أضافة تعليق
                                        </button>



                                    </div>
                                </form>
                                <form action="{{ route('board.store') }}" method="POST">
                                    @csrf

                                    @auth
                                    <input type="hidden" name="post" value="{{ $post->id }}" />
                                    <input type="hidden" name="user" value="{{ Auth::user()->id }}" />

                                    <button type="submit" class="archive-image-link btn btn-dark" onclick="archif()" style="margin-top: 120px; margin-right: -45px">
                                        <i class="fa fa-bookmark-o fa-lg archive" style="color:white"> حفظ</i>
                                    </button>
                                    @endauth
                                </form>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>








<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('Front/js/Front.js') }}"></script>

<script>
    $('#myModal').modal('hide');

    $(document).ready(function() {
        $('.img-click').click(function() {
            const id = $(this).attr('data-id');
            $.ajax({
                url: 'post/model/' + id,
                type: 'GET',
                data: {
                    "id": id
                },
                success: function(data) {
                    $('#image').html(data.image_path);
                    $('#modalProfile').html(data.user_id);
                    $('#nameProfile').html(data.name);

                }
            })
        });
    });


    var token = "{{ Session::token() }}";

    $(".like").on('click', function() {

        var like_s = $(this).attr('data-like');
        var post_id = $(this).attr('data-postid');

        post_id = post_id.slice(0, -2)

        // alert(post_id);

        $.ajax({
            type: 'POST',
            url: '/like',
            data: {
                like_s: like_s,
                post_id: post_id,
                _token: token,
            },

            success: function(data) {
                // alert('test')    

                if (data.is_like == 1) {
                    $('*[data-postid="' + post_id + '_l"]').removeClass('btn-secondary').addClass('btn-success');
                    $('*[data-postid="' + post_id + '_d"]').removeClass('btn-danger').addClass('btn-secondary');

                    var cu_like = $('*[data-postid="' + post_id + '_l"]').find('.like_count').text();
                    var new_like = parseInt(cu_like) + 1;
                    $('*[data-postid="' + post_id + '_l"]').find('.like_count').text(new_like);

                    if (data.change_like == 1) {

                        var cu_like = $('*[data-postid="' + post_id + '_d"]').find('.dislike_count').text();
                        var new_like = parseInt(cu_like) - 1;
                        $('*[data-postid="' + post_id + '_d"]').find('.dislike_count').text(new_like);
                    }

                }
                if (data.is_like == 0) {
                    $('*[data-postid="' + post_id + '_l"]').removeClass('btn-success').addClass('btn-secondary');

                    var cu_like = $('*[data-postid="' + post_id + '_l"]').find('.like_count').text();
                    var new_like = parseInt(cu_like) - 1;
                    $('*[data-postid="' + post_id + '_l"]').find('.like_count').text(new_like);
                }



            }
        })

    });

    $(".dislike").on('click', function() {

        var like_s = $(this).attr('data-like');
        var post_id = $(this).attr('data-postid');

        post_id = post_id.slice(0, -2)

        // alert(post_id);

        $.ajax({
            type: 'POST',
            url: '/dislike',
            data: {
                like_s: like_s,
                post_id: post_id,
                _token: token,
            },

            success: function(data) {
                // alert('test')    

                if (data.is_dislike == 1) {
                    $('*[data-postid="' + post_id + '_d"]').removeClass('btn-secondary').addClass('btn-danger');
                    $('*[data-postid="' + post_id + '_l"]').removeClass('btn-success').addClass('btn-secondary');


                    var cu_like = $('*[data-postid="' + post_id + '_d"]').find('.dislike_count').text();
                    var new_like = parseInt(cu_like) + 1;
                    $('*[data-postid="' + post_id + '_d"]').find('.dislike_count').text(new_like);

                    if (data.change_dislike == 1) {

                        var cu_dislike = $('*[data-postid="' + post_id + '_l"]').find('.like_count').text();
                        var new_dislike = parseInt(cu_dislike) - 1;
                        $('*[data-postid="' + post_id + '_l"]').find('.like_count').text(new_dislike);
                    }


                }
                if (data.is_dislike == 0) {
                    $('*[data-postid="' + post_id + '_d"]').removeClass('btn-danger').addClass('btn-secondary');

                    var cu_like = $('*[data-postid="' + post_id + '_d"]').find('.dislike_count').text();
                    var new_like = parseInt(cu_like) - 1;
                    $('*[data-postid="' + post_id + '_d"]').find('.dislike_count').text(new_like);
                }



            }
        })

    });
</script>




</body>

</html>