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
                        <p>Debes comprar el combo “Amarre” que incluye dos productos Doritos participantes (ej. Mega Queso +
                            Pizza, en las presentaciones indicadas en los Términos y Condiciones), raspar el sticker que se
                            encuentra entre ambos empaques y registrar el código en <a href="https://juegayganapep.com"
                                target="_blank">juegayganapep.com</a>. Luego debes registrarte con tus datos personales y
                            aceptar los Términos y Condiciones para acceder al juego “La Pizzería de Doritos”.</p>
                    </div>
                </div>

                <!-- Pregunta 2 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Qué productos participan?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Solo participan las referencias indicadas en los TyC: Doritos Pizza Familiar 175g, Doritos Pizza
                            Personal 46g, Doritos Pizza Personal 43g, Doritos Mega Queso 200g, Doritos Mega Queso 48g y
                            Doritos Mega Queso 43g. Cualquier otra presentación o producto no participa.</p>
                    </div>
                </div>

                <!-- Pregunta 3 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Dónde encuentro los códigos?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>El código se encuentra en un sticker entre los dos empaques del combo “Amarre” participante.
                            Debes rasparlo para visualizarlo.</p>
                    </div>
                </div>

                <!-- Pregunta 4 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Cuáles son los premios?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Se entregarán hasta 3.000 Mini Wafleras Eléctricas marca Home Elements como Premios Parciales y
                            2.000 Pizza Maker Grill marca Home Elements como Premios Finales, de acuerdo al puntaje
                            acumulado en el juego y la posición en el ranking.</p>
                    </div>
                </div>

                <!-- Pregunta 5 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Cuál es el período de participación?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Desde el 18 de agosto de 2025 hasta el 2 de noviembre de 2025, dividido en 10 bloques de
                            participación para la asignación de Premios Parciales.</p>
                    </div>
                </div>

                <!-- Pregunta 6 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Cómo funciona el sistema de puntos?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Cada código registrado te da derecho a tres partidas del juego “La Pizzería de Doritos”, donde
                            debes recoger exclusivamente empaques de Doritos para acumular puntos. Los puntos determinan tu
                            posición en el ranking para los Premios Parciales y el Premio Final.</p>
                    </div>
                </div>

                <!-- Pregunta 7 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Puedo usar el mismo código más de una vez?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>No. Cada código solo puede ser registrado una vez. Un código ya usado no será válido para volver
                            a participar.</p>
                    </div>
                </div>

                <!-- Pregunta 8 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Cómo puedo ver mi posición en el ranking?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Puedes consultar tu posición en el ranking en la sección “Ranking” de tu cuenta en <a
                                href="https://juegayganapep.com/ranking" target="_blank" style="text-decoration: none; color: #fff">juegayganapep.com/ranking</a>.</p>
                    </div>
                </div>

                <!-- Pregunta 9 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Debo guardar mis facturas?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Sí. Es obligatorio conservar las facturas físicas de compra para validar tu premio. Si no las
                            entregas, perderás el derecho a reclamarlo.</p>
                    </div>
                </div>

                <!-- Pregunta 10 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Qué hago si mi código no funciona?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Verifica que el código esté correctamente digitado. Si el problema persiste, comunícate con el
                            soporte al cliente mediante WhatsApp +57 321 325 0631 (según horarios indicados en TyC) o al
                            correo soporte@juegayganapep.com.</p>
                    </div>
                </div>
            </div>

            <!-- Información de contacto -->
            <div class="faq-contact-section">
                <div class="contact-info">
                    <h3>¿Necesitas más ayuda?</h3>
                    <p>Si no encontraste la respuesta, contáctanos:</p>
                    <div class="contact-methods">
                        <div class="contact-item">
                            <img src="{{ asset('assets/landing/whatsapp-icon.png') }}" alt="WhatsApp">
                            <span>WhatsApp: +57 321 325 0631</span>
                        </div>
                        <div class="contact-item">
                            <span>Email: soporte@juegayganapep.com</span>
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
                    const toggle = this.querySelector('.faq-toggle');

                    faqItem.classList.toggle('active');
                    toggle.textContent = faqItem.classList.contains('active') ? '-' : '+';
                });
            });
        });
    </script>
@endsection
