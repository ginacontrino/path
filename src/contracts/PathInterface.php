<?php
/**
 * Created by PhpStorm.
 * User: ginacontrino
 * Date: 10/09/15
 * Time: 15:31
 */

namespace ginacontrino;


interface PathInterface
{

    /**
     * @param array $arrayWithPaths
     * @return string
     */
    public function join(array $arrayWithPaths);

}