<div id="navcontainer">
   <?php
   if ($_SESSION['ses_admin_indikatormutu'] == "admin") {
      echo "
            <div style='width: 100%; height: 150%; overflow: auto;'> 
            <table width='120%' align='center' height='50%'>
                 <tr width='100%' height='14.2%' align='center'>
                    <td width='16%' align='center'>
                      <a href='index.php?act=MenuIndikator1'>                                                  
                         <img src='images/cabinet.png'/><br>
                         Indikator                                             
                      </a>
                    </td>
                    <td width='16%' align='center'>     
                       <a href='index.php?act=MenuIndikator2'>
                         <img src='images/1360486910_company.png'/><br>
                         Indikator SKP
                       </a>
                    </td>
                    <td width='16%' align='center'> 
                       <a href='index.php?act=ListIndikator3&menu=16'>                                                  
                         <img src='images/Gnome-X-Office-Address-Book-48.png'/></br>
                         Indikator Renstra RS
                       </a>
                    </td>
                    <td width='16%' align='center'>
                       <a href='index.php?act=ListIndikator4&menu=17'>                                                  
                         <img src='images/users.png'/><br>
                         Indikator Klinis Prioritas                                                  
                       </a>
                    </td>
                    <td width='16%' align='center'>
                       <a href='index.php?act=ListIndikator5&menu=18'>                                                  
                          <img src='images/family.png'/><br>
                          Indikator Perbaikan Sistem                                               
                       </a>
                    </td>                                        
                 </tr>     
                 <tr width='100%' height='14.2%' align='center'>
                    <td width='16%' align='center'>
                       <a href='index.php?act=ListIndikator6&menu=19'>                                                  
                          <img src='images/edit-female-user.png'/><br>
                          Indikator Manajemen Risiko                                                  
                       </a>
                    </td>
                    <td width='16%' align='center'>
                       <a href='index.php?act=MenuIndikator7'>                                                  
                          <img src='images/if_Users_131982.png'/><br>
                          Indikator Prioritas Unit                                                  
                       </a>
                    </td>                                                                                                                  
                 </tr>
            </table> 
            </div>";
   } else {
      include 'admin.php';
   }
   ?>
</div>