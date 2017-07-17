<?php

namespace ginacontrino;

class Path implements PathInterface
{

    public function join(array $arrayWithPaths)
    {
        $unfilteredPath = array_reduce($arrayWithPaths, function ($carry, $item) {
            return $carry . $item;
        });

        return $this->filterPath($unfilteredPath);

    }

    public function filterPath($path)
    {
        // split string at '/'
        $splittedPathArray = preg_split('/\//', $path);

        $filteredPathArray = [];
        // go through the partials and filter
        foreach ($splittedPathArray as $partial) {

            if ($partial == '' || $partial == '.') continue;

            if ($partial == '..') {
                // get rid of the currently last item
                // in the $filteredPathArray
                array_pop($filteredPathArray);
            } else {
                // put item in $filteredPathArray
                array_push($filteredPathArray, $partial);
            }
        }

        // join partials again
        $filteredPath = implode('/', $filteredPathArray);
        if ($path[0] == '/') {

            $filteredPath = '/' . $filteredPath;
        }

        return $filteredPath;
    }
}
