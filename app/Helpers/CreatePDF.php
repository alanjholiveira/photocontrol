<?php

use Barryvdh\DomPDF\Facade as DomPDF;


class CreatePDF
{

    /**
     * @param $view
     * @param $data
     * @param $name
     * @return \Illuminate\Http\Response
     */
    public static function downloadPdf($view, $data, $name)
    {
        $pdf = DomPDF::loadView($view, compact('data'));

        return $pdf->download(date('d-m-Y-H:i:s') . '-' . $name . '.pdf');

    }

    /**
     * @param $view
     * @param $data
     * @return \Illuminate\Http\Response
     */
    public static function viewPdf($view, $data)
    {
        $pdf = DomPDF::loadView($view, compact('data'));

        return $pdf->setPaper('a4', 'landscape')->stream();

    }

}