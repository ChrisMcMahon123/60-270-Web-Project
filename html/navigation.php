<?php 
//temp variables which will be unset after being used
$currentPage = $_SERVER['REQUEST_URI'];
$userLoginFlag = $_SESSION['logged_in_flag'];

if(isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
}
else {
  $username = null;
}

//don't let the user view this page directly
if(strpos($currentPage, 'navigation')) {
  header('Location: home.php'); 
}
?>
<div id="navigation-bar">
  <div id="navigation-bar-content">
      <nav id="navigation-bar-items" class="nav nav-pills flex-column flex-sm-row m-2">
        <a class="flex-sm-fill" href="home.php"><h1>Textbook Directory</h1></a>
        <?php 
        if(strpos($currentPage, 'home')) { ?>
          <a class="flex-sm-fill btn btn-primary" href="home.php" style="margin: 10px 1%;">Home</a>
        <?php 
        }
        else { ?>
          <a class="flex-sm-fill btn btn-outline-primary" style="margin: 10px 1%;" href="home.php">Home</a>
        <?php
        }

        if(strpos($currentPage, 'browse')) { ?>
          <a class="flex-sm-fill btn btn-primary" style="margin: 10px 1%;" href="browse.php">Browse</a>
        <?php 
        }
        else { ?>
          <a class="flex-sm-fill btn btn-outline-primary" style="margin: 10px 1%;" href="browse.php">Browse</a>
        <?php
        }
        
        if($userLoginFlag) {
          if(strpos($currentPage, 'upload')) { ?>
            <a class="flex-sm-fill btn btn-primary" style="margin: 10px 1%;" href="upload.php">Upload</a>
          <?php 
          }
          else { ?>
            <a class="flex-sm-fill btn btn-outline-primary" style="margin: 10px 1%;" href="upload.php">Upload</a>
          <?php
          } 
        }

        if(strpos($currentPage, 'contact')) { ?>
          <a class="flex-sm-fill btn btn-primary" style="margin: 10px 1%;" href="contact.php">Contact</a>
        <?php 
        }
        else { ?>
          <a class="flex-sm-fill btn btn-outline-primary" style="margin: 10px 1%;" href="contact.php">Contact</a>
        <?php
        }
        
        if($userLoginFlag) {
          if(strpos($currentPage, 'account')) { ?>
            <a id="account-dropdown-button" class="flex-sm-fill btn btn-primary dropdown-toggle" data-toggle="dropdown" style="margin: 10px 1%;" href="" role="button"><?php echo $username; ?></a>
          <?php 
          }
          else { ?>
            <a id="account-dropdown-button" class="flex-sm-fill btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" style="margin: 10px 1%;" href="" role="button"><?php echo $username; ?></a>
          <?php
          } ?>
          <div id="account-dropdown-menu" class="dropdown-menu">
            <a class="dropdown-item" href="account.php">Account Details</a>
            <a class="dropdown-item" href="../php/logout.php">Logout</a>
          </div>
        <?php
        } 
        else {
            if(strpos($currentPage, 'forms')) { ?>
              <a class="flex-sm-fill btn btn-primary" style="margin: 10px 1%;" href="forms.php">Login | Sign Up</a>
            <?php 
            }
            else { ?>
              <a class="flex-sm-fill btn btn-outline-primary" style="margin: 10px 1%;" href="forms.php">Login | Sign Up</a>
            <?php
            }
        } ?>
      </nav>
  </div>
</div>
<?php
unset($currentPage, $userLoginFlag, $username);
?>
