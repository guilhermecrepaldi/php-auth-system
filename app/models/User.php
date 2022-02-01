<?php
class User {
    public int $id;
    public string $name;
    public string $email;
    public string $created_at;
    
    public function __construct(array $data) {
        $this->id = (int)$data["id"];
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->created_at = $data["created_at"] ?? "";
    }
}
