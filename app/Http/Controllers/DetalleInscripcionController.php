<?php

namespace App\Http\Controllers;

use App\Models\detalle_inscripcion;
use App\Http\Requests\Storedetalle_inscripcionRequest;
use App\Http\Requests\Updatedetalle_inscripcionRequest;

class DetalleInscripcionController extends Controller
{
    
    public function store(Storedetalle_inscripcionRequest $request)
    {
        $detalle_inscripcion = new detalle_inscripcion($request->all()); 
        $detalle_inscripcion->save();
    }

}
