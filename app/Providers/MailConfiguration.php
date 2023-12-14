<?php

namespace  App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use App\Models\MailSetting;

class MailConfiguration extends ServiceProvider {

    public function boot(){
        $mailConfig = $this->fetchFromDatabase();
        if ($mailConfig) {
            config([
                'mail.mailers.smtp.host' => $mailConfig->smtp_server,
                'mail.mailers.smtp.port' => $mailConfig->smtp_port,
                'mail.mailers.smtp.username' => $mailConfig->smtp_email,
                'mail.mailers.smtp.password' => $mailConfig->smtp_password,
                'mail.mailers.smtp.encryption' => 'tls',
                // Set other mail configurations as needed
            ]);
        }
    }
    public function fetchFromDatabase(){
        return MailSetting::where('status', '1')->first();
    }


}
