<?php
//function getWordsFromCategory($categoryID)
//    {        
//        global $db;
//        
//        $getWordList = "SELECT * FROM words JOIN word_wc on words.words_id = word_wc.words_id WHERE wc_id = :categoryID";
//        $statement = $db->prepare($getWordList);
//        $statement->bindValue(':categoryID', $categoryID);        
//        $statement->execute();
//        $categories = $statement->fetch();
//        $statement->closeCursor();
//
//        return $categories;
//    }

function getCategorys($difficulty)
{        
    global $db;

    $getCategories = "SELECT category_name FROM word_category WHERE difficulty = '$difficulty'";
    $result = pg_query($db, $getCategories);
    
    $arr = array();
    while($line = pg_fetch_array($result))
    {        
        array_push($arr, $line["category_name"]);
    }
        
    return $arr;
        
}
////Start of Get words functions for Dictionary
function getWords()
{        
    global $db;
    
    $getWords = "SELECT * FROM words";
    $result = pg_query($db, $getWords);
    
    $arr = pg_fetch_all($result);
        
    return $arr;
}
//function getWordsFrench()
//{        
//    global $db;
//
//    $getWords = "SELECT english, french FROM words";
//    $statement = $db->prepare($getWords);      
//    $statement->execute();
//    $words = $statement->fetch();
//    $statement->closeCursor();
//
//    return $words;
//}
//function getWordsGerman()
//{        
//    global $db;
//
//    $getWords = "SELECT english, german FROM words";
//    $statement = $db->prepare($getWords);      
//    $statement->execute();
//    $words = $statement->fetch();
//    $statement->closeCursor();
//
//    return $words;
//}
//function getWordsIrish()
//{        
//    global $db;
//
//    $getWords = "SELECT english, irish FROM words";
//    $statement = $db->prepare($getWords);      
//    $statement->execute();
//    $words = $statement->fetch();
//    $statement->closeCursor();
//
//    return $words;
//}
//function getWordsSpanish()
//{        
//    global $db;
//
//    $getWords = "SELECT english, spanish FROM words";
//    $statement = $db->prepare($getWords);      
//    $statement->execute();
//    $words = $statement->fetch();
//    $statement->closeCursor();
//
//    return $words;
//}
////end
///////////////////////////////////////////////////////////////
////Functions for Game

function getEightWordsFrench($categoryID) {
    global $db;
    
    $getEight = "SELECT french FROM words JOIN word_wc on words.words_id = word_wc.words_id WHERE wc_id = ($categoryID) ORDER BY RANDOM() LIMIT 8";
    $result = pg_query($db, $getEight);
    

    $arr = array();
    while($line = pg_fetch_array($result))
    {        
        array_push($arr, $line["french"]);
    }
        
    return $arr;
}
//Pass in desired language
function getEightWords($categoryID, $language) {
    global $db;
    
    $getEight = "SELECT $language FROM words JOIN word_wc on words.words_id = word_wc.words_id WHERE wc_id = ($categoryID) ORDER BY RANDOM() LIMIT 8";
    $result = pg_query($db, $getEight);
    

    $arr = array();
    while($line = pg_fetch_array($result))
    {        
        array_push($arr, $line[$language]);
    }
        
    return $arr;
}
//Changing a word into another langauge
function languageChange($word, $language)
{
    global $db;
    
    $getEight = "SELECT $language FROM words WHERE english = '$word' OR french = 'word' OR german = '$word' OR irish = '$word' OR spanish = '$word'";
    $result = pg_query($db, $getEight);
    
    $arr = array();
    while($line = pg_fetch_array($result))
    {        
        array_push($arr, $line[$language]);
    }
        
    return $arr;
}
