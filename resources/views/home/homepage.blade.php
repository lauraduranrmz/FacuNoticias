<!DOCTYPE html>
<html lang="en">
   <head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #chatbot-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color:rgb(1, 66, 0);
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 30px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        #chatbot-window {
            display: none;
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 300px;
            max-height: 400px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            overflow: hidden;
            flex-direction: column;
            font-family: Arial;
        }

        #chat-header {
            background:rgb(0, 255, 76);
            color: white;
            padding: 10px;
            text-align: center;
        }

        #chat {
            padding: 10px;
            height: 250px;
            overflow-y: auto;
            background: #f9f9f9;
        }

        .user, .bot {
            margin: 8px 0;
        }

        .user {
            text-align: right;
        }

        .bot {
            text-align: left;
        }

        #input-container {
            display: flex;
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        #prompt {
            flex-grow: 1;
            padding: 5px;
            font-size: 14px;
        }

        #send-btn {
            background:rgb(0, 255, 21);
            color: white;
            border: none;
            padding: 5px 10px;
            margin-left: 5px;
            cursor: pointer;
        }
    </style>

      <!-- basic -->
     @include('home.homecss') 
     
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
         <!-- banner section start -->
         @include('home.banner')
         </div>
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- services section start -->
      @include('home.services')
      <!-- services section end -->

    
     
      <!-- footer section start -->
      @include('home.footer')


<!-- Botón flotante --> 
 <button id="chatbot-button" onclick="toggleChat()">💬</button>

<!-- Ventana del chatbot -->
<div id="chatbot-window" style="display:none; position:fixed; bottom:90px; right:20px; width:300px; background:white; border:1px solid #ccc; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.3); z-index:9999; flex-direction:column; font-family:Arial;">
    <div style="background:#0a8501; color:white; padding:10px; text-align:center;">Chatbot</div>
    <div id="messages" style="padding:10px; height:250px; overflow-y:auto; background:#f9f9f9;"></div>
    <div style="display:flex; padding:10px; border-top:1px solid #ddd;">
        <input type="text" id="user-input" placeholder="Escribe tu mensaje..." style="flex-grow:1; padding:5px;">
        <button onclick="sendMessage()" style="background:#0a8501; color:white; border:none; padding:5px 10px; margin-left:5px;">➤</button>
    </div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    function toggleChat() {
        const chatWindow = document.getElementById('chatbot-window');
        chatWindow.style.display = (chatWindow.style.display === 'none' || chatWindow.style.display === '') ? 'flex' : 'none';
    }

    async function sendMessage() {
        const input = document.getElementById('user-input');
        const message = input.value.trim();
        if (!message) return;

        const messagesDiv = document.getElementById('messages');
        messagesDiv.innerHTML += `<div style="text-align:right;"><strong>Tú:</strong> ${message}</div>`;
        input.value = '';

        try {
            const response = await fetch("{{ route('chatbot.ask') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ prompt: message })
            });

            const data = await response.json();
            messagesDiv.innerHTML += `<div style="text-align:left;"><strong>Bot:</strong> ${data.respuesta}</div>`;
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        } catch (error) {
            messagesDiv.innerHTML += `<div><strong>Bot:</strong> Hubo un error al enviar el mensaje.</div>`;
        }
    }
</script> 
   </body>
</html>