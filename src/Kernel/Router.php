<?php
namespace Kernel;

class Router
{
    private static $routes = [];
    private static $pathNotFound;


    /**
     * Function used to add a new route
     * @param string $expression    Route string or expression
     * @param callable $handler     Controller to call if route with allowed method is found
     * @param string|array $method  Either a string of allowed method or an array with string values
     *
     */
    public static function add($expression, $handler, $method = 'get')
    {
        self::$routes[] = [
            'expression' =>$expression,
            'handler' => $handler,
            'method' => $method
        ];
    }

    public static function pathNotFound($handler)
    {
        self::$pathNotFound = $handler;
    }

    public static function run()
    {
        $basePath = '/';
        $caseMatters = false;
        $trailingSlashMatters = false;
        $multiMatch = false;
        // Parse current URL
        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);

        if (isset($parsedUrl['path']) && $parsedUrl['path'] !== '/') {
            if ($trailingSlashMatters) {
                $path = $parsedUrl['path'];
            } else {
                $path = rtrim($parsedUrl['path'], '/');
            }
        } else {
            $path = '/';
        }

        // Get current request method
        $method = $_SERVER['REQUEST_METHOD'];

        $routeMatchFound = false;

        foreach (self::$routes as $route) {

            // If the method matches check the path

            // Add basepath to matching string
            if ($basePath !== '' && $basePath !== '/') {
                $route['expression'] = '('.$basePath.')'.$route['expression'];
            }

            // Add 'find string start' automatically
            $route['expression'] = '^'.$route['expression'];

            // Add 'find string end' automatically
            $route['expression'] .= '$';

            // Check path match
            if (preg_match('#'.$route['expression'].'#'.($caseMatters ? '' : 'i'), $path, $matches)) {
                $pathMatchFound = true;

                // Cast allowed method to array if it's not one already, then run through all methods
                foreach ((array)$route['method'] as $allowedMethod) {
                    // Check method match
                    if (strtolower($method) === strtolower($allowedMethod)) {
                        array_shift($matches); // Always remove first element. This contains the whole string

                        if ($basePath !== '' && $basePath !== '/') {
                            array_shift($matches); // Remove basepath
                        }
                        $handler = $route['handler'];
                        $controller = new $handler[0]();

                        $controller->{$handler[1]}(...$matches);

                        $routeMatchFound = true;

                        // Do not check other routes
                        break;
                    }
                }
            }

            // Break the loop if the first found route is a match
            if($routeMatchFound && !$multiMatch) {
                break;
            }

        }

        // No matching route was found
        if (!$routeMatchFound) {
            // But a matching path exists
            if (self::$pathNotFound) {
                $handler = self::$pathNotFound;
                $controller = new $handler[0]();

                $controller->{$handler[1]}($path);
            }
        }
    }
}
