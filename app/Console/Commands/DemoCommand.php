<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DemoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo-command:test {name : 用户名} {--city= : 城市}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->info($this->argument('name') . '来到' . $this->option('city'));

        $name = $this->ask('你的名字');
        $city = $this->choice('你的来源', [
            '北京', '上海', '厦门'
        ], 0);
        $password = $this->secret('请设置密码');

        if ($this->confirm('确认吗')) {
            $this->info($name . '+' . $city . '+' . $password);
        } else {
            $this->error('你退出了');
            exit(0);
//            exit(-1);
        }
    }
}
