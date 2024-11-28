
<?php
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
    echo "
    <div id='success-popup' style='position: fixed; top: 20%; left: 50%; transform: translate(-50%, -50%); background: #d4edda; color: #155724; padding: 20px; border-radius: 5px; border: 1px solid #c3e6cb; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>
        <p>$message</p>
    </div>
    <script>
        setTimeout(() => {
            document.getElementById('success-popup').style.display = 'none';
        }, 3000); // Hide after 3 seconds
    </script>
    ";
}
?>
