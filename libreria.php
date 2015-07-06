<?php
    $host = "localhost";
    $user = "root";
    $pswd = "";
    $db = "nw201502";

    $conn = new mysqli($host,
                     $user,
                     $pswd,
                     $db);

    if($conn->errno){
        die($conn->error);
    }

    function obtenerProductos($filtroDesc, $filtroEstado){
        global $conn;
        // '; drop database();
        // ''\'\; drop database \(\)\;'
        $filtroDesc = $conn->real_escape_string($filtroDesc)."%";
        $filtroEstado = $conn->real_escape_string($filtroEstado);

        $Productos = array();
        $sqlstr = "select * from productos where";
        $sqlstr .= " prddsc like '%s' and prdest = '%s';";

        $sqlstr = sprintf($sqlstr, $filtroDesc, $filtroEstado);
        $cursorProductos = $conn->query($sqlstr);
        if($cursorProductos){
            while($producto = $cursorProductos->fetch_assoc()){
                $Productos[] = $producto;
            }
        }
        $cursorProductos->close();
        return $Productos;
    }


    function obtenerProducto($codigoProducto){
        global $conn;

        $Producto = array();
        $sqlstr = "select * from productos where";
        $sqlstr .= " prdcod=%s;";

        $sqlstr = sprintf($sqlstr, $codigoProducto);
        $cursorProductos = $conn->query($sqlstr);
        if($cursorProductos){
            while($producto = $cursorProductos->fetch_assoc()){
                return $producto;
                break;
            }
        }
        $cursorProductos->close();
        return $Producto;
    }

    function insertarProducto($prddsc,$ctgcod,$prdprc,$prdstk,$prdest){
        global $conn;

        $insertSql = "insert into productos (prddsc, ctgcod, prdprc, prdstk, prdest)
                    values ('%s',%s,%01.2f,%d,'%s');";

        $insertSql = sprintf($insertSql,
                        $conn->real_escape_string($prddsc),
                        intval($ctgcod),
                        floatval($prdprc),
                        intval($prdstk),
                        $conn->real_escape_string($prdest)
                     );

        return $conn->query($insertSql);
        //Devuelve True si la ejecución es existosa,
        //False si algun error sucedió.
    }

    function updateProducto($prdcod,$prddsc,$ctgcod,$prdprc,$prdstk,$prdest){
        global $conn;

        $updateSql = "update productos set prddsc='%s', ctgcod=%s, prdprc=%01.2f, prdstk=%d, prdest='%s' where prdcod=%s;";

        $updateSql = sprintf($updateSql,
                        $conn->real_escape_string($prddsc),
                        intval($ctgcod),
                        floatval($prdprc),
                        intval($prdstk),
                        $conn->real_escape_string($prdest),
                        intval($prdcod)
                     );

        return $conn->query($updateSql);
        //Devuelve True si la ejecución es existosa,
        //False si algun error sucedió.
    }

    function deleteProducto($prdcod){
        global $conn;

        $deleteSql = "delete from productos where prdcod=%s;";

        $deleteSql = sprintf($deleteSql,
                        intval($prdcod)
                     );

        return $conn->query($deleteSql);
        //Devuelve True si la ejecución es existosa,
        //False si algun error sucedió.
    }

    function getLastInsertID(){
        global $conn;
        return $conn->insert_id;
    }

//categoria
function obtenerProductos($filtroDesc, $filtroEstado){
    global $conn;
    // '; drop database();
    // ''\'\; drop database \(\)\;'
    $filtroDesc = $conn->real_escape_string($filtroDesc)."%";
    $filtroEstado = $conn->real_escape_string($filtroEstado);

    $categorias = array();
    $sqlstr = "select * from categorias where";
    $sqlstr .= " catDsc = '%s';";

    $sqlstr = sprintf($sqlstr, $filtroDesc, $filtroEstado);
    $cursorCategorias = $conn->query($sqlstr);
    if($cursorProductos){
        while($categorias = $cursorCategorias->fetch_assoc()){
            $categorias[] = $categorias;
        }
    }
    $cursorCategorias->close();
    return $categorias;
}
function obtenerProducto($catCod){
    global $conn;

    $categorias = array();
    $sqlstr = "select * from productos where";
    $sqlstr .= " prdcod=%s;";

    $sqlstr = sprintf($sqlstr, $codigoCategorias);
    $cursorCategorias = $conn->query($sqlstr);
    if($cursorCategorias){
        while($producto = $cursorCategorias->fetch_assoc()){
            return $Categorias;
            break;
        }
    }
    $cursorCategorias->close();
    return $Categorias;
}

function insertarCategoria($catCod,$catDsc,$catEst){
    global $conn;

    $insertSql = "insert into categorias (catCod, catDsc, catEst)
                values ('%s',%01.2f,'%s');";

    $insertSql = sprintf($insertSql,

                    intval($catCod),
                    floatval($$catDsc),

                    $conn->real_escape_string($catEst)
                 );

    return $conn->query($insertSql);

}

function updateCategoria($catCod,$catDsc,$catEst){
    global $conn;

    $updateSql = "update productos set  catCod=%s, catDsc=%01.2f, catEst='%s' where catCod=%s;";

    $updateSql = sprintf($updateSql,
                      intval($catCod),
                      floatval($$catDsc),
                      $conn->real_escape_string($catEst)
                 );

    return $conn->query($updateSql);

}


function deleteCategoria($catCod){
    global $conn;

    $deleteSql = "delete from productos where $catCod=%s;";

    $deleteSql = sprintf($deleteSql,
                    intval($catCod)
                 );

    return $conn->query($deleteSql);

}



 ?>
