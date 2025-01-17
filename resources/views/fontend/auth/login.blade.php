<div class="bg-light ">
    <div class="row ms-3  pt-3">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb container">
                <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đăng Nhập</li>
            </ol>
        </nav>

    </div>
</div>
</div>
<div class="container mb-5  ">
    <div class="col-md-4 offset-md-4 rounded-3 p-2 ">
        <h1 class="text-success fs-2 text-center mb-4">Đăng Nhập</h1>
        <div class="alert alert-danger" ng-show="isError">Thông tin tài khoản hoặc mật khẩu không chính xác!</div>
        <form method="POST" action="{{ route('auth.login') }}" novalidate>
            <div class="mb-3">
                <label for="" class="form-label">Email:*</label>
                <input type="text" class="form-control pt-2 pb-2" placeholder="Email Của bạn" name="email"
                    value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="error-message">
                        *{{ $errors->first('email') }}
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Mật Khẩu: *</label>
                <input type="password" class="form-control pt-2 pb-2" placeholder="Mật khẩu của bạn" name="password">
                @if ($errors->has('email'))
                    <span class="error-message">
                        *{{ $errors->first('email') }}
                    </span>
                @endif
            </div>
            <div class="mb-3 mt-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Lưu Thông Tin</label>
            </div>
            <div class="mb-3 mt-4">
                <button type="submit"
                    class="form-control pt-2 pb-2 btn-outline-success text-center fw-medium text-bg-success text-white btn-success mt-3"
                    id="2">Đăng Nhập</button>
            </div>
            <div class="mb-3 d-flex fz-14 justify-content-between">
                <a href="#" class=" text-hover">Quên Mật Khẩu?</a>
                <a href="#!signup" class="text-end text-hover">Đăng Ký Ngay?</a>
            </div>
            <div class="mb-3  fz-14 ">
                <div class="text-center m-3">
                    <span>Hoặc</span> <br>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="text-white bg-primary p-2 text-center " style="width: 140px;">
                        <i class="fa-brands fa-facebook-f"></i>
                        <a href="#" class="text-white ms-2">FaceBook</a>
                    </div>
                    <div class="text-white bg-danger p-2 text-center ms-3" style="width: 140px;">
                        <i class="fa-brands fa-google-plus-g"></i>

                        <a href="#" class="text-white ms-2">Google</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
