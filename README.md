<<<<<<< HEAD
# 🔧 Aluga-ai

> Plataforma de aluguel de itens entre pessoas — conectando quem tem com quem precisa.

O Aluga-ai é uma startup que permite que qualquer pessoa cadastre ferramentas, utensílios e equipamentos para alugar, e que outras pessoas encontrem esses itens por categoria perto de si. Simples, rápido e sem burocracia.

---

## ✨ Funcionalidades

- **Catálogo público** de itens organizados por categoria (Cozinha, Marcenaria, Informática)
- **Cadastro e login de usuários** com senhas protegidas via `password_hash`
- **Dashboard do usuário** — cadastre, edite e apague seus próprios itens
- **Painel administrativo** — controle total dos itens da plataforma
- **Localização** — mapa integrado via Google Maps API para encontrar itens perto de você

---

## 🗂️ Estrutura do Projeto

```
aluga-ai/
├── index.php               # Página inicial com catálogo e mapa
├── login.php               # Login de usuários
├── register.php            # Cadastro de novos usuários
├── logout.php              # Encerramento de sessão
├── dashboard.php           # Área do usuário (meus itens)
├── cadastro_item.php       # Formulário para cadastrar item
├── cozinha.php             # Catálogo — categoria Cozinha
├── marcenaria.php          # Catálogo — categoria Marcenaria
├── informatica.php         # Catálogo — categoria Informática
├── admin_login.php         # Login do administrador
├── admin_dashboard.php     # Painel de administração
├── admin_logout.php        # Logout do administrador
├── db.php                  # Conexão com o banco (usa variáveis de ambiente)
├── schema.sql              # Script de criação do banco de dados
├── style.css               # Estilos das páginas públicas
├── style_login_dashboard.css  # Estilos do painel e autenticação
├── .env.example            # Modelo de variáveis de ambiente
├── .gitignore              # Arquivos ignorados pelo Git
└── img/                    # Imagens do catálogo
```

---

## 🚀 Como rodar localmente

### Pré-requisitos

- PHP 8.0+
- MySQL 5.7+ ou MariaDB
- Servidor local: [XAMPP](https://www.apachefriends.org/), [Laragon](https://laragon.org/) ou similar

### Passo a passo

1. **Clone o repositório**
   ```bash
   git clone https://github.com/seu-usuario/aluga-ai.git
   cd aluga-ai
   ```

2. **Configure o banco de dados**
   ```bash
   # Acesse o MySQL e execute o schema
   mysql -u root -p < schema.sql
   ```

3. **Configure as variáveis de ambiente**
   ```bash
   cp .env.example .env
   # Edite o .env com suas credenciais
   ```

4. **Inicie o servidor local**

   Coloque a pasta do projeto dentro de `htdocs/` (XAMPP) ou `www/` (Laragon) e acesse:
   ```
   http://localhost/aluga-ai
   ```

---

## ☁️ Deploy no Render

O Render suporta PHP via Docker. Siga os passos abaixo:

### 1. Crie o banco de dados

No painel do Render, crie um serviço **MySQL** (ou use o [PlanetScale](https://planetscale.com/) / [Railway](https://railway.app/) que oferecem MySQL gratuito). Anote as credenciais geradas.

### 2. Configure as variáveis de ambiente no Render

No painel do seu Web Service → **Environment** → adicione:

| Variável   | Valor                        |
|------------|------------------------------|
| `DB_HOST`  | host fornecido pelo serviço  |
| `DB_USER`  | usuário do banco             |
| `DB_PASS`  | senha do banco               |
| `DB_NAME`  | `alugai`                     |

### 3. Crie o `Dockerfile` na raiz do projeto

```dockerfile
FROM php:8.2-apache

# Habilita extensão mysqli
RUN docker-php-ext-install mysqli

# Copia os arquivos do projeto
COPY . /var/www/html/

# Permissões
RUN chown -R www-data:www-data /var/www/html
```

### 4. Suba para o GitHub e conecte ao Render

- No Render, crie um **Web Service**
- Conecte seu repositório GitHub
- Em **Runtime**, selecione **Docker**
- Clique em **Deploy**

### 5. Popule o banco

Após o deploy, execute o `schema.sql` no banco remoto usando qualquer cliente MySQL (TablePlus, DBeaver, ou via terminal com as credenciais do Render).

---

## 🔒 Segurança

- Senhas armazenadas com `password_hash()` — nunca em texto puro
- Queries com `prepared statements` — protegido contra SQL Injection
- Credenciais do banco em variáveis de ambiente — nunca no código
- Validação de categoria via `in_array()` no servidor
- Itens só podem ser editados/apagados pelo próprio dono

---

## 🛣️ Próximos passos

- [ ] Upload de foto para os itens
- [ ] Sistema de reserva com datas
- [ ] Chat entre locador e locatário
- [ ] Avaliações e comentários
- [ ] Pagamento integrado (Stripe / Mercado Pago)
- [ ] Filtro por localização geográfica real

---

## 🧑‍💻 Tecnologias

| Camada     | Tecnologia                     |
|------------|-------------------------------|
| Back-end   | PHP 8+                        |
| Banco      | MySQL / MariaDB               |
| Front-end  | Bootstrap 5, HTML5, CSS3      |
| Mapas      | Google Maps JavaScript API    |
| Ícones     | Font Awesome 6                |

---

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
=======
# Alugai
>>>>>>> 380c04207a3201c537ccdeb0ddc419c1a3ed70c5
