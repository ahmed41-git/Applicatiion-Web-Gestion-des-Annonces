<?php
require_once "autoload.php";

class User {
    private $ID = "";
    private $username = "";
    private $password = "";
    private $passwordx = "";
    private $firstname = "";
    private $lastname = "";
    private $email = "";

    public function __construct($row = null) {
        if (is_array($row)) {
            // TODO
            // Create a user from an array.
            if (isset($row["username"])) {
                
                $this->username = $row["username"];}
                if (isset($row["password"])) {
                    $this->password = $row["password"];
                }
                if (isset($row["passwordx"])) {
                    $this->passwordx = $row["passwordx"];
                }
                if (isset($row["firstname"])) {
                    $this->firstname = $row["firstname"];
                }if (isset($row["lastname"])) {
                    $this->lastname = $row["lastname"];
                }if (isset($row["email"])) {
                    $this->email = $row["email"];
                }
            
        }
    }

    public function getID() {
        return  $this->ID;
    }

    public function getUsername() {
        // TODO
        return  $this->username;
    }

    public function getPassword() {
        // TODO
        return  $this->password;
    }
    public function getPasswordx() {
        // TODO
        return  $this->passwordx;
    }

    public function getFirstname() {
        return  $this->firstname;
       }

    public function getLastname() {
        return  $this->lastname;
       }

    public function getName() {
        // TODO
        // "Firstname Lastname"
        return  $this->firstname." ". $this->lastname;
    }

    public function getEmail() {
        // TODO
        return  $this->email;
    }

    public function insert($dbh) {
        // TODO
        // Insert a new record to the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
        $var=$dbh->prepare("INSERT INTO user(username,password,firstname,lastname,email) VALUES (:username,:password,:firstname,:lastname,:email)");
        $var->execute(array(
            'username' => $this->username,
            'password' => md5($this->password),
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email
        ));
    }

    public function update($dbh,$key) {
        // TODO
        // Update a record in the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
         $var=$dbh->query("UPDATE  user SET username='$this->username',firstname='$this->firstname',lastname='$this->lastname',email='$this->email' where id='$key'");

    }
}
