<script src="../js/custom.js">
</script>
<body onload="logout()"></body>
<?php
session_start();
session_destroy();
?>
<script type="text/javascript">
    window.location.href = 'menu.php';
</script>
