@extends('layouts.app')

@section('title', 'Page Register')
@section('style_background')
    background-image: url(https://img.freepik.com/premium-photo/blurred-motion-blue-abstract-background-with-lines_371174-1261.jpg);
    background-repeat: no-repeat;
    background-size: cover;
@endsection
@section('content')
    <section class="vh-100 container">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://cdni.iconscout.com/illustration/free/thumb/free-sign-up-form-4575543-3798675.png"
                         class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    <form class="mx-1 mx-md-4" action="{{ route('register') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="mb-3">
                            <div class="align-items-center d-flex flex-row ">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0 w-100">
                                    <input name="name" type="text" id="form3Example1c" value="{{ old('name') }}"
                                           class="form-control {{ $errors->has('email') ? '!border-danger focus-visible:outline-danger' : '' }}"
                                           placeholder="Tên của bạn"/>
                                </div>
                            </div>
                            @if ($errors->has('name'))
                                <span class="text-danger mx-4">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <div class="d-flex flex-row align-items-center">
                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0 w-100">
                                    <input name="email" type="email" id="form3Example3c" value="{{ old('email') }}"
                                           class="form-control {{ $errors->has('email') ? '!border-danger focus-visible:outline-danger' : '' }}"
                                           placeholder="Email của bạn"/>
                                </div>
                            </div>
                            @if ($errors->has('email'))
                                <span class="text-danger mx-4">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <div class="d-flex flex-row align-items-center">
                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0 w-100">
                                    <input name="password" type="password" id="form3Example4c"
                                           class="form-control {{ $errors->has('password') ? '!border-danger focus-visible:outline-danger' : '' }}"
                                           placeholder="Mật khẩu"/>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger mx-4">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <div class="d-flex flex-row align-items-center">
                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0 w-100">
                                    <input name="repeat_pass" type="password" id="form3Example4cd"
                                           class="form-control {{ $errors->has('password') ? '!border-danger focus-visible:outline-danger' : '' }}"
                                           placeholder="Nhập lại mật khẩu"/>
                                </div>
                            </div>
                            @if ($errors->has('repeat_pass'))
                                <span class="text-danger mx-4">{{ $errors->first('repeat_pass') }}</span>
                            @endif
                        </div>

                        <div class="form-check d-flex mb-5">
                            <input name="agree" class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required/>
                            <label class="form-check-label" for="form2Example3">
                                I agree all statements in <a href="#!">Terms of service</a>
                            </label>
                        </div>

                        <div class="d-flex justify-content-center mx-4">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>

                        <div class="text-center text-lg-start pt-2">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
                                <a href="{{ route('login') }}" class="link-danger">Login</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
