<?php 
$title = 'Contact Webmaster';
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
    
    <nav class="nav flex-column flex-sm-row">
        <div class="flex-sm-fill m-2">
            <ul class="list-group">
                <li class="list-group-item active">Contact Us</li>
                <li id="contact-form" class="list-group-item">
                    <div style="margin-bottom: 15px;">
                        <span style="font-weight: bold; margin-right: 5px;">Webmaster: </span> <?php echo $webMaster; ?>
                    </div>
                    <form name="contact" action="../php/form_contact.php" onsubmit="return validateContact(this)" method="post">
                        <div class="form-group">
                            <label for="email-contact">Email Address</label>
                            <input id="email-contact" type="email" class="form-control" name="email" placeholder="email@provider.com">
                            <div id="email-contact-hint" class="m-2">
                            </div>
                       </div>
                        <div class="form-group">
                            <label for="message-contact">Message</label>
                            <textarea rows="4" maxlength="500" id="message-contact" type="textarea" class="form-control" name="message" placeholder="Message"></textarea>
                        <div id="message-contact-hint" class="m-2">
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="radio-request" name="type" value="Request" checked="checked">
                                <label class="form-check-label" for="radio-request">Request</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="radio-issue" name="type" value="Issue">
                                <label class="form-check-label" for="radio-issue">Issue</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="radio-other" name="type" value="Other">
                                <label class="form-check-label" for="radio-other">Other</label>
                            </div>
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

<?php require('footer.php'); ?>
</body>
</html>
