<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>General Tech Services LLC</title>
     </head>

     <body style="margin:0px; padding:0px;">

          <div style="width:800px;height:auto;border:1px solid #dbdada;padding:10px; margin:10px auto; ">
               <div style="font-family:Arial; font-size:18px; color:#d72422;text-transform:uppercase; float:left; text-align:left; padding:10px 0px; margin-left:10px;">Your Login Information</div>
               <table width="98%" border="0" cellpadding="10" cellspacing="0" style="font-family:sans-serif; color:#333; font-size:13px;">
                    <tr style="background:#f2f2f2;">
                         <td width="30%"><strong>Username </strong></td>
                         <td width="67%"><?php echo $email; ?></td>
                    </tr>
                    <tr>
                         <td><strong>Password</strong></td>
                         <td><?php echo $password; ?></td>
                    </tr>
               </table>
               <div style="clear:both"></div>
          </div>
     </body>
</html>
