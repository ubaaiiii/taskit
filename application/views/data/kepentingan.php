<?php

$result = $this->db->get('kepentingan')->result_array();

echo json_encode($result);