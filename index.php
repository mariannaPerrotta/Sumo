<?php

require 'Query.php';

$fp = fopen("C:\Users\Chiara\Desktop\processo.ccs", 'w');
if(!$fp) die ("Errore nella operaione con il file");
$num_veicoli=4;
$time=99;
$max=0;
$bassa=0;
$media=0;
$alta=0;

$query= new Query();
for( $i=0; $i<$num_veicoli; $i++){
$s= "proc V";
$t="=";
    fwrite($fp, $s);
    fwrite($fp, $i);
    fwrite($fp, $t);

    $veicoli= $query->getVeicolo($i);

    for($k=0; $k< sizeof($veicoli); $k++ ){

        if ($veicoli[$k]['vehicle_speed']>$max){
            $max=$veicoli[$k]['vehicle_speed'];
        }
    }
    $bassa= ceil($max/3);
    $media= $bassa+ceil($max/3);
    $alta= $media+ceil($max/3);

    for($k=0; $k< sizeof($veicoli); $k++ ){
        $s=($veicoli[$k]['timestep_time']);

         $time=str_replace(".", "_", $s);
         fwrite($fp,$time);

        $s=".";
        fwrite($fp, $s);

        $edge= ($veicoli[$k]['edge_id']);
        fwrite($fp,$edge);

        $s=".";
        fwrite($fp, $s);

        $lane= ($veicoli[$k]['lane_id']);
        fwrite($fp,$lane);

        $s=".";
        fwrite($fp, $s);

        $s= ($veicoli[$k]['vehicle_pos']);

        $pos=str_replace(".", "_", $s);
        fwrite($fp,$pos);

        $s=".";
        fwrite($fp, $s);

        $velocita= ($veicoli[$k]['vehicle_speed']);

        if($velocita<=$bassa){
            $s= "bassa_";
            $t= $time;
            $c= "_";
            $n= $k;
        }

        if($velocita>$bassa && $velocita<=$media){
            $s= "media";
        }
        if($velocita>$media){
            $s= "alta";
        }
        fwrite($fp,$s);
        fwrite($fp,$t);
        fwrite($fp,$c);
        fwrite($fp,$k);
        $s="+";
        fwrite($fp, $s);


    }


    $s="\r\n";
    fwrite($fp,$s);





}


fclose($fp);
