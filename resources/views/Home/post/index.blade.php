@extends('layouts.Front-nav');

    <!-- Gallary -->
    <div class="container-fluid" style="margin-top: 70px;">
        @foreach($posts as $post)
        <div class="row d-flex p-1 mt-4">
            <div class="col-md-3">
                <div class="card">
                    <a href="#">
                        <!-- Image Element In Card -->
                        <img src="{{ asset('uploads') . '/' . $post->image_path }}" data-toggle="modal" data-target="#myModal" onclick="modalscript()" id="largImageGalley">
                        <!-- DropDown Element Doted DropDown Save Button-->
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
                            <div class="text" id="titleImage">{{ $post->name }}</div>
                        </a>

                        <!-- End parent Link in Card -->
                    </a>

                    <!-- Secound Element In Card Contain like and comment -->

                    <div class="card-title d-flex">
                        <!-- image profile -->
                        
                        <!-- name profile -->
                        <!-- <a href="#">
                            <span style="color: black;display: block;margin-top: 8px;min-width: 100px;text-align: right;" id="imageName">{{ $post->user->name }}</span>
                        </a> -->
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
            
            <!-- <div class="column">
                <img src="https://images.pexels.com/photos/3889868/pexels-photo-3889868.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" />
                <img src="https://images.pexels.com/photos/2360569/pexels-photo-2360569.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" />
                <img src="https://images.pexels.com/photos/3779785/pexels-photo-3779785.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                <img src="https://images.pexels.com/photos/259987/pexels-photo-259987.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                <img src="https://images.pexels.com/photos/2350514/pexels-photo-2350514.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
            </div>
            <div class="column">
                <img src="https://images.pexels.com/photos/3889868/pexels-photo-3889868.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" />
                <img src="https://images.pexels.com/photos/2360569/pexels-photo-2360569.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" />
                <img src="https://images.pexels.com/photos/3779785/pexels-photo-3779785.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                <img src="https://images.pexels.com/photos/259987/pexels-photo-259987.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                <img src="https://images.pexels.com/photos/2350514/pexels-photo-2350514.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
            </div>
            <div class="column">
                <img src="https://images.pexels.com/photos/3889868/pexels-photo-3889868.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" />
                <img src="https://images.pexels.com/photos/2360569/pexels-photo-2360569.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" />
                <img src="https://images.pexels.com/photos/3779785/pexels-photo-3779785.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                <img src="https://images.pexels.com/photos/259987/pexels-photo-259987.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                <img src="https://images.pexels.com/photos/2350514/pexels-photo-2350514.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
            </div> -->
        </div>
        @endforeach
    </div>





    <!-- End Gallary -->
    <!-- Model In Bootstrap -->
    <div class="container ">
        <div class="row">
            <!-- Begining Modal -->
            <div class="modal fade md bg-white" id="myModal">
                <!-- Modal Body -->

                <div class="modal-dialog bg-dark " role="document" style="width: 10px;height: 10px;margin-top: -30px;position: relative;">
                </div>


                <div class="row  modal-body  expand-sm allModel" id="mm">
                    <div class="row w-100 mx-auto ">
                        <!-- BigImage Content -->


                    </div>
                    <div class="col-md-6  h-100 photo-parent w-100 ">
                        <!-- The Image -->
                        <img src="{{ asset('Front/img/3.png') }}" class="w-100 big-img" style="width: 100%;height: 100%;margin-left: 50px;" id="modalImage">
                    </div>
                    <!-- Content Comment -->
                    <div class="col-md-6">
                        <div class="container">
                            <div class="row">
                                <!-- Profile Content -->
                                <div class="d-flex flex-row-start mt-4 mr-4 col-md-6 " id="xx">
                                    <!-- Image Profile -->
                                    <div class="d-flex">
                                        <img src="{{ asset('Front/img/2.png') }}" class="rounded-circle  mt-3 pro-comment" id="modalProfile">
                                        <!-- Description Profile -->
                                        <p class="mt-4 mr-3" style="min-width: 100px;text-align: right;" id="nameProfile"> <span class="nameProfile">محمد علي</span>
                                            <!-- Flowers Profile -->
                                            <br><span class="d-flex flowers-comment">12متابع</span>
                                        </p>
                                        <!-- Like -->
                                        <span class="mt-4 mr-1"><button class="btn btn-success likeModel">
                                                <p style="margin-top: -10px">تابع</p>
                                            </button></span>
                                    </div>



                                </div>
                                <!-- End Coment Content -->

                                <div class="d-flex flex-row-end mt-5 mr-3 col-md-5">
                                    <!-- Like Button -->
                                    <button class="btn" style="width: 300px;height: 30px;border-radius: 10px;background: #DFDFDF;">
                                        <div style="margin-top: -4px">
                                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span style="color: #6E6E6E">أعجاب </span>
                                        </div>
                                    </button>
                                    <!-- Save Button -->
                                    <button class="btn" style="width: 300px;height: 30px;margin-right: 10px;border-radius: 10px;background-color: #DFDFDF;">
                                        <div style="margin-top: -4px"><i class="fa fa-bookmark-o" aria-hidden="true"></i><span style="color: #6E6E6E;margin-right: 5px">حفظ</span></div>
                                    </button>


                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Title Modal -->
                                        <div class="description-modal">
                                            <h1 style="width: 80%;text-align: right; margin-top: 10px;font-weight: bold;" class="mr-5" id="modalTitle">صوره أبداعيه من أحدى ملاعب المنطقه</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Description -->
                                        <p style="text-align: right;margin-top: 30px;color: #929292;font-size: 14px" class="mr-5" id="modalDescription">صورة إبداعية من داخل إحدى العلب صورة إبداعية من داخل إحدى العلب صورة
                                            إبداعية من داخل إحدى العلب صورة إبداعية من داخل إحدى العلب صورة إبداعية من داخل إحدى العلب صورة
                                            إبداعية من داخل إحدى العلب صورة إبداعية من داخل إحدى العلب صورة إبداعية من داخل إحدى العلب </p>
                                    </div>
                                </div>
                                <!-- Collapes Comment -->
                                <p data-toggle="collapse" data-target="#demo" style="font-size: 25px;font-weight: bold;margin-right: 40px;">التعليقات <i class="fa fa-caret-down mr-3" aria-hidden="true"></i></p>
                                <div dir='ltr' id="demo" class="collapse mt-5 " style="margin-right:-120px;">
                                    <!-- Firest Element In Comment -->
                                    <div class="content" style="text-align: center;margin-right:-80px;">
                                        <!-- Name COmment -->
                                        <span style="margin-right: 20px; margin-top: -10px;font-weight: bold;">محمد المدهون</span>
                                        <!-- Image Comment -->
                                        <img src="{{ asset('Front/img/3.png') }}" style="width: 30px;height: 30px;" class="rounded-circle">
                                        <!-- Description Comment -->
                                        <br><span>
                                            <p style="width: 300px; padding-right: 120px; font-size: 12px;color: #4F4F4F;"> مانها صوره جميله
                                                ومييزه نجميله وم </p>
                                        </span>
                                    </div>
                                    <!-- Like And Comment -->
                                    <div style="text-align: center; margin-top: -18px">
                                        <a href="#"> <i class="fa fa-commenting-o pr-3 fa-sm" style="color:#4F4F4F; " aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-thumbs-o-up pr-2" aria-hidden="true" style="color:#4F4F4F; "></i></a>
                                        <span style="font-size: 10px;color:#4F4F4F; ">ساعه واحده</span>
                                    </div>
                                    <!--  -->
                                    <div class="content" style="text-align: center;margin-right:-80px;">
                                        <!-- Name COmment -->
                                        <span style="margin-right: 20px; margin-top: -10px;font-weight: bold;">محمد المدهون</span>
                                        <!-- Image Comment -->
                                        <img src="{{ asset('Front/img/3.png') }}" style="width: 30px;height: 30px;" class="rounded-circle">
                                        <!-- Description Comment -->
                                        <br><span>
                                            <p style="width: 300px; padding-right: 120px; font-size: 12px;color: #4F4F4F"> مانها صوره جميله
                                                ومييزه نجميله وم </p>
                                        </span>
                                    </div>
                                    <!-- Like And Comment -->
                                    <div style="text-align: center; margin-top: -18px">
                                        <a href="#"> <i class="fa fa-commenting-o pr-3 fa-sm" style="color:#4F4F4F; " aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-thumbs-o-up pr-2" aria-hidden="true" style="color:#4F4F4F; "></i></a>
                                        <span style="font-size: 10px;color:#4F4F4F; ">ساعه واحده</span>
                                    </div>
                                    <!--  -->



                                </div>
                                <div class="row mt-4 w-100 end">

                                    <div class="col-md-12 expand-sm">
                                        <img src="{{ asset('Front/img/3.png') }}" style="width: 45px;height: 45px;position: absolute;right: 5px;" class="rounded-circle end-img">
                                        <textarea name="message" rows="3" style="background-color: #EDEDED" style="margin-right: 70px" class="form-control w-75 mx-auto   font-weight-light
                  " placeholder="أدخل الوصف"></textarea>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                </div>



            </div>
        </div>
    </div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('Front/js/Front.js') }}"></script>
</body>

</html>