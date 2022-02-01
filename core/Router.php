<?php
class Router {
    private array $routes = [];
    
    public function add(string $method, string $path, string $handler, array $middleware = []): void {
        $this->routes[] = compact("method", "path", "handler", "middleware");
    }
    
    public function dispatch(Request $request): void {
        foreach ($this->routes as $route) {
            $pattern = preg_replace("/\{(\w+)\}/", "(?P<$1>[^/]+)", $route["path"]);
            $pattern = "#^" . $pattern . "$#";
            
            if ($route["method"] === $request->method && preg_match($pattern, $request->uri, $matches)) {
                foreach ($route["middleware"] as $mw) {
                    $mwInstance = new $mw();
                    if (!$mwInstance->handle($request)) {
                        Response::redirect("/login");
                        return;
                    }
                }
                [$controller, $action] = explode("@", $route["handler"]);
                $ctrl = new $controller();
                $params = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);
                $ctrl->$action($request, ...$params);
                return;
            }
        }
        Response::json(["erro" => "Rota nao encontrada"], 404);
    }
}
