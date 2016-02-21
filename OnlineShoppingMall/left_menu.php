<?php
error_reporting(0); 

  session_start();
   include("conn/conn.php");
?>
<table width="209" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td ><img src="images/carttop.jpg" width="209" height="46" /></td>
  </tr>
        <tr>
          <td>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><font color="#FF3300">
     &nbsp;&nbsp;<?php
	  if($_SESSION[username]!=""){
	    echo "用户：$_SESSION[username]，欢迎您！";
		}
		else 
		{echo "用户：游客，欢迎您！<br>&nbsp;&nbsp;请先登录，后购物";}
	?>
              </font></td>
            </tr>
            <tr>
              <td>         
 <table width="209" border="0" align="center" cellpadding="0" cellspacing="0">
 <form action="gouwuche.php" method="post" name="form1" id="form1">
                  <tr>
                    <td>
					<?php
			  //session_register("total");
			  if($_GET[qk]=="yes"){
			     $_SESSION[producelist]="";
				 $_SESSION[quatity]=""; 
			  }
			   $arraygwc=explode("@",$_SESSION[producelist]);
			   $s=0;
			   for($i=0;$i<count($arraygwc);$i++){
			       $s+=intval($arraygwc[$i]);
			   }
			  if($s==0 ){
				   echo "<tr>";
                   echo" &nbsp;&nbsp;您的购物车为空!";
                   echo"</tr>";
				}
			  else{ 
			?>
                      <?php
			    $total=0;
			    $array=explode("@",$_SESSION[producelist]);
				$arrayquatity=explode("@",$_SESSION[quatity]);
				 while(list($name,$value)=each($_POST)){
					  for($i=0;$i<count($array)-1;$i++){
					    if(($array[$i])==$name){
						  $arrayquatity[$i]=$value;  
						}
					}
				}
			    $_SESSION[quatity]=implode("@",$arrayquatity);
				
				for($i=0;$i<count($array)-1;$i++){ 
				   $id=$array[$i];
				   $num=$arrayquatity[$i];
				  
				  if($id!=""){
				   $sql=mysql_query("select * from tb_shangpin where id='".$id."'",$conn);
				   $info=mysql_fetch_array($sql);
				   $total1=$num*$info[huiyuanjia];
				   $total+=$total1;
				   $_SESSION["total"]=$total;
			?>
&nbsp;
                      <?php
			      }
				 }
			 ?>
购物车总计：<?php echo $total;?>元 
             <br>
             &nbsp;&nbsp;<a href="gouwusuan.php">去收银台</a> <a href="gouwuche.php?qk=yes">清空购物车</a> 
                      <?php
			 }
			?>
            <?php
	if($_SESSION[username]!=""){
	    echo "&nbsp;&nbsp;<a href='logout.php'>注销离开</a>";
	  }
	?></br>
            </td>
                  </tr>
                </form>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="20"><table width="209" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="20" colspan="3"><img src="images/user.gif" width="209" height="46" /></td>
            </tr>
            <tr>
              <td width="15">&nbsp;</td>
              <td width="177"><table width="180" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td valign="top"><table width="100%" height="100" border="0" align="center" cellpadding="0" cellspacing="1">
                    <tr>
                      <td><table width="180" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><table width="180" border="0" cellpadding="0" cellspacing="0">
                            <script language="javascript" type="text/javascript">
							 function chkuserinput(form){
							   if(form.username.value==""){
								  alert("请输入用户名!");
								  form.username.select();
								  return(false);
								}		
								if(form.userpwd.value==""){
								  alert("请输入用户密码!");
								  form.userpwd.select();
								  return(false);
								}	
								if(form.yz.value==""){
								  alert("请输入验证码!");
								  form.yz.select();
								  return(false);
								}	
							   return(true);				 
							 }
						  </script>
                            <script language="javascript" type="text/javascript">
						    function openfindpwd(){
							window.open("openfindpwd.php","newframe","left=200,top=200,width=200,height=100,menubar=no,toolbar=no,location=no,scrollbars=no,location=no");
							   }
						</script>
                            <form action="chkuser.php" method="post" name="form2" id="form2" onsubmit="return chkuserinput(this)">
                              <tr>
                                <td height="10" colspan="3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="50" height="20"><div align="right">用 户：</div></td>
                                <td height="20" colspan="2"><div align="left">
                                  <input type="text" name="username" size="19" class="inputcss" style="background-color:#fdfdfd " onmouseover="this.style.backgroundColor='#ffffff'" onmouseout="this.style.backgroundColor='#fdfdfd'" />
                                </div></td>
                              </tr>
                              <tr>
                                <td height="20"><div align="right">密 码：</div></td>
                                <td colspan="2"><div align="left">
                                  <input type="password" name="userpwd" size="19" class="inputcss" style="background-color:#fdfdfd " onmouseover="this.style.backgroundColor='#ffffff'" onmouseout="this.style.backgroundColor='#fdfdfd'" />
                                </div></td>
                              </tr>
                              <tr>
                                <td height="20"><div align="right">验 证：</div></td>
                                <td width="66" height="20"><div align="left">
                                  <input type="text" name="yz" size="10" class="inputcss" style="background-color:#fdfdfd " onmouseover="this.style.backgroundColor='#ffffff'" onmouseout="this.style.backgroundColor='#fdfdfd'" />
                                </div></td>
                                <td width="64"><div align="left"> &nbsp;
                                  <?php
									   $num=intval(mt_rand(1000,9999));
									   for($i=0;$i<4;$i++){
										echo "<img src=images/code/".substr(strval($num),$i,1).".gif>";
									   }
									?>
                                </div></td>
                              </tr>
                              <tr>
                                <td height="20" colspan="3"><div align="right">
                                  <input type="hidden" value="<?php echo $num;?>" name="num" />
                                  <input name="submit2" type="submit" class="buttoncss" value="登 录" />
                                  <a href="agreereg.php">注册</a>&nbsp;<a href="javascript:openfindpwd()">找回密码</a>&nbsp;</div></td>
                              </tr>
                            </form>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
              <td width="17">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3"><img src="images/search.gif" width="209" height="46" /></td>
            </tr>
          </table>
         </td>
        </tr>
        <tr>
          <td  valign="middle">
           <form name="form" method="post" action="serchorder.php">
                <tr>              
                  <td width="500" height="30"  valign="middle">&nbsp;&nbsp; <input type="text" name="name" size="12" class="inputcss" style="background-color:#fdfdfd " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#fdfdfd'">
                          <span class="dd"></span>
                          <input type="hidden" name="jdcz" value="jdcz">
                          <input name="submit" type="submit" class="buttoncss" value="搜索">
                          <input name="button" type="button" class="buttoncss" onClick="javascript:window.location='highsearch.php';" value="高级">
</td>
                </tr>
              </form>
          </td>
        </tr>
      </table>
