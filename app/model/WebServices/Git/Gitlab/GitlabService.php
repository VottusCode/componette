<?php declare(strict_types = 1);

namespace App\Model\WebServices\Git\Gitlab;

use App\Model\Exceptions\Runtime\WebServices\GitException;
use App\Model\WebServices\Git\GitService;
use Contributte\Http\Curl\Response;
use Nette\NotImplementedException;

final class GitlabService implements GitService
{
	
	/** @var GitlabClient */
	private GitlabClient $client;
	
	public function __construct(GitlabClient $client)
	{
		$this->client = $client;
	}
	
	/**
	 * @param string[] $headers
	 * @param mixed[] $opts
	 */
	public function makeRequest(string $url, array $headers = [], array $opts = []): Response
	{
		try {
			return $this->client->makeRequest($url, $headers, $opts);
		} catch (GitException $e) {
			$response = new Response();
			$response->setError($e);
			
			return $response;
		}
	}
	
	/**
	 * @param string[] $headers
	 * @param string[] $opts
	 */
	public function call(string $uri, array $headers = [], array $opts = []): Response
	{
		return $this->makeRequest($this->client->getApiUrl($uri), $headers, $opts);
	}
	
	/**
	 * @param string[] $headers
	 * @param string[] $opts
	 * @return Response[]
	 */
	public function aggregate(string $url, array $headers = [], array $opts = []): array
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	/**
	 * @return string[][]
	 */
	public function parsePages(string $link): array
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	/**
	 * @return string[]
	 */
	protected function mediatype(?string $mediatype): array
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	public function repo(string $author, string $repo): Response
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	public function readme(string $author, string $repo, ?string $mediatype = null): Response
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	public function content(string $author, string $repo, string $path, ?string $mediatype = null): Response
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	public function download(string $filename): Response
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	public function composer(string $author, string $repo): Response
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	public function bower(string $author, string $repo): Response
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	public function releases(string $author, string $repo, ?int $page = null): Response
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	/**
	 * @return Response[]
	 */
	public function allReleases(string $author, string $repo, ?string $mediatype = null): array
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	public function stargazers(string $author, string $repo): Response
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	public function user(string $author): Response
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	public function avatar(string $author, bool $content = true): Response
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
	public function limit(): Response
	{
		throw new NotImplementedException("Not implemented yet.");
	}
	
}
