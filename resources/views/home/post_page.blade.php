<!DOCTYPE html>
<html lang="en">
   <head>
     <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

   <base href="/public">
      <!-- basic -->
     @include('home.homecss')

     <style>

        .div_deg
        {
            text-align: center;
            background-color: black;
        }

        .img_deg
        {
            height:150px;
            width: 250px;
            margin: auto;
        }

        label
        {
            font-size: 18px;
            font-weight: bold;
            width: 200px;
            color: white;
        }

        .input_deg
        {
            padding: 30px;
        }

        .title_deg
        {
            padding: 30px;
            font-size: 30px;
            font-weight: bold;
            color: white;
        }
        </style>
   </head>
   <body>

   @include('sweetalert::alert')
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')

       <div class="div_deg">

       <h1 class="title_deg">Editar Noticia</h1>
        <form action="{{url('update_post_data', $data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input_deg">
                <label>Título</label>
                <input type="text" name="title" value="{{$data->title}}">
            </div>

            <div  class="input_deg">
                <label>Descripción</label>
                <textarea name="description">{!!$data->description!!}</textarea>
            </div>
              <script>
    ClassicEditor
      .create(document.querySelector('textarea[name="description"]'))
      .catch(error => {
        console.error(error);
      });
  </script>

            <div class="input_deg">
                <label >Imagen anterior</label>
                <img class="img_deg" src="/postimage/{{$data->image}}">
            </div>

            <div  class="input_deg">
                <label>Actualizar la imagen</label>
                <input type="file" name="image">
            </div>

            <div  class="input_deg">
                <input type="submit" class="btn btn-outline-secondary" >
            </div>

            

        </form>

        </div>  
       
      </div>
      
     <div>
      @include('home.footer')

    </div>
   </body>
</html>