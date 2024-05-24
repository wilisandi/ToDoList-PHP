<?php
include("../model/model.php");
class Controller
{
    private $koneksi;
    private $dbHost = "localhost";
    private $dbName = "todo_list";
    private $dbUser = "root";
    private $dbPass = "";
    private $tblUser = "user";

    public function __construct()
    {
        $this->koneksi = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
        if (!$this->koneksi) {
            die("Koneksi Gagal : " . mysqli_connect_error());
        }
    }

    public function Login(string $email, string $password): GlobalResponse
    {
        if(isset($email) && isset($password)){
            $sql = "SELECT * FROM $this->tblUser WHERE `email` = '$email' AND `password` = md5('$password')";
            $result = mysqli_query($this->koneksi, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $user = new User($row["id"], $row["email"], $row["password"]);
                $global = new GlobalResponse(200, "Login Success", $user);
                return $global;
            } else {
                return new GlobalResponse(400, "Email or Password incorrect", null);
            }
        }else{
            return new GlobalResponse(400, "Email or Password cant be null", null);
        }
    }
    public function validateEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function Register(string $name, string $email, string $password, string $cpassword): GlobalResponse
    {
        
        if($name == ""){
            return new GlobalResponse(400, "Name cant be null", null);
        }
        if($email == ""){
            return new GlobalResponse(400, "Email cant be null", null);
        }
        if (!$this->validateEmail($email)) {
            return new GlobalResponse(400, "Email not valid", null);
        }
        if($password == ""){
            return new GlobalResponse(400, "Password cant be null", null);
        }
        if($cpassword == ""){
            return new GlobalResponse(400, "Canfirm Password cant be null", null);
        }
        if($cpassword!=$password){
            return new GlobalResponse(400, "Confirm Password not match", null);
        }
        $sql = "INSERT INTO $this->tblUser VALUES (null, '$name', '$email', md5('$password'))";
        $result = mysqli_query($this->koneksi, $sql);
        if ($result) {
            $global = new GlobalResponse(200, "Register Success", null);
            return $global;
        } else {
            return new GlobalResponse(400, "Register Failed", null);
        }
    }

    // public function GetAllBooks(): array
    // {
    //     $all_result = array();
    //     $sql = "SELECT * FROM $this->bukuTable WHERE deleted_at IS NULL";
    //     $result = mysqli_query($this->koneksi, $sql);

    //     while ($row = mysqli_fetch_array($result)) {
    //         $all_result[] = new Books($row['id'], $row['nama'], $row['penulis'], $row['tanggal_terbit'], $row['deleted_at'] != null ? true : false);
    //     }

    //     return $all_result;
    // }

    // public function GetBookById(int $id): Books | null
    // {
    //     if ($id != 0) {
    //         $sql = "SELECT * FROM $this->bukuTable WHERE id = $id";
    //         $result = mysqli_query($this->koneksi, $sql);
    //         $row = mysqli_fetch_assoc($result);
    //         if (mysqli_num_rows($result) > 0) {
    //             return new Books($row['id'], $row['nama'], $row['penulis'], $row['tanggal_terbit'], $row['deleted_at'] != null ? true : false);
    //         } else {
    //             return null;
    //         }
    //     } else {
    //         return null;
    //     }
    // }

    // public function AddBook(string $nama, string $penulis, string $tanggal_terbit): GlobalResponse
    // {
    //     $sql = "INSERT INTO $this->bukuTable VALUES (null, '$nama', '$penulis', '$tanggal_terbit',now(),now(),null)";
    //     $result = mysqli_query($this->koneksi, $sql);
    //     if ($result) {
    //         $global = new GlobalResponse(200, "Add Book Success", null);
    //         return $global;
    //     } else {
    //         return new GlobalResponse(400, "Add Book Failed", null);
    //     }
    // }

    // public function UpdateBook(int $id, string $nama, string $penulis, string $tanggal_terbit): GlobalResponse
    // {
    //     $sql = "UPDATE $this->bukuTable SET nama = '$nama', penulis = '$penulis', tanggal_terbit = '$tanggal_terbit',updated_at=now() WHERE id = $id";
    //     $result = mysqli_query($this->koneksi, $sql);
    //     if ($result) {
    //         $global = new GlobalResponse(200, "Update Book Success", null);
    //         return $global;
    //     } else {
    //         return new GlobalResponse(400, "Update Book Failed", null);
    //     }
    // }

    // public function DeleteBook(int $id): GlobalResponse
    // {
    //     $sql = "UPDATE $this->bukuTable SET deleted_at=now() WHERE id = $id";
    //     $result = mysqli_query($this->koneksi, $sql);
    //     if ($result) {
    //         $global = new GlobalResponse(200, "Delete Book Success", null);
    //         return $global;
    //     } else {
    //         return new GlobalResponse(400, "Delete Book Failed", null);
    //     }
    // }
}

$controller = new Controller();