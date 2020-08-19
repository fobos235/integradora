<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class AutocompleteController extends Controller
{
    
    public function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = Productos::table('productos')
            ->where('nombre', 'LIKE', "%{$query}%")
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '
                <li><a href="#">'.$row->nombre.'</a></li>
                ';
            }
      $output .= '</ul>';
      echo $output;
     }
    }
}
