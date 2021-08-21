<?php
$url = explode("/ev/",$_SERVER['REQUEST_URI']);

?>

<div class="logo img-fluid" align="center" >
           <img src="../users/assets/img/Removal-782.png" height="100" width="100" alt=" أرشدني" >

  </div>
       <div class="sidebar-wrapper">
         <ul class="nav">
           <li class="nav-item <?php echo ($url[1] == 'home' ? 'active' : '');?>">
             <a class="nav-link" href="home">
               <i class="material-icons">dashboard</i>
               <p>الصفحة الرئيسية</p>
             </a>
           </li>
           <li class="nav-item <?php echo ($url[1] == 'volunteers' ? 'active' : '');?>">
             <a class="nav-link" href="volunteers">
               <i class="material-icons">forum</i>
               <p>استشارة متخصص</p>
             </a>
           </li>
           <li class="nav-item <?php echo ($url[1] == 'universities' ? 'active' : '');?>">
            <a class="nav-link" href="universities">
              <i class="material-icons">import_contacts</i>
  
              <p>الجامعات والتخصصات</p>
            </a>
          </li> 

          <li class="nav-item <?php echo ($url[1] == 'admissions' ? 'active' : '');?> ">
             <a class="nav-link" href="admissions">
               <i class="material-icons">today</i>
               <p>مواعيد فتح التسجيل في الجامعات</p>
             </a> 
           </li>
           <li class="nav-item <?php echo ($url[1] == 'cal' ? 'active' : '');?>  ">
             <a class="nav-link" href="cal">
               <i class="material-icons">calculate</i>
               <p>حساب النسبة الموزونة</p>
             </a> 
           </li>
           <li class="nav-item <?php echo ($url[1] == 'certificates' ? 'active' : '');?> " >
             <a class="nav-link" href="certificates">
               <i class="material-icons">library_books</i>
               <p>الشهادات المهنية</p>
             </a>
           </li>
         </li>
         <li class="nav-item <?php echo ($url[1] == 'apps' ? 'active' : '');?>">
           <a class="nav-link" href="apps">
             <i class="material-icons">stay_primary_portrait</i>
             <p>تطبيقات مساعدة </p>
           </a>
         </li>
          
          
         </ul>
       </div>
</div>
     
