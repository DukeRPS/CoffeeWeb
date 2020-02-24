<?php
require ("model/coffeeModel.php");
class CoffeeController 
{
    function DropDown()
    {
        $coffeeModel = new coffeeModel;
        $dropdown = "<form action = '' method = 'POST' width = '200px'>
          Please select a type:
          <select name = 'type'><option value = 'All'>All</option value>"
        .$coffeeModel->OptionCreation($coffeeModel->ConnectionSql("SELECT DISTINCT type FROM coffee"))."
          </select><input type = 'submit' value = 'Search 'name = 'Search'/>
          </form>";
        return $dropdown;
    }
}
