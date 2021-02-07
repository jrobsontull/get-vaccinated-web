<?php     
    session_start();
    session_destroy();
      
    header("Location: http://get-vaccinated.uk/index.php")
;?>