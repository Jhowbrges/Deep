<h1>🔐 Auth System - Laravel</h1>

<p>
  Sistema de autenticação desenvolvido com <b>Laravel 12</b>, contendo registro, login, verificação de e-mail,
  atualização de perfil com upload de foto e dashboard com métricas de navegação.
</p>

<hr />

<h2>🚀 Tecnologias Utilizadas</h2>
<ul>
  <li>PHP 8.2</li>
  <li>Laravel 12</li>
  <li>MySQL 8</li>
  <li>Laravel Breeze (Autenticação)</li>
  <li>TailwindCSS</li>
  <li>PHPUnit (Testes automatizados)</li>
</ul>

<hr />

<h2>📌 Funcionalidades</h2>

<h3>🔐 Autenticação</h3>
<ul>
  <li>Cadastro (registro) de usuário</li>
  <li>Login e logout</li>
  <li>Recuperação de senha</li>
  <li>Confirmação de senha</li>
  <li>Verificação de e-mail</li>
</ul>

<h3>👤 Perfil</h3>
<ul>
  <li>Atualização de nome e e-mail</li>
  <li>Alteração de senha (com validação forte)</li>
  <li>Upload de foto de perfil</li>
  <li>Exclusão de conta</li>
</ul>

<h3>📊 Dashboard</h3>
<ul>
  <li>Informações do usuário autenticado</li>
  <li>Métricas de navegação</li>
  <li>Contagem de páginas mais acessadas</li>
  <li>Interface 100% em português (sem termos técnicos desnecessários)</li>
</ul>

<h3>📈 Monitoramento</h3>
<ul>
  <li>Middleware para registrar páginas visitadas</li>
  <li>Armazenamento em banco de dados</li>
  <li>Exibição de estatísticas no dashboard</li>
</ul>

<hr />

<h2>🛠️ Como Rodar o Projeto</h2>

<h3>1️⃣ Clonar o repositório</h3>
<pre><code>git clone https://github.com/Jhowbrges/Deep.git
cd Deep</code></pre>

<h3>2️⃣ Instalar dependências</h3>
<pre><code>composer install
npm install</code></pre>

<h3>3️⃣ Configurar ambiente</h3>
<p>Copie o arquivo de exemplo e edite as credenciais do banco MySQL:</p>
<pre><code>cp .env.example .env</code></pre>

<p>Gerar a chave da aplicação:</p>
<pre><code>php artisan key:generate</code></pre>

<h3>4️⃣ Rodar migrations</h3>
<pre><code>php artisan migrate</code></pre>

<h3>5️⃣ Rodar o projeto</h3>
<pre><code>npm run dev
php artisan serve</code></pre>

<p>Acesse:</p>
<pre><code>http://127.0.0.1:8000</code></pre>

<hr />

<h2>🧪 Testes Automatizados</h2>

<p>O projeto possui testes para os fluxos principais:</p>
<ul>
  <li>Autenticação</li>
  <li>Cadastro</li>
  <li>Verificação de e-mail</li>
  <li>Recuperação e alteração de senha</li>
  <li>Atualização de perfil</li>
  <li>Exclusão de conta</li>
</ul>

<p>Rodar testes:</p>
<pre><code>php artisan test</code></pre>

<hr />

<h2>🗄️ Banco de Dados</h2>

<p><b>Banco utilizado:</b> MySQL</p>

<p><b>Principais tabelas:</b></p>
<ul>
  <li><code>users</code> (usuários)</li>
  <li><code>page_views</code> (registros de navegação)</li>
  <li><code>sessions</code> (sessões)</li>
  <li><code>password_reset_tokens</code> (tokens de reset)</li>
</ul>

<hr />

<h2>🔒 Segurança</h2>
<ul>
  <li>Senhas armazenadas com hash</li>
  <li>Validação forte para troca de senha</li>
  <li>Proteção CSRF</li>
  <li>Rotas protegidas por autenticação</li>
  <li>Verificação de e-mail suportada</li>
</ul>

<hr />

<h2>📎 Decisões Técnicas</h2>
<ul>
  <li>Uso do Breeze para manter padrão Laravel e acelerar setup</li>
  <li>Middleware para rastrear acessos e alimentar métricas do dashboard</li>
  <li>Validações isoladas com <code>FormRequest</code></li>
  <li>Upload de foto persistido com disco <code>public</code></li>
</ul>

<hr />

<h2>📌 Próximas Melhorias</h2>
<ul>
  <li>Adicionar níveis de acesso (perfis/roles)</li>
  <li>Adicionar gráficos mais avançados (ex: Chart.js)</li>
  <li>Paginação e filtros nas métricas</li>
  <li>Exportação de relatórios (CSV/PDF)</li>
  <li>Pipeline CI para rodar testes automaticamente no GitHub</li>
</ul>

<hr />

<h2>👨‍💻 Autor</h2>
<p>
  Desenvolvido por <b>Jhonatan Borges</b>.
</p>
