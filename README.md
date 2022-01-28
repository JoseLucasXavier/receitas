# README #

Este README documentaria quaisquer etapas necessárias para colocar o sistema em funcionamento.

# Laravel

| Versão Laravel  | Branch |
|-----------------|--------|
| 8.0             | master |
| 7.0             | v7.0   |
| 6.0             | v6.0   |
| 5.8             | v5.8   |

## Requerimentos

- PHP >= 7.3.0
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Instalação

- Clone o repositório e entre com `cd` nele
- Execute `composer install`
- Renomeie ou copie o arquivo `.env.example` para `.env`
- Execute `php artisan key:generate`
- Defina suas configurações de banco de dados em seu arquivo `.env`
- Execute `php artisan migrate` para executar as migrações de Banco de Dados
- Execute `php artisan serve` para iniciar o Projeto

## Creditos

Este Projeto se utiliza de algumas bibliotecas/pacotes de terceiros de código aberto, muito graças à comunidade da web.

- Laravel - Open source framework.
- LaravelEasyNav - Facilitando o gerenciamento da navegação no Laravel.
- SB Admin 2 - Graças ao Start Bootstrap.

## Licença

Licenciado sob a licença do MIT.
