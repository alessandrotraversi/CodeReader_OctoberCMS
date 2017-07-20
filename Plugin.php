<?php namespace AtemporaleNext\Codereader;

use Backend;
use System\Classes\PluginBase;

/**
 * Codereader Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Code reader',
            'description' => 'Barcode-scanner supporting real- time localization and decoding of various types of barcodes and is also capable of using getUserMedia to get direct access to the user’s camera stream.',
            'author'      => 'AtemporaleNext',
            'icon'        => 'icon-barcode'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'AtemporaleNext\Codereader\Components\Preview' => 'preview',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'atemporalenext.codereader.some_permission' => [
                'tab' => 'Codereader',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'codereader' => [
                'label'       => 'Codereader',
                'url'         => Backend::url('atemporalenext/codereader/mycontroller'),
                'icon'        => 'icon-barcode',
                'permissions' => ['atemporalenext.codereader.*'],
                'order'       => 500,
            ],
        ];
    }
}
