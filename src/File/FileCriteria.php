<?php namespace Anomaly\FilesModule\File;

use Anomaly\FilesModule\Folder\Command\GetFolder;
use Anomaly\FilesModule\Folder\Contract\FolderInterface;
use Anomaly\Streams\Platform\Entry\EntryCriteria;

/**
 * Class FileCriteria
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FilesModule\File
 */
class FileCriteria extends EntryCriteria
{

    /**
     * Add the folder constraint.
     *
     * @param $identifier
     * @return $this
     */
    public function folder($identifier)
    {
        /* @var FolderInterface $folder */
        $folder = $this->dispatch(new GetFolder($identifier));

        $stream = $folder->getEntryStream();
        $table  = $stream->getEntryTableName();

        $this->query
            ->select('files_files.*')
            ->where('folder_id', $folder->getId())
            ->join($table . ' AS entry', 'entry.id', '=', 'files_files.entry_id');

        return $this;
    }
}