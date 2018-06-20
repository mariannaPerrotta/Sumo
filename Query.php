<?php

//require '../Helper/StringHelper/StringHelper.php';
require 'DBConnectionManager.php';
require 'StringHelper.php';

class Query
{

    private $connection;


    private $tabelleDB = [
        "veicoli",

    ];
    private $campiTabelleDB = [
        "veicoli" => [
            "timestep_time",
            "edge_id",
            "lane_id",
            "vehicle_id",
            "vehicle_pos",
            "vehicle_speed"
        ],

        ];

    public function __construct()
    {

        $db = new DBConnectionManager();
        $this->connection = $db->runConnection();
    }
    public function getVeicolo($id_veicoli)
    {

        $veicoli = array();
        $table = $this->tabelleDB[0];
        $campi = $this->campiTabelleDB[$table];
        $query =
            ("SELECT " .$campi[0] . ", " .$campi[1] . ", " .
            $campi[2] . ", " .
            $campi[3] . ", " .
            $campi[4] . ", " .
            $campi[5] . " " .
            "FROM " .
            $table. " " .
        "WHERE ".
            $campi[3] . " = ?");

        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id_veicoli);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($timestep_time, $edge_id, $lane_id, $vehicle_id, $vehicle_pos, $vehicle_speed);

        while ($stmt->fetch()) {
            $temp = array();

            $temp[$campi[0]] = $timestep_time;
            $temp[$campi[1]] = $edge_id;
            $temp[$campi[2]] = $lane_id;
            $temp[$campi[3]] = $vehicle_id;
            $temp[$campi[4]] = $vehicle_pos;
            $temp[$campi[5]] = $vehicle_speed;
            array_push($veicoli, $temp);
        }
        return $veicoli;
    }
}
