# Mapa Cultural do Ceará
Repositório para deploy do Mapa Cultural do Ceará

## Estrutura de arquivos
- **start.sh** - inicializa o ambiente de produçao/staging
- **restart.sh** - reinicializa o ambiente de produçao/staging
- **stop.sh** - desliga o ambiente de produçao/staging
- **update.sh** - atualiza o ambiente de produção
- **logs.sh** - exibe o output do docker-composer de produção, para visualização dos logs
- **bash.sh** - acessa o terminal do container do Mapas
- **psql.sh** - acessa o console psql do banco de dados
- **init-letsencrypt.sh** - script para auxiliar a instalação do let's encrypt
- **compose/** - arquivos de configuração e outros utilizados pelo docker-compose
    - **common/** - arquivos comuns aos ambientes de desenvolvimento e produção
    - **local/** - arquivos exclusivamente para o ambiente de desenvolvimento
    - **production/** - arquivos exclusivamente para o ambiente de produção
- **dev-scripts/** - scripts auxiliares para o desenvolvimento
    - **start-dev.sh** - script que inicializa o ambiente de desenvolvimento
    - **bash.sh** - entra no container da aplicação
    - **shell.sh** - entra no shell do mapas culturais
    - **psql.sh** - entra no banco de dados da aplicação
    - **docker-compose.local.yml** - arquivo de definição do docker-compose utilizado pelos scripts acima
- **plugins/** - pasta com os plugins utilizados
- **themes/** - pasta com os temas utilizadosoutros temas

## Clonando o repositório
Utilize a opção `--recursive` no clone, como no exemplo abaixo:
```SH
$ git clone git@github.com:secultce/mapacultural --recursive
```

## Ambiente de desenvolvimento

### Iniciando o ambiente de desenvolvimento
Para subir o ambiente de desenvolvimento basta entrar na pasta `dev-scripts` e rodar o script `start-dev.sh`.

```SH
mapacultural/dev-scripts/$ sudo ./start-dev.sh
```

acesse no seu navegador http://localhost/

### psysh
Este ambiente roda com o built-in web server do PHP, o que possibilita que seja utilizado o [PsySH](https://psysh.org/]), um console interativo para debug e desenvolvimento. 

no lugar desejado, adicione a linha `eval(\psy\sh());` e você obterá um console. `Ctrl + D` para continuar a execução do código.

### Parando o ambiente de desenvolvimento
Para parar o ambiente de desenvolvimento usar as teclas `Ctrl + C`

### Usuário super administrador da rede
O banco de dados inicial inclui um usuário de role `saasSuperAdmin` de **id** `1` e **email** `Admin@local`.
Este usuário possui permissão de criar, modificar e deletar qualquer objeto do banco.

- **email**: `Admin@local`
- **senha**: `mapas123`

## Ambiente de produção
Para subir o ambiente de produção é necessário criar o arquivo `.env` baseado no arquivo `.env_sample`.

### Obs para os plugins

Uns plugins usam pacotes de terceiros e usam o composer para instalar as suas dependências então deve seguir os seguintes passos para atualizar a pasta vendor.

-  Acessar o container com ./bash.sh
-  Acessar a pasta dos plugins no seguinte caminho, basta digitar  `cd protected/application/plugins`
-  Plugins que precisam de atualização (AldirBlanc, EvaluationMethodSeplag, RegistrationPaymentsAuxilio, Report, SendEmailUser)
-  Se houver a necessidade devido algumas extensões no plugin Report, pode rodar o comando `composer update --ignore-platform-req=ext-gd --ignore-platform-req=ext-dom --ignore-platform-req=ext-simplexml --ignore-platform-req=ext-xml --ignore-platform-req=ext-xmlreader --ignore-platform-req=ext-xmlwriter  --ignore-platform-req=ext-zip --ignore-platform-req=ext-mbstring`
- Se precisar instalar o php pode seguir a seguinte [instalação](https://sempreupdate.com.br/instalar-versoes-diferentes-php-7-2-7-3-7-4-8-0-no-ubuntu/) e ou alterar a versão na seguinte [instalação](https://wallacemaxters.com.br/blog/82/como-trocar-a-versao-do-php-utilizada-no-terminal-no-ubuntu)

### Obs para usar ambiente produção em localhost

No arquivo **docker-compose.yml**, na base do projeto, modificar as linhas 7 e 8 dentro de:

services:
   web:
      image: hacklab/mapasculturais-nginx:latest
      restart: always
      volumes:
         - /files/public-files:/var/www/html/files  MUDAR para - ./docker-data/public-files:/var/www/html/files
         - /files/assets:/var/www/html/assets       MUDAR para - /docker-data/assets:/var/www/html/assets

e dentro de, ainda no arquivo **docker-compose.yml** :

mapasculturais:
      env_file:
         - .env
      build:
         context: ./core
         dockerfile: ./Dockerfile
      restart: always
      ports:
         - '9000:9000'
      volumes:
         - /files/assets:/var/www/html/assets   MUDAR para   - ./docker-data/assets:/var/www/html/assets
         - /files/public-files:/var/www/html/files   MUDAR para  - ./docker-data/public-files:/var/www/html/files
         - /files/private-files:/var/www/private-files   MUDAR para  - ./docker-data/private-files:/var/www/private-files
         - /files/saas-files:/var/www/SaaS    MUDAR para  - ./docker-data/saas-files:/var/www/SaaS

Mudar a porta 5438 para 5432 dentro db na linha 93 em **docker-compose.yml** e também no arquivo **entrypoint.sh** :

no **docker-compose.yml**
ports:
         - '5438:5432'

no **entrypoint.sh** dentro da linha abaixo na posição "port"
$pdo = new PDO("pgsql:host={$dbhost};port=5432;dbname={$dbname};user={$dbuser};password={$dbpass}");

na linha 96, ainda dentro de db nos volumes:

volumes:
         - postgres-data:/var/lib/postgresql/data  MUDAR para   - ./docker-data/db-data:/var/lib/postgresql/data

e por fim, criar arquivo .env com os dados fornecidos