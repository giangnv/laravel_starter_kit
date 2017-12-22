<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class DictionaryCreate
{
    use SerializesModels;

    /**
     * @var
     */
    public $dictionary;

    /**
     * @param $dictionary
     */
    public function __construct($dictionary)
    {
        $this->dictionary = $dictionary;
    }
}
