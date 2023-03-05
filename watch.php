<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Robotino Online</title>
   
  
  </head>
  <body  >
         
      Welcome <?php echo $_POST["yourname"]; ?><br>
Your neptune code is: <?php echo $_POST["neptuncode"]; ?>
  <div class='sk-ww-twitch-live-videos' data-embed-id='102236'></div><script src='https://widgets.sociablekit.com/twitch-live-videos/widget.js' async defer></script>
  
  <form  method="post"  action="https://robotino-online.bouraam.com">
      <div class="form-submit-wrapper"><input type="submit"  name="mysubmitbutton1" value="Submit" class="form-submit-btn monday-style-button monday-style-button--size-medium monday-style-button--kind-primary monday-style-button--color-primary has-style-size" data-testid="button" aria-disabled="false" aria-busy="false" style="--element-width:82.4219px; --element-height:40px;"></div>

         </form> 
<?php
         
           if(isset($_POST['matlabcode']))
{
    unlink('studentcodeinhost.m');   
$data=$_POST['matlabcode'];

$fp = fopen('studentcodeinhost.m', 'a');
$myfile = fopen("isthecodeready.txt", "w");
$txt="1";
fwrite($fp, $data);
fwrite($myfile, $txt);
fclose($myfile);
fclose($fp);


}



 ?>
 

     
</body>
</html>