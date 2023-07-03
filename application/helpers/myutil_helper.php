<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_month_text'))
{
    function get_month_text($m = '')
    {
        $var = '';
		switch($m)
		{
			case '1':
				$var = 'Januari';
				break;
			case '2':
				$var = 'Februari';
				break;
			case '3':
				$var = 'Maret';
				break;
			case '4':
				$var = 'April';
				break;
			case '5':
				$var = 'Mei';
				break;
			case '6':
				$var = 'Juni';
				break;
			case '7':
				$var = 'Juli';
				break;
			case '8':
				$var = 'Agustus';
				break;
			case '9':
				$var = 'September';
				break;
			case '10':
				$var = 'Oktober';
				break;
			case '11':
				$var = 'November';
				break;
			case '12':
				$var = 'Desember';
				break;
		}
		return $var;
		
    }   
}

if ( ! function_exists('get_romawi'))
{
    function get_romawi($m = '')
    {
        $var = '';
		switch($m)
		{
			case '1':
				$var = 'I';
				break;
			case '2':
				$var = 'II';
				break;
			case '3':
				$var = 'III';
				break;
			case '4':
				$var = 'IV';
				break;
			case '5':
				$var = 'V';
				break;
			case '6':
				$var = 'VI';
				break;
			case '7':
				$var = 'VII';
				break;
			case '8':
				$var = 'VIII';
				break;
			case '9':
				$var = 'IX';
				break;
			case '10':
				$var = 'X';
				break;
			case '11':
				$var = 'XI';
				break;
			case '12':
				$var = 'XII';
				break;
		}
		return $var;
		
    }   
}