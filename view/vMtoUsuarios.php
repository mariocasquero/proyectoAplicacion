    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" id="fMtoUsuarios">
        <label><?php echo DUSUARIO?></label>
        <input type="text" name="descripcionUs" size="30" value="<?php echo $_REQUEST["descripcionUs"]?>">
        <input type="submit" name="buscarUs" id="buscarUs" value="<?php echo BUSCAR?>">
        <input type="submit" name="volver" id="volver" value="<?php echo VOLVER?>">
    </form>

    <table class="tablaUsuarios">
        <tr>
            <th><?php echo CODIGO?></th>
            <th class="dUsuario"><?php echo DESC?></th>
            <th><?php echo PERFIL?></th>
        </tr>

        <?php
                $i=0;

                for($i=0; $i<count($usuarios); $i++){
                    echo "<tr>";
                    echo "<td class='codigo'>".$usuarios[$i]->getCodUsuario()."</td>";
                    echo "<td class='descripcion'>".$usuarios[$i]->getDescUsuario()."</td>";
                    echo "<td class='perfil'>".$usuarios[$i]->getPerfil()."</td>";
                    echo "<td><form method='post'><button type='submit' class='sinFondo' name='eliminarUs"; echo $i."'><i id='bU' class='far fa-trash-alt'></i></button></form></td>";
                    echo "<td><form method='post'><button type='submit' class='sinFondo' name='modificarUs"; echo $i."'><i id='eU' class='far fa-edit'></i></button></form></td>";
                    echo "</tr>";          
                }
            ?>
    </table>

    <div class="paginacion">
        <?php
            //PAGINACIÓN
            if($pag>1){
                echo "<a href='?pagina=".($pag-1)."&descripcionUs=".$_REQUEST['descripcionUs']."'><< ".ANTERIOR." </a>";
            }
            if($pag<$totalPaginas){
                echo "<a href='?pagina=".($pag+1)."&descripcionUs=".$_REQUEST['descripcionUs']."'>".SIGUIENTE." >></a>";
            }

        ?>
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