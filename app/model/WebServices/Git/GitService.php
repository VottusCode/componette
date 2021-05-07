<?php declare(strict_types=1);

namespace App\Model\WebServices\Git;

use Contributte\Http\Curl\Response;

interface GitService
{
  /**
   * @param string[] $headers
   * @param mixed[] $opts
   */
  public function makeRequest(string $url, array $headers = [], array $opts = []): Response;
  
  /**
   * @param string[] $headers
   * @param string[] $opts
   */
  public function call(string $uri, array $headers = [], array $opts = []): Response;
  
  /**
   * @param string[] $headers
   * @param string[] $opts
   * @return Response[]
   */
  public function aggregate(string $url, array $headers = [], array $opts = []): array;
  
  /**
   * @return string[][]
   */
  public function parsePages(string $link): array;
  
  public function repo(string $author, string $repo): Response;
  
  public function readme(string $author, string $repo, ?string $mediatype = null): Response;
  
  public function content(string $author, string $repo, string $path, ?string $mediatype = null): Response;
  
  public function download(string $filename): Response;
  
  public function composer(string $author, string $repo): Response;
  
  public function bower(string $author, string $repo): Response;
  
  public function releases(string $author, string $repo, ?int $page = null): Response;
  
  /**
   * @return Response[]
   */
  public function allReleases(string $author, string $repo, ?string $mediatype = null): array;
  
  public function stargazers(string $author, string $repo): Response;
  
  public function user(string $author): Response;
  
  public function avatar(string $author, bool $content = true): Response;
  
  public function limit(): Response;
}
