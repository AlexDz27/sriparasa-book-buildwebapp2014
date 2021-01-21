<?php

abstract class BaseModel {
  protected $db;

  public function __construct() {
    $this->db = new Database(DB_VENDOR, DB_HOST, DB_NAME, DB_USR, DB_PWD);
  }
}