<?php
//don't let the user view this page directly
if(strpos($_SERVER['REQUEST_URI'], 'footer')) {
    header('Location: home.php?code=14'); 
}
?>
<footer class="footer">
    <div class="container">
        <span class="text-muted"><a href="https://github.com/ChrisMcMahon123/Web-Project" target="_blank" rel="noopener noreferrer">Source code for the website</a></span>
    </div>
</footer>