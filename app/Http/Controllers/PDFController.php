<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use View;

use DOMPDF;

use App\Http\Requests;

class PDFController extends Controller
{
    public function invoiceHtml()
    {
        $descriptions = [ "description1", "description2", "description3", "description4"];
        $subscriptions = [ 45, 46, 145, 458];
        $data = [
            'vendor' => 'PROVA',
            'user' => 'Sergi',
            'email' => 'sergiturbadenas@gmail.com',
            'name' => 'Sergi Tur',
            'product' => 'Producte 1',
            'descriptions' => $descriptions,
            'subscriptions' => $subscriptions,
            'hasDiscount' => true,
            'discount' => "20%",
            'tax_percent' => "23%",
            'tax' => "456"
        ];
        return view('receipt',$data);
    }

    public function downloadInvoice()
    {
        if (! defined('DOMPDF_ENABLE_AUTOLOAD')) {
            define('DOMPDF_ENABLE_AUTOLOAD', false);
        }
        if (file_exists($configPath = base_path().'/vendor/dompdf/dompdf/dompdf_config.inc.php')) {
            require_once $configPath;
        }
        $dompdf = new Dompdf();

        $data = [
            'vendor' => 'PROVA',
            'user' => 'Sergi'
        ];

//        $dompdf->load_html("<h1>Hola</h1>");
        $dompdf->load_html($this->view($data)->render());

        $dompdf->render();
        return $this->download($dompdf->output());
    }

    /**
     * Create an invoice download response.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function download($pdf)
    {
//        $filename = 'prova_'.$this->date()->month.'_'.$this->date()->year.'.pdf';
        $filename = "hola.pdf";
        return new Response($pdf, 200, [
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => 'filename="'.$filename.'"',
            'Content-Transfer-Encoding' => 'binary',
            'Content-Type' => 'application/pdf',
        ]);
    }

    /**
     * Get the View instance for the invoice.
     *
     * @param  array  $data
     * @return \Illuminate\View\View
     */
    public function view(array $data)
    {
        return $this->app->make('view')->make('receipt', $data));
    }
}
