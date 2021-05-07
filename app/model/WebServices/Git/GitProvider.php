<?php declare(strict_types = 1);

namespace App\Model\WebServices\Git;

use App\Model\Exceptions\Runtime\WebServices\InvalidGitException;
use Nette\DI\Container;

/**
 * This class exists to provide a specific GitService implementation
 * (eg. GithubService)
 */
class GitProvider
{
	private Container $container;
	
	public function __construct(Container $container)
	{
		$this->container = $container;
	}
	
	/**
	 * Get GitService by git name
	 * @param string $gitName
	 * @return GitService
	 */
	public function provideGitService(string $gitName): GitService
	{
		$className = "App\\Model\\WebServices\\Git\\$gitName\\$gitName" . "Service";
		
		if (!class_exists($className)) {
			throw new InvalidGitException("Specified Git is not supported.");
		}
		
		/** @var GitService $service */
		$service = $this->container->getService($className);
		
		if (!($service instanceof GitService)) {
			throw new InvalidGitException("Specified Git does not implement " . GitService::class);
		}

		return $service;
	}
	
}
