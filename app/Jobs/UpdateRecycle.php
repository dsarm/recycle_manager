<?php

namespace Recycle\Jobs;

use Recycle\Recycle;
use Recycle\Country;
use Recycle\City;
use Recycle\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

use Recycle\Domain\Repositories\RecycleRepository;
use Recycle\Domain\Repositories\RecycleLocationRepository;
use Recycle\Domain\Repositories\RecycleInfoRepository;

class UpdateRecycle extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $input;

    private $recycle;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $input,
        Recycle $recycle
    )
    {
        $this->input = $input;

        $this->recycle = $recycle;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(
        RecycleRepository $recycleRepository,
        RecycleLocationRepository $recycleLocationRepository,
        RecycleInfoRepository $recycleInfoRepository
    )
    {

        $recycleRepository->syncRecycleTypes(
            $this->recycle,
            $this->input
        );

        $recycleLocation = $recycleLocationRepository->updateRecycleLocation( 
            $this->recycle,
            $this->input 
        );

        $recycleInfo = $recycleInfoRepository->UpdateRecycleInfo( 
            $this->recycle,
            $this->input 
        );
    }
}
