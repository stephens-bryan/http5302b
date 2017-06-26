<?php

/**
 * Created by PhpStorm.
 * User: jessmount
 * Date: 2017-06-08
 * Time: 4:04 PM
 */


class Search
{
  
  //search query for public site. Handles first name, last name, full name,tech (css, javascript etc.) and stack (front-end etc)
    public function searchPortfolio ($db, $searchTerm){
        

        $query="SELECT DISTINCT Students.*, CONCAT(FirstName, ' ',LastName) as firstlast, ANY_VALUE(Projects.ID),ANY_VALUE(Positions.Title), ANY_VALUE(Stacks.Title), ANY_VALUE(Techs.Title) 
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


//grabs the helpers for auto complete search bar, public site. 
    public function  queryHelper($db){
        $query = "SELECT Techs.title FROM Techs UNION 
                  SELECT Stacks.Title FROM Stacks ";
        $statement=$db->prepare($query);
        $statement->execute();
        $helpers= $statement->fetchAll();

        return $helpers;

    }




}