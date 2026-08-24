<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
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
        // Custom Email Verification Link & Message
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            $verifyUrl = $url;
            if (str_starts_with($verifyUrl, 'http://')) {
                $verifyUrl = 'https://' . substr($verifyUrl, 7);
            }

            return (new MailMessage)
                ->subject('Verify Email Address - Cyclone Technologies')
                ->greeting('Hello ' . ($notifiable->name ?? 'Valued Customer') . '!')
                ->line('Thank you for creating an account with Cyclone Technologies.')
                ->line('Please click the button below to verify your email address and activate full access to your account.')
                ->action('Verify Email Address', $verifyUrl)
                ->line('If you did not create an account, no further action is required.')
                ->salutation("Best regards,\nCyclone Technologies Team");
        });

        // Custom Password Reset Link & Message
        ResetPassword::toMailUsing(function ($notifiable, $token) {
            $resetUrl = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            if (str_starts_with($resetUrl, 'http://')) {
                $resetUrl = 'https://' . substr($resetUrl, 7);
            }

            return (new MailMessage)
                ->subject('Reset Your Password - Cyclone Technologies')
                ->greeting('Hello ' . ($notifiable->name ?? 'Valued Customer') . '!')
                ->line('You are receiving this email because we received a password reset request for your account.')
                ->action('Reset Password', $resetUrl)
                ->line('This password reset link will expire in 60 minutes.')
                ->line('If you did not request a password reset, no further action is required.')
                ->salutation("Best regards,\nCyclone Technologies Team");
        });
    }
}
