# trabalho_semestral

Instação PHP + PostgreSql


                          **PHP - Windows**
                          
**1.** Baixar o XAMPP https://www.apachefriends.org/pt_br/download.html

**2** - Na tela de instalação, você pode escolher quais componentes deseja instalar. Normalmente, Apache, MySQL e PHP são selecionados por padrão. Selecione os que você precisa e clique em "Next".

**3** - Escolha o diretório onde o XAMPP será instalado (o padrão é C:\xampp). Clique em "Next".

**4** - Clique em "Next" novamente e, em seguida, clique em "Install" para iniciar a instalação.

**5** - Após a instalação ser concluída, você pode optar por iniciar o painel de controle do XAMPP imediatamente. Clique em "Finish".

**6** - Abra o XAMPP Control Panel (Painel de Controle do XAMPP) e clique em "Start" ao lado de "Apache" e "MySQL" para iniciar os serviços.

**7** - Testar a instalação: http://localhost/dashboard

**8** - O projeto deve ser instalado no diretório: C:\xampp\htdocs



                          **PostgreSql - Windows**
**1.** Instalar o PostgreSql https://www.postgresql.org/download/

**2.** Criar um banco padrão. Usuário: postgres . Senha: admin

                         ** Habilitando Posgresql no php   **                       
**1 -** Abra o arquivo de configuração do PHP. No XAMPP, geralmente está localizado em C:\xampp\php\php.ini.
**2 -** Encontre as seguintes linhas e remova o ponto e vírgula (;) no início para descomentar as extensões:
;extension=pdo_pgsql
;extension=pgsql

**3** - As linhas devem ficar assim:
extension=pdo_pgsql
extension=pgsql

**4 -** Salve o arquivo e reinicie o servidor Apache no painel de controle do XAMPP.

Para Usar o projeto, rodar o script "script.sql" no postgresql através do pgAdmin
   
