<?php

namespace App\Extractors;

use Hedii\Extractors\EmailExtractor;

class EmailURLExtractor extends EmailExtractor
{
    /**
     * Extract the emails contained in the body of the provided dom.
     *
     * @param mixed $dom
     * @param string $url  Will not be used.
     * @return array
     */
    public function extract($dom, $url)
    {
        $this->resetEmails();

        preg_match_all('/[a-z\d._%+-]+[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i', $dom, $matches);

        foreach ($matches[0] as $match) {
            if (filter_var($match, FILTER_VALIDATE_EMAIL)) {
                if ($this->endsWith(strtolower($match), $this->mediaExtensions)) {
                    continue;
                }
                $this->emails[] = $match .",". $url;
            }
        }

        return $this->emails;
    }

    /**
     * Reset the emails array.
     *
     * @return void
     */
    private function resetEmails()
    {
        $this->emails = [];
    }
}