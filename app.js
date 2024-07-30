const { jsPDF } = window.jspdf;

function loadImage(url) {
    return new Promise(resolve => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.responseType = "blob";
        xhr.onload = function (e) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const res = event.target.result;
                resolve(res);
            }
            const file = this.response;
            reader.readAsDataURL(file);
        }
        xhr.send();
    });
}

let signaturePad = null;

window.addEventListener('load', async () => {
    const canvas = document.querySelector('canvas');
    canvas.height = canvas.offsetHeight;
    canvas.width = canvas.offsetWidth;

    signaturePad = new SignaturePad(canvas, {});

    const botonGenerarPDF = document.querySelector('#boton-generar-pdf');
    botonGenerarPDF.addEventListener('click', () => {
        const nombre = document.getElementById('nombre').value;
        const organo = document.getElementById('organo').value;
        const banco = document.getElementById('banco').value;
        const cuenta = document.getElementById('cuenta').value;
        const clabe = document.getElementById('clabe').value;
        generatePDF(nombre, organo, banco, cuenta, clabe);
    });
});

async function generatePDF(nombre, organo, banco, cuenta, clabe) {
    const image = await loadImage("formulario.jpg");
    const signatureImage = signaturePad.toDataURL();

    const pdf = new jsPDF('p', 'pt', 'letter');

    pdf.addImage(image, 'PNG', 0, 0, 610, 792);
    pdf.addImage(signatureImage, 'PNG', 170, 615, 300, 50);

    pdf.setFontSize(12);
    pdf.text(nombre, 90, 209);
    pdf.text(organo, 90, 263);
    pdf.text(banco, 90, 389);
    pdf.text(cuenta, 90, 442);
    pdf.text(clabe, 90, 496);

    const date = new Date();
    pdf.text(date.getUTCDate().toString(), 418,83);
    pdf.text((date.getUTCMonth() + 1).toString(), 464,83);
    pdf.text(date.getUTCFullYear().toString(), 497,83);

    pdf.save("formato_llenado.pdf");
}

function alerta() {
    alert("Registro completado");
};