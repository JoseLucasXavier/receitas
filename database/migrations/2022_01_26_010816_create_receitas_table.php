<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receitas', function (Blueprint $table) {
            $table->id();
            $table->integer('categoria_id');
            $table->string('titulo');
            $table->text('descricao');
            $table->text('ingredientes');
            $table->text('modo_preparo');
            $table->integer('user_id');
            $table->timestamps();
        });

        DB::table('receitas')->insert(
            array(
                'categoria_id' => '2',
                'titulo' => 'Bolo de Chocolate',
                'descricao' => 'O bolo de chocolate é uma receita fácil de fazer que leva poucos ingredientes',
                'ingredientes' => '1 xícara de chá de leite, 1 xícara de chá de óleo de girassol ou de milho, 2 unidades de ovo, 2 xícaras de chá de farinha de trigo, 1 xícara de chá de achocolatado em pó, 1 xícara de chá de açúcar, 1 colheres de sopa de fermento químico em pó',
                'modo_preparo' => '1. Coloque os líquidos no liquidificador e bata até misturar bem. | 2. Coloque os outros ingredientes, sendo o fermento o último.  | 3. Leve para assar em forno médio, numa forma untada e enfarinhada. | 4. Depois de pronto, faça furos com palito ou garfo no bolo e despeje achocolate com leite. | 5. Finalize com a cobertura de ganache de chocolate.',
                'user_id' => '1'
            )
        );

        DB::table('receitas')->insert(
            array(
                'categoria_id' => '4',
                'titulo' => 'Macarrão',
                'descricao' => 'Fácil e rápido de fazer, essa receita de macarrão simples leva cebola picada e o molho de sua preferência!',
                'ingredientes' => 'Meio pacote de macarrão de sua preferência, Meia cebola picada, 4 colheres de sopa de óleo, Meia xícara de molho de sua preferência, Sal a gosto, 2 litros e meio de água',
                'modo_preparo' => '1. Coloque em uma panela grande aproximadamente 2 litros e meio de água e aproximadamente meia colher de sopa de sal, vai depender do seu gosto. | 2. Leve ao fogo e deixe ferver. | 3. Acrescente o macarrão e mexa bem, deixe cozinhar, experimente, quando estiver al dente, escorra. | 4. Pegue outra panela, coloque o óleo e a cebola e deixe fritar. | 5. Acrescente o molho e deixe apurar um pouquinho. | 6. Desligue o fogo e coloque o macarrão na panela. | 7. Misture o macarrão ao molho até que ele absorva bem. | 8. Sirva quente.',
                'user_id' => '1'
            )
        );

        DB::table('receitas')->insert(
            array(
                'categoria_id' => '1',
                'titulo' => 'Almôndegas',
                'descricao' => 'Confira esta receita de almôndegas. Veja como é rápido e prático!',
                'ingredientes' => '500g de carne moída, 1 colher (sopa) de Tempeiro, 1 ovo, 2 colheres (sopa) de farinha de trigo, 1 e meia xícara (chá) de molho de tomate',
                'modo_preparo' => '1. Em um recipiente, misture a carne, o Tempeiro, o ovo e a farinha de trigo até formar uma massa homogênea. | 2. Faça as almôndegas, moldando 2 colheres (chá) da massa de carne. | Coloque todas as almôndegas em um recipiente refratário e leve ao micro-ondas por 6 minutos, em potência alta. | Junte o molho de tomate, cubra com uma tampa própria para micro-ondas e leve ao micro-ondas por mais 1 minuto. Sirva a seguir.',
                'user_id' => '1'
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
        Schema::dropIfExists('receitas');
    }
}
