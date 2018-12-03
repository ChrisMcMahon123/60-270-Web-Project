<?php
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'footer')) {
    header('Location: home.php'); 
}
?>
<footer class="footer">
    <div class="container">
        <span class="text-muted">Source code for the website available at <a href="https://github.com/ChrisMcMahon123/Web-Project" target="_blank" rel="noopener noreferrer">https://github.com/ChrisMcMahon123/Web-Project</a></span>
    </div>
</footer>