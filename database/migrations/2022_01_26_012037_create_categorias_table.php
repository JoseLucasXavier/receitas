<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->string('nome');
            $table->text('descricao');
            $table->timestamps();
        });

        DB::table('categorias')->insert(
            array(
                'codigo' => '1',
                'nome' => 'Carne',
                'descricao' => 'Receitas feitas com Carne'
            )
        );

        DB::table('categorias')->insert(
            array(
                'codigo' => '2',
                'nome' => 'Bolos e Tortas',
                'descricao' => 'Receitas de Bolo e Torta'
            )
        );

        DB::table('categorias')->insert(
            array(
                'codigo' => '3',
                'nome' => 'Saladas',
                'descricao' => 'Receitas de Salada'
            )
        );

        DB::table('categorias')->insert(
            array(
                'codigo' => '4',
                'nome' => 'Massas',
                'descricao' => 'Receitas com Massas'
            )
        );

        DB::table('categorias')->insert(
            array(
                'codigo' => '5',
                'nome' => 'Doces e Sobremesas',
                'descricao' => 'Receitas de Doces e Sobremesas'
            )
        );

        DB::table('categorias')->insert(
            array(
                'codigo' => '6',
                'nome' => 'Alimentação Saudável',
                'descricao' => 'Receitas Fit'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
