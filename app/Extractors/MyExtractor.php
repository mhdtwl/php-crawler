<?php

namespace App\Extractors;

use Hedii\Extractors\Extractor;

class MyExtractor extends Extractor
{
    public function searchFor(array $resourceTypes)
    {
        $this->reset();

        $resourceTypes = array_map([$this, 'singular'], $resourceTypes);

        if (in_array('url', $resourceTypes)) {
            $this->resourcesMap['urls'] = [
                'extractor' => new UrlExtractor(),
                'resources' => null
            ];
        }

        if (in_array('email', $resourceTypes)) {
            $this->resourcesMap['emailUrls'] = [
                'extractor' => new EmailURLExtractor(),
                'resources' => null
            ];
        }

        return $this;
    }

}
