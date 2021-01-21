<?php

class Logger {
  protected $path;

  public function __construct() {
    $this->path = LOGS_DIR;
  }

  public function info($message) {
    $this->log('info', $message);
  }

  public function warn($message) {
    $this->log('warn', $message);
  }

  public function error($message) {
    $this->log('error', $message);
  }

  protected function log($type, $message) {
    $handle = fopen($this->path . '/app.log', 'a+');
    fwrite($handle, $type . ' : ' . $message . PHP_EOL);
    fclose($handle);
  }
}