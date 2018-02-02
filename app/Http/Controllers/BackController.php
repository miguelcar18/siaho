<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		$delegados = \DB::select('SELECT (SELECT TIMESTAMPDIFF(YEAR,delegados.fecha,CURDATE()))  AS anios, (SELECT (TIMESTAMPDIFF(MONTH,delegados.fecha,CURDATE())) - (TIMESTAMPDIFF(YEAR,delegados.fecha,CURDATE()) * 12)) AS meses FROM delegados');
		$politicas = \DB::select('SELECT (SELECT TIMESTAMPDIFF(YEAR,fecha,CURDATE()))  AS anios, (SELECT (TIMESTAMPDIFF(MONTH,fecha,CURDATE())) - (TIMESTAMPDIFF(YEAR,fecha,CURDATE()) * 12)) AS meses FROM politicas');
		$booleanDelegados = 0;
		$booleanPoliticas = 0;

		foreach($delegados as $data){
			if($data->anios >= 2){
				$booleanDelegados = 1;
			}
		}

		foreach($politicas as $data){
			if($data->meses >= 6 || $data->anios > 0){
				$booleanPoliticas = 1;
			}
		}

		return view("layouts.base", compact('booleanDelegados', 'booleanPoliticas'));
	}
}
