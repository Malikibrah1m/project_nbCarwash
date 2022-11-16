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
        $server = "localhost";
        $username = "root";
        $password = "";
        $db = "nb-carwash";
        $koneksi = mysqli_connect($server, $username, $password, $db);

        if (mysqli_connect_error()) {
            echo "Koneksi gagal " . mysqli_connect_error();
        }
        return $koneksi;
    }
}
