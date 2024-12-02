<?php ?>
<?php
session_start();
if (isset($_SESSION['customer'])) {
	unset($_SESSION['customer']);
	echo '<script>
             setTimeout(function() {
             window.location.href = "no-header-MRT.php";
                }, 1000);
        </script>';

} else {
	echo '您原本就已登出。';
}
?>
<?php ?>
