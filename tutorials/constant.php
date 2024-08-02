<?php

const data = "Krish Gamit";
//const data = "KG";      this is incorrect since constant is already defined in above line 
                        //it now cannot be modifed in another lines. it will display erros
echo data;
echo "<br>";

// usually is prefered to using cosntant names using capital letters but not necessary
// def constat using function

define("DATA2","Krish A Gamit");
echo DATA2;


?>