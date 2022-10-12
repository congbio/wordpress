<?php

// Trang để tham khảo
// https://stackoverflow.com/questions/5164404/json-decode-to-array
$api_url = 'https://6290540a27f4ba1c65b73fb1.mockapi.io/dataWordpress';
// Read JSON file
$json_data = file_get_contents($api_url);
// Decode JSON data into PHP array
$response_data = json_decode($json_data);
// All user data exists in 'data' object
$user_data = $response_data;
// Cut long data into small & select only first 10 records
$user_data = array_slice($user_data, 0, 9);
// print_r($user_data);
// Print data if need to debug
//print_r($user_data);
// Traverse array and display user data
foreach ($user_data as $user) {
    echo '
           <div class="product-small box ">
              <div class="cart">
                 <div class="cart-detail">     
                 <h3 class="name">'.$user->avatar.'</h3>   
                 <p>   
                    <img width="300" height="300" src='.$user->avatar.' sizes="(max-width: 300px) 100vw, 300px" /> </a>
                    </p> 
                         <div class="price"></div>  
                 </div>               
              </div>
           </div>       
     </div>
    ';
}
?>