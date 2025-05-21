<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function ask(Request $request)
    {
        // Normaliza el texto: sin mayúsculas ni signos de interrogación
        $prompt = strtolower(trim(preg_replace('/[¿?]/', '', $request->input('prompt'))));

        $faq = [
            [
                'preguntas' => ['hola', 'buenas', 'hey'],
                'respuesta' => '¡Hola! ¿En qué puedo ayudarte?'
            ],
            [
                'preguntas' => ['cual es tu nombre','cual es tu nombre?', 'quien eres?','quien eres', 'como te llamas', 'que eres?','que eres'],
                'respuesta' => 'Soy tu chatbot de ayuda. Puedo responder preguntas sobre la plataforma FacuNoticias y la FIME.'
            ],
            [
                'preguntas' => ['que es facunoticias', 'que es FacuNoticias', 'que es FacuNoticias?', 'facunoticias?', 'FacuNoticias?'],
                'respuesta' => 'FacuNoticias es una plataforma web desarrollada por estudiantes para estudiantes que permite a los estudiantes de FIME publicar, editar y eliminar noticias relacionadas con la facultad.'
            ],
            [
                'preguntas' => ['que es la FIME','que es fime?', 'que es fime', 'que es la FIME?','la FIME'],
                'respuesta' => 'FIME fue fundada en 1947 y forma parte de la Universidad Autónoma de Nuevo León. Su misión es generar y aplicar conocimiento científico y tecnológico para mejorar la calidad de la formación integral universitaria, contribuyendo al progreso del país.'
            ],
            [
                'preguntas' => ['como puedo publicar una noticia', 'publicar noticia', 'quiero publicar','como publico una noticia'],
                'respuesta' => 'Debes iniciar sesión y luego dar clic en “Publicar noticia”. Completa el formulario y envíalo para revisión.'
            ],
            [
                'preguntas' => ['como inicio sesión?', 'como inicio sesion', 'como puedo iniciar sesión','iniciar sesión'],
                'respuesta' => 'Haz clic en "Iniciar sesión" y llena tus datos previamente registrados.'
            ],
            [
                'preguntas' => ['quien puede publicar noticias', 'quienes publican noticias', 'puedo publicar', 'puedo publicar una noticia', 'puedo publicar algo?', 'puedo publicar algo?', 'puedo publicar una noticia?'],
                'respuesta' => 'Todos los estudiantes registrados pueden publicar noticias. Los administradores lo hacen sin revisión.'
            ],
            [
                'preguntas' => ['por que mi noticia no aparece', 'mi noticia no se publica', 'no veo mi noticia'],
                'respuesta' => 'Debe ser aprobada por un administrador. Esto puede tardar unas horas o días.'
            ],
             [
                'preguntas' => ['donde veo mis noticias', 'donde veo las noticias que he publicado', 'donde puedo ver mis noticias', 'como se donde estan mis noticias', 'mis noticias', 'donde veo mis noticias publicadas'],
                'respuesta' => 'Ve a “Mis noticias” y ahi apareceran todas las noticias que haz publicado.'
            ],
            [
                'preguntas' => ['editar noticia', 'como edito una noticia', 'modificar mi noticia', 'como modifico una noticia?', 'como modifico una noticia', 'como cambio una noticia?'],
                'respuesta' => 'Ve a “Mis noticias”, selecciona la que quieras y haz clic en “Editar”.'
            ],
            [
                'preguntas' => ['eliminar noticia', 'borrar mi noticia', 'quitar noticia', 'quiero eliminar una noticia', 'eliminar', 'como elimino una noticia?', 'como elimino una noticia'],
                'respuesta' => 'En “Mis noticias”, haz clic en “Eliminar” y confirma la acción.'
            ],
            [
                'preguntas' => ['como registrarme', 'quiero registrarme', 'crear cuenta', 'como creo una cuenta', 'como me registro?', 'como me registro'],
                'respuesta' => 'Haz clic en “Registrarse” y completa el formulario.'
            ],
            [
                'preguntas' => ['olvide mi contraseña', 'no recuerdo mi contraseña'],
                'respuesta' => 'Haz clic en “¿Olvidaste tu contraseña?” y sigue los pasos.'
            ],
            [
                'preguntas' => ['diferencia entre usuario y administrador', 'que hace un administrador', 'cual es la diferencia entre usuario y administrador?'],
                'respuesta' => 'El administrador puede aprobar noticias, moderar y ver todas las publicaciones.'
            ],
            [
                'preguntas' => ['quien publico una noticia', 'ver autor de noticia'],
                'respuesta' => 'Cada noticia muestra el nombre del autor.'
            ],
            [
                'preguntas' => ['carreras que ofrece fime', 'que carreras hay en fime', 'que carreras tiene FIME?', 'que carreras tiene fime?', 'que carreras tiene fime'],
                'respuesta' => 'FIME ofrece Ingeniería en Software, Electrónica, Mecatrónica, y más.'
            ],
            [
                'preguntas' => ['donde esta fime', 'ubicacion de fime', 'ubicacion de FIME', 'ubicacion de la FIME?', 'ubicacion de fime?', 'donde se ubica FIME?'],
                'respuesta' => 'Está en Ciudad Universitaria, San Nicolás de los Garza, Nuevo León.'
            ],
            [
                'preguntas' => ['como entrar a siase', 'acceder a siase', 'como ingreso a siase?', 'como entro a siase?', 'como entro a siase'],
                'respuesta' => 'Ingresa a https://www.uanl.mx/enlinea/ con tu matrícula y contraseña.'
            ],
            [
                'preguntas' => ['ver calificaciones', 'ver horario', 'como veo mis calificaciones'],
                'respuesta' => 'Consulta en SIASE, sección “Alumno” > “Horarios” o “Calificaciones”.'
            ],
            [
                'preguntas' => ['cuando son las inscripciones', 'fechas reinscripcion'],
                'respuesta' => 'Revisa el sitio oficial de FIME o sus redes sociales, ya que cambian cada semestre.'
            ],
            [
                'preguntas' => ['problema con matricula', 'duda sobre matricula', 'tengo un problema con mi matricula'],
                'respuesta' => 'Contacta a Servicios Escolares o acude al edificio administrativo.'
            ],
            [
                'preguntas' => ['actividades extracurriculares', 'grupos estudiantiles', 'qué actividades hay en FIME', 'que actividades hay en fime?', 'que actividades hay en fime','que actividades hay'],
                'respuesta' => 'Hay talleres, robótica, deportes y eventos académicos.'
            ],
            [
                'preguntas' => ['donde hacer servicio social', 'practicas profesionales', 'donde puedo hacer mis practicas?', 'donde puedo hacer el servicio social?',' donde puedo hacer mis practicas', 'donde puedo hacer mi servicio social'],
                'respuesta' => 'Consulta el portal correspondiente o acude al departamento encargado.'
            ],
            [
                'preguntas' => ['gracias', 'seria todo, gracias', 'gracias por todo', 'muchas gracias','ok gracias', 'gracias, nos vemos'],
                'respuesta' => '¡De nada! Sigo trabajando para mejorar mis respuestas.'
            ],
            [
                'preguntas' => ['adios', 'hasta luego', 'nos vemos', 'bay','bye', 'hasta pronto'],
                'respuesta' => 'Nos vemos. ¡Vuelve pronto!'
            ],
            [
                'preguntas' => ['contactar administradores', 'correo de contacto', 'como los puedo contactar', 'cual es su contacto', 'contactar', 'contactar?', 'como puedo contactar con ustedes'],
                'respuesta' => 'Puedes escribir a facunoticias5@gmail.com con tus dudas.'
            ]
        ];

        // Buscar coincidencia
        $respuesta = 'Lo siento, no entiendo tu pregunta. Intenta reformularla.';

        foreach ($faq as $item) {
            foreach ($item['preguntas'] as $pregunta) {
                if (strpos($prompt, $pregunta) !== false) {
                    $respuesta = $item['respuesta'];
                    break 2;
                }
            }
        }

        return response()->json([
            'respuesta' => $respuesta
        ]);
    }
}
