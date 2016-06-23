<?php

namespace App;

use R2\DependencyInjection\Container;
use App\Controller;
use ErrorException;

/**
 * Main Web Application object.
 * Handles every HTTP request, PHP error or exception.
 */
class App extends Controller
{
    /**
     * Constructor
     */
    public function __construct(array $config = null)
    {
        // Set handlers
        set_error_handler([$this, 'onError']);
        set_exception_handler([$this, 'onException']);
        // Application container will assigned to each Controller
        $container = new Container($config);
        $this->setContainer($container);
        // View Composer allows to use implicit variables
        $container->get('view')->composer(
            ['layout.*', 'message.*'],
            [
                'ASSETS_REV' => $container->getParameter('ASSETS_REV')
            ]
        );
        $container->get('view')->composer(
            'layout.*',
            function($view) use($container) {
                $wpUrl = $this->getParameter('WP_URL');
                $baseUrl = $this->getParameter('BASE_URL');
                $user = $this->user;
                if ($user) {
                    $nonce = $this->auth->createNonce('log-out');
                    $userLinkCaption = "Log out";
                    $userLinkUrl = "{$wpUrl}/wp-login.php?action=logout&_wpnonce={$nonce}&redirect_to={$baseUrl}/";
                } else {
                    $userLinkCaption = "Log in";
                    $userLinkUrl = "{$wpUrl}/wp-login.php?redirect_to={$baseUrl}/account/";
                }
                return compact('userLinkCaption', 'userLinkUrl');
            }
        );
        // Configure router
        $routesMap = $this->getParameter('CONFIG').'/routes.php';
        $routesCache = $this->getParameter('storage').'/framework/cache/routes.php';
        if (file_exists($routesCache) && filemtime($routesCache) < filemtime($routesMap)) {
            @unlink($routesCache);
        }
        $container->set('router', \FastRoute\cachedDispatcher(
            new \R2\Junc\RouteMapper($routesMap),
            [ 
                'cacheFile'     => $routesCache, 
                'cacheDisabled' => false 
            ]
        ));
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        if ($this->debugLevel()) {
            $end = microtime(true);
            $start = $this->getParameter('START');
            $this->info('Request completed in ' . number_format($end - $start, 4) . ' s');
        }
        restore_exception_handler();
        restore_error_handler();
    }

    /**
     * PHP error handler
     * @param int    $errno   E_ERROR or E_WARNING or so
     * @param string $errstr  Error message
     * @param string $errfile File where it happens
     * @param int    $errline Line where it happens
     * @throws \ErrorException
     */
    public function onError($errno, $errstr, $errfile, $errline)
    {
        if (!in_array($errno, [E_WARNING, E_NOTICE, E_USER_WARNING, E_USER_NOTICE])) {
            throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
        }
        $trace = debug_backtrace();
        $this->warning($errstr, $trace);
        if ($this->debugLevel() >= 2) {
            echo '** Non-critical error: '.$errstr."\n";
        }
    }

    /**
     * Exception handler
     * @param \Exception $e
     */
    public function onException(\Exception $e)
    {
        $trace = $e->getTrace();
        array_unshift($trace, ['file' => $e->getFile(), 'line' => $e->getLine()]);
        $this->error($e->getMessage(), $trace);
        if ($this->debugLevel() >= 1) {
            echo '*** Fatal error: '.$e->getMessage()."\n";
        }
    }

    /**
     * Main application routine
     */
    public function run()
    {
        $uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
        if (($p = strpos($uri, '?')) !== false) {
            $uri = substr($uri, 0, $p);
        }
        $method = strtoupper(filter_input(INPUT_SERVER, 'REQUEST_METHOD'));
        if (!$this->doRoute($uri, $method)) {
            if (strpos(basename($uri), '.') !== false || $uri{strlen($uri) - 1} === '/' || !$this->doRoute($uri.'/', $method)) {
                $this->message('404 Page not found');
            }
        }
    }

    /**
     * Route request to appropriate controller action.
     *
     * @param string $pathInfo      Request URI (without base prefix)
     * @param string $requestMethod Request method
     *
     * @return boolean Success
     */
    private function doRoute($pathInfo, $requestMethod)
    {
        $routeInfo = $this->router->dispatch($requestMethod, $pathInfo);
        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                return false;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                header("HTTP/1.0 405 Method Not Allowed");
                return false;
            case \FastRoute\Dispatcher::FOUND:
                $handler = $this->normalizeHandler($routeInfo[1]['do']);
                echo $handler($routeInfo[2]);
                return true;
        }
    }

    private function normalizeHandler($handler)
    {
        if (is_string($handler) && strpos($handler, ':') !== false) {
            $handler = explode(':', $handler);
            if (strpos($handler[0], '\\') === false) {
                $handler[0] = $this->get($handler[0]);
            }
        }
        if (is_array($handler) && is_string($handler[0])) {
            $class = $handler[0];
            $handler[0] = new $class();
            if ($handler[0] instanceof \R2\DependencyInjection\ContainerAwareInterface) {
                $handler[0]->setContainer($this->getContainer());
            }
        }
        return $handler;
    }
}