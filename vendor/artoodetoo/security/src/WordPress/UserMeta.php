<?php

namespace R2\Security\WordPress;

class UserMeta
{
    private $db;
    private $cache;

    public function __construct($db)
    {
        $this->db = $db;
        $this->cache = [];
    }

    public function get($id, $key, $single = false)
    {
        if (!isset($this->cache[$id])) {
            $this->cache[$id] = [];
            $result = $this->db
                ->query(
                    "SELECT `um`.`meta_key`, `um`.`meta_value` ".
                    "FROM `:p_usermeta` AS `um` ".
                    "WHERE `um`.`user_id` = :ID",
                    ['ID' => $id]
                );
            while ($row = $result->fetchRow()) {
                list($k, $v) = $row;
                if (!isset($this->cache[$id][$k])) {
                    $this->cache[$id][$k] = [];
                }
                $this->cache[$id][$k][] = $v;
            }
        }
        if (isset($this->cache[$id][$key]) ) {
            return $single ? $this->cache[$id][$key][0] : $this->cache[$id][$key];
        }
        return $single ? '' : [];
    }
}
