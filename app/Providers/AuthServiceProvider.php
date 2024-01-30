<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verifikasi Email')
                ->greeting('Hallo IN DE Mates')
                ->line('Terima kasih telah bergabung dengan platform IN DE KOS!')
                ->line('Klik tombol di bawah untuk memverifikasi alamat email Anda.')
                ->action('Verifikasi Email', $url)
                ->line('Jika Anda tidak melakukan registrasi, abaikan pesan ini.')
                ->line('Terimakasih telah menggunakan layanan website kami')
                ->salutation('Hormat kami, IN DE KOS');
        });
    }

}
