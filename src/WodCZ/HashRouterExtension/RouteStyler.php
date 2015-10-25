<?php


namespace WodCZ\HashRouterExtension;


use Hashids\Hashids;
use Nette\Application\Routers\Route;

class RouteStyler
{


	/**
	 * @var \Hashids\Hashids
	 */
	private $hashids;



	public function __construct(Hashids $hashids)
	{
		$this->hashids = $hashids;
	}



	public function addStyles(array $styles)
	{
		foreach ($styles as $style) {
			Route::$styles[$style] = [
				Route::PATTERN => '[a-zA-Z0-9]+',
				Route::FILTER_IN => [$this, 'filterIn'],
				Route::FILTER_OUT => [$this, 'filterOut']
			];
		}
	}



	public function filterIn($in)
	{
		if (count(($decoded = $this->hashids->decode($in))) > 0) {
			return $decoded[0];
		}
		return NULL;
	}



	public function filterOut($out)
	{
		return $this->hashids->encode($out);
	}
}
