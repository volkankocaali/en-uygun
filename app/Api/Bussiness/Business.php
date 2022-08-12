<?php

namespace App\Api\Bussiness;


use Illuminate\Support\Facades\Http;

class Business implements BusinessInterface {

    /**
     * @return array
     */
    public static function fetch(): array
    {
        $responseApi = Http::get("http://www.mocky.io/v2/5d47f235330000623fa3ebf7")->json();
        $array = [];

        foreach ($responseApi as $item){
            foreach ($item as $key => $data) {
                $array[] = [
                    'name' => $key,
                    'difficulty' => $data['level'],
                    'duration' => $data['estimated_duration'],
                ];
            }
        }

        return $array;
    }
}
