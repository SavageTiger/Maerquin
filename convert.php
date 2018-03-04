<?php

$res = mysqli_connect('localhost', 'root', '...');

mysqli_select_db($res, 'maerquin');

$xmlFiles = glob('*.xml');

foreach ($xmlFiles as $file) {

    $columns = [];

    $tableName = str_replace('.xml', '', $file);
    $tableName = preg_replace('/[0-9]\./', '', $tableName);

    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->load($file);

    $records = $dom->getElementsByTagName('DATA_RECORD');

    foreach ($records as $record) {
        if (count($columns) === 0) {
            foreach ($record->childNodes as $childNode) {
                if (isset($childNode->tagName)) {
                    $columns[] = $childNode->tagName;
                }
            }
        }

        $q = 'INSERT INTO `maerquin_' . $tableName . '` SET ';

        foreach ($columns as $column) {
            $q .= ' ' . correctColumn($tableName, $column) . ' = \'' . addslashes($record->getElementsByTagName($column)->item(0)->nodeValue) . '\', ';
        }

        $q = substr($q, 0, -2);

        mysqli_query($res, $q) or die(mysqli_error($res));
    }
}

function correctColumn($tableName, $columnName)
{
    if ($tableName === 'character' && $columnName === 'PLAYERID') {
        return 'player_id';
    }

    return strtolower($columnName);
}


