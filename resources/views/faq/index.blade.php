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
                        <h3>¿Quién organiza la promoción?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>La actividad “La Pizzería de Doritos” es organizada por PEPSICO ALIMENTOS COLOMBIA LTDA.</p>
                    </div>
                </div>

                <!-- Pregunta 2 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Cuál es la vigencia de la promoción?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>La promoción estará vigente del <b>18 de agosto de 2025</b> al <b>2 de noviembre de 2025</b>, dividida en 10 bloques de participación.</p>
                    </div>
                </div>

                <!-- Pregunta 3 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Qué productos participan?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Participan únicamente las siguientes referencias de Doritos:</p>
                        <ul>
                            <li><bCanal Grandes Superficies (Éxito, Carulla, Olímpica, Cencosud):</b> Doritos Pizza Familiar 175g, Doritos Pizza Personal 46g, Doritos Pizza Personal 43g.</li>
                            <li><bOtros canales (tiendas, minimercados, conveniencia):</b> Los anteriores más Doritos Mega Queso 200g, 48g y 43g. En este canal los productos vienen en combo Doritos Pizza + Doritos Mega Queso.</li>
                        </ul>
                        <p>Cualquier otra presentación no participa.</p>
                    </div>
                </div>

                <!-- Pregunta 4 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Cómo participo en la promoción?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Debes comprar los productos participantes, raspar el sticker adherido al empaque y registrar el código en <a href="https://juegayganapep.com" target="_blank">juegayganapep.com</a>. Luego debes registrarte con tus datos personales, aceptar los Términos y Condiciones y acceder al juego “La Pizzería de Doritos”.</p>
                    </div>
                </div>

                <!-- Pregunta 5 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Cómo funciona el juego y el sistema de puntos?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Cada código registrado te da derecho a <b>3 partidas</b> en el juego “La Pizzería de Doritos”, donde debes recoger exclusivamente empaques de Doritos para acumular puntos. Los puntos determinan tu posición en el ranking para los Premios Parciales y Finales.</p>
                    </div>
                </div>

                <!-- Pregunta 6 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Qué premios puedo ganar?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Se entregarán hasta <b>5.000 premios</b>:</p>
                        <ul>
                            <li><b>3.000 Premios Parciales:</b> Mini Wafleras Eléctricas Home Elements.</li>
                            <li><b>2.000 Premios Finales:</b> Pizza Maker Grill Home Elements.</li>
                        </ul>
                        <p>Solo puedes ganar <b>un (1) premio parcial</b> durante toda la promoción, pero puedes seguir acumulando puntos para el premio final.</p>
                    </div>
                </div>

                <!-- Pregunta 7 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Debo guardar mis facturas?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Sí. Es <b>obligatorio conservar las facturas físicas</b> de compra, ya que se solicitarán para validar la entrega de premios. Sin ellas perderás el derecho a reclamar.</p>
                    </div>
                </div>

                <!-- Pregunta 8 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Cómo y cuándo me contactan si gano?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Los ganadores serán contactados por correo electrónico dentro de los <b>3 días hábiles</b> siguientes a cada bloque (para Premios Parciales) o a la finalización de la promoción (para Premios Finales). Las entregas se harán en la dirección registrada:</p>
                        <ul>
                            <li>Premios Parciales: dentro de las 3 semanas siguientes.</li>
                            <li>Premios Finales: dentro del mes siguiente.</li>
                        </ul>
                    </div>
                </div>

                <!-- Pregunta 9 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Dónde puedo ver mi posición en el ranking?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Puedes consultar tu posición en el ranking en la sección “Ranking” de tu cuenta en <a href="https://juegayganapep.com/ranking" target="_blank" style="text-decoration: none; color: #fff">juegayganapep.com/ranking</a>.</p>
                    </div>
                </div>

                <!-- Pregunta 10 -->
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>¿Qué hago si mi código no funciona?</h3>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>Si el código no es reconocido, verifica que lo hayas digitado correctamente. Si el problema persiste, comunícate con soporte al WhatsApp <b>+57 321 325 0631</b> (según los horarios indicados en TyC) o al correo <b>soporte@juegayganapep.com</b>.</p>
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
