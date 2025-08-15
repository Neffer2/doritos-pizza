@extends('layouts.app')
@section('content')
    <div class="main-faq-view-container">
        <div class="volver-logo-container">
            <a href="/">
                <img src="{{ asset('assets/landing/volver-logo.png') }}" alt="Volver logo">
            </a>
        </div>

        <!-- Contenido principal -->
        <div class="faq-content-section">
            <div class="faq-title-container">
                <h1>Preguntas Frecuentes</h1>
            </div>

            <div class="faq-questions-wrapper">
                <!-- Pregunta 1 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Cómo participo en la promoción?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Para participar en la promoción, debes registrarte en nuestra plataforma con tus datos personales
                            y luego ingresar los códigos que encuentras en los empaques de Doritos participantes.</p>
                    </div>
                </div>

                <!-- Pregunta 2 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Dónde encuentro los códigos para participar?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Los códigos se encuentran en el interior de los empaques de Doritos participantes. Busca el
                            código de 8 dígitos en la parte interior del empaque.</p>
                    </div>
                </div>

                <!-- Pregunta 3 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Cuáles son los premios disponibles?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Puedes ganar increíbles premios como Pizza Makers y Wafleras Mini. Los premios se otorgan según
                            los puntos acumulados y tu posición en el ranking.</p>
                    </div>
                </div>

                <!-- Pregunta 4 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Cuándo es el período de participación?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Podrás acumular puntos desde el 18 de agosto de 2025 hasta el 2 de noviembre del 2025.</p>
                    </div>
                </div>

                <!-- Pregunta 5 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Cómo funciona el sistema de puntos?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>El Participante deberá acumular la mayor cantidad de puntos a través del juego interactivo “La
                            Pizzería de Doritos” para participar por el
                            Premio Parcial y el Premio Final.</p>
                    </div>
                </div>

                <!-- Pregunta 6 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Puedo usar el mismo código más de una vez?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>No, cada código solo puede ser utilizado una sola vez. Una vez que ingreses un código válido,
                            este quedará registrado y no podrá ser utilizado nuevamente.</p>
                    </div>
                </div>

                <!-- Pregunta 7 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Cómo puedo ver mi posición en el ranking?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Puedes ver tu posición actual en el ranking accediendo a la sección "Ranking" desde el menú
                            principal de tu cuenta.</p>
                    </div>
                </div>

                <!-- Pregunta 8 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Qué hago si mi código no funciona?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Si tu código no funciona, verifica que hayas ingresado todos los dígitos correctamente. Si el
                            problema persiste, contáctanos a través de nuestros canales de atención al cliente.</p>
                    </div>
                </div>
            </div>

            <!-- Información de contacto -->
            <div class="faq-contact-section">
                <div class="contact-info">
                    <h3>¿Necesitas más ayuda?</h3>
                    <p>Si no encontraste la respuesta a tu pregunta, contáctanos:</p>
                    <div class="contact-methods">
                        <div class="contact-item">
                            <img src="{{ asset('assets/landing/whatsapp-icon.png') }}" alt="WhatsApp">
                            <span>WhatsApp: +57 300 123 4567</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Términos y condiciones -->
            <div class="faq-terms-section">
                <a href="{{ asset('assets/legal/Actividad_LA_PIZZERIA_DE_DORITOS.pdf') }}" target="_blank"
                    class="terms-link">
                    Ver Términos y Condiciones Completos
                </a>
            </div>
        </div>
    </div>

    <script>
        // JavaScript para el acordeón de preguntas
        document.addEventListener('DOMContentLoaded', function() {
            const faqQuestions = document.querySelectorAll('.faq-question');

            faqQuestions.forEach(question => {
                question.addEventListener('click', function() {
                    const faqItem = this.parentElement;
                    const answer = faqItem.querySelector('.faq-answer');
                    const toggle = this.querySelector('.faq-toggle');

                    // Toggle active class
                    faqItem.classList.toggle('active');

                    // Change toggle symbol
                    if (faqItem.classList.contains('active')) {
                        toggle.textContent = '-';
                    } else {
                        toggle.textContent = '+';
                    }
                });
            });
        });
    </script>
@endsection
