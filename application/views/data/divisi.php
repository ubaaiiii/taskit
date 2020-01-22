<?php

$result = $this->db->get('divisi')->result_array();

echo json_encode($result);