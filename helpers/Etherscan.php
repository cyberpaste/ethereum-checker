<?php

namespace app\helpers;

class Etherscan {

    const API_KEY = "FMR7X4V47M3A3QZ6JIETE12I7RSIUX1KHC";
    const API_URL = "https://api.etherscan.io/api?";

    public static function getBalance($wallet) {
        $data = array(
            'module' => 'account',
            'action' => 'balance',
            'address' => $wallet,
            'tag' => 'latest',
            'apikey' => self::API_KEY,
        );

        $json = file_get_contents(self::API_URL . http_build_query($data));
        $data = json_decode($json);
        if ($data->status == 1) {
            return $data->result;
        }
        return false;
    }

    public function getTransactions($wallet) {
        $data = array(
            'module' => 'account',
            'action' => 'txlist',
            'address' => $wallet,
            'startblock' => '0',
            'endblock' => '99999999',
            'page' => '1',
            'offset' => '5',
            'sort' => 'asc',
            'apikey' => self::API_KEY,
        );

        $json = file_get_contents(self::API_URL . http_build_query($data));
        $data = json_decode($json);
        if ($data->status == 1) {
            return $data->result;
        }
        return false;
    }

}
