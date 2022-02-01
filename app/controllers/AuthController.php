<?php
class AuthController {
    public function loginForm(Request $request): void {
        Response::view("auth/login");
    }
    
    public function login(Request $request): void {
        $email = $request->body["email"] ?? "";
        $password = $request->body["password"] ?? "";
        
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user"] = new User($user);
            Response::redirect("/dashboard");
        }
        
        Response::view("auth/login", ["erro" => "Email ou senha invalidos"]);
    }
    
    public function registerForm(Request $request): void {
        Response::view("auth/register");
    }
    
    public function register(Request $request): void {
        $data = $request->body;
        if ($data["password"] !== ($data["confirm_password"] ?? "")) {
            Response::view("auth/register", ["erro" => "Senhas nao conferem"]);
            return;
        }
        
        $db = Database::getInstance();
        $hash = password_hash($data["password"], PASSWORD_BCRYPT);
        $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$data["name"], $data["email"], $hash]);
        
        $_SESSION["user_id"] = $db->lastInsertId();
        Response::redirect("/dashboard");
    }
    
    public function logout(Request $request): void {
        session_destroy();
        Response::redirect("/login");
    }
}
