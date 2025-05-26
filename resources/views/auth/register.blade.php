<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #3E5666;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 10px;
        }

        .container {
            background-color: white;
            width: 100%;
            max-width: 1000px;
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .left,
        .right {
            flex: 1 1 400px;
            padding: 10px;
        }

        .left {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .left img {
            width: 100%;
            max-width: 450px;
            border-radius: 10px;
            object-fit: cover;
        }

        .right {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right h1 {
            font-size: 2em;
            color: #3E5666;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-grid input,
        .form-grid textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
        }

        textarea[name="alamat"],
        input[name="password"],
        input[name="password_confirmation"] {
            grid-column: span 2;
        }

        .right button {
            width: 100%;
            padding: 12px;
            background-color: #3E5666;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            margin-top: 20px;
        }

        .right button:hover {
            background-color: #2c3e50;
        }

        .right a {
            text-align: center;
            display: block;
            margin-top: 10px;
            color: #3E5666;
            text-decoration: none;
        }

        .right a:hover {
            text-decoration: underline;
        }

        .logo {
            text-align: center;
            margin-bottom: 15px;
        }

        .logo h2 {
            font-size: 1.5em;
            color: #3E5666;
            margin: 0;
        }

        .logo .stars {
            color: #3E5666;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .right h1 {
                font-size: 1.5em;
            }

            .left img {
                max-width: 100%;
            }

            .container {
                padding: 10px;
            }

            .right button {
                font-size: 0.95em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <img src="{{ asset('user/img/logologinuser.png') }}" alt="Shoes Cleaning">
        </div>
        <div class="right">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="logo">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h2>DENSHOES CLEANING</h2>
                </div>
                <h1>Register</h1>

                <div class="form-grid">
                    <input name="name" placeholder="Nama Pemesan" type="text" required />
                    <input name="username" placeholder="Username" type="text" required />
                    <input name="email" placeholder="Email" type="email" required />
                    <input name="phone" placeholder="Nomor Handphone" type="text" required />
                    <textarea name="alamat" placeholder="Alamat Pemesan" type="text" required></textarea>
                    <input name="password" placeholder="Password" type="password" required />
                    <input name="password_confirmation" placeholder="Konfirmasi Password" type="password" required />
                </div>

                <button type="submit">Register</button>
                <a href="{{ route('login') }}">Sudah punya akun? Login</a>
            </form>

            @if ($errors->any())
                <div style="color: red; margin-top: 10px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
