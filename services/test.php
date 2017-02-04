<?php
require_once 'class.BagelDao.inc';

$dao = new BagelDao();
//echo $dao->placeorder('surendra', '1:4:dfs_1:4:dfs','20', 'casd', 'df', 'fsd', 'zip');
//echo $dao->test('surendra', '20', 'casd', 'df', 'fsd', 'zip');
echo $dao->deliver(16);
?>