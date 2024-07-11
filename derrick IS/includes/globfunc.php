<?php
    function encrypt($data)
    {
        $cryptpsd=hash('sha512',$data);
        return $cryptpsd;
    }
    function images($user,$id){
        
    }
?>