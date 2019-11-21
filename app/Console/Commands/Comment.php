<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\DB;

class Comment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comment{id} {comment}';

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
        $arg_id = $this->argument('id');
        $arg_comment = $this->argument('comment');
        $user = User::where('id', '=', $arg_id)->first();

        if ($user == null) {
            $this->info("No user found!");
            return 0;
        }

        $comment = json_decode($user->comment);
        array_push($comment, $arg_comment);
        DB::table('users')
            ->where('id', $arg_id)
            ->update(['comment' => json_encode($comment)]);

        $this->info("Success!");
        return 1;
    }
}
