<?php
require 'Query.php';
$fp = fopen("C:\Users\Chiara\Desktop\change_lane.mu", 'w');
if(!$fp) die ("Errore nella operaione con il file");
$num_veicoli=3;

$query= new Query();
for( $i=0; $i<$num_veicoli; $i++){
    $num_strade=0;
    $veicoli= $query->getVeicolo($i);
    $strade= [];
    for($k=0; $k< sizeof($veicoli); $k++ ){



        $strada="lane";

        $lane= ($veicoli[$k]['lane_id']);
        if(strrpos($lane, ':')!==false){
            $lane=str_replace(":", "_enter_", $lane);
        }
        if(strrpos($lane, '#')!==false){

            $lane=str_replace("#", "_stop_", $lane);
        }
        if(strrpos($lane, '-')!==false){
            $lane=str_replace("-", "_turn_over_", $lane);
        }

        $strada.= $lane;
        $lane=$strada;
        $lane.= "_";
        $lane.=$i;


        array_push($strade, $lane);

if($k>0) {
    if ($strade[$k - 1] !== $lane) {

        $s= "prop P";
        $t="=";
        $min= "min X";
        $uguale="=";
        $par_ap= "<";
        $par_chiusa=">";
        $sbar="\/";
        $meno="-";
        $x= "X";
        if(strrpos($lane, 'lane_enter_')!==false){
            $turn_over=str_replace("lane_enter_", "lane_turn_over_", $lane);
        }
        else{
            if(strrpos($lane, 'lane_turn_over')!==false){

            }
            else{
                if(strrpos($lane, 'lane')!==false){
                    $turn_over=str_replace("lane", "lane_turn_over_", $lane);
                }
            }
        }







        $q= "prop Q";
        $Q= "Q";
        $tt="tt";

        //primo processo
        fwrite($fp, $s);
        fwrite($fp, $i);
        $trat="_";
        fwrite($fp,$trat);
        fwrite($fp, $num_strade);
        fwrite($fp, $t);
        fwrite($fp, $min);
        fwrite($fp, $uguale);
        fwrite($fp, $par_ap);
        fwrite($fp, $lane);
        fwrite($fp, $par_chiusa);
        fwrite($fp, $Q);
        fwrite($fp, $i);
        $trat="_";
        fwrite($fp,$trat);
        fwrite($fp, $num_strade);
        fwrite($fp, $sbar);
        fwrite($fp, $par_ap);
        fwrite($fp, $meno);
        fwrite($fp, $lane);
        fwrite($fp, $par_chiusa);
        fwrite($fp, $x);
        $s = "\r\n";
        fwrite($fp, $s);

        //secondo processo
        fwrite($fp, $q);
        fwrite($fp, $i);
        $trat="_";
        fwrite($fp,$trat);
        fwrite($fp, $num_strade);
        fwrite($fp, $t);
        fwrite($fp, $min);
        fwrite($fp, $uguale);
        fwrite($fp, $par_ap);
        fwrite($fp, $turn_over);
        fwrite($fp, $par_chiusa);
        fwrite($fp, $tt);
        fwrite($fp, $sbar);
        fwrite($fp, $par_ap);
        fwrite($fp, $meno);
        fwrite($fp, $turn_over);
        fwrite($fp, $par_chiusa);
        fwrite($fp, $x);
        $s = "\r\n";
        fwrite($fp, $s);
        $num_strade= $num_strade+1;
    }

}
else{

    $s= "prop P";
    $t="=";
    $min= "min X";
    $uguale="=";
    $par_ap= "<";
    $par_chiusa=">";
    $sbar="\/";
    $meno="-";
    $x= "X";

    if(strrpos($lane, 'lane_enter_')!==false){
        $turn_over=str_replace("lane_enter_", "lane_turn_over_", $lane);
    }
    else{
        if(strrpos($lane, 'lane_turn_over')!==false){

        }
        else{
            if(strrpos($lane, 'lane')!==false){
                $turn_over=str_replace("lane", "lane_turn_over_", $lane);
            }
        }
    }


    $q= "prop Q";
    $Q= "Q";
    $tt="tt";

    //primo processo
    fwrite($fp, $s);
    fwrite($fp, $i);
    $trat="_";
    fwrite($fp,$trat);
    fwrite($fp, $num_strade);
    fwrite($fp, $t);
    fwrite($fp, $min);
    fwrite($fp, $uguale);
    fwrite($fp, $par_ap);
    fwrite($fp, $lane);
    fwrite($fp, $par_chiusa);
    fwrite($fp, $Q);
    fwrite($fp, $i);
    $trat="_";
    fwrite($fp,$trat);
    fwrite($fp, $num_strade);
    fwrite($fp, $sbar);
    fwrite($fp, $par_ap);
    fwrite($fp, $meno);
    fwrite($fp, $lane);
    fwrite($fp, $par_chiusa);
    fwrite($fp, $x);
    $s = "\r\n";
    fwrite($fp, $s);

    //secondo processo
    fwrite($fp, $q);
    fwrite($fp, $i);
    $trat="_";
    fwrite($fp,$trat);
    fwrite($fp, $num_strade);
    fwrite($fp, $t);
    fwrite($fp, $min);
    fwrite($fp, $uguale);
    fwrite($fp, $par_ap);
    fwrite($fp, $turn_over);
    fwrite($fp, $par_chiusa);
    fwrite($fp, $tt);
    fwrite($fp, $sbar);
    fwrite($fp, $par_ap);
    fwrite($fp, $meno);
    fwrite($fp, $turn_over);
    fwrite($fp, $par_chiusa);
    fwrite($fp, $x);
    $s = "\r\n";
    fwrite($fp, $s);
    $num_strade= $num_strade+1;
}

    }

}