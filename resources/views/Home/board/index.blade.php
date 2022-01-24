@extends('layouts.Front-nav')

<!-- Gallary -->


<div class="container-fluid" style="margin-top: 70px;">
    <div class="row d-flex p-1">
        @foreach($boards as $board)
            <h3>
                {{ $board->post->name }}
            </h3>
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
