<?php 
$title = 'Textbook Directory';
?>
<!DOCTYPE html>
<html>
<head>
<?php require('header.php'); ?>
</head>
<body>
<?php require('navigation.php'); ?>

<div id="main-content-area">
    <?php require('error_codes.php'); ?>

    <nav class="nav flex-column flex-sm-row ">
        <div class="flex-sm-fill m-2">
            <img id="home-image" src="../image/textbook2.jpg" alt="Main Image"/>
        </div>
    </nav>

    <nav class="nav flex-column flex-sm-row ">
        <div class="flex-sm-fill m-2">
            <h3>About</h3>
            <p>
            The main goal of this website is to provide an easy experience for university / college students to find and download textbooks.
            Post secondary education is already extremely expensive and the costs are increasing yearly. Students find themselves spending most 
            of their money on living expenses and tuition. This website attempts to alleviate some of the burden by providing free downloads for
            textbooks that they may need in their studies. School textbooks, though required by most courses, aren't heavily used throughout the course.
            Often only being used for specifc sections, like questions or that one quote on page 255... Then, they are never to be used again. This would not
            be such a bad thing if textbooks were not astronomically expensive when comparing price to usefulness.    
            </p>
            <p>
            This website is self sufficent, in the sense that users rely upon other users to provide the content of this website. The content of this website soley 
            resides upon how acive / determined the users of this website are in providing cost savings to students.
            </p>
        </div>
    </nav>

    <h3 class="m-2">Account Features</h3>
    <nav class="nav flex-column flex-sm-row ">
        <div id="guest-list" class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active">Guest</li>
                <li class="list-group-item">Browse</li>
                <li class="list-group-item">Search</li>
                <li class="list-group-item">Ads</li>
            </ul>
        </div>
        <div id="registered-list" class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active">Registered</li>
                <li class="list-group-item">Browse</li>
                <li class="list-group-item">Search</li>
                <li class="list-group-item">Download Files</li>
                <li class="list-group-item">Upload Files</li>
                <li class="list-group-item">Ads</li>
            </ul>
        </div>
        <div id="premium-list" class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active">Premium</li>
                <li class="list-group-item">Browse</li>
                <li class="list-group-item">Search</li>
                <li class="list-group-item">Download Files</li>
                <li class="list-group-item">Upload Files</li>
                <li class="list-group-item">Ad Free Browsing</li>
            </ul>
        </div>
    </nav>
</div>

<?php require('footer.php'); ?>
</body>
</html>
