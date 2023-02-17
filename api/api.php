<?php

if (isset($_GET['osname'])){
    echo(ucfirst(php_uname("n")));
}

else if (isset($_GET['kernel'])){
    echo("Linux" . ' ' . php_uname("r"));
}

else if (isset($_GET['ramusage'])){

    $memory = shell_exec("free -mt | tail -n 1 | rev | cut -c7- | rev | cut -c7-");
    $m = '';
    $tab = [];

    foreach( explode(' ', $memory) as $r) { 
    if ($r != '' and $r != ' ' and $r != NULL ) { 
        $r = (int)$r;
        if ($r != 0){
        array_push($tab, $r);
        }
    }
    }
    echo(round($tab[1] / 1024, 2));
}   

else if (isset($_GET['ramtotal'])){


    $memory = shell_exec("free -mt | tail -n 1 | rev | cut -c7- | rev | cut -c7-");
    $m = '';
    $tab = [];

    foreach( explode(' ', $memory) as $r) { 
    if ($r != '' and $r != ' ' and $r != NULL ) { 
        $r = (int)$r;
        if ($r != 0){
            array_push($tab, $r);
        }
    }
    }
    echo(round($tab[0] / 1024, 2));
}



else if (isset($_GET['ramall'])){


    $memory = shell_exec("free -mt | tail -n 1 | rev | cut -c7- | rev | cut -c7-");
    $m = '';
    $tab = [];

    foreach( explode(' ', $memory) as $r) { 
    if ($r != '' and $r != ' ' and $r != NULL ) { 
        $r = (int)$r;
        if ($r != 0){
            array_push($tab, $r);
        }
     }
    }
    header("Content-type: application/json");
    
    echo "{
    \"total\": " . round($tab[0] / 1024, 2) . ",
    \"used\": " . round($tab[1] / 1024, 2) . "        
}";

}
else if(isset($_GET['diskusage'])){
    echo(shell_exec("df -h / | tail -n 1 | cut -d ' ' -f 6 | sed \"s/G/ Gb/\" "));
}

else if(isset($_GET['disktotal'])){
    echo(shell_exec("df -h / | tail -n 1 | cut -d ' ' -f 3 | sed \"s/G/ Gb/\" "));

}

else if (isset($_GET['uptime'])){
    echo(shell_exec("uptime -p | cut -c4- | sed \"s/,//g\" | sed \"s/minute./min/g\"  "));
}

?>