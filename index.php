<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formato de solicitud-autorización</title>
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
        <script src="app.js"></script>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <h1 style="text-align: justify;">Formato de solicitud-autorización para el registro de datos bancarios para el pago de la ayuda para pasajes y gastos de alimentación otorgado por la prestación del Servicio Social en la Suprema Corte de Justicia de la Nación</h1>
                    <hr>
                </div>
            </div>
            <div class="row mt-3">
                <form id="form" name="formulario" method="post">
                    <div class="mb-4">
                        <label for="nombre" class="form-label">Nombre del prestador de servicio social</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" aria-describedby="nombrec" required>
                        <div id="nombrec" class="form-text">
                            Apellido Paterno / Apellido Materno / Nombre(s)
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="organo" class="form-label">Órgano / Unidad Responsable / Área en la que preste el servicio social</label>
                        <input type="text" id="organo" name="organo" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label for="banco" class="form-label">Nombre del Banco</label>
                        <input type="text" id="banco" name="banco" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label for="cuenta" class="form-label">Número de Cuenta</label>
                        <input type="number" maxlength="11" id="cuenta" name="cuenta" class="form-control" aria-describedby="cuentac" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                        <div id="cuentac" class="form-text">
                            10 - 11 dígitos
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="clabe" class="form-label">Número de Clave Bancaria Estandarizada (CLABE)</label>
                        <input type="number" maxlength="18" id="clabe" name="clabe" class="form-control" aria-describedby="clabec" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                        <div id="clabec" class="form-text">
                            18 dígitos
                        </div>
                    </div>
                    <div class="mb-4">
                        <span class="form-label">Firma del prestador de servicio social</span>
                        <div class="signature mb-2 mt-4" style="width: 100%; height: 200px;">
                            <canvas id="signature_canvas" style="border: 1px dashed black; width: 100%; height: 200px;"></canvas>
                        </div>
                    </div>
                    <div class="col mt-3 mb-4">
                        <p><strong>**No olvide firmar en físico o en digital el documento generado (en caso de no haberlo firmado) antes de enviarlo al área correspondiente**</strong></p>
                        <p><strong>IMPORTANTE: No olvide enviar sus datos luego de generar su formato, de lo contrario, su registro no sera valido</strong></p>
                        <br>
                    </div>
                    <div class="mb-4 d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" id="boton-generar-pdf" onclick="generatePDF()">Generar PDF</button>
                        <div class="col-1"></div>
                        <button type="submit" class="btn btn-success" name="register" id="envio" onclick="alerta()" disabled>Enviar</button>
                        <div class="col-1"></div>
                        <button type="reset" class="btn btn-danger" onclick=location.reload()>Borrar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <?php
        include("registrar.php");
    ?>

    <script>
        const boton1 = document.querySelector('#boton-generar-pdf');
        const boton2 = document.querySelector('#envio');

        boton1.addEventListener('click', () => {
            boton2.removeAttribute('disabled');
        });
    </script>
</html>