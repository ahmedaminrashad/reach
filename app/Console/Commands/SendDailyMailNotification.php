<?php

namespace App\Console\Commands;

use App\Exports\DailyExportTickets;
use App\Exports\TicketExport;
use App\Mail\OrderConfirmed;
use App\Mail\ReportEmploys;
use App\Models\User;
use App\Services\Ticketing\TicketService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use test\Mockery\MagicParams;

class SendDailyMailNotification extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'daily:mail';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending to employee the daily mail of the next  24 h ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct( )
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


        $ads=User::query()->whereHas('ads', function (Builder $query)  {
            $query->whereDate('start_date', '>=', Carbon::tomorrow());
        })->pluck('email');
        info($ads);
        Mail::to("aelmekkawy@bluebus.com.eg")
            ->bcc($ads)
            ->send(new ReportEmploys());
        info('daily mail');
    }
}
