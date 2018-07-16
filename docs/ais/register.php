<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta content="text/html; charset=ISO-8859-1"
      http-equiv="Content-Type">
    <title>Contact Form</title>
  </head>

<?php
$mailto = $_REQUEST['mailto']; //will put in the variable $email the sent email ..
$subject = $_REQUEST['subject']; //will put in the variable $email the sent email ..
$body = $_REQUEST['body']; //will put in the variable $email the sent email ..
?>

	<table width="650px" border=2>
	<tr><td align=center>
		<h2><?php echo $subject ; ?></h2>
	</td></tr>
	<tr><td>
    	<form name="contactform" method="post" action="contact.php">
      		<table width="600px">
        	<tbody>
		<tr><td colspan=2><br>Please enter your details.<br>
		</td></tr>
          	<tr>
            	<td valign="top"> <label for="first_name">First Name *</label></td>
	        <td valign="top"> <input name="first_name" maxlength="50"
                size="30" type="text"> </td>
          	</tr>
          	<tr>
            	<td valign="top"> <label for="last_name">Last Name *</label>
            	</td>
            	<td valign="top"> <input name="last_name" maxlength="50"
                	size="30" type="text"> </td>
          	</tr>
          	<tr>
            	<td valign="top"> <label for="emailfrom">Email Address *</label>
            	</td>
            	<td valign="top"> <input name="emailfrom" maxlength="80"
                	size="30" type="text"> </td>
          	</tr>
          	<tr>
            	<td valign="top"> <label for="comments">Comments<br>1000 Character limit</label>
            	</td>
            	<td valign="top"><textarea name="comments"
                maxlength="1000" cols="50" rows="6"></textarea> </td>
          	</tr>
          	<tr>
            	<td valign="top"> <input name="emailto" maxlength="80"
                	size="30" type="hidden" value="<?php echo $mailto ; ?>" > </td>
          	</tr>
          	<tr>
            	<td valign="top"> <input name="sysinfo" maxlength="80"
                	size="30" type="hidden" value="<?php echo $body ; ?>" > </td>
          	</tr>
          	<tr>
            	<td valign="top"> <input name="subject" maxlength="80"
                	size="80" type="hidden" value="<?php echo $subject ; ?>" > </td>
          	</tr>
          	<tr>
            	<td colspan="2" style="text-align:center"> <input
                value="Submit" type="submit"> <a
                href="./contact.php"></a> </td>
          	</tr>
		<tr>
	   	<td colspan="2">

	<br><b>or </b>
<!-- neal_arundale@arundale.co.uk just displays the email
	<script language="JavaScript">
document.write('<a h'+'ref="m'+'ailt'+'o:'+'%6e%65%61%6c%5f%61%72%75%6e%64%61%6c%65%40%61%72%75%6e%64%61%6c%65%2e%63%6f%2e%75%6b">email more information</a>');
</script>  -->
<!-- neal@arundale.com (see http://www.asciitohex.com/ for conversion) -->
	<script language="JavaScript">
document.write('<a h'+'ref="m'+'ailt'+'o:'+'%6e%65%61%6c%40%61%72%75%6e%64%61%6c%65%2e%63%6f%6d">email more information</a>');
</script>
		</td>
        	</tr>
        	</tbody>
      		</table>
	</form>
    	</td></tr>
    	</table>
  </body>
</html>
