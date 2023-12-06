<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, fecha, total FROM ventas WHERE id = ?");
$sentencia->execute([$id]);
$venta = $sentencia->fetchObject();
if (!$venta) {
    exit("No existe venta con el id proporcionado");
}

$sentenciaProductos = $base_de_datos->prepare("SELECT p.codigo, p.descripcion,p.precioVenta, pv.cantidad
FROM productos p
INNER JOIN 
productos_vendidos pv
ON p.id = pv.id_producto
WHERE pv.id_venta = ?");
$sentenciaProductos->execute([$id]);
$productos = $sentenciaProductos->fetchAll();
if (!$productos) {
    exit("No hay productos");
}

?>
<style>
    * {
        font-size: 12px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        border-collapse: collapse;
    }

    td.producto,
    th.producto {
        width: 225px;
        max-width: 275px;
    }

    td.cantidad,
    th.cantidad {
        width: 75px;
        max-width: 75px;
        word-break: break-all;
    }

    td.precio,
    th.precio {
        width: 75px;
        max-width: 75px;
        word-break: break-all;
        text-align: right;
    }

    .centrado {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 375px;
        max-width: 375px;
    }

    img {
        max-width: inherit;
        width: inherit;
    }

    @media print {

        .oculto-impresion,
        .oculto-impresion * {
            display: none !important;
        }
    }
</style>

<body>
    <div class="ticket">
        <img src="./logo.png" alt="Logotipo">
        <p class= "centrado" style="font-weight: bold;">SERVIREFRI VALLADOLID</p>
        <p class= "centrado">WWW.SERVIREFRI.COM.MX</p>
        <p class="centrado">TICKET DE VENTA
            <br><?php echo $venta->fecha; ?>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="cantidad">CANTIDAD</th>
                    <th class="producto">PRODUCTOS</th>
                    <th class="precio">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($productos as $producto) {
                    $subtotal = $producto->precioVenta * $producto->cantidad;
                    $total += $subtotal;
                ?>
                    <tr>
                        <td class="cantidad"><?php echo $producto->cantidad;  ?></td>
                        <td class="producto"><?php echo $producto->descripcion;  ?> <strong>$<?php echo number_format($producto->precioVenta, 2) ?></strong></td>
                        <td class="precio">$<?php echo number_format($subtotal, 2)  ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="text-align: right;">TOTAL</td>
                    <td class="precio">
                        <strong>$<?php echo number_format($total, 2) ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!</p>
        <br>
    </div>
</body>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        window.print();
        setTimeout(() => {
            window.location.href = "./ventas.php";
        }, 1000);
    });
</script>