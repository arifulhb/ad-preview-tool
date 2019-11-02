<?php

const VISIBILITIES = [
    5 => 'Public',
    0 => 'None'
];

const VISIBILITY_PUBLIC = 5;
const VISIBILITY_NONE = 0;

/**
 * Return visibility label
 *
 * @param int $value
 * @return string
 */
function getVisibility(int $value) : string
{
    return VISIBILITIES[$value];
}


/**
 * Find Advertisement type in advertisementable_type
 *
 * @param string $model
 * @return void
 */
function getAdvertisementType(string $model)
{
    $text = explode('\\', $model);

    if (isset($text[2])) {
        return $text[2];
    }

    throw new \Exception('Model Name not found in getAdvertisementType()');
}
