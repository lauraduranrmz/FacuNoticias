<!DOCTYPE html>
<html lang="en">
   <head>

   <base href="/public">

      <!-- basic -->
     @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
         <!-- banner section start -->
       
         </div>
         <!-- banner section end -->
      </div>
      
      <div class="col-md-5 mx-auto text-center">
                     <div><img style="padding:20px" src="/postimage/{{$post->image}}" class="services_img"></div>
                     <h2><b>{{$post->title}}</b></h2>

                     <h4>{!!$post->description!!}</h4>
                     <p>Publicada por <b>{{$post->name}}</b></p>
                 
                  </div>
   
     
      <!-- footer section start -->
      @include('home.footer')
   </body>
</html>