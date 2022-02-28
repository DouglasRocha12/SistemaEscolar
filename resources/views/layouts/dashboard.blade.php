
<!DOCTYPE html>

<html lang="pt">

<head>
    <!-- Metadados base -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>@yield('title')</title>

    <!-- Dependências necessárias para o Semantic UI -->
    <script src="/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" class="ui" href="/semantic/semantic.min.css">
    <script src="/semantic/semantic.min.js"></script>

    <!-- Seção passível a remoção -->
    <script src="/js/highlight.min.js"></script>
    <script src="/js/docs.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/docs.css">

    <!-- Adiciona seção para o head nas páginas que herdam esta -->
    @yield("head")
</head>

<body id="example" class="@yield("menu")" ontouchstart="">
    <!-- Menu recolhido -->
    <div class="ui vertical inverted sidebar menu left" id="toc">
        @include("layouts.menu")
    </div>

    <!-- Botão de menu flutuante -->
    <div class="ui black big launch right attached fixed button">
        <i class="content icon"></i>
        <span class="text">Menu</span>
    </div>

    <!-- Menu superior -->
    <div class="ui fixed inverted main menu">
        <div class="ui container">
            <a class="launch icon item">
                <i class="content icon"></i>
            </a>
            <div class="item">
               Sistema Escola
            </div>
        </div>
    </div>

    <!-- Início do corpo -->
    <div class="pusher">
        <div class="full height">
            <!-- Menu lateral -->
            <div class="toc" style="height: 100%">
                <div class="ui vertical inverted menu">
                    @include("layouts.menu")
                </div>
            </div>

            <!-- Início do corpo -->
            <div class="article">

                <!-- Conteúdo da página -->
                @yield('content')

                <!-- Rodapé da página -->
                <div class="ui inverted vertical footer segment">
                    <div class="ui container">
                        <div class="ui stackable grid">
                            <div class="three wide column">
                                <h4 class="ui header">Sistema</h4>
                                <div class="ui link list">
                                    <a class="item" href="" target="_blank">Portal</a>
                                    <a class="item" href="" target="_blank">Perguntas frequentes</a>
                                    <a class="item" href="" target="_blank">Contato</a>
                                </div>
                            </div>
                            <div class="three wide column">
                                <h4 class="ui header">Serviços ao cidadão</h4>
                                <div class="ui link list">
                                    <a class="item" href="" target="_blank">Suporte</a>
                                    <a class="item" href="" target="_blank">SAC</a>
                                    <a class="item" href="">Sobre</a>
                                </div>
                            </div>
                            <div class="seven wide right floated column">
                                
                                <div class="ui inverted link list">
                                    <a class="item"
                                        href="">Douglas Rocha</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="/logout" id="logout">
        @csrf
    </form>

    <script>
        window.less = {
            async: true,
            environment: 'production',
            fileAsync: false,
            onReady: false,
            useFileCache: true
        };
    </script>

    <script src="/js/less.min.js"></script>

</body>

</html>
