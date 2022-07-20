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
