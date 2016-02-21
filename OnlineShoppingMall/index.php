<link href="css/font.css" rel="stylesheet">
<table width="766" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php
 include("top.php");
?></td>
  </tr>
  <tr>
    <td><table width="766" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="209" valign="top" bgcolor="#F0F0F0"><?php include("left_menu.php");?></td>
        <td width="557" height="438" align="center" valign="top"><table width="548" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td  height="30" colspan="2">　品牌新闻：　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　<a href="gonggaolist.php">更多..</a></td>
            </tr>
          <tr>
          
            <td width="209"  height="50"><table width="240"  border="0" align="left" cellpadding="0" cellspacing="0">
          
              <?php
								 $sql=mysql_query("select * from tb_gonggao order by time desc limit 0,7",$conn);
								 $info=mysql_fetch_array($sql);
								 if($info==false){
				  ?>
              <tr>
                <td height="20" align="center">暂无新闻公告!</td>
              </tr>
              <?php
								 }
								 else{
								   do{
				  ?>
              <tr>
                <td height="20"><div align="center">
                  <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="16" height="5"><div align="center"><img src="images/circle.gif" width="11" height="12" /></div></td>
                      <td height="24"><div align="left"> <a href="gonggao.php?id=<?php echo $info[id];?>">
                        <?php 
								 echo substr($info[title],0,30);
								  if(strlen($info[title])>30){
									echo "...";
								  } 
							   ?>
                      </a></div></td>
                    </tr>
                  </table>
                </div></td>
              </tr>
              <?php
									 }
								   while($info=mysql_fetch_array($sql));
								 }
								?>
            </table></td>
            <td width="278">
            <div align="center">
            <table width="214" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><table id="__01" width="254" height="161" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="3"><img src="images/newstop.gif" width="254" height="17" alt=""></td>
                    </tr>
                    <tr>
                      <td rowspan="2"><img src="images/newsleft.gif" width="20" height="144" alt=""></td>
                      <td><DIV id=oTransContainer 
            style="FILTER: progid:DXImageTransform.Microsoft.Wipe(GradientSize=1.0,wipeStyle=0, motion='forward'); WIDTH:214px; HEIGHT: 128px"><IMG src="images/01.jpg" name="oDIV1" 
            width=214
            height=128 border=0 id=oDIV1 
            style="DISPLAY: yes;"><IMG id=oDIV2 
            style="DISPLAY: none;"
            height=128 src="images/02.jpg" 
            width=214 border=0><IMG id=oDIV3 
            style="DISPLAY: none;"
            height=128 src="images/03.jpg" 
            width=214 border=0><IMG id=oDIV4 
            style="DISPLAY: none;"
            height=128 src="images/04.jpg" 
            width=214 border=0></DIV>
            </td>
                      <td rowspan="2"><img src="images/newsright.gif" width="20" height="144" alt=""></td>
                    </tr>
                    <tr>
                      <td><img src="images/newsbottom.gif" width="214" height="16" alt=""></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td align="right" valign="top" style="padding-right:10px;">
				<script>var MaxImg = 4; fnToggle();</script>
                    <TABLE width=110 
              border=0 align="right" cellPadding=0 cellSpacing=0>
                      <TBODY>
                        <TR>
                          <TD width=26><A href="javascript:toggleTo(1)"><IMG height=15 
                  src="images/s_1.gif" width=17 
                  border=0></A></TD>
                          <TD width=26><A href="javascript:toggleTo(2)"><IMG height=15 
                  src="images/s_2.gif" width=17 
                  border=0></A></TD>
                          <TD width=26><A href="javascript:toggleTo(3)"><IMG height=15 
                  src="images/s_3.gif" width=17 
                  border=0></A></TD>
                          <TD width=27><A href="javascript:toggleTo(4)"><IMG height=15 
                  src="images/s_4.gif" width=17 
                  border=0></A></TD>
                        </TR>
                      </TBODY>
                  </TABLE></td>
              </tr>
            </table>
          </div>
            </td>
          </tr>
        </table>
          <table width="557"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="553" bgcolor="#FFFFFF"><table width="548" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="557"  height="50">　推荐品牌：　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　<a href="showtuijian.php">更多..</a></td>
                </tr>
              </table>
                <table width="550" border="00" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="555" height="110"><table width="530" height="110" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="265">
               <?php
			  $sql=mysql_query("select * from tb_shangpin where tuijian=1 order by addtime desc limit 0,1");
			  $info=mysql_fetch_array($sql);
			  if($info==false){
			   echo "本站暂无推荐商品!";
			  }
			  else{
			  ?>
                            <table width="270"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="130" rowspan="5"><div align="center">
                                    <?php
				    if(trim($info[tupian]=="")){
					  echo "暂无图片";
					}
					else{
				  ?>
                                    <img src="<?php echo $info[tupian];?>" width="90" height="120" border="0">
                                    <?php
				     }
				  ?>
                                </div></td>
                                <td width="11" height="16">&nbsp;</td>
                                <td width="124"><font color="FF6501"><img src="images/circle.gif" width="10" height="10">&nbsp;<?php echo $info[mingcheng];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">市场价：</font><font color="FF6501"><?php echo $info[shichangjia];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">会员价：</font><font color="FF6501"><?php echo $info[huiyuanjia];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">剩余数量：</font><font color="13589B">                                  <?php 
				  if($info[shuliang]>0)
				  {
				     echo $info[shuliang];
				  }
				  else
				  {
				     echo "已售完";
				  }
				  ?>
</font></td>
                              </tr>
                              <tr>
                                <td height="30" colspan="2"><a href="lookinfo.php?id=<?php echo $info[id];?>"><img src="images/b3.gif" width="34" height="15" border="0"></a> <a href="addgouwuche.php?id=<?php echo $info[id];?>"><img src="images/b1.gif" width="50" height="15" border="0"></a>                                 </td>
                              </tr>
                            </table>
                            <?php
			   }
			  ?>
                          </td>
                          <td width="265">
                            <?php
			  $sql=mysql_query("select * from tb_shangpin where tuijian=1 order by addtime desc limit 1,1");
			  $info=mysql_fetch_array($sql);
			  if($info==true)
			  {
			  ?>
                            <table width="270"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="130" rowspan="5"><div align="center">
                                    <?php
				    if(trim($info[tupian]=="")){
					  echo "暂无图片";
					}
					else{
				  ?>
                                    <img src="<?php echo $info[tupian];?>" width="90" height="120" border="0">
                                    <?php
				     }
				  ?>
                                </div></td>
                                <td width="11" height="16">&nbsp;</td>
                                <td width="124"><font color="FF6501"><img src="images/circle.gif" width="10" height="10">&nbsp;<?php echo $info[mingcheng];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">市场价：</font><font color="FF6501"><?php echo $info[shichangjia];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">会员价：</font><font color="FF6501"><?php echo $info[huiyuanjia];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">剩余数量：</font><font color="13589B">
                                  <?php 
				  if($info[shuliang]>0)
				  {
				     echo $info[shuliang];
				  }
				  else
				  {
				     echo "已售完";
				  }
				  ?>
                                </font></td>
                              </tr>
                              <tr>
                                <td height="30" colspan="2"><a href="lookinfo.php?id=<?php echo $info[id];?>"><img src="images/b3.gif" width="34" height="15" border="0"></a> <a href="addgouwuche.php?id=<?php echo $info[id];?>"><img src="images/b1.gif" width="50" height="15" border="0"></a> </td>
                              </tr>
                            </table>
                            <?php
			    }
			   ?>
                          </td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="10" background="images/line1.gif"></td>
                  </tr>
                </table>
                <table width="548" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="46">　最新婚纱：　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　<a href="shownewpr.php">更多..</a></td>
                  </tr>
                </table>
                <table width="543" border="00" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="543" height="110"><table width="540" height="110" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="265">
                            <?php
			  $sql=mysql_query("select * from tb_shangpin order by addtime desc limit 0,1");
			  $info=mysql_fetch_array($sql);
			  if($info==false){
			   echo "本站暂无推荐产品!";
			  }
			  else{
			  ?>
                            <table width="270"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="130" rowspan="5"><div align="center">
                                    <?php
				    if(trim($info[tupian]=="")){
					  echo "暂无图片";
					}
					else{
				  ?>
                                    <img src="<?php echo $info[tupian];?>" width="90" height="120" border="0">
                                    <?php
				     }
				  ?>
                                </div></td>
                                <td width="11" height="16">&nbsp;</td>
                                <td width="124"><font color="FF6501"><img src="images/circle.gif" width="10" height="10">&nbsp;<?php echo $info[mingcheng];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">市场价：</font><font color="FF6501"><?php echo $info[shichangjia];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">会员价：</font><font color="FF6501"><?php echo $info[huiyuanjia];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">剩余数量：</font><font color="13589B">
                                  <?php 
				  if($info[shuliang]>0)
				  {
				     echo $info[shuliang];
				  }
				  else
				  {
				     echo "已售完";
				  }
				  ?>
                                </font></td>
                              </tr>
                              <tr>
                                <td height="30" colspan="2"><a href="lookinfo.php?id=<?php echo $info[id];?>"><img src="images/b3.gif" width="34" height="15" border="0"></a> <a href="addgouwuche.php?id=<?php echo $info[id];?>"><img src="images/b1.gif" width="50" height="15" border="0"></a> </td>
                              </tr>
                            </table>
                            <?php
						   }
						  ?>
                          </td>
                          <td width="265">
                            <?php
			  $sql=mysql_query("select * from tb_shangpin order by addtime desc limit 1,1");
			  $info=mysql_fetch_array($sql);
			  if($info==true)
		
			  {
			  ?>
                            <table width="270"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="130" rowspan="5"><div align="center">
                                    <?php
				    if(trim($info[tupian]=="")){
					  echo "暂无图片";
					}
					else{
				  ?>
                                    <img src="<?php echo $info[tupian];?>" width="90" height="120" border="0">
                                    <?php
				     }
				  ?>
                                </div></td>
                                <td width="11" height="16">&nbsp;</td>
                                <td width="124"><font color="FF6501"><img src="images/circle.gif" width="10" height="10">&nbsp;<?php echo $info[mingcheng];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">市场价：</font><font color="FF6501"><?php echo $info[shichangjia];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">会员价：</font><font color="FF6501"><?php echo $info[huiyuanjia];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">剩余数量：</font><font color="13589B">
                                  <?php 
				  if($info[shuliang]>0)
				  {
				     echo $info[shuliang];
				  }
				  else
				  {
				     echo "已售完";
				  }
				  ?>
                                </font></td>
                              </tr>
                              <tr>
                                <td height="30" colspan="2"><a href="lookinfo.php?id=<?php echo $info[id];?>"><img src="images/b3.gif" width="34" height="15" border="0"></a> <a href="addgouwuche.php?id=<?php echo $info[id];?>"><img src="images/b1.gif" width="50" height="15" border="0"></a> </td>
                              </tr>
                            </table>
                            <?php
			   }
			  ?>
                          </td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="10" background="images/line1.gif"></td>
                  </tr>
                </table>
                <table width="548" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="46">　热门品牌：　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　<a href="showhot.php">更多..</a></td>
                  </tr>
                </table>
                <table width="553" border="00" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="553" height="110"><table width="540" height="110" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="275">
                            <?php
			  $sql=mysql_query("select * from tb_shangpin order by cishu desc limit 0,1");
			  $info=mysql_fetch_array($sql);
			  if($info==false){
			   echo "本站暂无推荐产品!";
			  }
			  else {
			  ?>
                            <table width="270"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="130" rowspan="5"><div align="center">
                                    <?php
				    if(trim($info[tupian]=="")){
					  echo "暂无图片";
					}
					else{
				  ?>
                                    <img src="<?php echo $info[tupian];?>" width="90" height="120" border="0">
                                    <?php
				     }
				  ?>
                                </div></td>
                                <td width="11" height="16">&nbsp;</td>
                                <td width="124"><font color="FF6501"><img src="images/circle.gif" width="10" height="10">&nbsp;<?php echo $info[mingcheng];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">市场价：</font><font color="FF6501"><?php echo $info[shichangjia];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">会员价：</font><font color="FF6501"><?php echo $info[huiyuanjia];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">剩余数量：</font><font color="13589B">
                                  <?php 
				  if($info[shuliang]>0)
				  {
				     echo $info[shuliang];
				  }
				  else
				  {
				     echo "已售完";
				  }
				  ?>
                                </font></td>
                              </tr>
                              <tr>
                                <td height="30" colspan="2"><a href="lookinfo.php?id=<?php echo $info[id];?>"><img src="images/b3.gif" width="34" height="15" border="0"></a> <a href="addgouwuche.php?id=<?php echo $info[id];?>"><img src="images/b1.gif" width="50" height="15" border="0"></a> </td>
                              </tr>
                            </table>
                            <?php
			   }
			  ?>
                          </td>
                          <td width="255">
                            <?php
			  $sql=mysql_query("select * from tb_shangpin order by cishu desc limit 1,1 ");
			  $info=mysql_fetch_array($sql);
			  if($info==true){
			  ?>
                            <table width="270"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="130" rowspan="5"><div align="center">
                                    <?php
				    if(trim($info[tupian]=="")){
					  echo "暂无图片";
					}
					else{
				  ?>
                                    <img src="<?php echo $info[tupian];?>" width="90" height="120" border="0">
                                    <?php
				     }
				  ?>
                                </div></td>
                                <td width="11" height="16">&nbsp;</td>
                                <td width="124"><font color="FF6501"><img src="images/circle.gif" width="10" height="10">&nbsp;<?php echo $info[mingcheng];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">市场价：</font><font color="FF6501"><?php echo $info[shichangjia];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">会员价：</font><font color="FF6501"><?php echo $info[huiyuanjia];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">剩余数量：</font><font color="13589B">
                                  <?php 
				  if($info[shuliang]>0)
				  {
				     echo $info[shuliang];
				  }
				  else
				  {
				     echo "已售完";
				  }
				  ?>
                                </font></td>
                              </tr>
                              <tr>
                                <td height="30" colspan="2"><a href="lookinfo.php?id=<?php echo $info[id];?>"><img src="images/b3.gif" width="34" height="15" border="0"></a> <a href="addgouwuche.php?id=<?php echo $info[id];?>"><img src="images/b1.gif" width="50" height="15" border="0"></a> </td>
                              </tr>
                            </table>
                            <?php
			   }
			  ?></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="10"></td>
                  </tr>
              </table></td>
          </tr>
        </table></td>
      </tr>
    </table>    </td>
</tr>
  <tr>
<td>
<?php
 include("bottom.php");
?></td>
  </tr>
</table>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
