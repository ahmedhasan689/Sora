@extends('layouts.Front-nav')

@section('title', 'Profile')

<!-- Profile Content -->
<div class="bg-profile">
    @foreach($profiles as $profile)
    <img src="{{ asset('uploads') . '/' . $profile->image_header }}" class="w-100 expand-sm" style="height: 200px">
    <div class="img-profilee expand-sm mb-5">
        <!-- Image Profile -->
        <img src="{{ $profile->user->image }}" class="rounded-circle d-block mx-auto img-prfile">
        <div class="desc-profile">
            <p class="desc-profile-name">{{ $profile->user->name }}</p>
            <p class="desc-profile-pos">
                <i class="fa fa-map-marker ml-2" style="color: black" aria-hidden="true"></i>
                غزه الارض الفلسطينيه
            </p>
            <p class="desc-number-flower expand-sm">
                <span class="pr-4">{{ $posts->count() }} <span class="name-flowers">صوره</span></span>
                <span class="pr-4">{{ $profile->followers }}<span class="name-flowers">متابعون</span></span>
                <span class="pr-4">{{ $profile->followings }}<span class="name-flowers">متابعين </span></span>
            </p>

            <p class="desc-profile-desc expand-sm" style="max-width: 350px;margin: auto;margin-bottom: 10px;">
                {{ $profile->information }}
            </p>
            <div class="desc-profile-edit " style="text-align: center; margin-bottom: 100px;">
                @if($profile->user->id != Auth::user()->id)
                <button class="btn btn-outline-success btn-sm flow-button">تابع</button>
                @endif
                <a href="{{ route('profile.edit', ['id' => $profile->id]) }}" style="text-decoration: none;">
                    <button class="btn btn-outline-secondary mr-4 btn-sm edit-profile">تعديل</button>
                </a>
                <a href="{{ route('board.index') }}">
                    <button class="btn btn-outline-secondary mr-4 btn-sm edit-profile" style="width: 30px; height: 30px;">
                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                    </button>
                </a>
            </div>


        </div>
    </div>
    @endforeach


</div>




<!-- End Profile Content -->

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

                    <div class="dropdown" style="position: absolute;top: 10%;left: 10%">
                        <a class="btn saveInDevice" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h fa-lg pt-3"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="margin-left: 1px">
                            <a class="dropdown-item" href="#">تعديل</a>
                        </div>
                    </div>

                    <!-- End Doted Element Save Button -->

                    <!-- Save the image in the archive -->
                    <div class="archive-image">
                        <a href="#" class="archive-image-link" onclick="archif()">
                            <i class="fa fa-bookmark-o fa-lg archive"> حفظ</i>
                        </a>
                    </div>

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
                </div>

            </div>

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

                            <div class="d-flex flex-row-end mt-5 mr-3 col-md-5">
                                <!-- Like Button -->
                                <button class="btn" style="width: 300px;height: 30px;border-radius: 10px;background: #DFDFDF;">
                                    <div style="margin-top: -4px">
                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                        <span style="color: #6E6E6E">أعجاب</span>
                                    </div>
                                </button>
                                <!-- Save Button -->
                                <button class="btn" style="width: 300px;height: 30px;margin-right: 10px;border-radius: 10px;background-color: #DFDFDF;">
                                    <div style="margin-top: -4px"><i class="fa fa-bookmark-o" aria-hidden="true"></i><span style="color: #6E6E6E;margin-right: 5px">حفظ</span></div>
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
                            <div dir='ltr' id="demo-{{ $post->id }}" class="collapse mt-5 post-comment" style="margin-right:-120px;">
                                <!-- Firest Element In Comment -->
                                @foreach($comments as $comment)
                                @if($comment->post->id == $post->id)
                                @if($comment)


                                <div class="comment-content">
                                    <!-- Name Comment -->
                                    <span class="username">
                                        {{ $comment->user->name }}
                                    </span>
                                    <!-- Image Comment -->
                                    <img src="{{ asset('uploads') . '/' . $comment->user->avatar }}" style="width: 30px;height: 30px;" class="rounded-circle">

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

                                    <!-- Description Comment -->
                                    <br>
                                    <span>
                                        <p id="beforeContent" class="comment">
                                            {{ $comment->content }}
                                        </p>
                                    </span>
                                </div>
                                <!-- Like And Comment -->
                                <div style="text-align: center; margin-top: -18px">
                                    <a href="#">
                                        <i class="fa fa-commenting-o pr-3 fa-sm" style="color:#4F4F4F; " aria-hidden="true"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-thumbs-o-up pr-2" aria-hidden="true" style="color:#4F4F4F; "></i>
                                    </a>
                                    <span style="font-size: 10px;color:#4F4F4F; ">
                                        {{ $comment->created_at }}
                                    </span>
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
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">

                                        <img src="{{ asset('uploads') . '/' . Auth::user()->avatar }}" style="width: 45px;height: 45px;position: absolute;right: 5px;" class="rounded-circle end-img">

                                        <textarea class="form-control comment-area" id="exampleFormControlTextarea1" rows="4" cols="45" placeholder="التعليق الخاص بك" name="comment"></textarea>
                                        </textarea>
                                        <button type="submit" class="btn btn-success comment-submit">
                                            أضافة تعليق
                                        </button>
                                    </div>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
</script>
</body>

</html>