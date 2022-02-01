<?php
class Response {
    public static function json(array $data, int $status = 200): void {
        http_response_code($status);
        header("Content-Type: application/json");
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
    
    public static function redirect(string $url): void {
        header("Location: " . $url);
        exit;
    }
    
    public static function view(string $name, array $data = []): void {
        extract($data);
        require "app/views/" . $name . ".php";
    }
}
