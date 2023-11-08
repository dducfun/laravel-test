@extends('admin.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('admin.content')
    @include('admin.layouts.navbars.auth.topnav', ['title' => 'Profile'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ !empty($data['url_profile']) ? $data['url_profile'] : '' }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ !empty($data['firstname']) ? $data['firstname'] : '' }}
                        </h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                    <i class="ni ni-app"></i>
                                    <span class="ms-2">App</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="ni ni-email-83"></i>
                                    <span class="ms-2">Messages</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span class="ms-2">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <form role="form" method="POST" action="{{ route('admin.profile') }}">
            @csrf
            @method('post')
            <input class="form-control" name="item[id]" type="hidden" value="{{ !empty($data['id']) ? $data['id'] : '' }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Username</label>
                                        <input class="form-control" name="item[username]" type="text" value="{{ !empty($data['username']) ? $data['username'] : '' }}">
                                        @error('item[username]') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" name="item[email]" type="email" value="{{ !empty($data['email']) ? $data['email'] : '' }}">
                                        @error('item[email]') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">First name</label>
                                        <input class="form-control" name="item[firstname]" type="text" value="{{ !empty($data['firstname']) ? $data['firstname'] : '' }}">
                                        @error('item[firstname]') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email verified at</label>
                                        <input class="form-control" name="item[email_verified]" type="email" value="{{ !empty($data['email_verified']) ? $data['email_verified'] : '' }}">
                                        @error('item[email_verified]') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                            </div>

                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Contact Information</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Address</label>
                                        <input class="form-control" type="text" name="item[address]"
                                               value="{{ !empty($data['address']) ? $data['address'] : '' }}">
                                        @error('item[address]') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">City</label>
                                        <input class="form-control" type="text" name="item[city]"
                                               value="{{ !empty($data['city']) ? $data['city'] : '' }}">
                                        @error('item[city]') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Country</label>
                                        <input class="form-control" type="text" name="item[country]"
                                               value="{{ !empty($data['country']) ? $data['country'] : '' }}">
                                        @error('item[country]') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Postal code</label>
                                        <input class="form-control" type="text" name="item[postal_code]"
                                               value="{{ !empty($data['postal_code']) ? $data['postal_code'] : '' }}">
                                        @error('item[postal_code]') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                            </div>

                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">About me</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">About me</label>
                                        <input class="form-control" type="text" name="item[about_me]"
                                               value="{{ !empty($data['about_me']) ? $data['about_me'] : '' }}">
                                        @error('item[about_me]') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                </div>
                            </div>

                            <hr class="horizontal dark">
                            <div class="row w-10 m-auto">
                                <button type="submit" class="form-control btn btn-outline-primary">Submit Form</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{--            <div class="col-md-4">--}}
                {{--                <div class="card card-profile">--}}
                {{--                    <img src="/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">--}}
                {{--                    <div class="row justify-content-center">--}}
                {{--                        <div class="col-4 col-lg-4 order-lg-2">--}}
                {{--                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">--}}
                {{--                                <a href="javascript:;">--}}
                {{--                                    <img src="/img/team-2.jpg"--}}
                {{--                                        class="rounded-circle img-fluid border border-2 border-white">--}}
                {{--                                </a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">--}}
                {{--                        <div class="d-flex justify-content-between">--}}
                {{--                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>--}}
                {{--                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i--}}
                {{--                                    class="ni ni-collection"></i></a>--}}
                {{--                            <a href="javascript:;"--}}
                {{--                                class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>--}}
                {{--                            <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i--}}
                {{--                                    class="ni ni-email-83"></i></a>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="card-body pt-0">--}}
                {{--                        <div class="row">--}}
                {{--                            <div class="col">--}}
                {{--                                <div class="d-flex justify-content-center">--}}
                {{--                                    <div class="d-grid text-center">--}}
                {{--                                        <span class="text-lg font-weight-bolder">22</span>--}}
                {{--                                        <span class="text-sm opacity-8">Friends</span>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="d-grid text-center mx-4">--}}
                {{--                                        <span class="text-lg font-weight-bolder">10</span>--}}
                {{--                                        <span class="text-sm opacity-8">Photos</span>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="d-grid text-center">--}}
                {{--                                        <span class="text-lg font-weight-bolder">89</span>--}}
                {{--                                        <span class="text-sm opacity-8">Comments</span>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="text-center mt-4">--}}
                {{--                            <h5>--}}
                {{--                                Mark Davis<span class="font-weight-light">, 35</span>--}}
                {{--                            </h5>--}}
                {{--                            <div class="h6 font-weight-300">--}}
                {{--                                <i class="ni location_pin mr-2"></i>Bucharest, Romania--}}
                {{--                            </div>--}}
                {{--                            <div class="h6 mt-4">--}}
                {{--                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer--}}
                {{--                            </div>--}}
                {{--                            <div>--}}
                {{--                                <i class="ni education_hat mr-2"></i>University of Computer Science--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
            </div>
        </form>
        @include('admin.layouts.footers.auth.footer')
    </div>
@endsection
