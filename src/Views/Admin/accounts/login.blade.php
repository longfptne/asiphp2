@extends('layouts.master')

@section('title')
    Login
@endsection

@section('wrapper')
    <body class="bg-gradient-primary">
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Đăng Nhập</h1>
                                        </div>
                                        <form action="" class="formLogin" method="post">
                                            @if(!empty($errAccount))
                                                <div class="alert alert-danger">
                                                    {{ $errAccount }}
                                                </div>
                                            @endif
                                            <div style="margin: 24px 0; position: relative; margin-bottom: 12px">
                                                <input type="text" class="form-control form-control-user inputElement"
                                                       id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                       value="{{ !empty($_POST['email']) ? $_POST['email'] : "" }}"
                                                       placeholder="Email">
                                                <span class="errIndex"></span>
                                            </div>
                                            <div class="form-group" style="margin: 22px 0; position: relative">
                                                <input type="password" name="password" class="form-control form-control-user inputElement"
                                                       id="exampleInputPassword" value="{{ !empty($_POST['password']) ? $_POST['password'] : "" }}"
                                                       placeholder="Mật khẩu">
                                                <span class="errIndex"></span>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Ghi nhớ thông tin</label>
                                                </div>
                                            </div>
                                            <input type="submit" name="login" class="btn btn-primary btn-user btn-block" value="Đăng nhập">

                                            <hr>
                                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                                <i class="fab fa-google fa-fw"></i> Đăng nhập bằng Google
                                            </a>
                                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                                <i class="fab fa-facebook-f fa-fw"></i> Đăng nhập bằng Facebook
                                            </a>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="/auth/forgot-password">Quên mật khẩu?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="/auth/register">Tạo tài khoản mới!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <script>
            const formLogin = document.querySelector('.formLogin');
            formLogin.onsubmit = function(event) {
                const inputElements = document.querySelectorAll('.inputElement');
                const errIndex = document.querySelectorAll('.errIndex');
                let isError = false;

                errIndex.forEach(e => {
                    e.textContent = '';
                })

                inputElements.forEach(function(input, index) {
                    if(!input.value.trim()) {
                        input.focus();
                        errIndex[index].textContent = "Vui lòng nhập trường này ";
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
                    }
                })

                if(isError) {
                    event.preventDefault();
                }
            };

        </script>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

    </body>
@endsection