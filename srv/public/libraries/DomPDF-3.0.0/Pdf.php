<?php
if (!defined('APP_PATH'))
    exit('No direct script access allowed');

// Incluir el archivo principal de dompdf
require_once('/App/Public/Bookstores/DomPDF/Dompdf/autoload.inc.php');

// Usar el espacio de nombres adecuado
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf extends stdClass {
    private $dompdf;

    public function __construct() {
        // Crear una instancia de Dompdf
        $this->dompdf = new Dompdf();
    }

    public function generate_pdf($Html, $Paper, $Titulo, $Salida = true) {
        // Configuración opcional
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $this->dompdf->setOptions($options);

        // HTML a PDF
        $this->dompdf->loadHtml($Html);

        // (Opcional) Configura el tamaño de la página y la orientación
        $this->dompdf->setPaper('A4', "$Paper");

        // Renderiza el PDF
        $this->dompdf->render();

        //Agrega la numeración de páginas en el PDF
        $font = $this->dompdf->getFontMetrics()->getFont('Titillium Web');
        $this->dompdf->getCanvas()->page_text(805, 555, "{PAGE_NUM}/{PAGE_COUNT}", $font, 7, array(.60, .60, .60));

        if ($Salida == true) {
            // Salida del PDF generado
            $this->dompdf->stream("$Titulo" . date('Y.m.d') . ".pdf", array("Attachment" => 0));
        }
    }

    public function output() {
        // Obtener el contenido del PDF generado
        return $this->dompdf->output();
    }

}

$this->Pdf = new Pdf();
?>