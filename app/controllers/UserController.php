<?php
class UserController {
    public function dashboard(Request $request): void {
        Response::view("dashboard", ["user" => $request->user()]);
    }
    
    public function profile(Request $request): void {
        Response::view("profile", ["user" => $request->user()]);
    }
}
