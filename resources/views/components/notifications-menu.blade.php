<div class="dropdown mr-4 ">
    <!-- notifications Icon  -->
    
    <i class=" fa fa-bell-o icon fa-lg fa-lg icon-not notification" id="dropdownMenuNavagation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   
        <!-- notifications Menu -->
        <div class="dropdown-menu notfcation-scroller mt-2 menu-notf" style="overflow-x: hidden;overflow-y: scroll;height: 400px;     width: 315px;" aria-labelledby="dropdownMenuNavagation">
            <!-- First Item In Menu -->
            <a href="#" class="dropdown-item pt-2 pb-2 first-item-not"> الاشعارات <span style="color:red">{{ $unread }}</span></a>
            <!-- divider  -->
            <div class="dropdown-divider"></div>
            <!-- Secound Item In NotFi -->
            @foreach ($notifications as $notification)
            <a href="{{ route('notifications.read',  $notification->id ) }}" class="dropdown-item secound-item-not">
                @if ($notification->unread())
                <b style="color:red">*</b>
                @endif
                <!-- Imag-Notifcation -->
                <img src="{{ $notification->data['icon'] }}" class="rounded-circle imag-Notifcation">
                <!-- Name-notification -->
                <span class="pr-2 Name-notification">{{ $notification->data['title'] }}</span>

                <br>
                <!-- decription-notifcation -->
                <span class="desc-notf">
                    {{ $notification->data['body'] }}
                    <br>
                    <span class="mr-3 desc-notf-end">
                        {{ $notification->created_at->diffForHumans() }}
                    </span>
                </span>
                <!-- End Secound item in Menu -->
            </a>
            <!-- Divider -->
            <div class="dropdown-divider"></div>
            @endforeach

        </div>
    </i>
</div>