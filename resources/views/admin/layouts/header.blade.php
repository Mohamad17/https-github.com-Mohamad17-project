<header class="fixed-top shadow">
    <div class="row">
        <div class="col-md-2 d-flex justify-content-around flex-md-row-reverse bgSide py-4">
            <div>
                <span class="d-md-none toggle-off pointer"><i class="fa fa-toggle-off text-light"></i></span>
                <span class="d-none d-md-inline toggle-on pointer"><i class="fa fa-toggle-on text-light"></i></span>
            </div>
            <div><img src="{{ asset('admin-asset/images/logo.png') }}" alt="logo"></div>
            <div class="d-md-none text-light pointer clips"><i class="fa fa-ellipsis-h"></i></div>
        </div>
        <div class="col-md-10 d-md-flex justify-content-between d-none bg-white bodyHeader py-4">
            <div class="rightSection d-none d-md-inline mr-1 mr-md-4 col-md-4">
                <div class="ml-4 d-inline"><i class="fa fa-search d-none d-md-inline pointer searchToggle"></i></div>
                <span class="searchBox px-2 py-2 ml-2 d-none">
                    <i class="fa fa-times pointer hideSearch"></i>
                    <input class="box" type="text" name="search" placeholder="جستجو">
                    <i class="fa fa-search pointer"></i>
                </span>
                <span class="screenSize">
                    <i class="fa fa-expand d-none d-md-inline pointer expand"></i>
                    <i class="fa fa-compress d-none pointer compress"></i>
                </span>
            </div>
            <div class="leftSection text-left ml-1 ml-md-4 mr-md-0 col-md-5 d-flex justify-content-end">
                <div class="bell pointer ml-2" id="bell">
                    <sub><i class="fa fa-bell fa-2x"></i></sub>
                    @if (count($unseenNotify) != 0)
                        <sup class="badge badge-danger mx-1">{{ count($unseenNotify) }}</sup>
                    @endif
                </div>
                <div class="notif d-none">
                    <div class="d-flex justify-content-between py-2">
                        <div class="px-2">
                            <h6>اعلان ها</h6>
                        </div>
                        <div class="badge badge-danger px-2">جدید</div>
                    </div>
                    <ul class="list-group">
                        @forelse ($unseenNotify as $notify)
                            <li class="list-group-item list-group-item-action">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-notif">{{ $notify['data']['message'] }}</p>
                                        <p class="text-secondary time-notif">
                                            {{ date_to_persian($notify->created_at) }}</p>
                                    </div>
                                </div>
                            </li>
                        @empty
                        <li class="list-group-item list-group-item-action">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-secondary time-notif">
                                        اعلان جدیدی وجود ندارد</p>
                                </div>
                            </div>
                        </li>
                        @endforelse
                    </ul>
                </div>
                <div class="message ml-5 pointer"><sub><i class="fa fa-comment fa-2x"></i></sub>
                    @if (count($unseenComments) != 0)
                        <sup class="badge badge-danger mx-1">{{ count($unseenComments) }}</sup>
                    @endif
                </div>
                <div class="commentBox mt-1 d-none">
                    <div class="py-2">
                        <input type="text" name="search" placeholder="جستجو"
                            class="form-controller form-control-sm p-1 searchCom">
                    </div>
                    <ul class="list-group scrollComments">
                        @forelse ($unseenComments as $comment)
                            @if ($comment->user->user_type == 0)
                                <li class="list-group-item list-group-item-action py-4">
                                    <div class="d-flex justify-content-between">
                                        <img src="{{ asset($comment->user->profile_photo_path) }}" alt="avatar"
                                            class="img-notif">
                                        <h6>{{ $comment->user->full_name }}</h6>
                                    </div>
                                    <div>
                                        <div>
                                            <i class="fa fa-circle text-success smFont"></i>
                                            <p class="d-inline">{{ $comment->body }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @empty
                            <li class="list-group-item list-group-item-action py-0">
                                <div class="media align-items-center">
                                    <div class="media-body d-flex justify-content-between align-items-center">
                                        <h6>نظر جدیدی برای نمایش وجود ندارد</h6>
                                    </div>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="userAvatar pointer position-ralative">
                    <img src="asset/images/avatar-3.jpg" alt="avatar" class="img-notif">
                    <span>محمد رحمتی</span>
                    <span><i class="fa fa-sort-down"></i></span>
                </div>
                <div class="userConfig mt-2 d-none">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action py-1 px-2">
                            <i class="fa fa-cog"></i> تنظیمات
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-1 px-2">
                            <i class="fa fa-user"></i> کاربر
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-1 px-2">
                            <i class="fa fa-envelope"></i> پیام ها
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-1 px-2">
                            <i class="fa fa-lock"></i> قفل صفحه
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-1 px-2">
                            <i class="fa fa-sign-out-alt"></i> خروج
                        </a>
                    </div>
                </div>
            </div>
        </div>
</header>