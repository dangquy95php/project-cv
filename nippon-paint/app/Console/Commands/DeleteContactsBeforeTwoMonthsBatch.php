<?php

namespace App\Console\Commands;

use App\Models\Contacts;
use Illuminate\Console\Command;

class DeleteContactsBeforeTwoMonthsBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:delete_contacts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '2ヶ月以上前のお問い合わせを削除';

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
     * @return int
     */
    public function handle()
    {
        $date = date('Y-m-d H:i:s', strtotime('last day of -2 month 23:59:59'));
        Contacts::query()->whereDate('created_at', '<=', $date)->delete();
    }
}
