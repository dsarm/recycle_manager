<?php

namespace Recycle\Jobs;

use Recycle\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

use Recycle\Domain\Repositories\RecycleRepository;
use Recycle\Domain\Repositories\RecycleLocationRepository;
use Recycle\Domain\Repositories\RecycleInfoRepository;

class CreateRecycle extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $input;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $input
    )
    {
        $this->input = $input;
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
        $recycle = $recycleRepository->createRecycle(
            $this->input
        );

        $recycleRepository->syncRecycleTypes(
            $recycle,
            $this->input
        );

        $recycleLocation = $recycleLocationRepository->createRecycleLocation( 
            $recycle, 
            $this->input 
        );

        $recycleInfo = $recycleInfoRepository->createRecycleInfo( 
            $recycle, 
            $this->input 
        );
    }
}
