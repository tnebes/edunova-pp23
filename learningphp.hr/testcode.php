<?php
    function Zbrajanje($x){
        if($x<101){
            echo 'Zbrajanje'. $x . '<br />';
            Zbrajanje($x+1);
                }
    }
    Zbrajanje(0);