<?php
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'footer')) {
    header('Location: home.php'); 
}
?>
<footer class="footer">
    <div class="container">
        <span class="text-muted">All content in this website falls under the GPL.</span>
    </div>
</footer>