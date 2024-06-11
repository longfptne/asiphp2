@extends('layouts.master')

@section('title')
    Tài khoản của tôi
@endsection

@section('content')

    <section>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-title">Tài khoản của tôi</h1>
                </div>
            </div>
            <div style="display: grid; grid-template-columns: repeat(2, 1fr);" class="d-md-grid">
                <a class="me-4 thumbnail">
                    <img src="/assets/client/assets/img/post-sq-3.jpg" alt="" class="img-fluid">
                </a>
                <div class="ps-md-5 mt-4 mt-md-0" style="border: 1px solid #aaa;padding: 31px 0;padding-right: 45px;border-radius: 8px;">
                    <form class="formProfile" action="" method="post">
                        @if(!empty($_SESSION['success']))
                            <div class="alert alert-success">
                                <i class="fa-solid fa-circle-check"></i>
                                {{ $_SESSION['success'] }}
                            </div>
                        @endif
                        @php
                            unset($_SESSION['success']);
                        @endphp
                        <div style="position: relative" class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="exampleFormControlInput1" class="form-label">Họ và tên</label>
                                <input type="text" name="name" value="{{ $userId['name'] }}" class="form-control form-control-user inputProfile" id="exampleFirstName"
                                       placeholder="Họ và tên...">
                            </div>
                            <span class="errProfile"></span>
                        </div>
                        <br>
                        <div style="position: relative" class="form-group">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="text" name="email" value="{{ $userId['email'] }}" class="form-control form-control-user inputProfile" id="exampleInputEmail"
                                   placeholder="Email...">
                            <span class="errProfile"></span>
                        </div>
                        <br>
                        <div style="position: relative" class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label for="exampleFormControlInput1" class="form-label">Mật khẩu</label>
                                <input type="password" name="password" value="{{ $userId['password'] }}" class="form-control form-control-user inputProfile"
                                       id="exampleInputPassword" placeholder="Mật khẩu...">
                            </div>
                            <span class="errProfile"></span>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Lưu
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
