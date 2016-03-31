#Zend Framework 2: Fundamentals
=======================

Curso oficial Zend Framework 2: Fundamentals

Ministrado pela [Code.Education]

[Code.Education]: http://sites.code.education/home-code/


###M�dulo 2 Ex.1
------------
- Composer instalado.
- Zend Skeleton App instalado.
- Zend Framework 2 instalado.
- Virtual host configurado para **onlinemarket.work**
- Resultados obtidos no browser acessando via **localhost:8080** (php -S 0.0.0.0:8080) dentro de _public/_

###M�dulo 3 Ex.1
------------
- Event handler attachado ao dispatch em onBootstrap -> Application -> Module.php
- M�todo onDispatch criado, recebe MvcEvent e seta vari�vel 'caterories' para ViewModel
- layout.phtml configurado para exibir em colunas vari�vel 'categories'.

###M�dulo 4 Ex.1
------------
- servico 'categories' implementado no service_manager de module.config.php -> Application com array lista de categorias.
- servico 'categories' chamado no m�todo onDispatch de Application -> Module.php e passado ao ViewModel().
- layout.phtml configurado utilizando ViewHelper htmlList para listar array de categorias.

###M�dulo 5 Ex.1
------------
######Item A
- instalado m�dulo ZendSkeletonModule-master como base para m�dulo Market.
- pastas e arquivos renomeados de acordo instru��es para Market.
- autoload_classmap.php regenerado atrav�s do classmap_generator.php

######Item B
- criado novo m�dulo chamado Search.

######Item C
- instalado ZendDeveloperTools

###M�dulo 6 Ex.1
------------
######Item A
- Criado novo controller ViewController com m�todo indexAction que retorna ViewModel.


######Item B
- Criado novo controller PostController com m�todos setCategories que recebe array $categories e indexAction que retorna ViewModel;
- Criado factory PostControllerFactory com m�todo createService injetando servi�o categories no Controller Post.

######Item C
- Resgatado atrav�s do plugin params()->fromQuery() categories no indexAction da ViewController;
- Criado nova action itemAction na ViewController;
- Resgatado atrav�s do plugin params()->fromQuery() itemId no itemAction do ViewController;
- Adicionado redirect 'plugin redirect()' para rota 'market' em itemAction, caso itemId for vazio.
- FlashMessenger utilizado quando itemId estiver vazio.

######Item D
- Add controller alias 'alt' para market-view-controller

###M�dulo 7 Ex.1
------------
######Item A
- Adicionada rota '/' (homee) no m�dulo market, que sobrescreve do Application.

######Item B
- Adicionada rota '/market/view' (market-view) no m�dulo Market.
- Rota '/market' (market) dessabilitada.

######Item C
- Adicionada rota '/market/post' (market-post) em Market.

######Item D
- Adicionadas rotas filhas para '/market/view' '/main[/:category]' e '/item[/:itemId]'(main/item) em Market.
- Alterada captuda de parametros no View Controller de fromQuery para fromRoute();

######Item E
- Normalizando rotas.

###M�dulo 8 Ex.1
------------
######Item A
- Alterada forma de retorno do indexAction no IndexController de Market para retorna um ViewModel.

######Item B
- Criada novo template invalid.phtml under market/post e setado no indexAction do PostController

######Item C
- HTML escapado usando view helper $this->escapeHtml() em view/index.phtml para variavel category;

######Item D
- Criada view helper `leftLinks` que linka a lista de categorias no layout principal.

###M�dulo 9 Ex.1
------------
- Criada tabela listings

######Item A
- Criada classe PostForm com campos da tabela listings
- Inje��o de categories atrav�s de PostFormFactory
- Inje��o de postForm ao PostController atrav�s da PostControllerFactory
- Adicionado caminho para Post Form no menu top

#####Item B
- Form inclu�do no template post > index.phtml

#####Item C
- Adicionado PostFormFilter com validadores e filtros para formul�rio e PostFormFilterFactory para inje��o de depend�ncia.

#####Item D
- Controller configurado para tratar request post do formul�rio.

#####Item E
- Todos os campos do formulario e filtros inseridos.

###M�dulo 10 Ex.1
------------

######Item A
- Criado pasta Market\src\Market\Model e classe Market\Market ListingsModel tableGateway referente a tabela listings

######Item B
- Criado adapter em config/autoload db.loca.php
- Criada Factory de ListingsTable
- Trait de listingsTable criada com setListingsTable
- Factories das controladoras Index e View criadas para receberem Trait de ListingsTable

######Item C
- Criado m�todo getListingsByCategory na ListingsTable que recebe parametro category na ViewController
- Apresentada lista por categoria na view/index template e organizado em tabela com link para view/item/<id>

######Item D
- Apresentado informa��es detalhadas em view/item/<id>.

######Item E
- Criado novo m�todo em ListingsTable com retorno do �ltimo registro cadastrado de Listings.
- Criado partials de detalhes do item e linkado ao view/item/<id>
- Apresentado na Home o �ltimo item detalhado atrav�s da partials.

######Item F
- Dados inseridos na tabela listings.

######Item G
- Criado tableGateway de world-city-area-codes e injetado no postForm e postFormFilter.

######Item H
- M�dulo de Search habilitado.
- Formulario para dele��o de post criado.

###M�dulo 11 Ex.1
------------

####Zend\Session
- Injetado session/container em PostController
- Criado sess�o que verifica quantidade de tentativas de cadastro de Post.

###M�dulo 11 Ex.2
------------

####Zend\Log
- Injetado Zend\Log com configuracoes de Writer em PostController
- Criado log que registra quando Post foi inserido com sucesso ou inv�lido.

###M�dulo 11 Ex.3
------------

####Zend\Mail
- Injetado FileMail Transport com configuracoes de FileOptions em PostController
- Criado file mail em /data/logs com c�digo de dele��o de novo post inserido.
