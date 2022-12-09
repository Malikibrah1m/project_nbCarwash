<?php

trait Koneksi
{
    public function mysql()
    {
        /**
         * Buat koneksi
         * $server = "localhost"
         * $username = "root";
         * $password = "";
         * $db = "native";
         */
<<<<<<< HEAD
        $server = "localhost";
        $username = "root";
        $password = "";
        $db = "nb-carwash";
        $koneksi = mysqli_connect($server, $username, $password, $db);
=======
        
        $koneksi = mysqli_connect($_ENV['HOST'], $_ENV['MYSQL_USERNAME'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE']);
>>>>>>> 2207545e2e7b2b49f708b1219a6a1bfe6b6e2e6e

        if (mysqli_connect_error()) {
            echo "Koneksi gagal " . mysqli_connect_error();
        }
        return $koneksi;
    }
}
