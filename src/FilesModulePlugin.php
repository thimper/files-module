<?php namespace Anomaly\FilesModule;

use Anomaly\FilesModule\File\Command\GetFile;
use Anomaly\FilesModule\File\Command\GetMaxUploadSize;
use Anomaly\FilesModule\Folder\Command\GetFolder;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;


/**
 * Class FilesModulePlugin
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class FilesModulePlugin extends Plugin
{

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'max_upload_size',
                function () {
                    return dispatch_now(new GetMaxUploadSize());
                }
            ),
            new \Twig_SimpleFunction(
                'file',
                function ($identifier) {
                    return decorate(dispatch_now(new GetFile($identifier)));
                }
            ),
            new \Twig_SimpleFunction(
                'folder',
                function ($identifier) {
                    return decorate(dispatch_now(new GetFolder($identifier)));
                }
            ),
        ];
    }
}
