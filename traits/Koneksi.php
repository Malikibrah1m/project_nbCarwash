<?php

trait Koneksi
{
    public function mysql()
    {
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
