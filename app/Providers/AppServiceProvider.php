<?php

namespace Recycle\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		$this->app->bind('Recycle\Domain\Repositories\RecycleRepositoryInterface',
			'Recycle\Domain\Repositories\RecycleRepository');

		$this->app->bind('Recycle\Domain\Repositories\RecycleTypeRepositoryInterface',
			'Recycle\Domain\Repositories\RecycleTypeRepository');

		$this->app->bind('Recycle\Domain\Repositories\RecycleLocationRepositoryInterface',
			'Recycle\Domain\Repositories\RecycleLocationRepository');

		$this->app->bind('Recycle\Domain\Repositories\RecycleInfoRepositoryInterface',
			'Recycle\Domain\Repositories\RecycleInfoRepository');

        $this->app->bind('Recycle\Domain\Repositories\RrmRepositoryInterface',
            'Recycle\Domain\Repositories\RrmRepository');
	}
}
