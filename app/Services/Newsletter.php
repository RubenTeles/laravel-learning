<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;
use function config;

class Newsletter
{
	public function subscribe (string $email, string $list = null)
	{
		if ($list == null)
		{
			$list = config('services.mailchimp.lists.subscribers');
		}

		return $this->client()->lists->addListMember($list, [
			'email_address' => $email,
			'status' => 'subscribed'
		]);
	}

	protected function client()
	{
		$mailchimp = new ApiClient();

		return $mailchimp->setConfig([
			'apiKey' => config('services.mailchimp.key'),
			'server' => 'us12'
		]);
	}
}
