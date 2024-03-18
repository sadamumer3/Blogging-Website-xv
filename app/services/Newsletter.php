<?php


namespace App\services;


use MailchimpMarketing\ApiClient;

class Newsletter
{

    public function main()
    {
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us6'
        ]);

        return $mailchimp;

    }

    public function ping()
    {

        $mailchimp = $this->main();

        $response = $mailchimp->ping->get();

        return $response;

    }
    public function subscribe(string $email, string $list = null)
    {
        //  this " ??= " is "Null Safe" operator.
        $list ??=config('services.mailchimp.lists.subscriber');


        $mailchimp = $this->main();

        $response = $mailchimp->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);



        return $response;
    }

}
