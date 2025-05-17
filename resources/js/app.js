// resources/js/app.js
import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';
import Chatbot from './chatbot';

ReactDOM.createRoot(document.getElementById('chatbot-react')).render(<Chatbot />);