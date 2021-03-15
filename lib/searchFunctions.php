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

        $result = strpos($taskItem['taskName'], $searchText) !== false;
        return $result;
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

        if ($status!='all') {
            $result = strpos($taskItem['status'], $status) !==false;
        }else{
            $result = "";
        }
        return $result;
    };
}