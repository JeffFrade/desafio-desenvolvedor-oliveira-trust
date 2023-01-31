# Teste Oliveira Trust (Backend)
---

Nessa parte do repositório, encontra-se a parte de backend do teste, uma `API` rest.
A documentação foi feita via `Postman` e encontra-se na pasta acima dessa.
Para execução do projeto, foi desenvolvido um `Docker` e abaixo será explicado como o fazer funcionar.

## Execução da API
---
- Rodar o `sh config.sh` na raiz do projeto.
- Configurar os dados de e-mail no `.env`
- Não alterar `DOCKER_NGINX_PORT` no `.env`, senão o frontend não irá funcionar.

## Futuras Melhorias
---
- Registro de usuários.
- Implementação de Login utilizando `JWT`.
- Separação das cotações por usuário.
- Refatoração da lógica do método de armazenamento de cotações.
- Painel administrativo para gerenciar o sistema.
- Criação de casos de teste.
