<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Course;
use PDF;

class CoursePdfController extends Controller
{
    public function show($id)
    {
    	$course = Course::where('slug', $id)->first();

    	$pdf_name = str_replace(' ', '_', strtolower($course->name)).'.pdf';
    	$pdf_name2 = 'pdf.'.str_replace(' ', '_', strtolower($course->name));

    	$data = '<html>
    				<head>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    					<style>
    						body {
    							font-family: "helvetica", sans-serif;
    						}
    						.page-break {
    						    page-break-after: always;
    						}
                            img {
                                max-width: 100%;
                            }
    					</style>
    				<body>
    					<h1>'.$course->name.'</h1>
    					<div class="page-break"></div>';

    	foreach($course->modules as $module) {
            if($module->active == 1) {
                $data .= '<h2>'.$module->name.'</h2>';
                $data .= '<div class="page-break"></div>';
                foreach($module->less as $lesson) {
                    if($lesson->active == 1) {
                        $data .= '<h2>'.$lesson->name.'</h2>';
                        $data .= $lesson->content;
                        $data .= '<div class="page-break"></div>';
                    }
                }
            }
    	}

    	$data .= '</body></html>';

    	$pdf = PDF::loadHTML($data);

    	return $pdf->download($pdf_name);
    }
}
