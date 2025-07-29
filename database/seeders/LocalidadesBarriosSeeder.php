<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ciudad;
use App\Models\Localidad;
use App\Models\Barrio;

class LocalidadesBarriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar Bogotá (ID 107)
        $bogota = Ciudad::find(107);
        
        if (!$bogota) {
            $this->command->error('Ciudad de Bogotá con ID 107 no encontrada');
            return;
        }

        // Limpiar datos existentes de localidades y barrios de Bogotá
        $localidadesExistentes = Localidad::where('ciudad_id', $bogota->id)->get();
        foreach ($localidadesExistentes as $localidad) {
            $localidad->barrios()->delete(); // Eliminar barrios
            $localidad->delete(); // Eliminar localidad
        }

        $localidadesBarrios = [
            "Usaquén" => [
                "Acacias", "Ainsuca", "Altablanca", "Altos de Serrezuela", "Balcones de Vista Hermosa",
                "Balmoral Norte", "Barrancas", "Bella Suiza", "Bellavista", "Bosque de Pinos",
                "Bosque de San Antonio", "Bosque Medina", "Buenavista", "Babilonia", "California",
                "Caobos Salazar", "Canaima", "Capri", "Cedritos", "Cedro Bolívar", "Cedro Golf",
                "Cedro Madeira", "Cedro Narváez", "Cedro Salazar", "Cerro Norte", "Chaparral",
                "Conjunto Camino del Palmar", "Country Club", "Danubio", "Darandelos", "Don Bosco",
                "El Codito", "El Contador", "El Pañuelito", "El Pedregal", "El Refugio de San Antonio",
                "El Rincón de Las Margaritas", "El Toberín", "El Verbenal", "Escuela de Caballería I",
                "Escuela de Infantería", "Estrella del Norte", "Francisco Miranda", "Ginebra",
                "Guanoa", "Horizontes", "Jardín Norte", "La Calleja", "La Cita", "La Floresta de La Sabana",
                "La Glorieta", "La Granja Norte", "La Esperanza", "La Frontera", "La Liberia",
                "La Llanurita", "La Perla Oriental", "La Pradera Norte", "La Sonora", "La Uribe",
                "Las Areneras", "Las Delicias del Carmen", "Las Margaritas", "Las Orquídeas",
                "Lisboa", "Los Cedros", "Los Cedros Oriental", "Los Consuelos", "Los Naranjos",
                "Marantá", "Maturín", "Medellín", "Milán (Barrancas)", "Mirador del Norte",
                "Molinos del Norte", "Montearroyo", "Multicentro", "Navarra", "Nueva Autopista",
                "Nuevo Country", "Nuevo Horizonte", "Pantanito", "Pradera Norte", "Prados del Country",
                "Recodo del Country", "Rincón del Chicó", "Sagrado Corazón", "San Antonio Norte",
                "San Gabriel", "San Juan Bosco", "San Patricio", "San Cristóbal Norte",
                "San Cristóbal Norte parte alta", "San Cristóbal Norte parte baja", "Santa Ana",
                "Santa Ana Occidental", "Santa Bárbara", "Santa Bárbara Alta", "Santa Bárbara Central",
                "Santa Bárbara Occidental", "Santa Bárbara Oriental", "Santa Bibiana", "Santa Coloma",
                "Santa Mónica", "Santa Paula", "Santa Teresa", "Santandersito", "Sierras del Moral el Nogal",
                "Soatama", "Soratama", "Tibabita", "Toledo", "Torca", "Torcoroma", "Torres del Country",
                "Unicerros", "Urbanización Los Laureles", "Usaquén", "Vergel del Country", "Viña del Mar",
                "Villa Magdala", "Villa Nydia", "Villa Oliva", "Villas de Aranjuez", "Villas del Mediterráneo", "Zaragoza"
            ],
            "Chapinero" => [
                "Antiguo Country", "Bellavista", "Bosque Calderón", "Bosque Calderón Tejada", "Cataluña",
                "Chapinero Alto", "Chapinero Central", "Chapinero Norte", "Chicó Alto", "Chicó Lago",
                "Chicó Norte", "Chicó Norte II", "Chicó Norte III", "Chicó Occidental", "Chicó Reservado",
                "El Castillo", "El Chicó", "El Nogal", "El Paraíso", "El Refugio", "El Retiro", "Emaus",
                "Espartillal", "Granada", "Ingemar", "Juan XXIII", "La Cabrera", "La Esperanza Nororiental",
                "La Salle", "La Sureña", "Lago Gaitán", "Las Acacias", "Los Olivos", "Los Rosales",
                "María Cristina", "Mariscal Sucre", "Marly", "Nueva Granada", "Palomar", "Pardo Rubio",
                "Porciúncula", "Quinta Camacho", "Sagrado Corazón", "San Isidro", "San Luis Altos del Cabo",
                "San Martín de Porres", "Seminario", "Sucre", "Toscana", "Villa Anita", "Villa del Cerro"
            ],
            "Santa Fe" => [
                "Atanasio Girardot", "Bosque Izquierdo", "Cartagena", "El Balcón", "El Consuelo",
                "El Dorado", "El Guavio", "El Mirador", "El Rocío", "El Triunfo", "Fábrica de Loza",
                "Germania", "Gran Colombia", "La Alameda", "La Capuchina", "La Macarena", "La Merced",
                "La Paz Centro", "La Peña", "La Perseverancia", "Las Cruces", "Las Nieves", "Los Laches",
                "Lourdes", "Parque Central Bavaria", "Ramírez", "Sagrado Corazón", "Samper", "San Bernardo",
                "San Diego", "San Dionisio", "San Martín", "San Victorino", "Santa Inés", "Santa Rosa de Lima",
                "Veracruz", "Vitelma"
            ],
            "San Cristóbal" => [
                "20 de Julio", "Aguas Claras", "Altamira", "Altamira Chiquita", "Altos del Poblado",
                "Altos del Virrey", "Altos del Zipa", "Altos del Zuque", "Amapolas", "Amapolas II",
                "Antioquia", "Atenas", "Atenas I", "Ayacucho", "Balcón de La Castaña", "Barcelona",
                "Barcelona Sur", "Barcelona Sur Oriental", "Bella Vista Sector Lucero", "Bellavista Parte Alta",
                "Bellavista Parte Baja", "Bellavista Sur", "Bellavista Sur Oriental", "Bello Horizonte",
                "Bello Horizonte III Sector", "Bosque de Los Alpes", "Buenavista Suroriental", "Buenos Aires",
                "Calvo Sur", "Camino Viejo San Cristóbal", "Canadá La Guirá", "Canadá La Guirá II Sector",
                "Canadá-San Luis", "Cerros de San Vicente", "Chiguaza", "Ciudad de Londres",
                "Ciudadela Santa Rosa", "Córdoba", "Corinto", "El Ángulo", "El Balcón de La Castaña",
                "El Encanto", "El Futuro", "El Paraíso", "El Paraíso Sur Oriental I Sector", "El Pilar",
                "El Quindío", "El Ramajal", "El Ramajal (San Pedro)", "El Recodo-República de Canadá",
                "El Rodeo", "El Triunfo", "Golconda", "Gran Colombia (Molinos de Oriente)", "Granada Sur",
                "Granada Sur III Sector", "Horacio Orjuela", "Juan Rey (La Paz)", "Juan Rey I y II",
                "La Belleza", "La Castaña", "La Cecilia", "La Colmena", "La Gloria", "La Gloria Baja",
                "La Gloria MZ 11", "La Gloria Occidental", "La Gloria Oriental", "La Gloria San Miguel",
                "La Gran Colombia", "La Grovana", "La Herradura", "La Joyita", "La Joyita Centro (Bello Horizonte)",
                "La María", "La Nueva Gloria", "La Nueva Gloria II Sector", "La Peña", "La Península",
                "La Playa", "La Roca", "La Sagrada Familia", "La Serafina", "La Sierra", "La Victoria",
                "La Victoria II Sector", "La Victoria III Sector", "La Ye", "Las Acacias", "Las Brisas",
                "Las Columnas", "Las Gaviotas", "Las Guacamayas", "Las Guacamayas I", "II y III",
                "Laureles Sur Oriental I Sector", "Laureles Sur Oriental II Sector", "Los Alpes",
                "Los Alpes Futuro", "Los Arrayanes Sector Santa Inés", "Los Dos Leones", "Los Libertadores",
                "Los Libertadores Bosque Diamante Triángulo", "Los Libertadores Sector El Tesoro",
                "Los Libertadores Sector La Colina", "Los Libertadores Sector San Ignacio",
                "Los Libertadores Sector San Isidro", "Los Libertadores Sector San José",
                "Los Libertadores Sector San Luis", "Los Libertadores Sector San Miguel",
                "Los Pinares", "Los Pinos", "Los Puentes", "Macarena Los Alpes", "Malvinas", "Managua",
                "Manantial", "Manila", "Miraflores", "Modelo Sur", "Molinos de Oriente", "Montebello",
                "Montecarlo", "Moralba", "Nariño Sur", "Nueva Delhi", "Nueva España", "Nueva España Parte Alta",
                "Nueva Gloria", "Nueva Roma", "Nuevas Malvinas (El Triunfo)", "Panorama", "Paseito III",
                "Primero de Mayo", "Puente Colorado", "Quindío", "Quindío I y II", "Quinta Ramos", "Ramajal",
                "República del Canadá", "República del Canadá-El Pinar", "República de Venezuela",
                "Rincón de La Victoria-Bellavista", "Sagrada Familia", "San Blas", "San Blas (parcelas)",
                "San Blas II Sector", "San Cristóbal Alto", "San Cristóbal Sur", "San Cristóbal Viejo",
                "San Isidro", "San Isidro I y II", "San Isidro Sur", "San Javier", "San José",
                "San José Oriental", "San José Sur Oriental", "San Luis", "San Martín de Loba I y II",
                "San Martín Sur", "San Miguel", "San Pedro Sur Oriental", "San Rafael Sur Oriental",
                "San Rafael Usme", "San Vicente", "San Vicente Alto", "San Vicente Bajo",
                "San Vicente Sur Oriental", "Santa Ana", "Santa Ana Sur", "Santa Inés", "Santa Inés Sur",
                "Santa Rita I, II y III", "Santa Rita Sur Oriental", "Sosiego", "Sur América",
                "Terrazas de Oriente", "Triángulo", "Triángulo Alto", "Triángulo Bajo", "Valparaíso",
                "Vereda Altos de San Blas", "Velódromo", "Villa Albania", "Villa Angélica",
                "Villa Angélica-Canadá-La Guirá", "Villa Aurora", "Villa Begonia", "Villa del Cerro",
                "Villa de Los Alpes", "Villa de Los Alpes I", "Villa Javier", "Villa Nataly", "Villabell",
                "Vitelma", "Yomasa"
            ],
            "Usme" => [
                "Alfonso López Sector Buenos Aires", "Alfonso López Sector Charalá", "Alfonso López Sector El Progreso",
                "Alaska", "Almirante Padilla", "Altos del Pino", "Antonio José de Sucre I, II y III", "Arizona",
                "Arrayanes", "Barranquillita", "Bellavista Alta", "Bellavista II Sector", "Benjamin Uribe",
                "Betania", "Betania II", "Bolonia", "Bosque El Limonar", "Bosque El Limonar II Sector",
                "Brisas del Llano", "Brazuelos", "Brazuelos Occidental", "Brazuelos-El Paraíso",
                "Brazuelos-La Esmeralda", "Bulevar del Sur", "Buenos Aires", "Casa Loma II", "Casa Rey",
                "Casaloma", "Centro Educativo San José", "Chapinerito", "Chicó Sur", "Chicó Sur II",
                "Chuniza", "Ciudad Usme", "Ciudadela Cantarrana I, II y III Sector", "Ciudadela El Oasis",
                "Compostela I", "Compostela II", "Compostela III", "Comuneros", "Costa Rica", "Danubio Azul",
                "Daza Sector II", "Doña Liliana", "Duitama", "El Brillante", "El Bosque", "El Bosque Central",
                "El Bosque km. 11", "El Cortijo", "El Curubo", "El Espino", "El Jordán", "El Mortiño",
                "El Nevado", "El Nuevo Portal", "El Nuevo Portal II", "El Paraíso", "El Pedregal",
                "El Pedregal-La Lira", "El Portal II Etapa", "El Porvenir", "El Porvenir II Sector",
                "El Progreso Usme", "El Recuerdo Sur", "El Refugio", "El Refugio I", "El Refugio I y II",
                "El Refugio Sector Santa Librada", "El Rosal-Mirador", "El Rubí", "El Rubí II Sector",
                "El Salteador", "El Tuno", "El Triángulo", "El Uval", "El Uval II Sector", "El Virrey Última Etapa",
                "Finca La Esperanza", "Fiscala II La Fortuna", "Fiscala Sector Centro", "Gran Yomasa I",
                "Gran Yomasa II", "Juan José Rondón", "Juan José Rondón II Sector", "La Andrea", "La Aurora",
                "La Aurora II", "La Cabaña", "La Esmeralda-El Recuerdo", "La Esperanza", "La Esperanza km. 10",
                "La Esperanza Sur", "La Fiscala-Los Tres Laureles", "La Fiscala-Lote 16", "La Fiscala-Lote 16A",
                "La Fiscala Sector Daza", "La Fiscala Sector Norte", "La Fiscala Sector Rodríguez",
                "La Flora-Parcelación San Pedro", "La Fortaleza", "La Huerta", "La María", "La Morena I",
                "La Morena II", "La Morena II (Sector Villa Sandra)", "La Orquídea Usme", "La Reforma",
                "La Regadera km. 11", "La Regadera Sur", "Las Brisas", "Las Flores",
                "Las Granjas de San Pedro (Santa Librada)", "Las Mercedes", "Las Viviendas", "Las Violetas",
                "Lorenzo Alcantuz I", "Lorenzo Alcantuz II", "Los Altos del Brazuelo", "Los Arrayanes",
                "Los Olivares", "Los Soches", "Los Tejares Sur II Sector", "Marichuela", "Marichuela III",
                "Monteblanco", "Montevíde", "Nueva Esperanza", "Nuevo Porvenir", "Nuevo Progreso-El Progreso II Sector",
                "Nuevo San Andrés de Los Altos", "Nuevo San Luis", "Olivares", "Pepinitos", "Picota Sur",
                "Porvenir", "Portal de La Vega", "Portal de Oriente", "Portal del Divino", "Puerta al Llano",
                "Puerta al Llano II", "Salazar Salazar", "San Andrés Alto", "San Felipe", "San Isidro Sur",
                "San Joaquín-El Uval", "San Juan Bautista", "San Juan I", "San Juan II", "San Juan II y III",
                "San Luis", "San Martín", "San Pablo", "Santa Librada", "Santa Librada Norte",
                "Santa Librada-La Esperanza", "Santa Librada-La Sureña", "Santa Librada-Los Tejares (Gran Yomasa)",
                "Santa Librada-San Bernardino", "Santa Librada-San Francisco", "Santa Librada-Salazar Salazar",
                "Santa Librada Sector La Peña", "Santa Marta II", "Santa Martha", "Sector Granjas de San Pedro",
                "Sierra Morena", "Tenerife", "Tenerife II Sector", "Tihuaque", "Tocaimita Oriental",
                "Tocaimita Sur", "Unión", "Urbanización Brasilia II Sector", "Urbanización Brasilia Sur",
                "Urbanización Cartagena", "Urbanización Chuniza I", "Urbanización Costa Rica-San Andrés de los Altos",
                "Urbanización Jarón Monte Rubio", "Urbanización La Andrea", "Urbanización La Aurora II",
                "Urbanización Líbano", "Urbanización Marichuela", "Urbanización Miravalle", "Urbanización Tequendama",
                "Usme-Centro", "Usminia", "Valles de Cafam", "Vianey", "Villa Alejandría", "Villa Alemania",
                "Villa Alemania II Sector", "Villa Anita Sur", "Villa Diana", "Villa Hermosa", "Villa Israel",
                "Villa Israel II", "Villa Nelly", "Villa Rosita", "Villas de Santa Isabel (Parque Entrenubes)",
                "Villas del Edén", "Yomasita"
            ],
            "Tunjuelito" => [
                "Abraham Lincoln", "Centro", "Ciudad Tunal", "El Carmen", "Fátima", "Isla del Sol",
                "Laguneta", "Muzú", "Nuevo Muzú", "Rincón de Muzú", "Rincón de Venecia", "Samore",
                "San Benito", "San Carlos", "San Vicente Ferrer", "Santa Lucía", "Tejar de Ontario",
                "Tunjuelito", "Venecia", "Venecia Occidental", "Villa Mayor", "Villa Mayor Oriental"
            ],
            "Bosa" => [
                "Amaru", "Andalucía I y II", "Antonia Santos", "Apogeo", "Argelia", "Arranque", "Berlín",
                "Berlín de Bosa La Libertad III", "Betania", "Bosa Nova", "Bosa Nova II Sector", "Bosa Recreo",
                "Bosalinda (Holdebrando Olarte)", "Bosques de Meryland", "Brasil", "Brasilia", "Brasilia-La Estación",
                "Campo Hermoso", "Campo Verde", "Carlos Albán", "Casa Nueva", "Cerros de Oriente", "Charles de Gaulle",
                "Chicalá", "Chilco", "Claretiano", "Ciudadela La Libertad", "Cocheras", "El Bosque de Bosa",
                "El Cauce", "El Corzo", "El Diamante", "El Jardín", "El Libertador", "El Llano", "El Motorista",
                "El Palmar", "El Paradero", "El Portal de Bosa", "El Portal de La Libertad", "El Porvenir",
                "El Povenir", "El Progreso", "El Recuerdo", "El Retazo", "El Rincón de Bosa", "El Rodeo",
                "El Sauce", "El Toche", "Escocia", "Finca La Esperanza", "Fizcalia", "Fontibón", "Gaitán",
                "Getsemaní", "Grancolombiano I y II", "Gualoche", "Hermanos Barragán", "Holanda",
                "Hortelanos de Escocia", "Industrial", "Jardines del Apogeo", "Jorge Uribe Botero", "La Cabaña",
                "La Concepción", "La Dulcinea", "La Esmeralda", "La Estanzuela I y II", "La Florida",
                "La Fontana de Bosa-La Libertad", "La Ilusión", "La Independencia", "La Libertad I", "II", "III", "IV",
                "La Magnolia", "La María", "La Palma", "La Paz", "La Paz de Bosa", "La Portada", "La Portadita",
                "La Veguita", "Las Margaritas", "Las Vegas", "Laureles", "Los Naranjos", "Los Ocales", "Los Sauces",
                "Margaritas", "Miami", "Mirador", "New Jersey", "Nuestra Señora de La Paz", "Nueva Escocia",
                "Nueva Esperanza", "Nuevo Chile", "Olarte", "Piamonte", "Porvenir", "Potreritos", "Retazo",
                "San Antonio", "San Antonio de Bosa", "San Antonio de Escocia", "San Bernardino", "San Javier",
                "San Jorge", "San José", "San Juanito", "San Martín", "San Pedro", "Santa Fe", "Santa Inés",
                "Sauces", "Siracuza", "Tokio", "Vegas de Santana", "Villa Carolina", "Villa Clemencia",
                "Villa Colombia", "Villa de Los Comuneros", "Villa del Río", "Villa de Suaita", "Villa Magnolia",
                "Villa Natalia", "Villa Nohora", "Villa Sonia I y II", "Villas del Progreso", "Villas del Velero"
            ],
            "Kennedy" => [
                "Abraham Lincoln", "Américas Occidental", "Banderas", "Castilla", "Chicalá", "Ciudad Kennedy",
                "Ciudad Techo", "Corabastos", "Dindalito", "El Carmelo", "El Campito", "El Jardín", "El Rubí",
                "Gran Britalia", "Gran Granada", "Jacqueline", "Kennedy Central", "La Esperanza", "La Giraldilla",
                "La Rivera", "Las Margaritas", "Los Almendros", "Marsella", "Modelia", "Nueva York", "Patio Bonito",
                "Pío XII", "Provivienda", "Timiza", "Tintalá", "Villa Andrea", "Villa Alsacia", "Villa Claudia", "Villa Nelly"
            ],
            "Fontibón" => [
                "Atahualpa", "Betania", "Boston", "Capellanía", "Centenario", "Ciudad Hayuelos", "El Carmen",
                "El Dorado", "El Establo", "El Jardín", "El Refugio", "Ferrocaja", "Flandes", "Fontibón",
                "Fontibón Centro", "Gaitán", "Gran Bretaña", "La Cabana", "La Esperanza", "La Felicidad",
                "La Laguna", "La Macarena", "La Salle", "La Victoria", "Las Ferias", "Moravia", "Palestina",
                "Puente Aranda", "Recodo", "San Antonio", "San Pedro", "Santa Cecilia", "Santa María",
                "Sauzalito", "Torres de Modelia", "Villemar"
            ],
            "Engativá" => [
                "Álamos", "Boyacá Real", "Ciudadela Colsubsidio", "El Dorado", "El Encanto", "Engativá Centro",
                "Estrada", "Garcés Navas", "La Cabaña", "La Española", "La Granja", "Las Ferias", "Los Cerezos",
                "Los Girasoles", "Luis Carlos Galán", "Marandú", "Minuto de Dios", "Modelia", "Molinos",
                "Normandía", "Palermo", "Quinta Paredes", "San Ignacio", "San Joaquín", "Santa Cecilia",
                "Santa Helenita", "Santa María del Lago", "Villa Luz", "Villamaría"
            ],
            "Suba" => [
                "Aures", "Britalia", "Campanella", "Ciudad Jardín Norte", "El Batán", "El Prado", "El Salitre",
                "El Rincón", "Fontanar del Río", "La Campiña", "La Carolina", "La Colina", "La Floresta",
                "La Gaitana", "La Alhambra", "La Toscana", "Los Naranjos", "Mazurén", "Niza", "Prado Veraniego",
                "Puente Largo", "Suba Centro", "Suba Salitre", "Tibabuyes", "Villa Elisa", "Villa María"
            ],
            "Barrios Unidos" => [
                "Álamos", "Alcázares", "Benjamín Herrera", "Chapinero Occidental", "Colombia", "Comuneros",
                "El Campín", "El Lago", "El Rosario", "Entrerríos", "Estadio", "La Castellana", "La Esperanza",
                "La Patria", "Las Américas", "Metrópolis", "Mochuelo", "Modelo", "Pablo VI", "Quinta Paredes",
                "Rafael Uribe", "San Fernando", "San Luis", "Siete de Agosto", "Teusaquillo"
            ],
            "Teusaquillo" => [
                "Armenia", "Camilo Torres", "Centro Nariño", "Ciudad Salitre Oriental", "Colombia", "Estadio",
                "Galerías", "La Esmeralda", "La Soledad", "Palermo", "Parque Central Bavaria", "Pilarica",
                "Puente Aranda", "Quinta Paredes", "Ricardo Palma", "San Luis", "Santa Teresita", "Teusaquillo"
            ],
            "Los Mártires" => [
                "Centro", "Eduardo Santos", "El Listón", "El Progreso", "La Estanzuela", "La Favorita",
                "La Samper Mendoza", "Palacio", "Paloquemao", "San Victorino", "Santa Fe", "Voto Nacional"
            ],
            "Antonio Nariño" => [
                "Ciudad Jardín", "La Fraguita", "Restrepo", "San Antonio", "San Jorge", "San José",
                "San Juanito", "Santa Isabel", "Sevilla", "Villa Mayor"
            ],
            "Puente Aranda" => [
                "Acevedo Tejada", "Alcalá", "Barrios Unidos", "Ciudad Montes", "Comuneros", "Estación Central",
                "Industrial", "La Camelia", "La Concordia", "La Fraguita", "Los Ejidos", "Muzú", "Ortezal",
                "Puente Aranda", "San Eusebio", "San Gabriel", "San Rafael", "Santa Matilde", "Villa Mayor"
            ],
            "La Candelaria" => [
                "Centro", "El Cable", "El Dorado", "La Catedral", "La Concordia", "La Candelaria", "Las Aguas",
                "Las Cruces", "Las Nieves", "San Bernardo", "San Victorino"
            ],
            "Rafael Uribe Uribe" => [
                "Arboleda Sur", "Bosque de San Carlos", "Bravo Páez", "Callejón Santa Bárbara", "Centenario",
                "Cerros de Oriente", "Chircales", "Claret", "Colinas", "Country Sur", "Danubio Sur", "Diana Turbay",
                "El Consuelo", "El Inglés", "El Portal", "El Pesebre", "El Rosal", "El Socorro", "Gavaroba",
                "Granjas de San Pablo", "Granjas de Santa Sofía", "Guiparma", "Gustavo Restrepo",
                "Jorge Cavelier La Resurección", "La Esperanza Alta", "La Merced del Sur", "La Paz",
                "La Picota Occidental", "La Picota Oriental", "La Playa", "Las Lomas", "Luis López de Mesa",
                "Marco Fidel Suárez", "Marruecos", "Matatigres", "Mirador del Sur", "Molinos", "Murillo Toro",
                "Nueva Pensilvania Sur", "Olaya", "Palermo Sur (Central, El Triángulo, Las Brisas, Oswaldo Gómez, San Marcos y Santa Fonseca)",
                "Pijaos", "Pradera Sur", "Puerto Rico", "Quiroga", "Río de Janeiro", "San Agustín", "San Jorge",
                "San José Sur", "San Luis Sur", "Santa Lucía", "Santiago Pérez", "Sarasota", "Sosiego Sur",
                "Villa Gladys", "Villa Morales", "Villa Mayor Occidental", "Bochica"
            ],
            "Ciudad Bolívar" => [
                "Acapulco", "Álvaro Bernal Segura", "Arabia", "Arborizadora Baja", "Atlanta", "Bella Flor",
                "Bogotá Sur", "Brazuelos de Santo Domingo", "Brisas del Volador", "Buenavista", "Buenos Aires",
                "Candelaria La Nueva", "Capri", "Casa de Teja", "Casa linda", "Colmena", "Compartir",
                "Ciudad Milagros", "Divino Niño", "Domingo Laín", "El Bosque", "El Castillo", "El Consuelo",
                "El Mochuelo I", "El Mochuelo II", "El Paraíso", "El Paraíso Mirador", "El Pedregal",
                "El Reflejo", "El Recuerdo", "El Satélite", "El Tesoro", "El Triunfo", "Esmeralda",
                "Estrella del Sur", "Gibraltar", "Gibraltar Sur", "Hortalizas", "Inés Elvira", "Juan Pablo II",
                "Juan José Rondón", "La Alameda", "La Cabaña", "La Casona", "La Colina", "La Coruña",
                "La Cumbre", "La Escala", "La Lira", "La Playa", "La Sierra", "La Torre", "Lagunitas",
                "Las Acacias", "Las Manas", "Las Manitas", "Los Alpes", "Los Andes de Nutibara", "Los Duques",
                "Los Pinares", "Los Pinos", "Los Puentes", "Lucero Alto", "Lucero Bajo", "Lucero Medio",
                "Madelena", "Marandú", "Meissen", "México", "Millan Los Sauces", "Minuto de María", "Monterey",
                "Monteblanco", "Mochuelo Oriental", "Naciones Unidas", "Nueva Colombia", "Ocho de Diciembre",
                "Paticos", "Potreritos", "Protecho", "Puerta del Llano", "Quiba", "Rafael Escamilla",
                "República de Canadá", "República de Venezuela", "Rincón del Diamante Villa Gloria",
                "San Fernando Sur", "San Francisco", "San Jacinto", "San Joaquín del", "San Luis Sur",
                "San Manuel", "San Rafael Sur", "Santa Helena", "Santa Inés de la Acacia", "Santa Rosa Sur",
                "Sauces", "Tesorito", "Tierra Linda", "Villa Gloria", "Villa Helena", "Villa Jacky",
                "Vista Hermosa", "Yomasa"
            ],
            "Sumapaz" => [
                "Betania", "El Bosque", "El Campamento", "El Charco", "El Chocho", "El Delirio", "El Escobal",
                "El Hato", "El Palmar", "El Páramo", "El Salitre", "La Calera", "La Esperanza", "La Holanda",
                "La Hoya", "La Laguna", "La Mesa", "La Unión", "Lagunita", "Las Palmas", "Los Andes",
                "Nazareth", "Nuevo Mundo", "Páramo", "Peñalisa", "San Juan", "San Luis", "San Miguel",
                "San Pedro", "Santana", "Santa Rosa", "Tunal Bajo", "Tunel Alto", "Unión Rural", "Vegas de Cunday"
            ]
        ];

        foreach ($localidadesBarrios as $localidadNombre => $barrios) {
            // Crear localidad
            $localidad = Localidad::create([
                'nombre' => $localidadNombre,
                'ciudad_id' => $bogota->id
            ]);

            // Crear barrios para esta localidad
            foreach ($barrios as $barrioNombre) {
                Barrio::create([
                    'nombre' => $barrioNombre,
                    'localidad_id' => $localidad->id
                ]);
            }
        }

        $this->command->info('Localidades y barrios de Bogotá creados exitosamente');
    }
}
