<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center my-5">
            Đăng Ký
        </h1>

        <form action="{{ route('register.post') }}" method="post" class="w-50 m-auto">
            @csrf

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <div class="form-group mb-3">
                <label for="name">Họ Và Tên</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                <span class="text-danger">
                    @error('name')
                    {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                <span class="text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group mb-3">
                <label for="password">Mật Khẩu</label>
                <input type="password" name="password" id="password" class="form-control">
                <span class="text-danger">
                    @error('password')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="form-group mb-3">
                <label for="password_confirmation">Nhập Lại Mật Khẩu</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                <span class="text-danger">
                    @error('password_confirmation')
                    {{$message}}
                    @enderror
                </span>
            </div>


            <div class="form-group my-3">
                <button type="submit" class="btn btn-primary">Đăng Nhập</button>
            </div>
        </form>
    </div>
</body>

</html>