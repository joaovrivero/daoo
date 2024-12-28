<?php

interface iFuncionario {
    public function mostrarSalario();
    public function mostrarTempoContrato();
}

class Pessoa {
    protected $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }
}

class Atleta extends Pessoa implements iFuncionario {
    private $salario;
    private $tempoContrato;

    public function __construct($nome, $salario, $tempoContrato) {
        parent::__construct($nome);
        $this->salario = $salario;
        $this->tempoContrato = $tempoContrato;
    }

    public function mostrarSalario() {
        return "Salario: R$ " . number_format($this->salario,2,',','.');
    }

    public function mostrarTempoContrato() {
        return "Contrato de " . $this->tempoContrato . " anos.";
    }
}

class Medico extends Pessoa implements iFuncionario {
    private $salario;
    private $tempoContrato;

    public function __construct($nome, $salario, $tempoContrato) {
        parent::__construct($nome);
        $this->salario = $salario;
        $this->tempoContrato = $tempoContrato;
    }

    public function mostrarSalario() {
        return "Salario: R$ " . number_format($this->salario,2,',','.');
    }

    public function mostrarTempoContrato() {
        return "Contrato de " . $this->tempoContrato . " anos.";
    }
}

class Relatorio {
    private $pessoas = [];

    public function add(Pessoa $pessoa) {
        $this->pessoas[] = $pessoa;
    }

    public function log() {
        foreach ($this->pessoas as $pessoa) {
            echo "Nome: " . $pessoa->getNome() . "\n";

            if ($pessoa instanceof iFuncionario) {
                echo $pessoa->mostrarSalario() . "\n";
                echo $pessoa->mostrarTempoContrato() . "\n";
            } else {
                echo "Esta pessoa nao e um funcionario.\n";
            }

            echo "----------------------------\n";
        }
    }
}

$atleta = new Atleta("Joao",5000.00,2);
$medico = new Medico("Dr. House", 15000.00,5);
$pessoa = new Pessoa("Vitor");

$relatorio = new Relatorio();
$relatorio->add($atleta);
$relatorio->add($medico);
$relatorio->add($pessoa);
$relatorio->log();