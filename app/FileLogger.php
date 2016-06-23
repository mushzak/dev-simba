<?php

namespace App;

use Psr\Log\AbstractLogger;

class FileLogger extends AbstractLogger
{
    private $dir;
    private $subPath;
    
    /**
     * Constructor.
     * 
     * @param string $dir Where to store logs
     */
    public function __construct($dir, $subPath = '')
    {
        $this->dir = $dir;
        $this->subPath = $subPath;
    }
    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level    Name of log file w/o path and extention
     * @param string $message Message
     * @param array $context  Trace
     */
    public function log($level, $message, array $context = array())
    {
        $timestamp = date('Y-m-d H:i:s');
        $text = '';
        if (!empty($context)) {
            foreach ($context as $x) {
                if (!isset($x['file'])) {
                    continue;
                }
                $file = $this->subPath && strpos($x['file'], $this->subPath) === 0
                    ? substr($x['file'], strlen($this->subPath))
                    : $x['file'];
                $text .= $file.':'.$x['line']."\n";
            }
        }
        \error_log("\n*** {$timestamp} $message\n{$text}\n", 3, $this->dir.'/'.$level.'.log');
    }
}
