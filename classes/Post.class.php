<?php
require_once "autoload.php";

class Post {
    private $ID = "";
    private $userID = "";
    private $timestamp = 0;
    private $title = "";
    private $photo = "";
    private $content = "";
    private $username = "";

    public function __construct($data = null) {
        $this->timestamp = time();
        if (is_array($data)) {
            // TODO
            // Create a post from an array.
            if (isset($data["id"])) {
                $this->ID = $data["id"];
            }if (isset($data["user_id"])) {
                $this->userID = $data["user_id"];
            }if (isset($data["username"])) {
                $this->username = $data["username"];
            }
            if (isset($data["title"])) {
                $this->title = $data["title"];
            }
            if (isset($data["content"])) {
                $this->content = $data["content"];
            }
            if (isset($data["photo"])) {
                $this->photo = $data["photo"];
            }
            if (isset($data["username"])) {
                $this->username = $data["username"];
            }
            if (isset($data["timestamp"])) {
                $this->timestamp = $data["timestamp"];
            }
           
        }
    }

    public function getID() {
        return $this->ID;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getDateTime() {
        // TODO
        return $this->timestamp;
    }

    public function getTitle() {
        // TODO
        return $this->title;
    }

    public function getContent() {
        // TODO
        return $this->content;
    }
    public function getPhoto() {
        // TODO
        return $this->photo;
    }

    public function getUsername() {
        // TODO
        return $this->username;
    }

    public function getComments() {
        $comments = [];
        // TODO
        return $comments;
    }

    public function insert($dbh) {
        // TODO
        // Insert a new record to the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
        $var=$dbh->prepare("INSERT INTO post(user_id,timestamp,title,content,photo) VALUES (:user_id,:timestamp,:title,:content,:photo)");
        $var->execute(array(
            'user_id' => $this->userID,
            'timestamp' => $this->timestamp,
            'title' => $this->title,
            'content' => $this->content,
            'photo' => base64_encode($this->photo)
        ));
    }

    public function update($dbh,$key) {
        // TODO
        // Update a record in the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
                $var=$dbh->query("UPDATE  post SET title='$this->title',content='$this->content',photo='$this->photo' where id='$key'");


    }

    public function delete($dbh,$key) {
        // TODO
        // Delete a record in the database handled by $dbh.
        // $dbh can be an instance of mysqli or of PDO.
        $dbh->query("DELETE FROM  post WHERE id='$key'");

    }
}
