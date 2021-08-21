<?php include_once "header.php" ; ?>

<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="javascript:;"><h3>الجامعات </h3></a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <form class="navbar-form"> 
        </form>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

<div class="content">
 <div class="container-fluid">
   <div class="row">
         <?php foreach ($conn->getReference('universities/')->getSnapshot()->getValue() as $key => $university){ ?>
            <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-success">
                    <img src="<?php echo $university['logo']; ?>" height="130" width="160" alt="">
                  </div>
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $university['name']; ?></h4>
                    <p class="card-category">
                      <span class="text-success"> </span><?php echo $university['location']; ?></p>
                  </div>
                  <div class="card-footer">
                     <div class="stats">

                      <i class="material-icons" >room</i></span> <p><a href="<?php echo $university['about']; ?>" target="_blank">الموقع</a></p></h5>
                     </div>
                  </div>
                </div>
            </div>
            <?php } ?>

            <br><br><br>

            
            <h3>  التخصصات </h3>
            <br>

       <div class="card">
         <div class="card-header" id="headingTwo">
           <h5 class="mb-0">
             <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
               <h3> هندسة برمجيات</h3>
             </button>
           </h5>
         </div>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
           <div class="card-body">
             <h4  Style = "color : rgb(139,26 , 184)" >النُبذة</h4>
             <h4  >تتمحور بشكل أساسي حول الصناعة البرمجية عالية الجودة بأسلوب منهجي ومنضبط وفعال . وبالتالي فإن هناك تأكيدة خاصة على التحليل والتقييم ، والمواصفات ، والتصميم ، والتنفيذ ، والصيانة وتطور البرمجية . وإلى جانب ذلك تلعب قضايا أخرى دورة حيوية في هندسة البرمجيات تتعلق بالإدارة والجودة ، الإبداع والابتكار ، المعايير المهارات الفردية ، العمل الجماعي والممارسات المهنية</h4>
             <div class="dropdown-divider"></div>
             <br>
             <h4  Style = "color : rgb(139,26 , 184)" >المجالات الوظيفية</h4>
             <div class="btn-group">
               <button type="button" class="btn btn-round dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 المجالات الوظيفية
               </button>
               <div class="dropdown-menu">
                 <a class="dropdown-item" href="#">مهندس معمارية البرمجيات</a>
                 <a class="dropdown-item" href="#">مصمم برمجيات</a>
                 <a class="dropdown-item" href="#">محلل نظم برمجيات</a>
                 <a class="dropdown-item" href="#">محلل متطلبات برمجيات</a>
                 <a class="dropdown-item" href="#">منهدس برمجيات</a>
                 <a class="dropdown-item" href="#">متخصص في ضمان دودة البرمجيات</a>
                 <a class="dropdown-item" href="#">مدير مشروع برمجيات</a>
               </div>
             </div>
             <div class="dropdown-divider"></div>
            
             <h3 Style = "color : rgb(139,26 , 184)"><b>أين يوجد</b></h3>
                       
             <h3>   جامعة الأمير سطام بن عبدالعزيز </h3>
            
             <h4>(%الثانوية العامة 30% ,القدرات العامة 30% ,التحصيلي 40 )</h4>
             <br>
             <h3 Style = "color : rgb(139,26 , 184)">الخطة الدراسية</h3>
           
             <a Style = "color : rgb(22, 70, 243)" href="https://cces-old.psau.edu.sa/ar/dept-page/الخطة-الدراسية-23" target="_blank"><h4>اضغط هُنا</a></p></h4>
             
             <div class="dropdown-divider"></div>
             <br>
             
             <h3>جامعة الملك سعود</h3>
            
           <h4>(%الثانوية العامة 30% ,القدرات العامة 30% ,التحصيلي 40 )</h4>
             <br>
             <h3 Style = "color : rgb(139,26 , 184)">الخطة الدراسية</h3>
           
             <a Style = "color : rgb(22, 70, 243)" href="https://dar.ksu.edu.sa/sites/dar.ksu.edu.sa/files/imce_images/c4.pdf" target="_blank"><h4>اضغط هُنا</a></p></h4>
             
            
           </div>
         </div>
       </div>
     
       <div class="card">
         <div class="card-header" id="headingThree">
           <h5 class="mb-0">
             <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
               <h3> نظم معلومات / نظم الحاسب</h3>
             </button>
           </h5>
         </div>
         <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
           <div class="card-body">
             <h4  Style = "color : rgb(139,26 , 184)" >النُبذة</h4>
             <h4  >يعتبر هذا التخصص هو حلقة الوصل ما بين تخصص علوم الحاسب و المجال العملي للشركات فهو يقوم بفهم ودراسة المشاكل الموجودة في الأعمال ويقوم بطرح حلول تقنية لهذه المشكلة</h4>
             <div class="dropdown-divider"></div>
             <br>
             <h4  Style = "color : rgb(139,26 , 184)" >المجالات الوظيفية</h4>
             <div class="btn-group">
               <button type="button" stayle="color:purple" class="btn btn-round dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 المجالات الوظيفية
               </button>
               <div class="dropdown-menu">
                 <a class="dropdown-item" href="#">مصمم/محلل/مستشار نظم معلومات</a>
                 <a class="dropdown-item" href="#">مبرمج</a>
                 <a class="dropdown-item" href="#">مدير مشاريع تقنية المعلومات</a>
                 <a class="dropdown-item" href="#">تصميم إدارة قواعد البيانات</a>
                 <a class="dropdown-item" href="#">رجل أعمال في قطاع تقنية المعلومات</a>
               </div>
             </div>
             <div class="dropdown-divider"></div>
             <h4 Style = "color : rgb(139,26 , 184)"><b>أين يوجد</b></h4>
                       
             <h3 dir="rtl" >   جامعة الأمير سطام بن عبدالعزيز </h3>
           
             
             <h4>(%الثانوية العامة 30% ,القدرات العامة 30% ,التحصيلي 40 )</h4>
             <br>
           <h4 Style = "color : rgb(139,26 , 184)">الخطة الدراسية</h4>
           
            <a Style = "color : rgb(22, 70, 243)" href="https://cces.psau.edu.sa/psau/acedemicprogram/54/2259/4" target="_blank"><h4>اضغط هُنا</a></p></h4>
             
             <div class="dropdown-divider"></div>
             <br>
             <h3 dir="rtl" >جامعة شقراء</h3>
              <h4>(%الثانوية العامة 40% ,القدرات العامة 30% ,التحصيلي 30 )</h4>
             
           
             <br>
             <h4 Style = "color : rgb(139,26 , 184)">الخطة الدراسية</h4>
             
              <a Style = "color : rgb(22, 70, 243)" href="https://www.su.edu.sa/ar/الكليات/كلية-الحاسب-الآلي-وتقنية-المعلومات-شقراء/قسم-نظم-المعلومات/الخطة-الدراسية-لبرنامج-بكالوريس" target="_blank"><h4>اضغط هُنا</a></p></h4>
              
              
              
               <div class="dropdown-divider"></div>
               <br>
             <h3 dir="rtl">جامعة الملك سعود</h3>
            
              <h4>(%الثانوية العامة 30% ,القدرات العامة 30% ,التحصيلي 40 )</h4>
             <br>
             <h4 Style = "color : rgb(139,26 , 184)">الخطة الدراسية</h4>
           
            <a Style = "color : rgb(22, 70, 243)" href="https://dar.ksu.edu.sa/sites/dar.ksu.edu.sa/files/imce_images/c1.pdf" target="_blank"><h4>اضغط هُنا</a></p></h4>
            
             
             
             <div class="dropdown-divider"></div>
             <br>
             <h3 dir="rtl" > جامعة نجران</h3>
<h4> المسار العلمي </h4>
<br>
             <h4  >(%الثانوية العامة 40% ,القدرات العامة 30% ,التحصيلي 30 )</h4>
             <br>
<h4>بقية التخصصات </h4>
 <br>
 <h4  >(%الثانوية العامة 60% ,القدرات العامة 40  )</h4>
             <br>
             <h4 Style = "color : rgb(139,26 , 184)">الخطة الدراسية</h4>
           
            <a Style = "color : rgb(22, 70, 243)" href="https://edugate.nu.edu.sa/nu/ui/guest/major_plans/index/facultiesMajorsIndex.faces" target="_blank"><h4>اضغط هُنا</a></p></h4>
            
             <div class="dropdown-divider"></div>
             <br>
             <h3 dir="rtl" > جامعة الملك عبدالعزيز</h3>
            <h4> المسار العلمي </h4>
<br>
             <h4  >(%الثانوية العامة 40% ,القدرات العامة 40% ,التحصيلي 20 )</h4>
             <br>
 <h4> المسارالأدبي/طلاب </h4>
<br>
             <h4  >(%الثانوية العامة 50% ,القدرات العامة 50 )</h4>
             <br>
             <h4>المسار الأدبي/ طالبات</h4>
<br>
             <h4  >(%الثانوية العامة 40% ,القدرات العامة 40% ,التحصيلي 20 )</h4>
             <br>
             <h4 Style = "color : rgb(139,26 , 184)">الخطة الدراسية</h4>
           
            <a Style = "color : rgb(22, 70, 243)" href="https://fcitr-is.kau.edu.sa/pages-new-ar.aspx" target="_blank"><h4>اضغط هُنا</a></p></h4>
            
           
           </div>
         </div>
       </div>
       <div class="card">
         <div class="card-header" id="headingFive">
           <h5 class="mb-0">
             <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
               <h3> علوم الحاسب</h3>
             </button>
           </h5>
         </div>
         <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
           <div class="card-body">
             <h4  Style = "color : rgb(139,26 , 184)" >النُبذة</h4>
             <h4  >هو علم تحليل وتصميم الأنظمة والخوارزميات من خلال مهارات التحليل والتصميم والبرهنة والمقارنة وتحليل الخوارزميات ، تحليل الأنظمة ، حل المسائل ،التحليل العددي ،خوارزميات المخططات ، قياس أداء الحاسوب ، تمييز الأنماط ، معالجة الصور ، استخدام الذكاء الإصطناعي ، البحث والفرز ، تنظيم مكونات الحاسوب وإدارتها ، تصميم لغات البرمجة</h4>
             <div class="dropdown-divider"></div>
             <h4  Style = "color : rgb(139,26 , 184)" >المجالات الوظيفية</h4>
             <div class="btn-group">
               <button type="button"  class="btn btn-round  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 المجالات الوظيفية
               </button>
               <div class="dropdown-menu">
                 <a class="dropdown-item" href="#">مطور برامج</a>
                 <a class="dropdown-item" href="#">مهندس برمجيات</a>
                 <a class="dropdown-item" href="#">مطور تطبيقات</a>
                 <a class="dropdown-item" href="#">مدير شبكة حاسوبية</a>
                 <a class="dropdown-item" href="#">مطور مواقع</a>
                 <a class="dropdown-item" href="#">محلل نظم</a>
                 <a class="dropdown-item" href="#">مصمم جرافيك</a>
                 <a class="dropdown-item" href="#">مطور وسائط المتعددة</a>
              </div>
             </div>
             <div class="dropdown-divider"></div>
                 <h3 Style = "color : rgb(139,26 , 184)" >أين يوجد</h3>
                       
                 <h3 >   جامعة الأمير سطام بن عبدالعزيز </h3>
                  <h4>(%الثانوية العامة 30% ,القدرات العامة 30% ,التحصيلي 40 )</h4>
                 <br>

                 <h3 Style = "color : rgb(139,26 , 184)">الخطة الدراسية</h3>
               
                 <a Style = "color : rgb(22, 70, 243)" href="https://cces.psau.edu.sa/ar/dept-page/قسم-علوم-الحاسب/8554" target="_blank"><h4>اضغط هُنا</a></p></h4>
                
                 <div class="dropdown-divider"></div>
                 <br>
                 <h3 >جامعة شقراء</h3>
                 <h4>(%الثانوية العامة 40% ,القدرات العامة 30% ,التحصيلي 30 )</h4>
                 <br>
                 <h3 Style = "color : rgb(139,26 , 184)">الخطة الدراسية</h3>
                 
                 <a Style = "color : rgb(22, 70, 243)" href="https://www.su.edu.sa/ar/الكليات/كلية-الحاسب-الآلي-وتقنية-المعلومات-شقراء/قسم-علوم-الحاسب/خطة-برنامج-بكالوريوس-علوم-الحاسب" target="_blank"><h4>اضغط هُنا</a></p></h5>
                 
                 
                 
                 <div class="dropdown-divider"></div>
                 <br>
                 <h3>جامعة الملك سعود</h3>
                  <h4>( %الثانوية العامة 30% ,القدرات العامة 30% ,التحصيلي 40)</h4>
                 <br>
                 <h3 Style = "color : rgb(139,26 , 184)">الخطة الدراسية</h3>
               
                 <a Style = "color : rgb(22, 70, 243)" href="https://cces.psau.edu.sa/ar/dept-page/قسم-علوم-الحاسب/8554" target="_blank"><h4>اضغط هُنا</a></p></h4>
                
                
                 
                 <div class="dropdown-divider"></div>
                 <br>
                 <h3> جامعة نجران</h3>
                <h4> المسار العلمي </h4>
<br>
             <h4  >( %الثانوية العامة 40% ,القدرات العامة 30% ,التحصيلي 30)</h4>
             <br>
<h4>بقية التخصصات </h4>
 <br>
 <h4 >( %الثانوية العامة 60% ,القدرات العامة 40)</h4>
             <br>
                 <h4 Style = "color : rgb(139,26 , 184)">الخطة الدراسية</h4>        
                 <a Style = "color : rgb(22, 70, 243)" href="https://cces.psau.edu.sa/ar/dept-page/قسم-علوم-الحاسب/8554" target="_blank"><h4>اضغط هُنا</a></p></h4>
                
                
                 
                 <div class="dropdown-divider"></div>
                 <br>
                 <h3> جامعة الملك عبدالعزيز</h3>
                 <h4  >( %الثانوية العامة 30% ,القدرات العامة 30% ,التحصيلي 40)</h4>
                 <br>
                 <h4 Style = "color : rgb(139,26 , 184)">الخطة الدراسية</h4>
               
                 <a Style = "color : rgb(22, 70, 243)" href="https://admission.kau.edu.sa/pages-263661.aspx" target="_blank"><h4>اضغط هُنا</a></p></h4>
                
                 
               
                 <div class="dropdown-divider"></div>
                 <br>
                 <h3> جامعة القصيم</h3>
<h4>الطلاب</h4>
                 <h4 >(%الثانوية العامة 50% ,القدرات العامة 50 )</h4>
                 <br>
<h4>الطالبات</h4>
 <h4 >(%الثانوية العامة 30% ,القدرات العامة 50% ,التحصيلي 20 )</h4>
<br>
                 <h4 Style = "color : rgb(139,26 , 184)">الخطة الدراسية</h4>
               
                 <a Style = "color : rgb(22, 70, 243)" href="https://coc.qu.edu.sa/content/pages/49" target="_blank"><h4>اضغط هُنا</a></p></h4>
                 <br>
                
               </div>
             </div>
           </div>

       </div>
       </div>
       </div>
       </div>




    


<?php include_once "footer.php" ; ?>
