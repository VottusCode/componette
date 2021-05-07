<?php declare(strict_types = 1);

namespace App\Model\WebServices\Git\Gitlab;

use App\Model\Exceptions\Runtime\WebServices\GitException;
use Contributte\Http\Curl\CurlClient;
use Contributte\Http\Curl\Response;

final class GitlabClient
{
	
	public const VERSION = 'v4';
	public const URL_API = 'https://gitlab.com';
	public const URL_CONTENT = self::URL_API . "/uploads/-/";
	
	/** @var CurlClient */
	private CurlClient $curl;
	
	/** @var string */
	private string $token;
	
	public function __construct(CurlClient $curl, string $token)
	{
		$this->curl = $curl;
		$this->token = $token;
	}
	
	public function getApiUrl(string $uri): string
	{
		return self::URL_API . '/' . trim($uri, '/');
	}
	
	public function getAvatarUrl(string $id): string
	{
		return self::getContentUrl("system/user/avatar/" . trim($id, '/') . '/avatar.png');
	}
	
	public function getContentUrl(string $uri): string
	{
		return self::URL_CONTENT . '/' . trim($uri, '/');
	}
	
	/**
	 * @param string[] $headers
	 * @param string[] $opts
	 */
	public function makeRequest(string $url, array $headers = [], array $opts = []): Response
	{
		if ($this->token) {
			$headers['Authorization'] = 'Bearer ' . $this->token;
		}
		
		$response = $this->curl->makeRequest($url, $headers, $opts);
		
		if ($response->getStatusCode() > 400) {
			throw new GitException($response);
		}
		
		return $response;
	}
	
}
