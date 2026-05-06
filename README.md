
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

---

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
=======
# Alugai
