<?php

namespace App\Api\It;


use Illuminate\Support\Facades\Http;

class It implements ItInterface {

    /**
     * @return array
     */
    public static function fetch(): array
    {
        $responseApi = Http::get("http://www.mocky.io/v2/5d47f24c330000623fa3ebfa")->json();
        $array = [];

        foreach ($responseApi as $item){
            $array[] = [
                'name' => $item['id'],
                'difficulty' => $item['zorluk'],
                'duration' => $item['sure'],
            ];
        }

        return $array;
    }
}
