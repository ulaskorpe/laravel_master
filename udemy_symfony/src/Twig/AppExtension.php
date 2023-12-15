<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension {

    public function getFilters(){
        return [
            new TwigFilter('make_md5',[$this,'md5Filter']),
        ];
    }

    public function md5Filter($string){
        return md5($string);
    }
}