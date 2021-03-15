<?php

/**
 * Funzione di ordine superiore che restituisce una funzione
 * Programmazione Funzionale - dichiarativo
 */
function searchTextDichiarative($searchText){
    // la variabile $searchText è una variabile locale per la funzione esterna
    // per fare in modo che $searchText sia visibile (ambito) all'interno della funzione anonima devo usare "use"
    return function ($taskItem) use ($searchText){ 

        $result = strpos($taskItem['taskName'], $searchText) !== false;
        return $result;
    };

}


/**
 * Funzione di ordine superiore funzione che restituisce una funzione
 * Programmazione Funzionale - dichiarativo 
 */
function searchText($searchText) {

    return function ($taskItem) use ($searchText){ 
        $noSpace=trim(filter_var($searchText), FILTER_SANITIZE_STRING);
        if($noSpace != ""){
            $result = strripos($taskItem['taskName'], $noSpace) !== false;
            return $result;

        }else{
            return count($taskItem);
        }

    };
   
}

/**
 * @var string $status è la stringa che corrisponde allo status da cercare
 * (progress|done|todo)
 * @return callable La funzione che verrà utilizzata da array_filter
 */
// function searchStatus(string $status) : callable {
    
// } 


function searchStatus(string $status){

    return function ($taskItem) use ($status){ 
        if ($status==""){
            $result = count($taskItem);
        }else{
            if ($status!='all') {
                $result = strpos($taskItem['status'], $status) !==false;
            }else{
                $result = count($taskItem);
            }
        }
        return $result;
    };
}



function statusStyle(string $status){
    if($status=="progress") {
        return "primary"; 
    }else if ($status=="done") {
        return "secondary"; 
    }else if ($status=="todo") { 
        return "danger";
    } 
}