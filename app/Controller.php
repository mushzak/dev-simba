<?php

namespace App;

use R2\DependencyInjection\ContainerInterface;
use R2\DependencyInjection\ContainerAwareInterface;

/**
 * Ancestor for every Controller.
 * @property \R2\DependencyInjection\Container  $container  Dependency injection container
 * @property \R2\Templating\Dirk                $view       Templating engine
 * @property \Psr\Log\AbstractLogger            $logger     Application logger
 * @property \R2\DBAL\DBALInterface             $db         Database
 * @property \R2\Security\WordPress\Auth        $auth       Authentication
 * @property \FastRoute\Dispatcher              $router     Router
 * @property false|array                        $user       Current user
 */

abstract class Controller implements ContainerAwareInterface
{
    private $container;

    /**
     * Assgin container
     * Served by Service Container
     *
     * @param \R2\DependencyInjection\ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Get assigned container
     * 
     * @return \R2\DependencyInjection\ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Magic to instantiate services only once for all controllers
     * @param string $name
     * @return object
     */
    public function __get($name)
    {
        return $this->container->get($name);
    }

    /**
     * Gets a parameter.
     * @param string $name The parameter name
     * @return mixed The parameter value
     */
    public function getParameter($name)
    {
        return $this->container->getParameter($name);
    }

    public function debugLevel()
    {
        return $this->container->getParameter('DEBUG');
    }

    public function linebreaks($str)
    {
        return str_replace(array("\r\n", "\r"), "\n", $str);
    }
    
    public function error($message, array $context = array())
    {
        $this->logger->error($message, $context);
    }

    public function warning($message, array $context = array())
    {
        $this->logger->warning($message, $context);
    }

    public function info($message, array $context = array())
    {
        $this->logger->info($message, $context);
    }

    public function render($name, array $data = [])
    {
        $this->view->render($name, $data);
    }

    public function fetch($name, array $data = [])
    {
        return $this->view->fetch($name, $data);
    }

    public function message($message, $title = 'Message')
    {
        $this->view->render('message.common', compact('title', 'message'));
        exit();
    }

    /**
     * Do a HTTP redirect response to the given URL
     * Note: on a target the Referer header will be set to preceding URL.
     *
     * @param string  $url    The URL to redirect to
     * @param integer $status The status code to use for the Response
     */
    public function redirect($url, $status = 302)
    {
        if (parse_url($url, PHP_URL_HOST) === null) {
            $url = $this->getParameter('BASE_URL').$url;
        }
        header('Location: '.$url, true, $status);
        exit();
    }

    /**
     * Return 403 Forbidden status
     *
     */
    public function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        exit();
    }

    /**
     * Return JSON data with right header
     * @param mixed $data
     */
    public function returnJson($data)
    {
        header('Content-type: application/json');
        echo json_encode($data, JSON_FORCE_OBJECT);
        exit();
    }

    public function isAjax()
    {
        return filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH') === 'XMLHttpRequest';
    }

    public function isPost()
    {
        return strtoupper(filter_input(INPUT_SERVER, 'REQUEST_METHOD')) === 'POST';
    }

    public function url($name, array $parameters = [])
    {
        return $this->router->url($name, $parameters);
    }

    public function collect(array $vars, array $names, $default = '')
    {
        $defaults = is_array($default)
            ? ($default + array_fill_keys($names, ''))
            : array_fill_keys($names, $default);
        return array_intersect_key($vars, $defaults) + $defaults;
    }

    public function collectPost(array $names, $default = '')
    {
        return $this->collect(filter_input_array(INPUT_POST) ?: [], $names, $default);
    }

    public function collectGet(array $names, $default = '')
    {
        return $this->collect(filter_input_array(INPUT_GET) ?: [], $names, $default);
    }

    public function validate($entity, $group = null)
    {
        return $this->validator->validate($entity, $group);
    }

 }