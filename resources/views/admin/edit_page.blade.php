<!DOCTYPE html>
<html>
  <head> 

  <base href="/public">
    @include('admin.css')

    <style type="text/css">

        .post_title
        {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }
        .div_center
        {
            text-align: center;
            padding: 30px;
        }

        label
        {
            display: inline-block;
            width: 200px;
        }

        .alert 
        {
            background-color: green;
            color: white;
        }
        </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->

      @include('admin.sidebar')
     
      <!-- Sidebar Navigation end-->

      <div class="page-content">

      @if(session()->has('message'))

<div class="alert alert-success">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

{{session()->get('message')}}

</div>

@endif
      <h1 class="post_title">Actualizar noticia</h1>

      <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data"> 
      @csrf

      <div class="div_center">
        <label>Título</label>
        <input type="text" name="title" value="{{$post->title}}">
    </div>

    <div class="div_center">
        <label>Descripción</label>
        <textarea name="description" >{{$post->description}}</textarea>
    </div>


    <div class="div_center">

        <label>Imagen anterior</label>
        <img style="margin:auto;" heigth="160px" width="210px" src="/postimage/{{$post->image}}">
    </div>
    <div class="div_center">
        <label>Actualizar la imagen</label>
        <input type="file" name="image">
    </div>

    <div class="div_center">
      
        <input type="submit" value="Actualizar" class="btn btn-primary">
    </div>
      </form>
</div>
 
       
      @include('admin.footer')
  </body>
</html>