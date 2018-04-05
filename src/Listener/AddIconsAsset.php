<?php namespace Anomaly\IconFieldType\Listener;

use Anomaly\Streams\Platform\Asset\Asset;
use Illuminate\Http\Request;

class AddIconsAsset
{

    /**
     * The asset utility.
     *
     * @var Asset
     */
    protected $asset;

    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * Create a new AddIconsAsset instance.
     *
     * @param Asset   $asset
     * @param Request $request
     */
    public function __construct(Asset $asset, Request $request)
    {
        $this->asset   = $asset;
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle()
    {
        if ($this->request->segment(1) == 'admin') {
            return;
        }

        $this->asset->add('styles.css', 'anomaly.field_type.icon::scss/icons.scss');
    }
}
