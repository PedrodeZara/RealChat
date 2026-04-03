# RealChat - Fullstack Web System
Versão: 0.1.4

Sistema web para gerenciamento de contatos e troca de mensagens entre usuários, desenvolvido com PHP e MySQL, com ambiente totalmente containerizado utilizando Docker.
O RealChat é uma aplicação backend que simula um sistema de comunicação entre usuários, permitindo o gerenciamento de contatos e envio de mensagens. O projeto foi estruturado com foco em organização de código, integração com banco de dados e execução em ambiente isolado com Docker.

---

## Funcionalidades

* Cadastro de usuários
* Gerenciamento de contatos
* Associação de categorias aos contatos
* Envio de mensagens entre usuários
* Banco de dados relacional com integridade referencial

---

## Tecnologias utilizadas

* PHP
* MySQL
* Docker
* Docker Compose
* JavaScript 
* Node.js

---

## Estrutura do projeto

```bash
├── data/
├── node_modules/
├── src/
├── public/
├── Dockerfile
├── docker-compose.yml
├── init.sql
├── package.json
```

---

## Como executar o projeto

### 1. Subir o ambiente

```bash

docker-compose up --build
```

---

### 2. Acessar a aplicação

```bash

http://localhost:5173
```

---

## Banco de dados

O banco é criado automaticamente ao iniciar o container, com dados de teste incluídos.

### Dados iniciais:

* Usuários cadastrados
* Contatos vinculados
* Mensagens de exemplo

---

## Objetivo do projeto

Este projeto foi desenvolvido com o objetivo de praticar desenvolvimento backend com PHP, modelagem de banco de dados relacional e utilização de Docker para criação de ambientes reproduzíveis.

---

## Status do projeto

Em desenvolvimento

---

## Próximas melhorias

* Implementar separação de mensagens entre usuários (chat individual)
* Melhorar lógica de exibição de conversas
* Criar sistema de autenticação de usuários
* Evoluir estrutura da API para padrão REST
* Desenvolver interface completa em React
* Refinar organização do backend (arquitetura MVC)
