<?php

/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-06-08
 * Time: 4:04 PM
 */


class Search
{
    public function searchPortfolio ($db, $searchTerm){
        //$searchTerm will need to look like this $likeString = '%' . $string . '%';

        $query="SELECT DISTINCT Students.*, CONCAT(FirstName, ' ',LastName) as firstlast, Projects.*,Positions.Title, Stacks.Title, Techs.Title 
                FROM Students JOIN Projects ON Projects.StudentId = Students.Id 
                JOIN StudentStacks ON StudentStacks.StudentId = Students.Id 
                JOIN Stacks ON StudentStacks.StackId = Stacks.Id 
                JOIN Positions ON Projects.PositionId = Positions.Id 
                JOIN StudentTechs ON StudentTechs.StudentId = Students.Id 
                JOIN Techs ON StudentTechs.TechId = Techs.Id  
                WHERE FirstName LIKE :searchTerm OR LastName LIKE :searchTerm OR CONCAT(FirstName, ' ',LastName) LIKE :searchTerm OR Techs.Title LIKE :searchTerm OR Stacks.Title LIKE :searchTerm
                GROUP BY Students.Id";
        $statement = $db->prepare($query);
        $statement->bindValue(':searchTerm', $searchTerm);
        $statement->execute();
        $searchResults = $statement->fetchAll();

        return $searchResults;
    }


/*
     public function  queryHelper($db, $term){
        $query = "SELECT Techs.title FROM Techs WHERE Techs.Title LIKE :term UNION 
                  SELECT Stacks.Title FROM Stacks WHERE Stacks.Title LIKE :term";
        $statement=$db->prepare($query);
        $statement->bindValue(':term', $term);
        $statement->execute();
        $helpers= $statement->fetchAll();

        return $helpers;

        }
*/

    public function  queryHelper($db){
        $query = "SELECT Techs.title FROM Techs UNION 
                  SELECT Stacks.Title FROM Stacks ";
        $statement=$db->prepare($query);
        $statement->execute();
        $helpers= $statement->fetchAll();

        return $helpers;

    }




}