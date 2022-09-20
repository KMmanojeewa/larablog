<?php

namespace App\Console\Commands;

use App\Models\Quote;
use Illuminate\Console\Command;

class DailyQuote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store quote to quotes table';

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
        $quotes = [
            'Mahatma Gandhi' => 'Live as if you were to die tomorrow. Learn as if you were to live forever.',
            'Friedrich Nietzsche' => 'That which does not kill us makes us stronger.',
            'Theodore Roosevelt' => 'Do what you can, with what you have, where you are.',
            'Oscar Wilde' => 'Be yourself; everyone else is already taken.',
            'William Shakespeare' => 'This above all: to thine own self be true.',
            'Napoleon Hill' => 'If you cannot do great things, do small things in a great way.',
            'Milton Berle' => 'If opportunity doesn’t knock, build a door.'
        ];

        $key = array_rand($quotes);
        $data = $quotes[$key];

        $quote = new Quote();
        $quote->quote = $data;
        $quote->save();

        $this->info('Successfully saved.');

    }
}
