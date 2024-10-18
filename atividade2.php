<?php

trait IMC {
    public function calcIMC() {
        $this->imc = $this->peso / ($this->altura * $this->altura);
        return round($this->imc, 2);
    }

    public function classifica() {
        $imc = $this->calcIMC();

        if ($imc < 18.5) {
            return "Abaixo do peso";
        } elseif ($imc >= 18.5 && $imc <= 24.9) {
            return "Saudavel";
        } elseif ($imc >= 25 && $imc <= 29.9) {
            return "Sobrepeso";
        } else {
            return "Obesidade";
        }
    }

    public function isNormal() {
        $imc = $this->calcIMC();

        if ($this->idade < 65) {
            return $imc >= 18.5 && $imc <= 24.9;
        } else {
            return $imc >= 23 && $imc <= 30;
        }
    }
}

class Atleta {
    use IMC;

    private $peso;
    private $altura;
    private $idade;
    private $imc;

    /**
     * @param $peso
     * @param $altura
     * @param $idade
     */
    public function __construct($peso, $altura, $idade)
    {
        $this->peso = $peso;
        $this->altura = $altura;
        $this->idade = $idade;
    }

    /**
     * @return mixed
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * @return mixed
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * @return mixed
     */
    public function getImc()
    {
        return $this->imc;
    }
}

$atleta = new Atleta(75, 1.80, 25);

echo "IMC:" . $atleta->calcIMC() . "\n";
echo "Classificacao:" . $atleta->classifica() . "\n";
echo "IMC normal:" . ($atleta->isNormal() ? 'sim' : 'nao') . "\n";