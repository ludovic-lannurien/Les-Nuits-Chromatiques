<?php

namespace App\Service;

use Symfony\Component\String\Slugger\SluggerInterface;

class MySlugger
{
    private $slugger;
    private $toLower;

    public function __construct(SluggerInterface $slugger, bool $toLower)
    {
        $this->slugger = $slugger;
        $this->toLower = $toLower;
    }

    public function slugify(string $stringToSlug)
    {
        if ($this->toLower === true) {
            return $this->slugger->slug($stringToSlug)->lower();
        } else {
            return $this->slugger->slug($stringToSlug);
        }
    }
}
