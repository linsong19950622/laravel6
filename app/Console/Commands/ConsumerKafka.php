<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Components\KafkaComponents;

class ConsumerKafka extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consumer:kafka';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kafka消费者';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $consumer = new KafkaComponents();
        $consumer->consumer('kafka3', 'kafka3', '127.0.0.1:9092');

        return $this;
    }
}
