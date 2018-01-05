<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Storage;
use Ixudra\Curl\Facades\Curl;

class SendDictionaryNotify
{
    public function onDictionaryCreate($event)
    {
        $response = Curl::to(config('settings.dictionary_callback_api_host') . 'add_entry')
            ->withData(
                [
                    'app_id' => $event->dictionary->app_id,
                    'entry_ids' => $event->dictionary->id,
                ]
            )
            ->get();
        Storage::append('dictionay_log.txt', '['. date('Y/m/d h:i:s') .']: [Added] - ' . $event->dictionary->id);
        \Log::info('Added new dictionary: ' . $event->dictionary->id);
    }
    
    public function onDictionaryUpdate($event)
    {
        $response = Curl::to(config('settings.dictionary_callback_api_host') . 'update_entry')
            ->withData(
                [
                    'app_id' => $event->dictionary->app_id,
                    'entry_ids' => $event->dictionary->id,
                ]
            )
            ->get();
        Storage::append('dictionay_log.txt', '['. date('Y/m/d h:i:s') .']: [Updated] - ' . $event->dictionary->id);
        \Log::info('Editted dictionary: ' . $event->dictionary->id);
    }
    
    public function onDictionaryDelete($event)
    {
        $response = Curl::to(config('settings.dictionary_callback_api_host') . 'delete_entry')
            ->withData(
                [
                    'app_id' => $event->dictionary->app_id,
                    'entry_ids' => $event->dictionary->id,
                ]
            )
            ->get();
        Storage::append('dictionary_log.txt', '['. date('Y/m/d h:i:s') .']: [Deleted] - ' . $event->dictionary->id);
        \Log::info('Deleted dictionary: ' . $event->dictionary->id);
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\DictionaryCreate',
            'App\Listeners\SendDictionaryNotify@onDictionaryCreate'
        );
        
        $events->listen(
            'App\Events\DictionaryUpdate',
            'App\Listeners\SendDictionaryNotify@onDictionaryUpdate'
        );
        
        $events->listen(
            'App\Events\DictionaryDelete',
            'App\Listeners\SendDictionaryNotify@onDictionaryDelete'
        );

    }
}
