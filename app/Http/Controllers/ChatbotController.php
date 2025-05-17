<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
  public function ask(Request $request)
{
    $prompt = $request->input('prompt');
    $apiKey = env('GEMINI_API_KEY');

 $response = Http::withHeaders([
    'Content-Type' => 'application/json',
])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-pro-002:generateContent?key={AIzaSyCNNWDNRA5EfhtyIV1KItZmw7TZewESOgs}", [
    'contents' => [
        [
            'role' => 'user',
            'parts' => [
                ['text' => $prompt]
            ]
        ]
    ]
]);


    $result = $response->json();

    // ✅ Agrega esto para ver la respuesta en laravel.log
    \Log::info('Gemini API response', $result);

    return response()->json([
        'respuesta' => $result['candidates'][0]['content']['parts'][0]['text'] ?? 'No se pudo generar texto'
    ]);
}

}
