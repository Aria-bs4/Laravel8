<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

Class Newsletter
{
    public function submit(String $email, String $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');
        
        return $this->client()->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }

    protected function client()
    {
        return (new ApiClient)->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us10'
        ]);
    }
}