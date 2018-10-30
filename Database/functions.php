<?php
function getCategorys()
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
function getWordsCategory($categoryID)
    {        
        global $db;
        
        $getCategories = "SELECT * FROM word_category";
        $statement = $db->prepare($getCategories);      
        $statement->execute();
        $wordList = $statement->fetch();
        $statement->closeCursor();

        return $wordList;
    }