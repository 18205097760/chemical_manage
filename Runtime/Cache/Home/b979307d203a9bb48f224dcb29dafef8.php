<?php if (!defined('THINK_PATH')) exit(); $data = $_SESSION['search']; foreach ($data as $row) { echo ($row->id); echo (" "); echo ($row->name_zh); echo (" "); echo ($row->name_en); echo (" "); echo ("cas:".$row->cas); echo ("<br />"); }