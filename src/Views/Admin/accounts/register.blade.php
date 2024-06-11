@extends('layouts.master')

@section('title')
    Register
@endsection

@section('wrapper')
    <body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Đăng ký</h1>
                            </div>
                            <form action="" method="post" class="formRegister">
                                @if(!empty($errEmail))
                                    <div class="alert alert-danger">
                                        {{ $errEmail }}
                                    </div>
                                @else
                                    @if(!empty($successRegister))
                                        <div class="alert alert-success">
                                            {{ $successRegister }}
                                        </div>
                                    @endif
                                @endif
                                <div class="form-group" style="margin: 24px 0; position: relative">
                                    <input value="{{ !empty($_POST['name']) ? $_POST['name'] : "" }}" type="text" name="name" class="form-control form-control-user inputRegister" id="exampleFirstName"
                                           placeholder="Họ và tên...">
                                    <span class="errIndex"></span>
                                </div>
                                <div class="form-group" style="margin: 24px 0; position: relative">
                                    <input value="{{ !empty($_POST['name']) ? $_POST['email'] : "" }}" type="text" name="email" class="form-control form-control-user inputRegister" id="exampleInputEmail"
                                           placeholder="Email...">
                                    <span class="errIndex"></span>
                                </div>
                                <div class="form-group" style="margin: 24px 0; position: relative">
                                    <input value="{{ !empty($_POST['name']) ? $_POST['password'] : "" }}" type="password" class="form-control form-control-user inputRegister"
                                           id="exampleInputPassword" name="password" placeholder="Mật khẩu...">
                                    <span class="errIndex"></span>
                                </div>
                                <input style="margin-top: 27px;" type="submit" class="btn btn-primary btn-user btn-block" value="Đăng ký">
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Đăng ký bằng Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Đăng ký bằng Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/auth/forgot-password">Quên mật khẩu?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/auth/login">Bạn đã có tài khoản? Đăng nhập!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        const formLogin = document.querySelector('.formRegister');
        formLogin.onsubmit = function(event) {
            const inputElements = document.querySelectorAll('.inputRegister');
            const errIndex = document.querySelectorAll('.errIndex');
            let isError = false;

            errIndex.forEach(e => {
                e.textContent = '';
            })

            inputElements.forEach(function(input, index) {
                if(!input.value.trim()) {
                    input.focus();
                    errIndex[index].textContent = "Vui lòng nhập trường này";
                    isError = true;
                } else {
                    if (input.getAttribute('name') === 'email') {
                        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailPattern.test(input.value)) {
                            input.focus();
                            errIndex[index].textContent = 'Email không hợp lệ';
                            isError = true;
                        }
                    }

                    if(input.getAttribute('name') === 'password') {
                        if(input.value.length < 6) {
                            input.focus();
                            errIndex[index].textContent = 'Mật khẩu phải lớn hơn 6 kí tự';
                            isError = true;
                        }
                    }
                }

            })

            if(isError) {
                event.preventDefault();
            }
        };

    </script>
    </body>
@endsection