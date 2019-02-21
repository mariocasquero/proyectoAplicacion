<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="fSoapRest">
    <fieldset>
        <legend><?php echo AEMET?></legend>
        
        <label><?php echo PROVINCIA?> </label>
        <select name="provincia" onChange="ponProvincias(this.form)">
            <option><?php echo SPROV?></option>
            <option value='1'>Álava</option>
            <option value='2'>Albacete</option>
            <option value='3'>Alicante/Alacant</option>
            <option value='4'>Almería</option>
            <option value='5'>Asturias</option>
            <option value='6'>Ávila</option>
            <option value='7'>Badajoz</option>
            <option value='8'>Barcelona</option>
            <option value='9'>Burgos</option>
            <option value='10'>Cáceres</option>
            <option value='11'>Cádiz</option>
            <option value='12'>Cantabria</option>
            <option value='13'>Castellón/Castelló</option>
            <option value='14'>Ceuta</option>
            <option value='15'>Ciudad Real</option>
            <option value='16'>Córdoba</option>
            <option value='17'>Cuenca</option>
            <option value='18'>Girona</option>
            <option value='19'>Las Palmas</option>
            <option value='20'>Granada</option>
            <option value='21'>Guadalajara</option>
            <option value='22'>Guipúzcoa</option>
            <option value='23'>Huelva</option>
            <option value='24'>Huesca</option>
            <option value='25'>Illes Balears</option>
            <option value='26'>Jaén</option>
            <option value='27'>A Coruña</option>
            <option value='28'>La Rioja</option>
            <option value='29'>León</option>
            <option value='30'>Lleida</option>
            <option value='31'>Lugo</option>
            <option value='32'>Madrid</option>
            <option value='33'>Málaga</option>
            <option value='34'>Melilla</option>
            <option value='35'>Murcia</option>
            <option value='36'>Navarra</option>
            <option value='37'>Ourense</option>
            <option value='38'>Palencia</option>
            <option value='39'>Pontevedra</option>
            <option value='40'>Salamanca</option>
            <option value='41'>Segovia</option>
            <option value='42'>Sevilla</option>
            <option value='43'>Soria</option>
            <option value='44'>Tarragona</option>
            <option value='45'>Santa Cruz de Tenerife</option>
            <option value='46'>Teruel</option>
            <option value='47'>Toledo</option>
            <option value='48'>Valencia/Valéncia</option>
            <option value='49'>Valladolid</option>
            <option value='50'>Zamora</option>
            <option value='51'>Zaragoza</option>
        </select>
        
        <br><br>
        
        <label><?php echo ESTACION?> </label>
        <select name="estaciones" onChange="ponEstaciones(this.form)">
            <option><?php echo SPROV?></option>
        </select>
        
        <input type="text" name="resEst" id="resEst" style="display: none"><br><br>
        
        <input type="submit" name="aceptarRest" id="aceptarRest" value="<?php echo BUSCAR?>">
        <input type="submit" name="volverRest" id="volverRest" value="<?php echo VOLVER?>">
    </fieldset>
</form>

<div class="resultado">
    <label><b><?php echo UBI?></b> <?php echo $_SESSION["respuesta"]["ubi"]?></label><br><br>
    <label><b><?php echo LAT?></b> <?php echo $_SESSION["respuesta"]["lat"]?> <b><?php echo LONG?></b> <?php echo $_SESSION["respuesta"]["lon"]?></label><br><br>
    <label><b><?php echo PREC?> </b> <?php echo $_SESSION["respuesta"]["prec"]?> mm</label><br><br>
    <label><b><?php echo PRES?></b> <?php echo $_SESSION["respuesta"]["pres"]?> hPa</label><br><br>
    <label><b><?php echo VVIENTO?> </b><?php echo $_SESSION["respuesta"]["vv"]?> km/h</label><br><br>
    <label><b><?php echo HUM?> </b> <?php echo $_SESSION["respuesta"]["hr"]?>%</label><br><br>
    <label><b><?php echo TAIRE?> </b> <?php echo $_SESSION["respuesta"]["ta"]?>ºC</label><br><br>
    <label><b><?php echo VIS?></b> <?php echo $_SESSION["respuesta"]["vis"]?> km</label>
</div>

<div class="pie">
    <p>
        <a href="doc/EIE_CVMarioCasquero.pdf" target="_blank" id="enlacesPie1"><i class="far fa-file"></i> <?php echo CURRICULUM?></a>
        <a href="http://www.gogoro.com" id="enlacesPie2"><i class="fas fa-globe"></i> <?php echo WIMITADA?></a>
        <a href="doc/modelosAplicacion/190205_CatalogoRequisitosMarioCasquero.pdf" target="_blank"><i class="fas fa-clipboard-list"></i> <?php echo CREQUISITOS?></a>
        
        <p>Mario Casquero Jáñez</p>
        
        <a href="doc/PHPdoc/index.html" target="_blank"><img src="webroot/media/phpdoc.png" id="phpdoc"> PHPDoc</a> 
        <a href="http://daw-usgit.sauces.local/mario.casjan/MCJProyectoAplicacion1819/tree/Aplicacion1819" target="_blank"><i class="fab fa-gitlab"></i><?php echo REPO?></a>
        <a href="doc/190211_canalRssMarioCasquero.xml"><i class="fas fa-rss-square"></i><?php echo SUBS?></a>
    </p>
</div>

<script>
    var provincias=[]; //Array bidimensional que almacena el número de provincia y las estaciones meteorológicas de ésta
    provincias[1]=["Seleccione estación", "1060X-Amurrio", "1044X-Aramaio", "9178X-Campezo/Kanpezu", "9091O-Foronda/Txokiza", "9122I-Labastida", "9060X-Lalastra", "9145X-Leza", "9073X-Opakua", "9091R-Vitoria Gasteiz Aeropuerto"];
    provincias[2]=["Seleccione estación", "8178D-Albacete", "8175-Albacete Base Aérea", "8191Y-Alacalá del Júzar", "8198Y-Almansa", "8177A-Chinchilla", "7096B-Hellín", "4096Y-Munera", "7067Y-Nerpio", "4007Y-Ossa de Montiel", "7103Y-Tobarra", "4091Y-Villarrobledo", "7072Y-Yeste", "7066Y-Yeste, Embalse Fuensanta"];
    provincias[3]=["Seleccione estación", "8059C-Alcoy/Alcoi", "8025-Alicante/Alacant", "8019-Alicante/Alacant Aeropuerto", "8036Y-Benidorm", "8018X-Elche/Elx", "8050X-Jávea/Xàbia", "8013X-Novelda", "7244X-Orihuela", "8057C-Pego", "7247X-Pinoso", "7261X-Rojales", "8008Y-Villena"];
    provincias[4]=["Seleccione estación", "6302A-Abla", "6277B-Adra", "6381-Alborán", "6364X-Albox", "6297-Almería", "6325O-Almería Aeropuerto", "6329X-Cabo de Gata", "6332X-Carboneras", "6291B-El Ejido", "6340X-Garrucha, Puerto", "6367B-Huercal Overa", "6307X-Láujar de Andarax", "6293X-Roquetas de Mar", "5060X-Topares"];
    provincias[5]=["Seleccione estación", "1226X-Aller", "1186P-Amieva, Panizales", "1212E-Asturias Aeropuerto", "1283U-Cabo Busto", "1210X-Cabo Peñas", "1179B-Cabrales", "1331A-Castropol", "1203D-Colunga", "1302F-Degaña", "1207U-Gijón, Campus", "1208H-Gijón, Puerto", "1309C-Ibias, San Antolín", "1183X-Llanes", "1234P-Mieres", "1249X-Oviedo", "1199X-Piloña", "1223P-Pola de Lena", "1276F-Pola de Somiedo", "1542-Puerto de Leitariegos", "1221D-Puerto de Pajares", "1279X-Salas", "1341B-Taramundi, Ouria", "1272B-Tineo, Soto de la Barca", "1327A-Villayón, Oneta"];
    provincias[6]=["Seleccione estación", "2456B-Arevalo", "2444-Ávila", "2828Y-Barco de Ávila", "3422D-Candeleda", "3337U-Cebreros", "2453E-Gotarrendura", "2430Y-Muñotello", "2811A-Navarredonda de Gredos", "3319D-Puerto El Pico", "2512Y-Rivilla de Barajas", "3391-Sotillo de la Adrada"];
    provincias[7]=["Seleccione estación", "4464X-Albuquerque", "4489X-Alconchel", "4436Y-Almendralejo", "5473X-Azuaga", "4478X-Badajoz", "4452-Badajoz Aeropuerto", "4492E-Barcarrota", "4325X-Castuera", "4358X-Don Benito", "4520X-Fregenal de la Sierra", "4501X-Fuente de Cantos", "4244X-Herrera del Duque", "4511C-Jerez de los Caballeros", "4386B-Llerena", "4410X-Mérida", "4499X-Monesterio", "4340-Navalvillar de Pela", "4486X-Olivenza", "4260-Peraleda de Zaucejo", "4468X-Puebla de Obando", "4395X-Villafranca de los Barros", "4497X-Villanueva del Fresno", "4427X-Zafra"];
    provincias[8]=["Seleccione estación", "0252D-Arenys de Mar", "0106X-Balsareny", "0201D-Barcelona", "0076-Barcelona Aeropuerto", "0200E-Barcelona, Fabra", "0201X-Barcelona, Museo Marítimo", "0092X-Berga", "0222X-Caldes de Montbui", "0194D-Corbera, Pic d'Agulles", "0260X-Fogars de Montclús", "0171X-Igualada", "0149X-Manresa", "0120X-Moià", "0158X-Monistrol de Montserrat", "0061X-Pontons", "0114X-Prat de Lluçanès", "0229I-Sabadell Aeropuerto", "0255B-Santa Susana", "0073X-Sitges", "0066X-Vilafranca del Penedès", "0244X-Vilassar de Dalt"];
    provincias[9]=["Seleccione estación", "2117D-Aranda de Duero", "9111-Belorado", "9031C-Briviesca", "2331-Burgos Aeropuerto", "2331X-Burgos Aeropuerto", "2106B-Coruña del Conde", "9051-Medina de Pomar", "9069C-Miranda de Ebro", "2302N-Monterrubio de la Demanda", "2298-Palacios de la Sierra", "2290Y-Pedrosa del Príncipe", "9012E-Santa Gadea de Alfoz", "9027X-Sargentes de la Lora", "2311Y-Villamayor de los Montes"];
    provincias[10]=["Seleccione estación", "4411C-Alcuescar", "3562X-Aliseda", "3565X-Brozas", "3469A-Cáceres", "4339X-Cañamero", "3475X-Cañaveral", "3526X-Coria", "3436D-Garganta de la Olla", "4245X-Guadalupe", "3503-Guijo de Granadilla", "3504X-Hervás", "3536X-Hoyos", "3455X-Jaraicejo", "3423I-Madrigal de la Vera", "3512X-Montehermoso", "3434X-Navalmoral de la Mata", "3386A-Navalvillar de Ibor", "3494U-Nuñomoral", "3516X-Piornal", "3519X-Plasencia", "3448X-Serradilla", "3514B-Tornavacas", "3531X-Torrecilla de los Angeles", "3463X-Trujillo", "3576X-Valencia de Alcántara", "3547X-Valverde del Fresno", "3540X-Zarza La Mayor", "4347X-Zorita"];
    provincias[11]=["Seleccione estación", "5996B-Barbate", "5973-Cádiz", "5906X-Chipiona", "5941X-El Bosque", "5911A-Grazalema", "5960-Jerez de la Frontera Aeropuerto", "6042I-Jimena de la Frontera", "5983X-Medina Sidonia", "5919X-Olvera", "5910X-Rota, Base Naval", "5972X-San Fernando", "5950X-San José del Valle", "6056X-San Roque", "6001-Tarifa", "5995B-Vejer de la Frontera"];
    provincias[12]=["Seleccione estación", "1096X-Barcena de Cicero, Treto", "1167B-Camaleño", "1083L-Castro Urdiales", "1174I-Cillórigo de Liébana", "1135C-Los Tojos", "1089U-Ramales de la Victoria", "9001D-Reinosa", "1152C-San Felices de Buelna", "1159-San Vicente de la Barquera", "1111X-Santander", "1109-Santander Aeropuerto", "1740-Santillana del Mar, Altamira", "1102D-Soba, Alto Miera", "1154H-Torrelavega", "1176A-Tresviso", "9016X-Valderrible, Cubillo de Ebro", "9019B-Valderrible, Polientes", "1124E-Villacarriedo"];
    provincias[13]=["Seleccione estación", "8492X-Atzeneta del Maestrat", "9563X-Castellfort", "8500A-Castellón de la Plana", "8520X-La Pobla de Benifassà-Fredes", "8472A-Montanejos", "8439X-Segorbe", "8503Y-Torreblanca", "8489X-Villafranca del Cid", "8523X-Vinaròs"];
    provincias[14]=["Seleccione estación", "5000C-Ceuta"];
    provincias[15]=["Seleccione estación", "4210Y-Abenójar", "4064Y-Alcazar de San Juan", "4300Y-Almadén", "4121-Ciudad Real", "5341C-Fuencaliente", "4220X-Puebla de Don Rodrigo", "5304Y-Puertollano", "4103X-Tomelloso", "4147X-Valdepeñas", "4138Y-Villanueva de los Infantes", "4148-Viso del Marqués"];
    provincias[16]=["Seleccione estación", "5624X-Aguilar de la Frontera", "5598X-Benamejí", "5346X-Cardeña", "5402-Córdoba Aeropuerto", "5394X-Córdoba, Embalse de Guadanuño", "5429X-Córdoba, Prágdena", "5427X-Doña Mencía", "5459X-Espiel", "5470-Fuente Palmera", "4267X-Hinojosa del Duque", "5625X-La Rambla", "5361X-Montoro", "5412X-Priego de Córdoba", "4263X-Valsequillo", "5390Y-Villanueva de Córdoba"];
    provincias[17]=["Seleccione estación", "4070Y-Abia de Obispalia", "4089A-Alberca de Zancara", "4051Y-Alcázar del Rey", "4095Y-Belmonte", "3040Y-Beteta", "3044X-Cañizares", "8096-Cuenca", "8245Y-Mira", "8155Y-Motilla del Palancar", "4093Y-Osa de la Vega", "8210Y-Salvacañete", "4090Y-San Clemente", "3094B-Tarancón", "4075Y-Villares del Saz"];
    provincias[18]=["Seleccione estación", "0281Y-Blanes", "0433D-Cabo de Creus", "0284X-Castell, Platja d'Aro", "0411X-Castello d'Empuries", "0421X-Espolla", "0429X-Figueres", "0370E-Girona", "0367-Girona Aeropuerto", "9585-La Molina", "0394X-La Vall de Bianya", "0360X-Les Planes d'Hostoles", "0385X-L'Estartit", "0413A-Maçanet de Cabrenys", "0320I-Planoles", "0372C-Porqueres", "0324A-Ripoll", "0363X-Sant Hilari", "0312X-Sant Pau de Segúries"];
    provincias[19]=["Seleccione estación", "C619X-Agaete", "C648C-Agüimes", "C248E-Antigua", "C669B-Arucas", "C249I-Fuerteventura Aeropuerto", "C649I-Gran Canaria Aeropuerto", "C038N-Haría", "C619I-La Aldea de San Nicolás", "C628B-La Aldea de San Nicolás, Tasarte", "C258K-La Oliva", "C259X-La Oliva, Puerto de Corralejo", "C029O-Lanzarote Aeropuerto", "C659M-Las Palmas de Gran Canaria, Pl. de la Feria", "C659H-Las Palmas de Gran Canaria, San Cristóbal", "C658X-Las Palmas de Gran Canaria, Tafira", "C689E-Maspalomas", "c639M-Maspalomas, C. Insular Turismo", "C629I-Mogán, Puerto", "C629X-Mogán, Puerto", "C629Q-Mogán, Puerto Rico", "C229J-Pájara", "C623I-San Bartolomé Tirajana, Cuevas del Pinar", "C639U-San Bartolomé Tirajana, El Matorral", "C635B-San Bartolomé Tirajana, Las Tirajanas", "C625O-San Bartolomé Tirajana, Lomo Pedro Alfonso", "C839I-Teguise", "C612F-Tejeda, Cruz de Tejeda", "C648N-Telde, Centro Forestal Doramas", "C649R-Telde, Melenara", "C656V-Teror", "C018J-Tías", "C048W-Tinajo", "C239N-Tuineje, Puerto Gran Tarajal", "C665T-Valleseco", "C611E-Vega de San Mateo", "C019V-Yaiza"];
    provincias[20]=["Seleccione estación", "5047E-Baza", "6272X-Castell del Ferro", "5516D-Dílar, Sierra Nevada", "5530E-Granada Aeropuerto", "5514-Granada Base Aérea", "5515X-Granada, Cartuja", "5051X-Huéscar", "6258X-Lanjarón", "5582A-Loja", "6268X-Motril", "6268Y-Motril, Puerto", "6267X-Salobreña", "6281X-Válor", "5515D-Víznar"];
    provincias[21]=["Seleccione estación", "3209Y-Brihuega", "3158D-Campisábalos", "9377Y-El Pedregal", "3168D-Guadalajara", "3140Y-Mandayona", "3013-Molina de Aragón", "3085Y-Pastrana", "3103-Retiendas", "3130C-Sigüenza", "3021Y-Zaorejas"];
    provincias[22]=["Seleccione estación", "1048X-Aretxabaleta", "1038X-Azpeitia", "1025X-Beasain", "1024E-Donostia/San Sebastián. Igueldo", "1049N-Elgueta", "1050J-Elgoibar", "1014-Hondarribia, Malkarroa", "1012P-Irún", "1037X-Legazpia", "1052A-Mutriku", "1026X-Ordizia", "1021X-Renteria", "1014A-San Sebastián Aeropuerto", "1036A-Zarautz", "1041A-Zumaia", "1037Y-Zumarraga"];
    provincias[23]=["Seleccione estación", "4560Y-Alajar", "5858X-Almonte", "4589X-Alosno, Tharsis", "4527X-Aroche", "4549Y-Ayamonte", "5769X-Cala", "4554X-Cartaya", "4608X-El Campillo", "4584X-El Cerro de Andévalo", "4541X-El Granado", "4642E-Huelva, Ronda Este", "5860E-Moguer, El Arenosillo", "4575X-Valverde del Camino", "4622X-Villarrasa"];
    provincias[24]=["Seleccione estación", "9008X-Ainsa", "9491X-Almudévar", "9208E-Aragües del Puerto", "9211F-Bailo", "9911X-Ballobar", "9866C-Barbastro", "9756X-Benabarre", "9838B-Benasque", "9784P-Bielsa", "9453X-Biescas", "9198X-Canfranc", "9855E-Capella", "9924X-Fraga", "9901X-Huesca", "9898-Huesca Aeropuerto", "9201K-Jaca", "9908X-Lanaja", "9460X-Sabiñánigo", "9894Y-Sariñena, Depósito", "9843A-Seira", "9751-Sopeira", "9918Y-Tamarite de Litera", "9814X-Torla, Depósito", "9207-Valle de Hecho, Hehcho"];
    provincias[25]=["Seleccione estación", "B526X-Artà", "B603X-Artà, Colònia de Sant Pere", "B087X-Banyalbufar", "B662X-Binissalem", "B158X-Calvià, Es Capdellà", "B362X-Campos, Can Sion", "B373X-Campos, Salines Llevant", "B569X-Capdepera", "B860X-Ciutadella", "B870C-Ciutadella, Cala Galdana", "B957-Eivissa", "B825B-Es Mercadal", "B013X-Escorca, Lluc", "B684A-Escorca, Son Torrella", "B986-Formentera", "B954-Ibiza, Aeropuerto", "B334X-Llucmajor", "B301-Llucmajor, Cap Blanc", "B614E-Manacor", "B275C-Marratxí", "B893-Menorca, Aeropuerto", "B605X-Muro, S'Albufera", "B278-Palma de Mallorca, Aeropuerto", "B278C-Palma de Mallorca, Es Pil Larí", "B228-Palma de Mallorca, Puerto", "B236C-Palma de Mallorca, Universida", "B760X-Pollença", "B346X-Porreres", "B780X-Port de Pollença", "B434X-Portocolom", "B691Y-Sa Pobla", "B908X-Sant Joan de Labritja", "B665A-Santa María del Camí", "B410B-Santanyí", "B248-Sierra de Alfabia, Bunvola", "B644B-Sineu", "B496X-Son Servera"];
    provincias[26]=["Seleccione estación", "5406X-Alcalá la Real", "5298X-Andújar", "5181D-Arroyo del Ojanco", "5164B-Baeza", "5281X-Bailén", "5038Y-Cazorla", "5270B-Jaén", "5279X-Linares", "5246-Santa Elena", "5165X-Torres", "5210X-Villanueva del Arzobispo", "5192-Villarrodrigo"];
    provincias[27]=["Seleccione estación", "1387-A Coruña", "1387E-A Coruña Aeropuerto", "1363X-As Pontes", "1442U-Boiro", "1393-Cabo Vilán", "1390X-Carballo, Depuradora", "1351-Estaca de Bares", "1400-Fisterra", "1406X-Mazaricos", "1437O-Monte Iroite", "1435C-Noia", "1473A-Padrón", "1476R-Rois, Casas do Porto", "1475X-Santiago de Compostela", "1428-Santiago de Compostela Aeropuerto", "1410X-Sobrado", "1399-Vimianzo"];
    provincias[28]=["Seleccione estación", "9283Y-Alfaro", "9136X-Anguiano", "9145Y-Cenicero", "9188-Enciso", "9121X-Haro", "9170-Logroño Aeropuerto", "9141V-Nájera", "9115X-Valdezcaray, Estación"];
    provincias[29]=["Seleccione estación", "2734D-Astorga", "2701D-Barrios de Luna, Miñera", "2742R-Bustillo del Páramo", "2626Y-Cubillas de Rueda", "2737E-Lagunas de Somoza", "2661B-León Aeropuerto", "2661-León, Virgen del Camino", "1549-Ponferrada", "1178Y-Posada de Valdeón", "2630X-Puerto de San Isidro", "2728B-Quintana del Castillo, Villameca", "2624C-Riaño", "2664B-Valencia de Don Juan", "1561I-Vega de Espinareda", "1541B-Villablino"];
    provincias[30]=["Seleccione estación", "9650X-Artesa de Segre", "9994X-Bossòst", "9638D-Coll de Nargó", "9775X-El Soleràs", "9657X-Esterri d'Àneu", "9590D-Illes de Cerdanya", "9632X-Jpsa i Tuixén", "9772X-La Pobla de Cérvoles", "9619-La Seo d'Urgell", "9744B-La Vall de Boi", "9771C-Lleida", "9707-Llimiana", "9590-Martinet", "9729X-Mollerussa", "9990X-Naut Aran, Arties", "9988B-Naut Aran, Cap de Vaquèira", "9724X-Os de Balaguer", "9677-Rialp, Port Aine", "9698U-Talarn", "9720X-Tàrrega", "9647X-Torà", "9689X-Torre de Cabdella"];
    provincias[31]=["Seleccione una estación", "1521X-Becerreá", "1347T-Burela", "1297E-Cervantes", "1658-Folgoso do Courel", "1518A-Lugo", "1505-Lugo Aeropuerto", "1344X-Mondoñedo", "1679A-Monforte de Lemos", "1521I-O Páramo", "1535I-O Saviñao", "1342X-Ribadeo"];
    provincias[32]=["Seleccione una estación", "3170Y-Alcalá de Henares", "3268C-Alpedrete", "3100B-Aranjuez", "3182Y-Arganda del Rey", "3110C-Buitrago del Lozoya", "3191E-Colmenar Viejo", "3200-Getafe", "3129-Madrid Aeropuerto", "3129A-Madrid, Barajas Radio Sondeos", "3194U-Madrid, Ciudad universitaria", "3196-Madrid-Cuatro Vientos", "3126Y-Madrid, El Goloso", "3195-Madrid, El Retiro", "3194Y-Pozuelo de Alarcón", "3266A-Puerto Alto del León", "2462-Puerto de Navacerrada", "3104Y-Rascafría", "3338-Robledo de Chavela", "3330Y-Rozas de Puerto Real", "3125Y-San Sebastián de los Reyes", "3111D-Somosierra", "3229Y-Tielmes", "3175-Torrejón de Ardoz", "3343Y-Valdemorillo"];
    provincias[33]=["Seleccione una estación", "6201X-Algarrobo", "6127X-Álora", "6045X-Alpandeire", "6106X-Antequera", "6069X-Benahavis", "6143X-Coín", "6040X-Cortes de la Frontera", "6058I-Estepona", "6084X-Fuengirola", "6375X-Fuente de Piedra", "6050X-Gaucín", "6172X-Málaga", "6155A-Málaga Aeropuerto", "6156X-Málaga, Centro Meteorológico", "6172O-Málaga, Puerto", "6057X-Manilva", "6083X-Marbella", "6076X-Marbella, Puerto", "6213X-Nerja", "6175X-Rincón de la Victoria", "6032B-Ronda", "6032X-Ronda Instituto", "6088X-Torremolinos", "6205X-Torrox", "6199B-Vélez, Málaga"];
    provincias[34]=["Seleccione una estación", "6000A-Melilla"];
    provincias[35]=["Seleccione una estación", "7250C-Abanilla", "7002Y-Águilas", "7228-Alcantarilla, Base Aérea", "7227X-Alhama de Murcia", "7158X-Archena", "7127X-Bullas", "7121A-Calasparra", "7119B-Caravaca de la Cruz", "7195X-Caravaca de la Cruz, los Royos", "7012D-Cartagena", "7145D-Cieza", "7023X-Fuente Álamo de Murcia", "7138B-Jumilla", "7209-Lorca", "7203A-Lorca, Zarcilla de Ramos", "7007X-Mazarrón", "7237E-Molina de Segura", "7080X-Moratalla", "7172X-Mula", "7178I-Murcia", "7211B-Puerto Lumbreras", "7031X-San Javier Aeropuerto", "7026X-Torre Pacheco", "7218X-Totana", "7275C-Yecla"];
    provincias[36]=["Seleccione una estación", "9263X-Aranguren, Ilundain", "1033X-Areso", "9294E-Bardenas Reales, Base Aérea", "1002Y-Baztan, Irurita", "1010X-Bera", "9283X-Cadreita", "9245X-Cáseda", "9257X-Esteribar, Eugui", "9274X-Irurtzun", "9218A-Isaba/Izaba", "9280B-Larraga", "9171K-Los Arcos", "9995Y-Luzaide/Valcarlos", "9262P-Monreal/Elo", "9301X-Monteagudo", "9238X-Navascués/Nabaskoze", "9252X-Olite/Erriberri", "9228J-Oroz Betelu/Orotz Betelu", "9263D-Pamplona Aeropuerto", "9228T-Roncesvalles", "9302Y-Tudela"];
    provincias[37]=["Seleccione una estación", "2969U-A Gudiña", "1631E-A Pobra de Trives", "1706A-Allariz", "1696O-Beariz", "1700X-Carballiño", "1639X-Chandrexa de Queixa", "1738U-Muiños", "1583X-O Barco de Valdeorras", "1690A-Ourense", "1701X-Ribadavia", "2978X-Verín", "1735X-Xinzo de Limia"];
    provincias[38]=["Seleccione una estación", "2243A-Aguilar de Campoo", "2400E-Autilla del Pino", "2374X-Carrión de los Condes", "2235U-Cervera de Pisuerga", "2401X-Palencia", "2568D-Santervás de la Vega, Villapún", "2362C-Velilla del Río Carrión, Camporredondo de Alba", "2276B-Villaeles de Valdavia"];
    provincias[39]=["Seleccione una estación", "1719-A Cañiza", "1468X-A Estrada", "1489A-A Lama", "1730E-O Rosal", "1723X-Ponteareas, Canedo", "1484C-Pontevedra", "1466A-Silleda", "1496X-Vigo", "1495-Vigo Aeropuerto", "1477V-Vilagarcía de Arousa"];
    provincias[40]=["Seleccione una estación", "2926B-Bañobárez", "2873X-Barbadillo", "2914C-Boadilla Fuente San Esteban", "2945A-El Bodón Base Aérea", "2918Y-El Maíllo", "2491C-La Covatilla, Estación", "2883R-Ledesma", "2930Y-Navasfrías", "2863C-Pedraza de Alba", "2847X-Pedrosillo de los Aires", "2946X-Saelices el Chico", "2870-Salamanca", "2867-Salamanca Aeropuerto", "2871D-Salamanca, Universidad", "2891A-Villarino de los Aires", "2916A-Vitigudino"];
    provincias[41]=["Seleccione una estación", "2140A-Aldeanueva de Serrezuela", "2192C-Cuéllar", "2135A-Fresno de Cantespino", "2150H-La Pinilla, Estación", "2482B-Miguelañez", "2182C-Pedraza", "2471Y-San Rafael", "2465-Segovia"];
    provincias[42]=["Seleccione una estación", "5733X-Almadén de la Plata", "5702X-Carmona", "5835X-Carrión de los Céspedes", "5704B-Cazalla de la Sierra", "5641X-Écija", "5656-Fuentes de Andalucía", "5726X-Guadalcanal", "5654X-La Puebla de los Infantes", "5612B-La Roda de Andalucía", "5891X-Las Cabezas de San Juan", "5612X-Lora de Estepa", "5796-Morón de la Frontera", "5998X-Osuna", "5783-Sevilla Aeropuerto", "5790Y-Sevilla, Tablada"];
    provincias[43]=["Seleccione una estación", "9352A-Almazul", "9344C-Arcos de Jalón", "2092-Burgo de Osma", "2017Y-La Póveda de Soria", "2059B-La Riba de Escalote", "2096B-Liceras", "2044B-Lubia", "2048A-Morón de Almazán", "2296A-Ólvega", "9287A-San Pedro Manrique", "2030-Soria", "2084Y-Ucero", "2005Y-Vinuesa, Quintanarejo"];
    provincias[44]=["Seleccione una estación", "0009X-Alforja", "9961X-Cabacés", "9946X-Horta de Sant Joan", "9947X-La Pobla de Massaluca", "9726E-Llorac", "9975X-Rasquera", "0016A-Reus Aeropuerto", "9987P-Sant Jaume d'Enveja", "0042Y-Tarragona", "9981A-Tortosa", "0034X-Valls", "0002I-Vandelós"];
    provincias[45]=["Seleccione una estación", "C419X-Adeje", "C317B-Agulo", "C449F-Anaga", "C428T-Arico", "C438N-Candelaria", "C126A-El Paso", "C916Q-El Pinar, Depósito", "C917E-El Pinar, La Dehesa", "C939T-Frontera, Sabinosa", "C129V-Fuencaliente", "C439J-Güímar", "C328W-Hermigua", "C929I-Hierro Aeropuerto", "C430E-Izaña", "C329b-La Gomera, Aeropuerto", "C406G-La Orotava, Cañadas Teide", "C139E-La Palma Aeropuerto", "C457I-La Victoria de Acentejo", "C469N-Los Silos", "C495Z-Puerto de la Cruz", "C459O-Puerto dela Cruz-Paz Botánica", "C117A-Puntagorda", "C148F-San Andrés y Sauces", "C446G-San Cristóbal de la Laguna", "C468B-San Juan de la Rambla", "C329Z-San Sebastián de la Gomera", "C449C-Sta. Cruz de Tenerife", "C458A-Tacoronte", "C129Z-Tazacorte", "C447A-Tenerife Norte Aeropuerto", "C429I-Tenerife Sur Aeropuerto", "C117Z-Tijarafe", "C314Z-Vallehermoso, Alto Igualero", "C315P-Vallehermoso, Chipude", "C319W-Vallehermoso, Dama", "C925F-Valverde"];
    provincias[46]=["Seleccione una estación", "8354X-Albarracín", "9573X-Alcañiz", "9550C-Andorra", "9998X-Bello", "9381I-Calamocha", "9569A-Calanda", "9561X-Castellote", "8458X-Cedrillas", "9436X-Fonfría", "9546B-Hijar", "8376-Jabaloyas", "9531Y-Montalbán", "8486X-Mosqueruela", "9513X-Muniesa", "8368U-Teruel", "9374X-Teruel, Santa Eulalia del Campo", "9935X-Valderrobres"];
    provincias[47]=["Seleccione una estación", "3362Y-Castillo de Bayuela", "4067-Madridejos", "3254Y-Mora", "3305Y-Navahermosa", "3099Y-Ocaña", "3427Y-Oropesa", "4236Y-Puerto del Rey", "4061X-Quintanar de la Orden", "3298X-San Pablo de los Montes", "3365A-Talavera de la Reina", "3245Y-Tembleque", "3260B-Toledo"];
    provincias[48]=["Seleccione una estación", "8381X-Ademuz", "8072Y-Barx", "8270X-Bicorp", "8319X-Buñol", "8300X-Carcaixent", "8395X-Chelva", "8290X-Enguera Navalón", "8193E-Jalance", "8409X-Lliria", "8058Y-Miramar", "8058X-Oliva", "8283X-Ontinyent", "8325X-Polinyà de Xúquer", "8446Y-Sagunto", "8337X-Turís", "8309X-Utiel", "8416Y-Valencia", "8414A-Valencia Aeropuerto", "8293X-Xàtiva", "8203O-Zarra"];
    provincias[49]=["Seleccione una estación", "2517A-Fuente el Sol", "2604B-Medina de Rioseco", "2503X-Olmedo", "2503B-Olmedo, Depósito de Agua", "2166Y-Peñafiel", "2507Y-Rueda", "2172Y-Sardón de Duero", "2422-Valladolid", "2539-Valladolid Aeropuerto", "2593D-Villalón de Campos"];
    provincias[50]=["Seleccione una estación", "2966D-Alcañices", "2755X-Benavente", "2885K-Fresno de Sayago", "2555B-Fuentesaúco", "2536D-Morales de Toro", "2882D-Peñausende", "2789H-Pozuelo de Tábara", "2766E-Sanabria, Robleda Cervantes", "2777K-Santibañez de Vidriales", "2804F-Villadepera", "2611D-Villafáfila", "2775X-Villardeciervos", "2614-Zamora"];
    provincias[51]=["Seleccione una estación", "9354X-Alhama de Aragón", "9576C-Bujaraloz", "9394X-Calatayud", "9574X-Caspe", "9336D-Castejón de Valdejasa", "9390-Daroca", "9321X-Ejea de los Caballeros", "9427X-La Almunia de Doña Godina", "9495Y-Leciñena", "9510X-Quinto", "9244X-Sos del Rey Católico", "9299X-Tarazona", "9501X-Valmadrid", "9434-Zaragoza Aeropuerto", "9433-Zaragoza Base Aérea", "9443V-Zaragoza, Canal", "9434P-Zaragoza, Valdespartera"];
    
    function ponProvincias(formulario){ //Se cargan las provincias en el menú desplegable
        var prov=formulario.provincia.selectedIndex; ///Se almacena la provincia seleccionada
        formulario.estaciones.length=provincias[prov].length; //Se establece la longitud del desplegable de las estaciones en base a la provincia
        for(i=0; i<formulario.estaciones.length; i++){ //Se recorren las estaciones de la provincia correspondiente
            formulario.estaciones.options[i].text=provincias[prov][i]; //Se carga el texto de la estación en el desplegable
            formulario.estaciones.options[i].value=provincias[prov][i]; //Se carga el valor de cada opción del desplegable
        }
    }
    
    function ponEstaciones(formu){ //Se cargan las estaciones en el menú desplegable
        //Si se SELECCIONA una estación
        if(formu.estaciones.selectedIndex!==0){
            var estacion=formu.estaciones.value; //Se almacena el valor de la estación en la variable
            var valores=estacion.split("-"); //Se separa el código del nombre usando como delimitador el guión y se guarda en un array
            var valor=valores[0]; //Se guarda en la variable el primer elemento del array correspondiente al código
            document.getElementById("resEst").value=valor; //Se asigna el valor del código al campo
        }
        //Si NO se ha SELECCIONADO ninguna estación
        else{
            document.getElementById("resEst").value=""; //Se limpia el campo
        }
    }
</script>