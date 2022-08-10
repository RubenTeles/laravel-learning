<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;
use function config;

class MailchimpNewsletter implements Newsletter
{
	public function __construct(protected ApiClient $client)
	{
		//
	}

	public function subscribe (string $email, string $list = null)
	{
		if ($list == null)
		{
			$list = config('services.mailchimp.lists.subscribers');
		}

		return $this->client->lists->addListMember($list, [
			'email_address' => $email,
			'status' => 'subscribed'
		]);
	}
}
