<?php

$result = $this->db->get('karyawan')->result_array();

echo json_encode($result);