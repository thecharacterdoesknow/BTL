<div class="home-page-code">
  <!-- trang bia dau  -->
  <div class="hero">
    <div class="row-hero">
      <div class="swiper-container slider-10">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="/public/images/homepage/home1-slider1.jpg" alt="">
            <div class="content">
              <h1>Organic Farm</h1>
              <p>Get fresh food from our firm to your table</p>
              <a href="">SHOP NOW</a>
            </div>
          </div>

          <div class="swiper-slide">
            <img src="/public/images/homepage/home1-slider2.jpg" alt="">
            <div class="content">
              <h1>Organic Farm</h1>
              <p>Get fresh food from our firm to your table</p>
              <a href="">SHOP NOW</a>
            </div>
          </div>

        </div>
      </div>
    </div>


  </div>

  <section class="section feautured">
    <div class="row container">
      <div class="section-title">
        <h3>GREENFARM DEAL OF THE DAY</h3>
        <div class="arrowscate d-flex">
          <div class="categories-prev d-flex">
            <i class="fa fa-caret-left"></i>
          </div>
          <div class="categories-next d-flex">
            <i class="fa fa-caret-right"></i>
          </div>
        </div>
      </div>


      <div class="swiper-container slider-4">
        <div class="swiper-wrapper">
          <?php foreach($loadTittleImgCate as $loadTI) { ?>
          <div class="swiper-slide">
                  <div class="product-cate">
                    <div class="img-categories">
                      <a href="/shop?category=<?php echo $loadTI["id"];?>&page=1"><img src="<?php echo $loadTI['thumbnails'] ?>" alt=""></a>
                      
                    </div>
                    <div class="bottom">
                      <div class="name-bottom">
                        <a href="/shop?category=<?php echo $loadTI["id"];?>&page=1"><?php echo $loadTI['title'] ?></a>
                      </div>
                    </div>
      
                  </div>
          </div>
          
          <?php } ?>
          </div>
      </div>
  </section>





  <!-- banner section starts-->
  <section class="banner-container">
    <div class="banner">
      <a href=""> <img src="/public/images/homepage/home2-banner1-1.jpg" alt=""></a>


    </div>

    <div class="banner">
      <a href=""><img src="/public/images/homepage/home2-banner1-2.jpg" alt=""></a>

    </div>
  </section>



  <!-- featured,new arr, on sale -->

  <section id="section-featured" class="section featured">
    <div class="row container">
      <div class="section-title">
        <div class="nav nav-tabs" role="tablist">
          <div class="item1">
            <p id="featured" class="nav-item nav-link active show" href="" onclick="Functionfeatured()">Featured</p>
          </div>
          <div class="item2">
            <p id="new-arr" class="nav-item nav-link" href="" onclick="Functionnewarr()">New Arrivals</p>
          </div>
          <div class="item3">
            <p id="on-sale" class="nav-item nav-link" href="" onclick="Functiononsale()">On Sale</p>
          </div>
        </div>
        <div class="arrows d-flex">
          <div class="fno-prev d-flex">
            <i class="fa fa-caret-left"></i>
          </div>
          <div class="fno-next d-flex">
            <i class="fa fa-caret-right"></i>
          </div>
        </div>
      </div>


      <div id="row-fe" class="swiper-container slider-7">
        <div class="swiper-wrapper">
        
          
          <?php 
                $dem = 0;
                $i = count($newCategoryHome);
                $giua = (int)($i/2) + 1 ;
                // Chia thanh 2 truong hop
                // So product la chan thi chia doi binh thuong
                // So product le thi lay phan tu giua nhan 2
                if($i%2==0){
                  // Cho nay hoi lu :V 
                  $giua = $giua - 1;
                  for($dem;$dem<$giua;$dem++){ 
                  
                    echo "
                          <div class='swiper-slide'>
                          <div class='product'>
              
                            <div class='img-container'>
                              <a href='detail/".$newCategoryHome[$dem]['id']."' style ='height:0px;'><img src='".$newCategoryHome[$dem]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
              
                              <ul class='side-icons'>
                                <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                                <!--<a><i class='fas fa-search'></i></a>  -->
                                <!--<a><i class='fas fa-heart'></i></a>  -->
                              </ul>
                            </div>
                            
                            <div class='bottom'>
                            <p>
                            ";
                            
                          foreach ($newCategoryHome[$dem]["categories"] as $c) {
                            echo "<a href=''>".$c["title"]."</a> "; 
                          }
                          
                          
                             
                            echo "</p>
                              <div class='name-bottom'>
                                <a href=''>".$newCategoryHome[$dem ]['name']."</a>
                              </div>
                              <div class='price'><span>850000</span>".$newCategoryHome[$dem]['price']."</div>
                            </div>
                          </div>
                          <div class='product'>
              
                            <div class='img-container'>
                              <a href='detail/".$newCategoryHome[$dem + $giua]['id']."'><img src='".$newCategoryHome[$dem + $giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
              
                              <ul class='side-icons'>
                                <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                                <!--<a><i class='fas fa-search'></i></a>  -->
                                <!--<a><i class='fas fa-heart'></i></a>  -->
                              </ul>
                            </div>
                            <div class='bottom'><p>"
                            ;
                            foreach ($newCategoryHome[$dem+ $giua]["categories"] as $c) {
                              echo "<a href=''>".$c["title"]."</a> "; 
                            }
                         
                             echo "</p> <div class='name-bottom'>
                                <a href=''>".$newCategoryHome[$dem + $giua]['name']."</a>
                              </div>
                              <div class='price'><span>850000</span>".$newCategoryHome[$dem+ $giua]['price']."</div>
                            </div>
                          </div>
                        </div>
                      ";
                         
                  }
                }
                else{
                  for($dem;$dem<$giua-1;$dem++){
                  
                    echo "
                          <div class='swiper-slide'>
                          <div class='product'>
              
                            <div class='img-container'>
                              <a href='detail/".$newCategoryHome[$dem]['id']."'><img src='".$newCategoryHome[$dem]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
              
                              <ul class='side-icons'>
                                <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                                <!--<a><i class='fas fa-search'></i></a>  -->
                                <!--<a><i class='fas fa-heart'></i></a>  -->
                              </ul>
                            </div>
                            
                            <div class='bottom'>
                            <p>
                            ";
                            
                          foreach ($newCategoryHome[$dem]["categories"] as $c) {
                            echo "<a href=''>".$c["title"]."</a> "; 
                          }
                          
                          
                             
                            echo "</p>
                              <div class='name-bottom'>
                                <a href=''>".$newCategoryHome[$dem ]['name']."</a>
                              </div>
                              <div class='price'><span>850000</span>".$newCategoryHome[$dem]['price']."</div>
                            </div>
                          </div>
                          <div class='product'>
              
                            <div class='img-container'>
                              <a href='detail/".$newCategoryHome[$dem + $giua]['id']."'><img src='".$newCategoryHome[$dem + $giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
              
                              <ul class='side-icons'>
                                <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                                <!--<a><i class='fas fa-search'></i></a>  -->
                                <!--<a><i class='fas fa-heart'></i></a>  -->
                              </ul>
                            </div>
                            <div class='bottom'>
                              <p>";
                              foreach ($newCategoryHome[$dem+ $giua]["categories"] as $c) {
                                echo "<a href=''>".$c["title"]."</a> "; 
                              }
                              echo "</p>
                              <div class='name-bottom'>
                                <a href=''>".$newCategoryHome[$dem + $giua]['name']."</a>
                              </div>
                              <div class='price'><span>850000</span>".$newCategoryHome[$dem+ $giua]['price']."</div>
                            </div>
                          </div>
                        </div>
                      ";
                         
                  }
                  $giua=$giua-1;
                  echo "
                  <div class='swiper-slide'>
                  <div class='product'>
      
                    <div class='img-container'>
                      <a href='detail/".$newCategoryHome[$giua]['id']."'><img src='".$newCategoryHome[$giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
      
                      <ul class='side-icons'>
                        <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                        <!--<a><i class='fas fa-search'></i></a>  -->
                        <!--<a><i class='fas fa-heart'></i></a>  -->
                      </ul>
                    </div>
                    
                    <div class='bottom'>
                    <p>
                    ";
                    
                  foreach ($newCategoryHome[$giua]["categories"] as $c) {
                    echo "<a href=''>".$c["title"]."</a> "; 
                  }              
                    echo "</p>
                      <div class='name-bottom'>
                        <a href=''>".$newCategoryHome[$giua ]['name']."</a>
                      </div>
                      <div class='price'><span>850000</span>".$newCategoryHome[$giua]['price']."</div>
                    </div>
                  </div>
                  <div class='product'>      
                    <div class='img-container'>
                      <a href='detail/".$newCategoryHome[$giua]['id']."'><img src='".$newCategoryHome[ $giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
      
                      <ul class='side-icons'>
                        <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                        <!--<a><i class='fas fa-search'></i></a>  -->
                        <!--<a><i class='fas fa-heart'></i></a>  -->
                      </ul>
                    </div>
                    <div class='bottom'>
                      <p>";
                        foreach ($newCategoryHome[$giua]["categories"] as $c) {
                    echo "<a href=''>".$c["title"]."</a> "; 
                    }
                      echo "</p>
                      <div class='name-bottom'>
                        <a href=''>".$newCategoryHome[$giua]['name']."</a>
                      </div>
                      <div class='price'><span>850000</span>".$newCategoryHome[ $giua]['price']."</div>
                    </div>
                  </div>
                </div>
              ";
                }
                
               
                ?>            
        </div>
      </div>
      <div id="row-new-arr" class="swiper-container slider-71" style="display: none;">
  

        <div class="swiper-wrapper">
        
          
        <?php 
              $dem = 0;
              $i = count($categoryhomeCus);
              $giua = (int)($i/2) + 1 ;
              
              if($i%2==0){
                $giua = $giua - 1;
                for($dem;$dem<$giua;$dem++){
                
                  echo "
                        <div class='swiper-slide'>
                        <div class='product'>
            
                          <div class='img-container'>
                            <a href='detail/".$categoryhomeCus[$dem]['id']."'><img src='".$categoryhomeCus[$dem]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
            
                            <ul class='side-icons'>
                              <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                              <!--<a><i class='fas fa-search'></i></a>  -->
                              <!--<a><i class='fas fa-heart'></i></a>  -->
                            </ul>
                          </div>
                          
                          <div class='bottom'>
                          <p>
                          ";
                          
                        foreach ($categoryhomeCus[$dem]["categories"] as $c) {
                          echo "<a href=''>".$c["title"]."</a> "; 
                        }
                        
                        
                           
                          echo "</p>
                            <div class='name-bottom'>
                              <a href=''>".$categoryhomeCus[$dem ]['name']."</a>
                            </div>
                            <div class='price'><span>850000</span>".$categoryhomeCus[$dem]['price']."</div>
                          </div>
                        </div>
                        <div class='product'>
            
                          <div class='img-container'>
                            <a href='detail/".$categoryhomeCus[$dem + $giua]['id']."'><img src='".$categoryhomeCus[$dem + $giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
            
                            <ul class='side-icons'>
                              <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                              <!--<a><i class='fas fa-search'></i></a>  -->
                              <!--<a><i class='fas fa-heart'></i></a>  -->
                            </ul>
                          </div>
                          <div class='bottom'><p>"
                          ;
                          foreach ($categoryhomeCus[$dem+ $giua]["categories"] as $c) {
                            echo "<a href=''>".$c["title"]."</a> "; 
                          }
                       
                           echo "</p> <div class='name-bottom'>
                              <a href=''>".$categoryhomeCus[$dem + $giua]['name']."</a>
                            </div>
                            <div class='price'><span>850000</span>".$categoryhomeCus[$dem+ $giua]['price']."</div>
                          </div>
                        </div>
                      </div>
                    ";
                       
                }
              }
              else{
                for($dem;$dem<$giua-1;$dem++){
                
                  echo "
                        <div class='swiper-slide'>
                        <div class='product'>
            
                          <div class='img-container'>
                            <a href='detail/".$categoryhomeCus[$dem]['id']."'><img src='".$categoryhomeCus[$dem]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
            
                            <ul class='side-icons'>
                              <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                              <!--<a><i class='fas fa-search'></i></a>  -->
                              <!--<a><i class='fas fa-heart'></i></a>  -->
                            </ul>
                          </div>
                          
                          <div class='bottom'>
                          <p>
                          ";
                          
                        foreach ($categoryhomeCus[$dem]["categories"] as $c) {
                          echo "<a href=''>".$c["title"]."</a> "; 
                        }
                        
                        
                           
                          echo "</p>
                            <div class='name-bottom'>
                              <a href=''>".$categoryhomeCus[$dem ]['name']."</a>
                            </div>
                            <div class='price'><span>850000</span>".$categoryhomeCus[$dem]['price']."</div>
                          </div>
                        </div>
                        <div class='product'>
            
                          <div class='img-container'>
                            <a href='detail/".$categoryhomeCus[$dem + $giua]['id']."'><img src='".$categoryhomeCus[$dem + $giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
            
                            <ul class='side-icons'>
                              <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                              <!--<a><i class='fas fa-search'></i></a>  -->
                              <!--<a><i class='fas fa-heart'></i></a>  -->
                            </ul>
                          </div>
                          <div class='bottom'>
                            <p>";
                            foreach ($categoryhomeCus[$dem+ $giua]["categories"] as $c) {
                              echo "<a href=''>".$c["title"]."</a> "; 
                            }
                            echo "</p>
                            <div class='name-bottom'>
                              <a href=''>".$categoryhomeCus[$dem + $giua]['name']."</a>
                            </div>
                            <div class='price'><span>850000</span>".$categoryhomeCus[$dem+ $giua]['price']."</div>
                          </div>
                        </div>
                      </div>
                    ";
                       
                }
                $giua=$giua-1;
                echo "
                <div class='swiper-slide'>
                <div class='product'>
    
                  <div class='img-container'>
                    <a href='detail/".$categoryhomeCus[$giua]['id']."'><img src='".$categoryhomeCus[$giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
    
                    <ul class='side-icons'>
                      <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                      <!--<a><i class='fas fa-search'></i></a>  -->
                      <!--<a><i class='fas fa-heart'></i></a>  -->
                    </ul>
                  </div>
                  
                  <div class='bottom'>
                  <p>
                  ";
                  
                foreach ($categoryhomeCus[$giua]["categories"] as $c) {
                  echo "<a href=''>".$c["title"]."</a> "; 
                }
                
                
                   
                  echo "</p>
                    <div class='name-bottom'>
                      <a href=''>".$categoryhomeCus[$giua ]['name']."</a>
                    </div>
                    <div class='price'><span>850000</span>".$categoryhomeCus[$giua]['price']."</div>
                  </div>
                </div>
                <div class='product'>
    
                  <div class='img-container'>
                    <a href='detail/".$categoryhomeCus[ $giua]['id']."'><img src='".$categoryhomeCus[ $giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
    
                    <ul class='side-icons'>
                      <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                      <!--<a><i class='fas fa-search'></i></a>  -->
                      <!--<a><i class='fas fa-heart'></i></a>  -->
                    </ul>
                  </div>
                  <div class='bottom'>
                    <p>";
                      foreach ($categoryhomeCus[$giua]["categories"] as $c) {
                  echo "<a href=''>".$c["title"]."</a> "; 
                  }
                    echo "</p>
                    <div class='name-bottom'>
                      <a href=''>".$categoryhomeCus[$giua]['name']."</a>
                    </div>
                    <div class='price'><span>850000</span>".$categoryhomeCus[ $giua]['price']."</div>
                  </div>
                </div>
              </div>
            ";
              }
              
             
              ?>
          
        
        


      </div>
      </div>

      <div id="row-on" class="swiper-container slider-72" style="display: none;">
      <div class="swiper-wrapper">
        
          
        <?php 
              $dem = 0;
              $i = count($categoryhomeCus);
              $giua = (int)($i/2) + 1 ;
              
              if($i%2==0){
                $giua = $giua - 1;
                for($dem;$dem<$giua;$dem++){
                
                  echo "
                        <div class='swiper-slide'>
                        <div class='product'>
            
                          <div class='img-container'>
                            <a href='detail/".$categoryhomeCus[$dem]['id']."'><img src='".$categoryhomeCus[$dem]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
            
                            <ul class='side-icons'>
                              <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                              <!--<a><i class='fas fa-search'></i></a>  -->
                              <!--<a><i class='fas fa-heart'></i></a>  -->
                            </ul>
                          </div>
                          
                          <div class='bottom'>
                          <p>
                          ";
                          
                        foreach ($categoryhomeCus[$dem]["categories"] as $c) {
                          echo "<a href=''>".$c["title"]."</a> "; 
                        }
                        
                        
                           
                          echo "</p>
                            <div class='name-bottom'>
                              <a href=''>".$categoryhomeCus[$dem ]['name']."</a>
                            </div>
                            <div class='price'><span>850000</span>".$categoryhomeCus[$dem]['price']."</div>
                          </div>
                        </div>
                        <div class='product'>
            
                          <div class='img-container'>
                            <a href='detail/".$categoryhomeCus[$dem + $giua]['id']."'><img src='".$categoryhomeCus[$dem + $giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
            
                            <ul class='side-icons'>
                              <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                              <!--<a><i class='fas fa-search'></i></a>  -->
                              <!--<a><i class='fas fa-heart'></i></a>  -->
                            </ul>
                          </div>
                          <div class='bottom'><p>"
                          ;
                          foreach ($categoryhomeCus[$dem+ $giua]["categories"] as $c) {
                            echo "<a href=''>".$c["title"]."</a> "; 
                          }
                       
                           echo "</p> <div class='name-bottom'>
                              <a href=''>".$categoryhomeCus[$dem + $giua]['name']."</a>
                            </div>
                            <div class='price'><span>850000</span>".$categoryhomeCus[$dem+ $giua]['price']."</div>
                          </div>
                        </div>
                      </div>
                    ";
                       
                }
              }
              else{
                for($dem;$dem<$giua-1;$dem++){
                
                  echo "
                        <div class='swiper-slide'>
                        <div class='product'>
            
                          <div class='img-container'>
                            <a href='detail/".$categoryhomeCus[$dem]['id']."'><img src='".$categoryhomeCus[$dem]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
            
                            <ul class='side-icons'>
                              <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                              <!--<a><i class='fas fa-search'></i></a>  -->
                              <!--<a><i class='fas fa-heart'></i></a>  -->
                            </ul>
                          </div>
                          
                          <div class='bottom'>
                          <p>
                          ";
                          
                        foreach ($categoryhomeCus[$dem]["categories"] as $c) {
                          echo "<a href=''>".$c["title"]."</a> "; 
                        }
                        
                        
                           
                          echo "</p>
                            <div class='name-bottom'>
                              <a href=''>".$categoryhomeCus[$dem ]['name']."</a>
                            </div>
                            <div class='price'><span>850000</span>".$categoryhomeCus[$dem]['price']."</div>
                          </div>
                        </div>
                        <div class='product'>
            
                          <div class='img-container'>
                            <a href='detail/".$categoryhomeCus[$dem + $giua]['id']."'><img src='".$categoryhomeCus[$dem + $giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
            
                            <ul class='side-icons'>
                              <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                              <!--<a><i class='fas fa-search'></i></a>  -->
                              <!--<a><i class='fas fa-heart'></i></a>  -->
                            </ul>
                          </div>
                          <div class='bottom'>
                            <p>";
                            foreach ($categoryhomeCus[$dem+ $giua]["categories"] as $c) {
                              echo "<a href=''>".$c["title"]."</a> "; 
                            }
                            echo "</p>
                            <div class='name-bottom'>
                              <a href=''>".$categoryhomeCus[$dem + $giua]['name']."</a>
                            </div>
                            <div class='price'><span>850000</span>".$categoryhomeCus[$dem+ $giua]['price']."</div>
                          </div>
                        </div>
                      </div>
                    ";
                       
                }
                $giua=$giua-1;
                echo "
                <div class='swiper-slide'>
                <div class='product'>
    
                  <div class='img-container'>
                    <a href='detail/".$categoryhomeCus[$giua]['id']."'><img src='".$categoryhomeCus[$giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
    
                    <ul class='side-icons'>
                      <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                      <!--<a><i class='fas fa-search'></i></a>  -->
                      <!--<a><i class='fas fa-heart'></i></a>  -->
                    </ul>
                  </div>
                  
                  <div class='bottom'>
                  <p>
                  ";
                  
                foreach ($categoryhomeCus[$giua]["categories"] as $c) {
                  echo "<a href=''>".$c["title"]."</a> "; 
                }
                
                
                   
                  echo "</p>
                    <div class='name-bottom'>
                      <a href=''>".$categoryhomeCus[$giua ]['name']."</a>
                    </div>
                    <div class='price'><span>850000</span>".$categoryhomeCus[$giua]['price']."</div>
                  </div>
                </div>
                <div class='product'>
    
                  <div class='img-container'>
                    <a href='detail/".$categoryhomeCus[ $giua]['id']."'><img src='".$categoryhomeCus[ $giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
    
                    <ul class='side-icons'>
                      <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                      <!--<a><i class='fas fa-search'></i></a>  -->
                      <!--<a><i class='fas fa-heart'></i></a>  -->
                    </ul>
                  </div>
                  <div class='bottom'>
                    <p>";
                      foreach ($categoryhomeCus[$giua]["categories"] as $c) {
                  echo "<a href=''>".$c["title"]."</a> "; 
                  }
                    echo "</p>
                    <div class='name-bottom'>
                      <a href=''>".$categoryhomeCus[$giua]['name']."</a>
                    </div>
                    <div class='price'><span>850000</span>".$categoryhomeCus[ $giua]['price']."</div>
                  </div>
                </div>
              </div>
            ";
              }
              
             
              ?>
          
        
        


      </div>
      </div>
    </div>
  </section>

  <!-- Pagecut san pham -->
  <section class="pagecut">
    <div class="pagecutlist">
      <div class="">
        <a href="#"><img src="/public/images/homepage/fullbanner-1.jpg" alt=""></a>
        <a href="#"><img src="/public/images/homepage/fullbanner-2.jpg" alt=""></a>
        <a href="#"><img src="/public/images/homepage/fullbanner-3.jpg" alt=""></a>
      </div>
      <div class="">
        <a href="#"><img src="/public/images/homepage/fullbanner-4.jpg" alt=""></a>
        <a href="#"><img src="/public/images/homepage/fullbanner-5.jpg" alt=""></a>
        <a href="#"><img src="/public/images/homepage/fullbanner-6.jpg" alt=""></a>
      </div>
    </div>

  </section>


  <!-- doi san pham tren mot hang -->

  <section class="section featured">
    <div class="row container">
      <div class="section-title">
        <h3>GREENFARM DEAL OF THE DAY</h3>
        <div class="arrows d-flex">
          <div class="custom-prev d-flex">
            <i class="fa fa-caret-left"></i>
          </div>
          <div class="custom-next d-flex">
            <i class="fa fa-caret-right"></i>
          </div>
        </div>
      </div>
      <div class="swiper-container slider-2">
        <div class="swiper-wrapper">
        <?php foreach($categoryhomeCus as $greefarm){ ?>
 
                  <div class="swiper-slide">
                  <div class="product">
                    <div class="img-container">
                      <a href="detail/<?php echo $greefarm['id'] ?>"><img src="<?php echo $greefarm['thumbnails'] ?>" alt=""><span class="discount">-50%</span></a>
      
                      <ul class="side-icons">
                        <!--  -->
                        <!--<a><i class='fas fas fa-cart-plus'></i></a>  -->
                        <!--<a><i class='fas fa-search'></i></a>  -->
                        <!--<a><i class='fas fa-heart'></i></a>  -->
                      </ul>
                    </div>
                    <div class="bottom">
                      <p>
                        <?php
                      foreach ($greefarm["categories"] as $c) {
                        echo "<a href=''>".$c["title"]."</a> "; 
                      }
                      ?>
                      </p>
                      <div class="name-bottom">
                        <a href=""><?php echo $greefarm['name'] ?></a>
                      </div>
                      <div class="price"><span>85000</span><?php echo $greefarm['price']?></div>
                    </div>
                  </div>
                </div>
               
              
              
            <?php } ?>
        </div>
      </div>
    </div>


  </section>

  <!-- best seller -->

  <section class="section featured">
    <div class="row container">
      <div class="section-title">
        <h3>BEST SELLER</h3>
        <div class="arrows d-flex">
          <div class="seller-prev d-flex">
            <i class="fa fa-caret-left"></i>
          </div>
          <div class="seller-next d-flex">
            <i class="fa fa-caret-right"></i>
          </div>
        </div>
      </div>


      <div class="swiper-container slider-5">
        <div class="swiper-wrapper">
        <?php 
            $dem = 0;
            $i = count($categoryhomeCus);
            $giua = (int)($i/2) + 1 ; // Cho nay hoi lu :V ket qua no cu bi lam sao y

            if($i%2==0){
              
              
              $giua = $giua - 1;
              for($dem;$dem<$giua;$dem++){
                echo "
                <div class='swiper-slide'>
        
                <div class='product'>
    
                  <div class='img-seller'>
                    <a href='detail/".$categoryhomeCus[$dem]['id']."'><img src='".$categoryhomeCus[$dem]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
    
                    <div class='next-img'>
                      <p>";
                      foreach ($categoryhomeCus[$dem]["categories"] as $c) {
                        echo "<a href=''>".$c["title"]."</a> "; 
                      }
                      echo "</p>
                      <div class='name-bottom'>
                        <a href=''>".$categoryhomeCus[$dem]['name']."</a>
                      </div>
                      <div class='price'><span>850000</span>".$categoryhomeCus[$dem]['price']."</div>
                    </div>
                  </div>
    
                </div>

                <div class='product'>
    
                  <div class='img-seller'>
                    <a href='detail/".$categoryhomeCus[$dem + $giua]['id']."'><img src='".$categoryhomeCus[$dem + $giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
    
                    <div class='next-img'>
                      <p>";
                      foreach ($categoryhomeCus[$dem + $giua]["categories"] as $c) {
                        echo "<a href=''>".$c["title"]."</a> "; 
                      }
                      echo "</p>
                      <div class='name-bottom'>
                        <a href=''>".$categoryhomeCus[$dem+ $giua]['name']."</a>
                      </div>
                      <div class='price'><span>850000</span>".$categoryhomeCus[$dem+ $giua]['price']."</div>
                    </div>
                  </div>
    
                </div>
               
              </div>
              ";
              }

            }
            else{
              
              for($dem;$dem<$giua-1;$dem++){
                echo "
                <div class='swiper-slide'>
        
                <div class='product'>
    
                  <div class='img-seller'>
                    <a href='detail/".$categoryhomeCus[$dem]['id']."'><img src='".$categoryhomeCus[$dem]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
    
                    <div class='next-img'>
                      <p>";
                      foreach ($categoryhomeCus[$dem]["categories"] as $c) {
                        echo "<a href=''>".$c["title"]."</a> "; 
                      }
                      echo "</p>
                      <div class='name-bottom'>
                        <a href=''>".$categoryhomeCus[$dem]['name']."</a>
                      </div>
                      <div class='price'><span>850000</span>".$categoryhomeCus[$dem]['price']."</div>
                    </div>
                  </div>    
                </div>

                <div class='product'>
    
                  <div class='img-seller'>
                    <a href='detail/".$categoryhomeCus[$dem + $giua]['id']."'><img src='".$categoryhomeCus[$dem + $giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>
    
                    <div class='next-img'>
                      <p>";
                      foreach ($categoryhomeCus[$dem + $giua]["categories"] as $c) {
                        echo "<a href=''>".$c["title"]."</a> "; 
                      }
                      echo "</p>
                      <div class='name-bottom'>
                        <a href=''>".$categoryhomeCus[$dem+ $giua]['name']."</a>
                      </div>
                      <div class='price'><span>850000</span>".$categoryhomeCus[$dem+ $giua]['price']."</div>
                    </div>
                  </div>
    
                </div>
               
              </div>
              ";
              }
            }

            // nhan doi product
            $giua -= 1;
            echo "
                <div class='swiper-slide'>
        
                <div class='product'>
    
                  <div class='img-seller'>";
                  if(isset($categoryhomeCus[$giua]['id']) && isset($categoryhomeCus[$giua]['thumbnails'])){
                    echo"<a href='detail/".$categoryhomeCus[$giua]['id']."'><img src='".$categoryhomeCus[$giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>";
                  }
                    
            echo"
                    <div class='next-img'>
                      <p>";
                      if(isset($categoryhomeCus[$giua]["categories"])){
                        foreach ($categoryhomeCus[$giua]["categories"] as $c) {
                          echo "<a href=''>".$c["title"]."</a> "; 
                        }
                      }
                     
                      echo "</p>
                      <div class='name-bottom'>
                       ";
                       if(isset($categoryhomeCus[$giua]["categories"])){
                        echo"  <a href=''>".$categoryhomeCus[$giua]['name']."</a>";
                       }
                      
                      echo "</p>
                      </div>";
                      if(isset($categoryhomeCus[$giua]["categories"])){
                        echo"<div class='price'><span>850000</span>".$categoryhomeCus[$giua]['price']."</div>";
                       }
                      

                      echo"
                    </div>
                  </div>
    
                </div>

                <div class='product'>
    
                  <div class='img-seller'>";
                  if(isset($categoryhomeCus[$giua]['id'])&&isset($categoryhomeCus[$giua]['thumbnails'])){
                    echo"<a href='detail/".$categoryhomeCus[$giua]['id']."'><img src='".$categoryhomeCus[$giua]['thumbnails']."' alt=''><span class='discount'>-50%</span></a>";
                   }
                    
            echo"
                    <div class='next-img'>
                      <p>";
                      if(isset($categoryhomeCus[$giua]["categories"])){
                        foreach ($categoryhomeCus[$giua]["categories"] as $c) {
                          echo "<a href=''>".$c["title"]."</a> "; 
                        }
                      }
                     
                      echo "</p>
                      <div class='name-bottom'>";
                      if(isset($categoryhomeCus[$giua]['name'])){
                        echo" <a href=''>".$categoryhomeCus[$giua]['name']."</a>";
                      }
                       
                        echo"
                      </div>";
                      if(isset($categoryhomeCus[$giua]['name'])){
                        echo"  <div class='price'><span>850000</span>".$categoryhomeCus[$giua]['price']."</div>";
                      }
                    
                      echo"
                    </div>
                  </div>
    
                </div>
               
              </div>
              ";
              
        ?>

        </div>
      </div>
    </div>
  </section>



  <!-- gram new -->
  <section class="section featured">
    <div class="row container">
      <div class="section-title">
        <h3>GREENFARM NEWS</h3>
        <div class="arrows d-flex">
          <div class="news-prev d-flex">
            <i class="fa fa-caret-left"></i>
          </div>
          <div class="news-next d-flex">
            <i class="fa fa-caret-right"></i>
          </div>
        </div>
      </div>
      <div class="swiper-container slider-6">
        <section class="swiper-wrapper">
          <?php foreach($loadNewsHomePage as $loadNewsHP) { ?>
          <div class="swiper-slide">
            <div class="product">
              <div class="imgNews">
                <a href="/news/<?php echo $loadNewsHP['id'] ?>"><img src="<?php echo $loadNewsHP['thumbnails'] ?>" alt=""></a>
              </div>
              <div class="bottom-news">
                <p><?php echo $loadNewsHP['created_at'] ?></p>
                <div class="name-bottom">
                  <a href="/news/<?php echo $loadNewsHP['id'] ?>"><?php echo $loadNewsHP['title'] ?></a>
                </div>
                <div class="name-bottom1">
                  <a href="/news/<?php echo $loadNewsHP['id'] ?>">Continue <i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

  </section>

  <!-- local brand -->

  <section class="section brands">
    <div class="brand-layout container">

      <div class="section-title">
        <h3>BRAND LOGO</h3>
        <div class="arrows2 d-flex">
          <div class="brand-prev d-flex">
            <i class="fa fa-caret-left"></i>
          </div>
          <div class="brand-next d-flex">
            <i class="fa fa-caret-right"></i>
          </div>
        </div>
      </div>
      <div class="swiper-container slider-3">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <a href=""><img src="/public/images/homepage/brandlogo1.png" alt=""></a>
          </div>
          <div class="swiper-slide">
            <a href=""><img src="/public/images/homepage/brandlogo2.png" alt=""></a>
          </div>
          <div class="swiper-slide">
            <a href=""><img src="/public/images/homepage/brandlogo3.png" alt=""></a>
          </div>
          <div class="swiper-slide">
            <a href=""> <img src="/public/images/homepage/brandlogo4.png" alt=""></a>
          </div>
          <div class="swiper-slide">
            <a href=""><img src="/public/images/homepage/brandlogo5.png" alt=""></a>
          </div>
          <div class="swiper-slide">
            <a href=""><img src="/public/images/homepage/brandlogo6.png" alt=""></a>
          </div>
          <div class="swiper-slide">
            <a href=""><img src="/public/images/homepage/brandlogo7.png" alt=""></a>
          </div>
        </div>

      </div>
    </div>
  </section>



</div>