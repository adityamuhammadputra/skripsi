@component('mail::message')
# Activasi Akun kamu

Terimakasih telah bergabung, Silahkan klik tombol dibawah ini untuk aktivasi akun.

@component('mail::button', ['url' => route('auth.activate',[
                'token' => $user->activation_token,
                'email' => $user->email
            ])
        ])
    Klik Tombol ini untuk Aktivasi
@endcomponent

Thanks,<br>
Selamat bahagia
@endcomponent
