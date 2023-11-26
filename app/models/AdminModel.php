<?php

class AdminModel extends BaseModel
{
    public function mergeArray($originalArray, $byKey)
    {
        $mergedArray = [];

        foreach ($originalArray as $item) {
            $key = $item[$byKey];

            if (!array_key_exists($key, $mergedArray)) {
                $mergedArray[$key] = $item;
            } else {
                $mergedArray[$key] = array_merge($mergedArray[$key], $item);
            }
        }
        $mergedArray = array_values($mergedArray);

        return ($mergedArray);
    }
}