<?php
    class coffeeModel 
    {
        
        function ConnectionSql($sql)
        {
            $conn = mysqli_connect("localhost","root","","coffeedb");
            $result = mysqli_query($conn, $sql);
        
             $conn->close();
            return $result;
        }
        
        function QuaryTable()
        {
            $sql = "";
            if(isset($_POST['Search']))
            {
                 $types = $_POST['type'];
                  if($types == '' || $types == 'All')
                 {
                      $sql = "SELECT * FROM coffee";
                 }
                 else
                 {
                      $sql="SELECT * FROM coffee WHERE type = '$types'";
                   }
            }
            else
            {
                $sql = "SELECT * FROM coffee";
            }
            return $sql;
        }
        
        function TableCreation($result)
        {
             $i = array();
             $Option = "";
             while($row = mysqli_fetch_assoc($result))
            {
                 $info = "<form action ='' method =''><table class = 'coffeeTable'
                          <tr><th rowspan= '6' width = '150px' ><img runat = 'server' src = ".$row['image']." /></th>
                          <th width = '75px' >Name: </th><td>".$row['name']."</td></tr>
                
                          <tr><th>Type: </th><td>".$row['type']."</td></tr>
                            
                          <tr><th>Price: </th><td>".$row['price']."</td></tr>                        
                        
                          <tr><th>Roast: </th><td>".$row['roast']."</td></tr>                        
                        
                          <tr><th>Origin: </th><td>".$row['country']."</td></tr>
                        
                          <tr><td colspan= '2' >".$row['review']."</td></tr></table></form>";
                 array_push($i, $info);
             }
            $Option = $Option.implode($Option, $i);
             return $Option;
    
         }
        
        function OptionCreation($result)
        {
             $i = array();
             $Option = "";
            while($row = mysqli_fetch_assoc($result))
            {
                  $info = "<option value = '".$row['type']."'>".$row['type']."</option value>";
                  array_push($i, $info);
            }
             $Option = $Option.implode($Option, $i);
             return $Option;
        }
        
        
    }

