<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>������Ʒ</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>
<?php include("conn/conn.php");?>
<body topmargin="0" leftmargin="0" bottommargin="0">
<p>&nbsp;</p>
<table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20" bgcolor="#0099FF"><div align="center" class="style1">������Ʒ</div></td>
  </tr>
  <tr>
    <td height="253" bgcolor="#666666"><table width="720" border="0" cellpadding="0" cellspacing="0">
	<script language="javascript">
	function chkinput(form)
	{
	  if(form.mingcheng.value=="")
	   {
	     alert("��������Ʒ����!");
		 form.mingcheng.select();
		 return(false);
	   }
	  
	
	
	  if(form.huiyuanjia.value=="")
	   {
	     alert("��������Ʒ��Ա��!");
		 form.huiyuanjia.select();
		 return(false);
	   }
	 
	
	
	  if(form.shichangjia.value=="")
	   {
	     alert("��������Ʒ�г���!");
		 form.shichangjia.select();
		 return(false);
	   }
	  if(form.dengji.value=="")
	   {
	     alert("��������Ʒ�ȼ�!");
		 form.dengji.select();
		 return(false);
	   }
	   
	   
	   if(form.pinpai.value=="")
	   {
	     alert("��������ƷƷ��!");
		 form.pinpai.select();
		 return(false);
	   }
	   
	   if(form.xinghao.value=="")
	   {
	     alert("��������Ʒ�ͺ�!");
		 form.xinghao.select();
		 return(false);
	   }
	   if(form.shuliang.value=="")
	   {
	     alert("��������Ʒ����!");
		 form.shuliang.select();
		 return(false);
	   }
	   if(form.jianjie.value=="")
	   {
	     alert("��������Ʒ���!");
		 form.jianjie.select();
		 return(false);
	   }
	
	   return(true);
	}
    </script>
     <form name="form1" enctype="multipart/form-data" method="post" action="savenewgoods.php" onSubmit="return chkinput(this)">
	  <tr>
        <td width="129" height="25" bgcolor="#FFFFFF"><div align="center">��Ʒ���ƣ�</div></td>
        <td width="618" bgcolor="#FFFFFF"><div align="left"><input type="text" name="mingcheng" size="25" class="inputcss"></div></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#FFFFFF"><div align="center">����ʱ�䣺</div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="left">
<select name="nian" class="inputcss">
 <?php 
  for($i=1995;$i<=2050;$i++)
  {
 ?>
  <option><?php echo $i;?></option>
  <?php 
  }
 ?>
</select>          
��
          <select name="yue" class="inputcss">
            <?php 
            for($i=1;$i<=12;$i++)
             {
            ?>
           <option><?php echo $i;?></option>
            <?php 
             }
             ?>
          </select>
          ��
          <select name="ri" class="inputcss">
		  <?php 
            for($i=1;$i<=31;$i++)
             {
            ?>
		  
            <option><?php echo $i;?></option>
		 <?php 
             }
             ?>
          </select>
          ��</div></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#FFFFFF"><div align="center">���ۼ۸�</div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="left">�г��ۣ�<input type="text" name="shichangjia" size="10" class="inputcss" >
          Ԫ&nbsp;&nbsp;��Ա�ۣ�
          <input type="text" name="huiyuanjia" size="10" class="inputcss">
          Ԫ</div></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#FFFFFF"><div align="center">��Ʒ���ͣ�</div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="left">
           <?php
			$sql=mysql_query("select * from tb_type order by id desc",$conn);
			$info=mysql_fetch_array($sql);
			if($info==false)
			{
			  echo "����������Ʒ����!";
			}
			else
			{
			?>
            <select name="typeid" class="inputcss">
			<?php
			do
			{
			?>
              <option value=<?php echo $info[id];?>><?php echo $info[typename];?></option>
			<?php
			}
			while($info=mysql_fetch_array($sql));
			?>  
            </select>
            <?php
		     }
		    ?>
        </div></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#FFFFFF"><div align="center">��Ʒ�ȼ���</div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="left">
          <select name="dengji" class="inputcss">
            <option selected value="��Ʒ">��Ʒ</option>
            <option value="һ��">һ��</option>
            <option value="����">����</option>
            <option value="��̭">��̭</option>
          </select>
        </div></td>
      </tr>
      <tr>
        <td height="22" bgcolor="#FFFFFF"><div align="center">��ƷƷ�ƣ�</div></td>
        <td height="22" bgcolor="#FFFFFF"><div align="left"><input type="text" name="pinpai" class="inputcss" size="20"></div></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#FFFFFF"><div align="center">��Ʒ�ͺţ�</div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="left"><input type="text" name="xinghao" class="inputcss" size="20"></div></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#FFFFFF"><div align="center">�Ƿ��Ƽ���</div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="left">
          <select name="tuijian" class="inputcss" >
            <option selected value=1>��</option>
            <option value=0>��</option>
          </select>
     </div>
      </td>
      </tr>
      <tr>
        <td height="25" bgcolor="#FFFFFF"><div align="center">��Ʒ������</div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="left"><input type="text" name="shuliang" class="inputcss" size="20"></div></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#FFFFFF"><div align="center">��ƷͼƬ��</div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="left">
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <input type="file" name="upfile" class="inputcss" size="30"></div></td>
      </tr>
      <tr>
        <td height="80" bgcolor="#FFFFFF"><div align="center">��Ʒ��飺</div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="left"><textarea name="jianjie" cols="80" rows="8" class="inputcss"></textarea>
        </div></td>
      </tr>
      <tr>
        <td height="25" colspan="2" bgcolor="#FFFFFF"><div align="center"><input name="submit" type="submit" class="buttoncss" id="submit" value="����">
        &nbsp;&nbsp;<input type="reset" value="��д" class="buttoncss"></div></td>
      </tr>
	  </form>
    </table></td>
  </tr>
</table>
</body>
</html>