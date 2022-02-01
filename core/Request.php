<?php
class Request {
    public string $method;
    public string $uri;
    public array $body;
    public array $query;
    public array $session;
    
    public function __construct() {
        $this->method = $_SERVER["REQUEST_METHOD"];
        $this->uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $this->body = $_POST;
        $this->query = $_GET;
        $this->session = &$_SESSION;
    }
    
    public static function fromGlobals(): self {
        return new self();
    }
    
    public function user(): ?User {
        return $_SESSION["user"] ?? null;
    }
}
