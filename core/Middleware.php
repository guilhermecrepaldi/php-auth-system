<?php
class AuthMiddleware {
    public function handle(Request $request): bool {
        return isset($_SESSION["user_id"]);
    }
}
