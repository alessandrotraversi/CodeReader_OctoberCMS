<?php namespace AtemporaleNext\Codereader\Components;

use Cms\Classes\ComponentBase;

class Preview extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Code reader',
            'description' => 'Barcode-scanner supporting real- time localization and decoding of various types of barcodes and is also capable of using getUserMedia to get direct access to the user’s camera stream.'
        ];
    }

    public function onRun() {
        $this->addJs('/plugins/atemporalenext/codereader/assets/quagga.min.js');
        $this->addJs('/plugins/atemporalenext/codereader/assets/customConfig.js');
    }
}
