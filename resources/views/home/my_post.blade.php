<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
     @include('home.homecss')

     <style type="text/css">

        .post_deg
        {
            padding: 30px;
            text-align: center;
        }

        .title_deg
        {
            font-size: 30px;
            font-weight: bold;
            padding: 15px;
        }
        .des_deg
        {
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
        }

        .img_deg
        {
            height: 250px;
            width: 350px;
            padding: 30px;
            margin: auto;
        }

        </style>
   </head>
   <body>
      <!-- header section start -->
      @include('sweetalert::alert')
      <div class="header_section">
        @include('home.header')

     <!--   @if(session()->has('message'))

        <div class="alert alert-succes">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

        {{session()->get('message')}}

    </div>

        @endif-->

</div>

@foreach($data as $data)

<div class="post_deg">
    <img class="img_deg" src="/postimage/{{$data->image}}">
    <h4 class="title_deg">{{$data->title}}</h4>
    <p class="des_deg">{!!$data->description!!}</p>

    <a onclick="return confirm('¿Estás seguro de eliminar esta noticia?')" href="{{url('my_post_del', $data->id)}}" class="btn btn-danger">Eliminar</a>

    <a href="{{url('post_update_page', $data->id)}}" class="btn btn-primary">Editar</a>

         </div>
         @endforeach   
   
     
      <!-- footer section start -->
      @include('home.footer')
   </body>
</html>