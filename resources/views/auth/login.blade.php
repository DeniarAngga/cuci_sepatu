<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
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
            max-width: 900px;
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .left,
        .right {
            flex: 1 1 300px;
            padding: 20px;
        }

        .left {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .left img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        /* Perubahan warna putih ke hitam */
        .invert-logo {
            filter: invert(1) grayscale(1);
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

        .right input {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .right button {
            padding: 15px;
            background-color: #3E5666;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
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
            margin-bottom: 20px;
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

        .alert-success,
        .alert-error {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            border: 1px solid;
            opacity: 1;
            transition: opacity 0.5s ease-out;
        }

        .alert-success {
            color: green;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-error {
            color: red;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .fade-out {
            opacity: 0;
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
            <img src="user/img/logo3.png" alt="Sneakers Hanging" class="invert-logo" />
        </div>
        <div class="right">
            {{-- Pesan Sukses --}}
            @if (session('success'))
                <div class="alert-success" id="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Pesan Error --}}
            @if (session('error'))
                <div class="alert-error" id="alert-error">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Validasi Form --}}
            @if ($errors->any())
                <div class="alert-error" id="alert-validation">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="logo">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h2>DENSHOES CLEANING</h2>
                </div>
                <h1>Login</h1>
                <input name="email" placeholder="Masukkan email" type="email" required />
                <input name="password" placeholder="Password" type="password" required />
                <button type="submit">Login</button>
                <a href="{{ route('register') }}">Belum punya akun? Registrasi akun</a>
            </form>
        </div>
    </div>

    <script>
        // Auto-hide alerts after 3 seconds
        setTimeout(() => {
            const alerts = ['alert-success', 'alert-error', 'alert-validation'];
            alerts.forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    el.classList.add('fade-out');
                    setTimeout(() => el.style.display = 'none', 500);
                }
            });
        }, 3000);
    </script>
</body>

</html>
