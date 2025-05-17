document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.getElementById("chatbot-toggle");
    const chatbotWindow = document.getElementById("chatbot-window");
    const closeBtn = document.getElementById("chatbot-close");
    const input = document.getElementById("chatbot-input");
    const messagesDiv = document.getElementById("chatbot-messages");

    toggleBtn.addEventListener("click", () => {
        chatbotWindow.style.display = chatbotWindow.style.display === "none" ? "block" : "none";
    });

    closeBtn.addEventListener("click", () => {
        chatbotWindow.style.display = "none";
    });

    window.sendChatbotMessage = async () => {
        const message = input.value.trim();
        if (!message) return;

        messagesDiv.innerHTML += `<div class="user-message"><strong>Tú:</strong> ${message}</div>`;
        input.value = "";

        const thinkingDiv = document.createElement("div");
        thinkingDiv.innerHTML = '<div class="bot-message"><strong>Bot:</strong> Pensando...</div>';
        messagesDiv.appendChild(thinkingDiv);
        messagesDiv.scrollTop = messagesDiv.scrollHeight;

        try {
            const response = await fetch("/chatbot/ask", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
                body: JSON.stringify({ prompt: message }),
            });

            const data = await response.json();
            thinkingDiv.remove();

            if (data.respuesta) {
                messagesDiv.innerHTML += `<div class="bot-message"><strong>Bot:</strong> ${data.respuesta}</div>`;
            } else {
                messagesDiv.innerHTML += `<div class="bot-message error"><strong>Bot:</strong> No entendí tu pregunta.</div>`;
            }

            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        } catch (error) {
            thinkingDiv.remove();
            messagesDiv.innerHTML += `<div class="bot-message error"><strong>Error:</strong> No se pudo conectar al bot.</div>`;
            console.error("Error:", error);
        }
    };
});
