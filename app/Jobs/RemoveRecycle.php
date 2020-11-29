<?php

namespace Recycle\Jobs;

use Recycle\Recycle;
use Recycle\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

use Recycle\Domain\Repositories\RecycleRepository;

class RemoveRecycle extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $recycle;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        Recycle $recycle
    )
    {
        $this->recycle = $recycle;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(
        RecycleRepository $recycleRepository
    )
    {
        $result = $recycleRepository->removeRecycle(
            $this->recycle
        );

    }
}
