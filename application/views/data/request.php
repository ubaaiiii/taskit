<?php

$result = $this->db->get('request')->result_array();

echo json_encode($result);