# Sistema de Lista de Cursos Online

Este projeto é um sistema simples de catálogo online dinâmico, onde os usuários podem visualizar cursos cadastrados, filtrar cursos por categoria e ter acesso a uma área restrita onde é possível adicionar novos cursos ao catálogo.

## Funcionalidades

1. **Página Inicial (`index.php`)**: Exibe os cursos cadastrados, percorrendo um array de cursos e mostrando cada curso com imagem, título e categoria. Cada curso tem um botão "Ver mais" que leva a uma página de detalhes.

2. **Página de Detalhes (`detalhes.php`)**: Exibe informações completas sobre o curso clicado, passando um identificador via `GET`.

3. **Filtro de Cursos (`filtrar.php`)**: Um formulário `GET` que permite filtrar os cursos por categoria.

4. **Página de Login (`login.php`)**: Formulário `POST` que valida nome de usuário e senha fixos (armazenados com hash). Se os dados forem válidos, uma sessão é iniciada, permitindo o acesso à área restrita.

5. **Área Protegida (`protegido.php`)**: Acesso restrito, disponível apenas para usuários logados. Caso a sessão não esteja ativa, o usuário é redirecionado para a página de login.

6. **Cadastro de Cursos**: Dentro da página protegida, o usuário pode cadastrar novos cursos via formulário `POST`. Esses cursos são armazenados na sessão e imediatamente exibidos na lista principal.

## Estrutura do Projeto

- **`index.php`**: Página inicial com listagem dos cursos.
- **`detalhes.php`**: Página de detalhes de cada curso.
- **`filtrar.php`**: Página para filtrar cursos por categoria.
- **`login.php`**: Página de login para autenticação de usuários.
- **`protegido.php`**: Página restrita, acessível somente para usuários logados.
- **`salvar_curso.php`**: Página para salvar novos cursos na sessão.
- **`usuarios.json`**: Arquivo contendo usuários e senhas (armazenados com hash).

## Como Rodar o Projeto

### Requisitos

- Um servidor local (como XAMPP ou WAMP) para rodar o PHP.
- Habilitar o suporte a sessões no PHP.

### Passos para Executar

1. Clone o repositório ou baixe os arquivos.

   ```bash
   git clone https://github.com/seuusuario/lista-cursos-online.git
