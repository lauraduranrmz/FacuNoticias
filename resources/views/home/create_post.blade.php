<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
       <meta charset="UTF-8">

  <meta charset="UTF-8">

  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
      <style type="text/css">

        .div_deg
        {
            text-align: center;
        }

        .title_deg
        {
            font-size: 30px;
            font-weight: bold;
            color:white;
            padding: 30px;
        }

        label
        {
            display: inline-block;
            width: 200px;
            color:white;
            font-size: 18px;
            font-weight: bold;
        }

        .field_deg
        {
            padding: 25px;
        }

        </style>
     @include('home.homecss')
   </head>
   <body>

   @include('sweetalert::alert')
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')



         <div class="div_deg">

         <h3 class="title_deg">Crear Noticia</h3>
            <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">
                @csrf

            <div class="field_deg">
                <label>Título</label>
                <input type="text" name="title">
            </div>

            <div class="field_deg">
                <label>Descripción</label>
                <textarea name="description"></textarea>
            </div>

             <script>
    ClassicEditor
      .create(document.querySelector('textarea[name="description"]'))
      .catch(error => {
        console.error(error);
      });
  </script>

            <div class="field_deg">
                <label>Agregar imagen</label>
                <input type="file" name="image">
            </div>


            <div class="field_deg">
                <input type="submit" value="Publicar" class="btn btn-outline-secondary" >
            </div>
            </form>

         </div>
  
      @include('home.footer')
   </body>
</html>