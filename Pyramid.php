<?php

/**
 * Este archivo contiene la clase para construir una
 * pirámide de números.
 *
 * @author Erick Pulido
 * @version 1.0
 * @date 2024-10-15
 */
class Pyramid
{
    /**
     * @access public
     * @var integer
     */
    public $number;

    /**
     * @access public
     * @var integer
     */
    public $limit;

    /**
     * @access private
     * @var array
     */
    private $lines;

    /**
     * @access private
     * @var array
     */
    private $result;

    /**
     * @access private
     * @var string
     */
    private $output;

    /**
     * @access public
     * @param int $number El número a representar en la pirámide
     * @param int $limit El número de repeticiones de la secuencia
     */
    public function __construct($number, $limit)
    {
        $this->number = $number;
        $this->limit = $limit;
    }

    /**
     * Almacena en una matriz la secuencia a
     * partir de el valor inicial. 
     * 
     * @access public
     * @return $this
     */
    public function fill()
    {
        $end = $this->number;

        for ($i=1; $i <= $this->limit ; $i++):        
            $this->lines[] = range($this->number, $end, $this->number);
            $end+=$this->number;        
        endfor;
        
        return $this;
    }

    /**
     * Construye y almacena en una matriz
     * los elementos de la secuencia.
     * 
     * @access public
     * @return $this
     */
    public function map()
    {
        array_map(function($line)
        {
            static $start = 1;
            static $end = count($this->lines);

            $leftBlock = implode('',array_reverse($line));
            $rightBlock = substr(implode('',$line), 1);   

            $this->result[$start]['string'] = $leftBlock.$rightBlock;
            $this->result[$end]['left_padding'] = strlen($leftBlock) -1;

            $start++;
            $end--;
        },$this->lines);

        ksort($this->result);

        return $this;
    }

    /**
     * Proporciona formato a la secuencia mapeada.
     * 
     * @access public
     * @return Output
     */
    public function output()
    {
        foreach($this->result as $line):
            $this->output .= str_repeat(" ", $line['left_padding']).$line['string'].PHP_EOL;
        endforeach;

        return $this->output;
    }
}

// Si el usuario no ingresa argumentos en la línea de comando,
// el valor por defecto de los parámetros será 5. 
$number = $argv[1] ?? 5;
$limit = $argv[2] ?? 10;

// Instancia de la clase Pyramid
$pyramid = new Pyramid($number,$limit);
$output = $pyramid->fill()
    ->map()
    ->output();

// Salida
print $output;

?>