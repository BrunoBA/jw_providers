<?php

function loadFromJSON()
{
    try {
        $file = file_get_contents(__DIR__.'/providers.json');

        return json_decode($file);
    } catch (Exception) {
        return [];
    }
}
