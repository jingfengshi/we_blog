<?php

namespace App\Listeners;

use Illuminate\Database\Events\QueryExecuted;

class SqlListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function handle(QueryExecuted $event)
    {
        $sql = str_replace("?", "'%s'", $event->sql);

        $log = vsprintf($sql, $event->bindings);

        $log = '[' . date('Y-m-d H:i:s') . '] ' . $log . "\r\n";
        $filepath = storage_path('logs'.DIRECTORY_SEPARATOR.'sql'.DIRECTORY_SEPARATOR.date('Y-m-d').'.log');
        file_put_contents($filepath, $log, FILE_APPEND);
    }
}
