<?php
require_once "dompdf/autoload.inc.php";
use Dompdf\Dompdf;

class pdfHandler
{
    public function toPDF($html_file_path)
    {
        $html = file_get_contents(__DIR__ . $html_file_path);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setBasePath('/../');
        $dompdf->setPaper('a4', 'portrait');
        $dompdf->render();

        $dompdf->stream('newfile',array('Attachment'=>0));
    }

}