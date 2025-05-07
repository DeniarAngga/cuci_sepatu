<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Verifikasi Email</title>
</head>

<body>
    <h2>Halo, {{ $user->name }}</h2>
    <p>Terima kasih telah mendaftar. Klik tombol di bawah ini untuk verifikasi email Anda:</p>
    <p>
        <a href="{{ route('verify.email.submit', ['email' => $user->email]) }}"
            style="background-color:#3E5666; color:white; padding:10px 20px; 
            text-decoration:none;">Verifikasi Email
        </a>
    </p>
    <p>Jika Anda tidak merasa mendaftar, abaikan email ini.</p>
</body>

</html>



{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}
