<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="tabs.css" />
    <link rel="stylesheet" type="text/css" href="heading.css" />
    
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-7243260-2']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
      }
      )();
      
    </script>
    
    
    
  </head>
  
  <body>
    <div class="container">
      <header class="clearfix">
        <h1>
          Select Dresses
        </h1>
      </header>
      <div id="tabs" class="tabs">
        <nav>
          <ul>
            <li>
              <a href="#section-1">
                <span>
                  Dress-Type1
                </span>
              </a>
            </li>
            <li>
              <a href="#section-2">
                <span>
                  Dress-Type2
                </span>
              </a>
            </li>
            <li>
              <a href="#section-3">
                <span>
                  Dress-Type3
                </span>
              </a>
            </li>
            <li>
              <a href="#section-4">
                <span>
                  Dress-Type4
                </span>
              </a>
            </li>
          </ul>
        </nav>
        <div class="content">
          
          <section id="section-1">
            <div class="mediabox">
              <?php
               include 'db_connect.php';
               $result = mysql_query("SELECT * FROM dresses WHERE dress_category=1");
               while ($row = mysql_fetch_array($result)) {
               $path = $row{'dress_name'}.".png";
               echo "<img src = 'dresses/$path'/><br>";
               }
               mysql_close($dbhandle);
             ?>    
            </div>                                
          </section>
  
          <section id="section-2">
            <div class="mediabox">              
               <?php
                include 'db_connect.php';
                $result = mysql_query("SELECT * FROM dresses WHERE dress_category=2");
                while ($row = mysql_fetch_array($result)) {
                $path = $row{'dress_name'}.".png";
                echo "<img src = 'dresses/$path'/><br>";
                }
                mysql_close($dbhandle);
                ?>                     
             </div>
          </section>

            <section id="section-3">
              <div class="mediabox">                                
                 <?php
                  include 'db_connect.php';
                  $result = mysql_query("SELECT * FROM dresses WHERE dress_category=3");
                  while ($row = mysql_fetch_array($result)) {
                  $path = $row{'dress_name'}.".png";
                  echo "<img src = 'dresses/$path'/><br>";
                  }
                  mysql_close($dbhandle);
                 ?>                                              
               </div>
             </section>
                      
             <section id="section-4">
               <div class="mediabox">          
                  <?php
                   include 'db_connect.php';
                   $result = mysql_query("SELECT * FROM dresses WHERE dress_category=4");
                   while ($row = mysql_fetch_array($result)) {
                   $path = $row{'dress_name'}.".png";
                   echo "<img src = 'dresses/$path'/><br>";
                   }
                  mysql_close($dbhandle);
                  ?>                                                 
               </div>
             </section>
                      
        </div><!-- /content -->
    </div><!-- /tabs -->
    </div>
    <script src = "tab.js">
    </script>
    <script>
      new CBPFWTabs( document.getElementById( 'tabs' ) );
    </script>
    
    
    </body>
  </html>
