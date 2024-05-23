<?php

declare(strict_types=1);

namespace App\Jobs;

use App\MoonShine\Handlers\HotelHandler;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use MoonShine\Handlers\ImportHandler;

final class HotelImportJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        protected string $resource,
        protected string $path,
        protected bool   $deleteAfter,
        protected string $delimiter = ','
    )
    {
    }

    /**
     * @throws IOException
     * @throws UnsupportedTypeException
     * @throws ReaderNotOpenedException
     */
    public function handle(): void
    {
      //  $r = new ololo();




        HotelHandler::process(
            $this->path,
            new $this->resource(),
            $this->deleteAfter,
            $this->delimiter
        );
    }

    public function failed($exception)
    {
        dump($exception->getMessage());
    }
}
