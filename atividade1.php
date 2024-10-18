<?php
class Paciente {
    private $peso;
    private $altura;

    public function __construct($peso, $altura) {
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getAltura() {
        return $this->altura;
    }
}

class IMC {
    public static function calc(Paciente $paciente) {
        $peso = $paciente->getPeso();
        $altura = $paciente->getAltura();

        $imc = $peso / ($altura * $altura);
        return round($imc, 2);
    }

    public static function classifica(Paciente $paciente) {
        $imc = self::calc($paciente);

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
}

$pessoa = new Paciente(72, 1.80);

$imc = IMC::calc($pessoa);
$classificacao = IMC::classifica($pessoa);

echo "IMC: $imc\n";
echo "Classificacao: $classificacao\n";