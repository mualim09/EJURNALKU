
@extends('siswa.mains')
@section('contents')


    <!DOCTYPE html>
    <html class="no-js" lang="zxx">

    <body>
        <!--==================================*
                   Main Content Section
        *====================================-->
        <div class="main-content page-content">
            <!--==================================*
                       Main Section
            *====================================-->
            <div class="main-content-inner">
                <div class="profile_page">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cover-profile">
                                <div class="profile-bg-img"
                                    style="background: url('{{ asset('quinte/rtsolutz.com/raven/demo-quinte/quinte-html/light-sidebar/images/lock-bg.jpg') }}') no-repeat;"
                                    scr="{{ asset('quinte/rtsolutz.com/raven/demo-quinte/quinte-html/light-sidebar/images/lock-bg.jpg') }}">
                                    <div class="card-block user-info">
                                        <div class="col-md-12">
                                            <div class="media-left">
                                                <a href="#" class="profile-image">
                                                    <img class="user-img img-radius"
                                                        src="{{ asset('fotodudi/' . Auth::user()->foto) }}" width="155px"
                                                        height="155px" alt="user-img">
                                                </a>
                                            </div>
                                            <div class="media-body row">
                                                <div class="col-lg-12">
                                                    <div class="user-title">
                                                        <h2>{{ Auth()->user()->name }}</h2>
                                                        <span class="text-white">Profile {{ Auth()->user()->role }}</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="pull-right cover-btn">
                                                        <!-- <a type="button" href="/editprofiles" class="btn btn-light"><i class="icofont icofont-ui-messaging"></i> Simpan Update </a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (auth()->user()->role == 'Dudi')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-header card mb-4">
                                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab"
                                                aria-expanded="true">Informasi Pribadi</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="personal" role="tabpanel" aria-expanded="true">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card_title mb-0">Update Profile</h5>
                                            </div>
                                            <div class="card-block">
                                                <div class="view-info">
                                                    <div class="general-info">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-xl-12">
                                                                <div class="table-responsive">
                                                                    <form class="col s12" action="/updatepassworddudi"
                                                                        method="POST">
                                                                        @csrf
                                                                        <!-- email -->

                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1" class="form-label"><h6>Password Lama</h6></label>
                                                                                <input type="password" class="form-control" name="current_password" id="current_password" value="">
                                                                                <div class="invalid-feedback">
                                                                                    Please enter email
                                                                                </div>
                                                                                @error('current_password')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="mb-3">
                                                                            <label for="exampleFormControlInput1" class="form-label"><h6>Password Baru</h6></label>
                                                                                <input type="password" class="form-control" name="password" id="password" value="">
                                                                                <div class="invalid-feedback">
                                                                                    Please enter email
                                                                                </div>
                                                                                @error('password')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="exampleFormControlInput1" class="form-label"><h6>Konfirmasi Password Baru</h6></label>
                                                                                    <input type="password" class="form-control" name="password_confirmation" id="password" value="">
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter email
                                                                                    </div>
                                                                                    @if($errors->any('password_confirmation'))
                                                                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                                                    @endif
                                                                                    @if($errors->any('password'))
                                                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                                                    @endif
                                                                                </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update Profile</button>&nbsp
                                <a href="/profil" class="btn btn-danger mb-10">Kembali</a>
                                </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                    @if (auth()->user()->role == 'Guru')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-header card mb-4">
                                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab"
                                                aria-expanded="true">Informasi Pribadi</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="personal" role="tabpanel" aria-expanded="true">
                                        <div class="card mb-4">
                                            <div class="card-header">
                                                <h5 class="card_title mb-0">Update Profile</h5>
                                            </div>
                                            <div class="card-block">
                                                <div class="view-info">
                                                    <div class="general-info">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-xl-12">
                                                                <div class="table-responsive">

                                                                    <form class="col s12" action="/updatepasswordguru"
                                                                        method="POST">
                                                                        @csrf
                                                                        <!-- email -->
                                                                        <div class="mb-3">
                                                                            <label for="exampleFormControlInput1" class="form-label"><h6>Password Lama</h6></label>
                                                                                <input type="password" class="form-control" name="current_password" id="current_password" value="">
                                                                                <div class="invalid-feedback">
                                                                                    Please enter email
                                                                                </div>
                                                                                @error('current_password')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="mb-3">
                                                                            <label for="exampleFormControlInput1" class="form-label"><h6>Password Baru</h6></label>
                                                                                <input type="password" class="form-control" name="password" id="password" value="">
                                                                                <div class="invalid-feedback">
                                                                                    Please enter email
                                                                                </div>
                                                                                @error('password')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="exampleFormControlInput1" class="form-label"><h6>Konfirmasi Password Baru</h6></label>
                                                                                    <input type="password" class="form-control" name="password_confirmation" id="password" value="">
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter email
                                                                                    </div>
                                                                                    @if($errors->any('password_confirmation'))
                                                                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                                                    @endif
                                                                                    @if($errors->any('password'))
                                                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                                                    @endif
                                                                                </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update Profile</button>&nbsp
                                <a href="/profil" class="btn btn-danger mb-10">Kembali</a>
                                </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                    @if (auth()->user()->role == 'Siswa')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-header card mb-4">
                                <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#personal" role="tab" aria-expanded="true">Informasi Pribadi</a>
                                        <div class="slide"></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="personal" role="tabpanel" aria-expanded="true">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h5 class="card_title mb-0">{{Auth()->user()->name}} Profile Pages</h5>
                                        </div>
                                        <div class="card-block">
                                            <div class="view-info">
                                                <div class="general-info">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-6">
                                                            <div class="table-responsive">
                                                                <table class="table m-0">
                                                                    <tbody>
                                                                        <form class="col s12" action="/updatepasswordsiswa" method="POST">
                                                                            @csrf
                                                                            <!-- email -->
                                                                            <div class="mb-3">
                                                                            <label for="exampleFormControlInput1" class="form-label"><h6>Password Lama</h6></label>
                                                                                <input type="password" class="form-control" name="current_password" id="current_password" value="">
                                                                                <div class="invalid-feedback">
                                                                                    Please enter email
                                                                                </div>
                                                                                @error('current_password')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="mb-3">
                                                                            <label for="exampleFormControlInput1" class="form-label"><h6>Password Baru</h6></label>
                                                                                <input type="password" class="form-control" name="password" id="password" value="">
                                                                                <div class="invalid-feedback">
                                                                                    Please enter email
                                                                                </div>
                                                                                @error('password')
                                                                                <div class="text-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="mb-3">
                                                                            <label for="exampleFormControlInput1" class="form-label"><h6>Konfirmasi Password Baru</h6></label>
                                                                                <input type="password" class="form-control" name="password_confirmation" id="password" value="">
                                                                                <div class="invalid-feedback">
                                                                                    Please enter email
                                                                                </div>
                                                                                @if($errors->any('password_confirmation'))
                                                                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                                                @endif
                                                                                @if($errors->any('password'))
                                                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                                                                @endif
                                                                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update Profile</button>&nbsp
                                <a href="/profil" class="btn btn-danger mb-10">Kembali</a>
                                </div>
                        </form>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
        @endif

        </div>
        </div>
        <!--==================================*
                       End Main Section
            *====================================-->
        </div>
        <!--=================================*
               End Main Content Section
        *=====================                            ==============-->

        <!--=================================*
                      Footer Section
        *===================================-->
        <footer>
            <div class="footer-area">
                <p>&copy; 2023. J | On Crafted with by RQTeams.</p>
            </div>
        </footer>
        <!--=================================*
                    End Footer Section
        *===================================-->

        </div>
        <!--=========================*
            End Page Container
    *===========================-->

        <!--=========================*
          Offset Sidebar Menu
    *===========================-->
        <div class="offset-area">
            <div class="offset-close"><i class="ti-close"></i></div>
            <ul class="nav offset-menu-tab">
                <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
                <li><a data-toggle="tab" href="#settings">Settings</a></li>
            </ul>
            <div class="offset-content tab-content">
                <div id="activity" class="tab-pane fade in show active">
                    <div class="recent-activity">
                        <div class="timeline-task">
                            <div class="icon bg_secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true" data-reactid="781">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                            </div>
                            <div class="timeline_title">
                                <h4>You got 1 New Message</h4>
                                <span class="time"><i class="ti-time"></i>09:35</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                            </p>
                        </div>
                        <div class="timeline-task">
                            <div class="icon bg_success">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <div class="timeline_title">
                                <h4>Your Verification Successful</h4>
                                <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur.
                            </p>
                        </div>
                        <div class="timeline-task">
                            <div class="icon bg_danger">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <path
                                        d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                                    </path>
                                    <line x1="12" y1="9" x2="12" y2="13"></line>
                                    <line x1="12" y1="17" x2="12" y2="17"></line>
                                </svg>
                            </div>
                            <div class="timeline_title">
                                <h4>Something Went Wrong</h4>
                                <span class="time"><i class="ti-time"></i>09:20 Am</span>
                            </div>
                        </div>
                        <div class="timeline-task">
                            <div class="icon bg_warning">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div class="timeline_title">
                                <h4>Member waiting for your Response</h4>
                                <span class="time"><i class="ti-time"></i>09:35</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                            </p>
                        </div>
                        <div class="timeline-task">
                            <div class="icon bg_info">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                            </div>
                            <div class="timeline_title">
                                <h4>You Deleted Jhon Doe</h4>
                                <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                            </p>
                        </div>
                    </div>
                </div>
                <div id="settings" class="tab-pane fade">
                    <div class="offset-settings">
                        <h4>General Settings</h4>
                        <div class="settings-list">
                            <div class="settings_sec">
                                <div class="setting_list_title">
                                    <h5>Notifications</h5>
                                    <div class="ui_switch">
                                        <input type="checkbox" id="switch1" />
                                        <label for="switch1">Toggle</label>
                                    </div>
                                </div>
                                <p>Keep it 'On' When you want to get all the notification.</p>
                            </div>
                            <div class="settings_sec">
                                <div class="setting_list_title">
                                    <h5>Show recent activity</h5>
                                    <div class="ui_switch">
                                        <input type="checkbox" id="switch2" />
                                        <label for="switch2">Toggle</label>
                                    </div>
                                </div>
                                <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                            </div>
                            <div class="settings_sec">
                                <div class="setting_list_title">
                                    <h5>Show your emails</h5>
                                    <div class="ui_switch">
                                        <input type="checkbox" id="switch3" />
                                        <label for="switch3">Toggle</label>
                                    </div>
                                </div>
                                <p>Show email so that easily find you.</p>
                            </div>
                            <div class="settings_sec">
                                <div class="setting_list_title">
                                    <h5>Show Task statistics</h5>
                                    <div class="ui_switch">
                                        <input type="checkbox" id="switch4" />
                                        <label for="switch4">Toggle</label>
                                    </div>
                                </div>
                                <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================================*
             End Offset Sidebar Menu
    *==================================-->
    </body>

    <!-- Mirrored from rtsolutz.com/raven/demo-quinte/quinte-html/light-sidebar/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 10:25:09 GMT -->

    </html>
@endsection
