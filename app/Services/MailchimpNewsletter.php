<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;
use App\Services\Newsletter;

Class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client)
    {

    }

    public function submit(String $email, String $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');
        
        return $this->client->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
}