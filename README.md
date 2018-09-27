<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Projeto CROMG

O projeto foi desenvolvido conforme entendimento do teste de habilidade para a CROMG. 
O neste teste foi desenvolvido um sistema de controle de pessoas e seus filmes assistidos. Utilizando PHP + Laravel.

## Requisitos

- Utilizar Git Hub

- Implementar login, poderá ser tanto via session quanto via oAuth2.

- Criar entidades e suas respectivas tabelas de um cadastro padrão:
• Cadastro: nome, sobrenome, titulacao, CPF, RG, e-mail e etc.
• Endereço: Endereço completo
• Filme que já assistiu: titulo do filme, ano de lancamento, diretor, nota do filme, sinopse do filme.

- Cada cadastro poderá ter um número indeterminado de endereços e um número indeterminado de filmes, porém deverá ter um endereço marcado como principal;

- Criar as telas para inserção e atualização dos referidos dados;

- Criar as listas referentes aos filmes de cada usuário, lista de todos os usuários e endereços destes usuários;

- Ao clicar em um cadastro, na lista de cadastros você deverá ver os detalhes deste cadastro, seja em nova página ou na mesma página através de modal ou outro elemento gráfico;

- Poderá ser utilizado bibliotecas de terceiro, qualquer modelo ou paradigma de estruturação de código desde que respeite o style coding do laravel;

-Colocar no README.md também as observações de como foi realizado, porque foi realizado de determinada maneira e porque usou alguma biblioteca de terceiros (o que é totalmente recomendável se necessário).

## Implementação

O projeto foi desenvolvido no padrão MVC com Laravel 5.7.
Foi utilizado o pacote de estilização Bootstrap 4 e layout.
Banco de dados utilizado foi o MySql.
Os pacotes JQuery, toastrs e Datatables para funcionalidades visuais.
O pacote font-awesome para ícones.

## Particularidades do projeto

Devido ao pequeno tamanho do projeto não foi alterada a estrutura de pastas do Laravel.
Foram criadas algumas funções para realizar tarefas no sistema; Funções utilizando jquery e php.
A estrutura de autenticação utilizada é a nativa do laravel.
Algumas alterações em nomes para adequar aos padrões de criação e padrões do Laravel.

## Upgrade

Para uma ampliação do projeto seria necessário a alteração da estrutura de pastas.
Implementar ACL, controle de acesso.
Bem como definições e padrões.

## Sugestões

O sistema pode ser melhorado e incorporado a outros serviços já existentes no mercado.


