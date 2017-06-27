<?php
// Note(bryanstephens): includes, uses for Test Cases
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
include('includes.php');
include('database.php');

class MySqlPortfolioTest extends TestCase
{
  use TestCaseTrait;
  
  /* Note(bryanstephens): TestCase requires implementing two abstract methods
  * getConnection()
  * getDataSet() 
  */
  
  /*
  * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
  */
  public function getConnection()
  {
    return $this->createDefaultDBConnection($pdo, ':test');
  }
  
  /*
  * @return PHPUnit_Extensions_Database_Dataset_IDataSet
  */
  public function testPortfolio()
  {
    $dataset = $this->getConnection()->createDataSet();
  }
  
  public function testFilteredPortfolio()
  {
    $tableNames = ['Projects'];
    $dataSet = $this->getConnection()->createDataSet($tableNames);
  }
  
}
?>