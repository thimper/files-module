<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyModuleFilesFilesAddOriginNameToFiles extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'origin_name' => 'anomaly.field_type.text'
    ];

    /**
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'files',
    ];

    /**
     * @var array
     */
    protected $assignments = [
        'origin_name'
    ];

}
