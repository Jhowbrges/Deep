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
  <li>Laravel Breeze (autenticação)</li>
  <li>TailwindCSS</li>
  <li>PHPUnit (testes automatizados)</li>
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

<h2>🛠️ Como Rodar o Projeto (Passo a Passo)</h2>

<h3>1️⃣ Clonar o repositório</h3>
<pre><code>git clone https://github.com/Jhowbrges/Deep.git
cd Deep</code></pre>

<h3>2️⃣ Instalar dependências</h3>
<pre><code>composer install
npm install</code></pre>

<hr />

<h2>🗄️ Banco de Dados (Produção / Desenvolvimento)</h2>

<p>
  O projeto utiliza <b>MySQL</b>. Abaixo estão os passos para criar o banco e o usuário,
  e depois criar as tabelas do sistema via migrations.
</p>

<h3>3️⃣ Criar o banco principal (schema)</h3>
<pre><code>CREATE DATABASE IF NOT EXISTS projeto_auth
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;</code></pre>

<h3>4️⃣ Criar usuário e permissões (se necessário)</h3>
<p>
  Caso você esteja usando um usuário dedicado (ex: <code>projeto_auth</code>),
  crie e conceda permissões:
</p>

<pre><code>CREATE USER IF NOT EXISTS 'projeto_auth'@'localhost' IDENTIFIED BY 'SenhaForte123!';
CREATE USER IF NOT EXISTS 'projeto_auth'@'127.0.0.1' IDENTIFIED BY 'SenhaForte123!';

GRANT ALL PRIVILEGES ON projeto_auth.* TO 'projeto_auth'@'localhost';
GRANT ALL PRIVILEGES ON projeto_auth.* TO 'projeto_auth'@'127.0.0.1';

FLUSH PRIVILEGES;</code></pre>

<p>
  <b>Dica:</b> se você não conseguir criar usuário/permissões com seu usuário do Linux,
  entre no MySQL como administrador:
</p>
<pre><code>sudo mysql</code></pre>

<h3>5️⃣ Configurar o .env (produção/desenvolvimento)</h3>
<p>Copie o arquivo de exemplo e edite as credenciais do MySQL:</p>
<pre><code>cp .env.example .env</code></pre>

<p>Gerar a chave da aplicação:</p>
<pre><code>php artisan key:generate</code></pre>

<h3>6️⃣ Criar as tabelas do sistema (migrations)</h3>
<pre><code>php artisan migrate</code></pre>

<p>
  Esse comando cria as tabelas necessárias do sistema (ex: usuários, sessões, cache, jobs e page views)
  de acordo com as migrations do projeto.
</p>

<hr />

<h2>▶️ Rodar o Projeto</h2>

<h3>7️⃣ Subir o front e o servidor</h3>
<pre><code>npm run dev
php artisan serve</code></pre>

<p>Acesse:</p>
<pre><code>http://127.0.0.1:8000</code></pre>

<hr />

<h2>🧪 Testes Automatizados (Banco de Teste Separado)</h2>

<p>
  Para garantir isolamento, os testes rodam usando um <b>banco de dados separado</b>:
  <code>projeto_auth_test</code>, configurado no arquivo <code>.env.testing</code>.
</p>

<h3>8️⃣ Criar o banco de testes (schema)</h3>
<pre><code>CREATE DATABASE IF NOT EXISTS projeto_auth_test
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;</code></pre>

<h3>9️⃣ Permissões do usuário no banco de testes</h3>
<pre><code>GRANT ALL PRIVILEGES ON projeto_auth_test.* TO 'projeto_auth'@'localhost';
GRANT ALL PRIVILEGES ON projeto_auth_test.* TO 'projeto_auth'@'127.0.0.1';

FLUSH PRIVILEGES;</code></pre>

<h3>🔟 Configurar o .env.testing</h3>
<p>
  Crie/edite o arquivo <code>.env.testing</code> com as credenciais do banco de testes:
</p>

<pre><code>APP_ENV=testing

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projeto_auth_test
DB_USERNAME=projeto_auth
DB_PASSWORD=SenhaForte123!

CACHE_STORE=array
QUEUE_CONNECTION=sync
SESSION_DRIVER=array
MAIL_MAILER=array</code></pre>

<h3>1️⃣1️⃣ Importante: phpunit.xml não pode forçar SQLite</h3>
<p>
  Se o <code>phpunit.xml</code> estiver com:
</p>

<pre><code>&lt;env name="DB_CONNECTION" value="sqlite"/&gt;
&lt;env name="DB_DATABASE" value=":memory:"/&gt;</code></pre>

<p>
  O <code>.env.testing</code> será ignorado e os testes vão falhar.
  Ajuste/remova essas linhas para usar MySQL.
</p>

<h3>1️⃣2️⃣ Criar as tabelas no banco de testes e rodar os testes</h3>
<pre><code>php artisan optimize:clear
php artisan migrate:fresh --env=testing
php artisan test</code></pre>

<p>Os testes cobrem:</p>
<ul>
  <li>Autenticação</li>
  <li>Cadastro</li>
  <li>Verificação de e-mail</li>
  <li>Recuperação e alteração de senha</li>
  <li>Atualização de perfil</li>
  <li>Exclusão de conta</li>
</ul>

<hr />

<h2>🗂️ Estrutura do Banco (resumo)</h2>

<p><b>Banco:</b> MySQL</p>
<p><b>Tabelas principais:</b></p>
<ul>
  <li><code>users</code> (usuários)</li>
  <li><code>page_views</code> (registros de navegação)</li>
  <li><code>sessions</code> (sessões)</li>
  <li><code>password_reset_tokens</code> (tokens de recuperação)</li>
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
  <li>Banco de testes separado para evitar afetar dados do ambiente local</li>
</ul>

<hr />

<h2>👨‍💻 Autor</h2>
<p>
  Desenvolvido por <b>Jhonatan Borges</b>.
</p>
