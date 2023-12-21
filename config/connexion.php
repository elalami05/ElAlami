<?php
        try {
            $access=new pdo("mysql:host=localhost;dbname=myshop;charset=utf8","root","");

            $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        } catch (\Throwable $th) {
            $th->getMessage();
        }

?>