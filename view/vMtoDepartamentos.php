    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" id="fDepartamentos">
        <div class="criterioBus">    
            <label><?php echo DESCDEP?> </label>
            <input type="text" name="descripcionDep" size="30" value="<?php echo $_REQUEST["descripcionDep"]?>">
            <input type="submit" name="buscarDep" id="buscar" value="<?php echo BUSCAR?>">
            <input type="submit" name="anyadir" id="anyadir" value="<?php echo ANADIR?>">
            <input type="submit" name="volver" id="volver" value="<?php echo VOLVER?>">
            <br><br>
        
            <label><?php echo CRITERIO?> </label>
            <input type="radio" name="criterio" value="todos" id="todos" <?php if ($_REQUEST["criterio"]=="todos") echo "checked";?>><label for="todos"><?php echo TODOS?></label>
            <input type="radio" name="criterio" value="alta" id="alta" <?php if ($_REQUEST["criterio"]=="alta") echo "checked";?>><label for="alta"><?php echo ALTA?></label>
            <input type="radio" name="criterio" value="baja" id="baja" <?php if ($_REQUEST["criterio"]=="baja") echo "checked";?>><label for="baja"><?php echo BAJA?></label>
        </div>
    </form>
    

    <table>
        <tr>
            <th><?php echo CODIGO?></th>
            <th class="descripcion"><?php echo DESC?></th>
            <th><?php echo VOLUMEN?></th>
        </tr>
        
        <?php
            $i=0;
            
            for($i=0; $i<count($_SESSION["departamentos"]); $i++){
                if($_SESSION["departamentos"][$i]->getFechaBajaDepartamento()==NULL){
                    echo "<tr class='alta'>";
                    echo "<td class='centrado'>".$_SESSION["departamentos"][$i]->getCodDepartamento()."</td>";
                    echo "<td class='descripcion'>".$_SESSION["departamentos"][$i]->getDescDepartamento()."</td>";
                    echo "<td class='centrado'>".$_SESSION["departamentos"][$i]->getVolumenDeNegocio()."</td>";
                    echo "<td><form method='post'><button type='submit' class='sinFondo' name='eliminarDep"; echo $i."'><i class='far fa-trash-alt'></i></button></form></td>";
                    echo "<td><form method='post'><button type='submit' class='sinFondo' name='modificarDep"; echo $i."'><i class='far fa-edit'></i></button></form></td>";
                    echo "<td><form method='post'><button type='submit' class='sinFondo' name='bajaDep"; echo $i."'><i class='far fa-arrow-alt-circle-down'></i></button></form></td>";
                    echo "</tr>";
                }
                else{
                    echo "<tr class='baja'>";
                    echo "<td class='centrado'>".$_SESSION["departamentos"][$i]->getCodDepartamento()."</td>";
                    echo "<td class='descripcion'>".$_SESSION["departamentos"][$i]->getDescDepartamento()."</td>";
                    echo "<td class='centrado'>".$_SESSION["departamentos"][$i]->getVolumenDeNegocio()."</td>";
                    echo "<td><form method='post'><button type='submit' class='sinFondo' name='eliminarDep"; echo $i."'><i class='far fa-trash-alt'></i></button></form></td>";
                    echo "<td><form method='post'><button type='submit' class='sinFondo' name='rehabilitar"; echo $i."'><i class='far fa-arrow-alt-circle-up'></i></button></form></td>";
                    echo "<td><form method='post'><button type='submit' class='sinFondo' name='eliminarDep"; echo $i."'></button></form></td>";
                    echo "</tr>";
                }
                
            }
        ?>
    </table>

    <div class="paginas">
        <?php
            //PAGINACIÓN
            if($pag>1){
                echo "<a href='?pagina=".($pag-1)."&descripcionDep=".$_REQUEST['descripcionDep']."&criterio=".$_REQUEST["criterio"]."'><< ".ANTERIOR." </a>";
            }
            if($pag<$totalPaginas){
                echo "<a href='?pagina=".($pag+1)."&descripcionDep=".$_REQUEST['descripcionDep']."&criterio=".$_REQUEST["criterio"]."'>".SIGUIENTE." >></a>";
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