# BrasilTecPar

## Funcionamento Back-end
O sistema foi criado em php sem nenhum framework especifico de trabalho utilizando mysql para o banco de dados, nesse caso o funcionamento do sistema se dá da seguinte maneira:

<!--ts-->
<ul>
  <li>Diretório Principal
    <ul>
      <li>App
        <ul>
          <li>Controllers</li> 
          <li>Models</li> 
          <li>Views</li> 
        </ul>
      </li> 
      <li>public
        <ul>
          <li>csv</li>
        </ul>
      </li>
      <li>Vendor
        <ul>
          <li>BF
            <ul>
              <li>Controller</li> 
              <li>Init</li> 
              <li>Model</li> 
            </ul>
          </li> 
        </ul>
      </li> 
    </ul>
  </li>
</ul>
<!--te-->
<h3>Descrição do Funcionamento</h3>
  Na pasta <strong>App</strong> se encontram as pastas do MVC do projeto, a pasta <strong>Views</strong> os arquivos são separados em pastas referentes ao Controller que os chama, por exemplo, o Controller <strong>indexController.php</strong> tem suas view separadas na pasta <strong>Views/index</strong>, e assim para os demais Controllers e Views. Ainda na pasta Views temos também arquivos <strong>.phtml</strong> que não pertencem a nenhum controller específico, de forma que, não ficam em pastas, esses arquivos são os "layouts" das views, esses arquivos que são responsávels pela parte comum de algumas views (css, js, jquery). As demais pastas são <strong>Controllers</strong>, que é o local das controlles dos sistema, e <strong>Models</strong> que é responsavel pelas requisições e manupulações do banco de dados. O arquivo <strong>Route.php</strong> é responsável pela declaração das rotas do sistema, e o <strong>Connection.php</strong> é o responsável pela conexão com o banco de dados.
  <strong>Public</strong> é a pasta raiz do projeto.
  Na pasta <strong>vendor</strong> temos as informações do composer do projeto e também as pastas do funcionamento do projeto. A pasta <strong>vendor/BF</strong> é responsável pelo desenvolvimento de um "framework básico" nela estão contidos a pasta <strong>Controller</strong> que tem o arquivo <strong>Action.php</strong> que facilita o carregamento das views de forma simplificada. Em <strong>Init</strong> o arquivo <strong>Bootstrap.php</strong> é o responsável por simplificar a leitura das rotas do sistema. <strong>Model</strong> temos dois arquivos sendo eles <strong>Container.php</strong> responsável por simplificar o instanciamento dos models pelos controllers, e o <strong>Model.php</strong> que simplifica a utilização da conexão com o banco de dados pelos Models do sistema. *Para esse projeto não foi necessário a utilização de banco de dados, apenas os arquivos csv*
  
 
## Front-end
 Para o front-end foi utilizado o framework bootstrap e um template de <a href="https://bootstraptemple.com/" target="_blank">bootstraptemple</a>
 
## CSV
Para a manipulação dos arquivos CSV foi utilizado o <a href="https://csv.thephpleague.com/9.0/" target="_blank">LeagueCSV</a>
