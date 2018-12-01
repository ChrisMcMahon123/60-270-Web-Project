<?php 
include('../php/variables.php');

$title = 'Contact Webmaster';
?>
<!DOCTYPE html>
<html>
<head>
<?php include('header.php'); ?>
</head>
<body>
<?php include('navigation.php'); ?>

<div id="main-content-area">
    <nav class="nav flex-column flex-sm-row ">
        <div class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active">Contact Webmaster</li>
                <li id="login-form" class="list-group-item">
                    <form>
                        <div class="form-group">
                            <label for="email-contact">Email Address</label>
                            <input id="email-contact" type="email" class="form-control" name="email" placeholder="email@provider.com" required="required">
                        </div>
                        <div class="form-group">
                            <label for="message-contact">Message</label>
                            <textarea rows="4" maxlength="500" id="message-contact" type="textarea" class="form-control" name="message" placeholder="Message" required="required"></textarea>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="radio-request" name="type" value="Request" checked="checked" required="required">
                            <label class="form-check-label" for="radio-request">Request</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="radio-issue" name="type" value="Issue" required="required">
                            <label class="form-check-label" for="radio-issue">Issue</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="radio-other" name="type" value="Other" required="required">
                            <label class="form-check-label" for="radio-other">Other</label>
                        </div>
                        <div style="margin-top: 5px;">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>   
                </li>
            </ul>
        </div>
        <div class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active">We would love to hear from you!</li>
                <li class="list-group-item">Have a request?</li>
                <li class="list-group-item">Download links broken?</li>
                <li class="list-group-item">Let us know you experience!</li>
                <li class="list-group-item">Any suggestions? </li>
            </ul>
        </div>   
    </nav>
</div>

<?php include('footer.php'); ?>
</body>
</html>