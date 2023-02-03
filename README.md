<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

| [Introdução][] | [Requerimentos][] | [Instalação][] | [Como Configurar][] | [Documentação da API][] | [PHPUnit Testes][] | [Licença][] |

</br>

## Introdução

<h1 align="left">
NBA API REST LARAVELDocumentação da API
</h1>

<p>
Código de API REST para coletar dados externos de outra API, neste caso, estará sendo consumido dados de jogadores, times e jogos da NBA.

Esta API REST utiliza um site de API's (free) para testes, o site para consumo destas informações é o: <b>https://rapidapi.com</b>

Será necessário criar uma conta para poder ter a chave para utilização das API's.

No site existem muitas API's para testes, para esta API estará sendo utilizada a API FREE NBA.

URL da API FREE NBA: <b>https://rapidapi.com/theapiguy/api/free-nba</b>
</p>

</br>

## Requerimentos

	PHP = ^8.1
    Laravel = ^8.0
    Composer = ^2.3

</br>

## Instalação

Clone o repositório

```
git clone https://github.com/marcioezani/NBA-API.git
```

execute o Composer

```
composer install
```

Carregue o Serviço

```
php artisan serve
```

</br>

## Como Configurar

Edite o arquivo .env e defina as seguintes configurações:

```
APP_API_KEY=(key da API FREE NBA)
APP_API_HOST=free-nba.p.rapidapi.com
APP_API_URL=https://free-nba.p.rapidapi.com
```

Gere a nova chave da aplicação

```
php artisan key:generate
```


## Documentação da API
> **Endpoints:** lista de endpoints da API.

Método | Rota | Parâmetros (opcionais) | Descrição
--- | --- | --- | ---
`GET` | `/api/players` | ?page=1&per_page=5 | Ver todos os jogadores
`GET` | `/api/players/:id` | | Ver um único jogador
`GET` | `/api/teams` | ?page=1 | Ver todos os times
`GET` | `/api/teams/:id` | | Ver um único time
`GET` | `/api/games` | ?page=1&per_page=10&team_ids=1&date=2019-06-12 | Ver todos os jogos
`GET` | `/api/games/:id` | | Ver um único jogo

Para ver todos os endpoints da API, execute o comando abaixo em seu terminal


```
php artisan route:list
```

<b>Retornos dos Endpoints</b>

> **Players**

```
GET /api/players
```
```
{
    status: 200,
    status_type: "Ok",
    message: "List of Players",
    data: [
        {
            id: 14,
            first_name: "Ike",
            last_name: "Anigbogu",
            height_feet: null,
            height_inches: null,
            position: "C",
            team: {
                id: 12,
                abbreviation: "IND",
                city: "Indiana",
                conference: "East",
                division: "Central",
                full_name: "Indiana Pacers",
                name: "Pacers"
            }
        },
        ...
    ]
}
```

```
GET /api/players/14
```
```
{
    status: 200,
    status_type: "Ok",
    message: "Players data",
    data: [
        {
            id: 14,
            first_name: "Ike",
            last_name: "Anigbogu",
            height_feet: null,
            height_inches: null,
            position: "C",
            team: {
                id: 12,
                abbreviation: "IND",
                city: "Indiana",
                conference: "East",
                division: "Central",
                full_name: "Indiana Pacers",
                name: "Pacers"
            }
        }
    ]
}
```

> **Teams**
```
GET /api/teams
```
```
{
    status: 200,
    status_type: "Ok",
    message: "List of Teams",
    data: [
        {
            id: 1,
            abbreviation: "ATL",
            city: "Atlanta",
            conference: "East",
            division: "Southeast",
            full_name: "Atlanta Hawks",
            name: "Hawks"
        },
        ...
    ]
}
```

```
GET /api/teams/1
```
```
{
    status: 200,
    status_type: "Ok",
    message: "Teams data",
    data: [
        {
            id: 1,
            abbreviation: "ATL",
            city: "Atlanta",
            conference: "East",
            division: "Southeast",
            full_name: "Atlanta Hawks",
            name: "Hawks"
        }
    ]
}
```

> **Games**

```
GET /api/games
```
```
{
    status: 200,
    status_type: "Ok",
    message: "List of Games",
    data: [
        {
            id: 47179,
            date: "2019-01-30T00:00:00.000Z",
            home_team: {
                id: 2,
                abbreviation: "BOS",
                city: "Boston",
                conference: "East",
                division: "Atlantic",
                full_name: "Boston Celtics",
                name: "Celtics"
            },
            home_team_score: 126,
            period: 4,
            postseason: false,
            season: 2018,
            status: "Final",
            time: " ",
            visitor_team: {
                id: 4,
                abbreviation: "CHA",
                city: "Charlotte",
                conference: "East",
                division: "Southeast",
                full_name: "Charlotte Hornets",
                name: "Hornets"
            },
            visitor_team_score: 94,
        },
        ...
    ]
}
```
```
GET /api/games/47179
```
```
{
    status: 200,
    status_type: "Ok",
    message: "Game data",
    data: [
        {
            id: 47179,
            date: "2019-01-30T00:00:00.000Z",
            home_team: {
                id: 2,
                abbreviation: "BOS",
                city: "Boston",
                conference: "East",
                division: "Atlantic",
                full_name: "Boston Celtics",
                name: "Celtics"
            },
            home_team_score: 126,
            period: 4,
            postseason: false,
            season: 2018,
            status: "Final",
            time: " ",
            visitor_team: {
                id: 4,
                abbreviation: "CHA",
                city: "Charlotte",
                conference: "East",
                division: "Southeast",
                full_name: "Charlotte Hornets",
                name: "Hornets"
            },
            visitor_team_score: 94,
        }
    ]
}
```

<b>Exemplo de retorno de solicitações inválidas ou de erros:</b>
```
{
    status: 404,
    status_type: "Resource not found",
    message: "Resource is not valid or does not exist"
}
```

</br>

## PHPUnit Testes

A API também possui um conjunto de PHPUnit testes automáticos

- Testes de Requests (nos Controllers)
- Testes na feature de Serviço (acesso a API externa)

<b>Execução dos testes</b>


```
php artisan test
```

</br>

## Licença

> Copyright (C) - Marcio Zani.  
**[⬆ voltar ao topo](#introdução)**

[Introdução]:#introdução
[Requerimentos]:#requerimentos
[Instalação]:#instalação
[Como Configurar]:#como-configurar
[Documentação da API]:#documentação-da-api
[PHPUnit Testes]:#phpunit-testes
[Licença]:#licença


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>