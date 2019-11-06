<?php

//search data
if (isset($_GET['search'])) {
  $data = $db->searchData($_GET['search']);
}else {
  $data = $db->getData();
}
