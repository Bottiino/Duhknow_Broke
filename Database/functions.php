<?php
function getWordsFromCategory($categoryID)
    {        
        global $db;
        
        $getWordList = "SELECT * FROM words JOIN word_wc on words.words_id = word_wc.words_id WHERE wc_id = :categoryID";
        $statement = $db->prepare($getWordList);
        $statement->bindValue(':categoryID', $categoryID);        
        $statement->execute();
        $categories = $statement->fetch();
        $statement->closeCursor();

        return $categories;
    }
function getCategory()
    {        
        global $db;
        
        $getCategories = "SELECT * FROM word_category";
        $statement = $db->prepare($getCategories);      
        $statement->execute();
        $wordList = $statement->fetch();
        $statement->closeCursor();

        return $wordList;
    }
    //Start of Get words functions for Dictionary
    function getWords()
    {        
        global $db;
        
        $getWords = "SELECT * FROM words";
        $statement = $db->prepare($getWords);      
        $statement->execute();
        $words = $statement->fetch();
        $statement->closeCursor();

        return $words;
    }
    function getWordsFrench()
    {        
        global $db;
        
        $getWords = "SELECT english, french FROM words";
        $statement = $db->prepare($getWords);      
        $statement->execute();
        $words = $statement->fetch();
        $statement->closeCursor();

        return $words;
    }
    function getWordsGerman()
    {        
        global $db;
        
        $getWords = "SELECT english, german FROM words";
        $statement = $db->prepare($getWords);      
        $statement->execute();
        $words = $statement->fetch();
        $statement->closeCursor();

        return $words;
    }
    function getWordsIrish()
    {        
        global $db;
        
        $getWords = "SELECT english, irish FROM words";
        $statement = $db->prepare($getWords);      
        $statement->execute();
        $words = $statement->fetch();
        $statement->closeCursor();

        return $words;
    }
    function getWordsSpanish()
    {        
        global $db;
        
        $getWords = "SELECT english, spanish FROM words";
        $statement = $db->prepare($getWords);      
        $statement->execute();
        $words = $statement->fetch();
        $statement->closeCursor();

        return $words;
    }
    //end
    /////////////////////////////////////////////////////////////
    //Functions for Game
    function getEightWords($categoryID)
    {        
        global $db;
        
        $getEight = "SELECT * FROM words JOIN word_wc on words.words_id = word_wc.words_id WHERE wc_id = :categoryID ORDER BY RANDOM() LIMIT 8";
        $statement = $db->prepare($getEight);     
        $statement->bindValue(':categoryID', $categoryID); 
        $statement->execute();
        $eightWords = $statement->fetch();
        $statement->closeCursor();

        return $eightWords;
    }
    //If you dont want to extract what you want from previous we can do this for each
    function getEightWordsFrench($categoryID)
    {        
        global $db;
        
        $getEight = "SELECT english, french FROM words JOIN word_wc on words.words_id = word_wc.words_id WHERE wc_id = :categoryID ORDER BY RANDOM() LIMIT 8";
        $statement = $db->prepare($getEight);     
        $statement->bindValue(':categoryID', $categoryID); 
        $statement->execute();
        $eightWords = $statement->fetch();
        $statement->closeCursor();

        return $eightWords;
    }
    
