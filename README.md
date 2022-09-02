
# MVC BASE

Una base para proyectos con patrón MVC.
Este es mi primer proyecto en PHP puro v7.4.



## Cuenta con:

- Controladores
- Modelos
- Enrutador
- Autoload de paquetes de composer
- Bower Components


## Correlo localmente

Clona el proyecto

```bash
  git clone https://github.com/zahovicS/mvc-base
```
Dirigete a XAMPP/Laragon o el servidor que uses e inicialo (Apache y MySQL) y dirigete a http://localhost/mvc-base/
## FAQ

#### ¿Cómo personalizar nombre del proyecto y la conexion a la base de datos?

Dirigete al archivo

```bash
    mvc-base/App/Configs/Variables.php
```
Y edita las lineas que digan "mvc-base" por el nombre que quieras y los demas datos de la base de datos.
```php
define('BASE_URL', 'http://localhost/mvc-base');
define('URI_PROJECT', '/mvc-base');
define('DB_SERVER', 'localhost'); 
define('DB_NAME', 'dbsistema'); 
define('DB_PORT', 3306); 
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASS', 'root');
```
Luego dirigirse a 

```bash
    mvc-base/public/.htaccess
```
Edita la linea de "mvc-base" por el nombre que pusiste antes.
```bash
    RewriteBase /mvc-base/public
```
#### ¿Cómo crear una vista?

Crea un nuevo archivo en la carpeta de resources/views por ejemplo "MyView.php"

```bash
    mvc-base/resources/views/MyView.php
```

#### ¿Cómo crear un controlador?

Crea un nuevo archivo en la carpeta de controlador por ejemplo "MyController.php"

```bash
    mvc-base/App/Controllers/MyController.php
```
Hereda la clase Controller
```php
<?php
class MyController extends Controller
{
    public function __construct()
    {
        //code init here
    }
}
```
#### ¿Cómo crear un modelo?

Crea un nuevo archivo en la carpeta de modelos por ejemplo "MyModel.php"

```bash
    mvc-base/App/Models/MyModel.php
```
Hereda la clase Model y agrega el nombre de la tabla en la base de datos
```php
<?php
class MyModel extends Model
{
    public function __construct()
    {
        $this->table = "nombre_de_la_tabla";
        //code init here
    }
}
```

#### ¿Cómo instanciar un modelo o controlador?

Dentro del constructor de un controlador podemos instanciar varios modelos/controladores,
ambos archivos deben existir en sus respectivas carpetas y no deben tener el mismo nombre.
```php
<?php
class MyController extends Controller
{
    public function __construct()
    {
        $this->MyOtherController = $this->controller("OterController");
        $this->MyOtherModel = $this->model("otherModel");
    }
}
```
#### ¿Cómo crear rutas?
Dirige al archivo

```bash
    mvc-base/App/Kernel.php
```
y empieza a agregar tus rutas:

```php
<?php
$router->get('/rutaGET', Login::class . "::index"); //ruta GET de la raiz de proyecto
$router->post('/rutaPOST', Login::class . "::logout"); //ruta POST de cierre de sesión
```
Estructura:

```php
<?php
#Instancia de la clase Router
$router = new Router();
#RUTA GET al que le podemos enviar parametros por GET al metodo
#dentro del Controlador Login
      # Tipo - ruta - Controlador -  metodo
$router->get('/', Login::class . "::index");
#Ejemplo:
$router->get('/blog', Blog::class . "::indexBlog");
$router->post('/subscribe', Blog::class . "::subscribe");

```

#### ¿Cómo recibir parametros por GET y POST?
Una vez crearmos nuestras rutas en el archivo de Kernel.php creamos el metodo en el controlador.

Todos los parametros que enviamos por GET o POST se van a enviar como un objeto, a excepcion
$_FILES que se envia como array.
```php
<?php

class Blog extends Controller
{
    public function __construct()
    {
        //code init and models here
    }
    public function blog($request)
    {
        //index of your blog
        //use dd for debug
        //rute GET
        dd($request);
    }
    public function subcribe($request)
    {
        //method for subscribe a user
        //use dd for debug
        //rute POST
        dd($request);
    }
}
```

#### ¿Cómo iniciar sesión?

Editar User.php dentro de Models.
cambiar el valor de "$this->table" al nombre de la tabla de tu base de datos que guarde tus usuarios,
puedes cambiar la forma en la que se confirma su login este metodo es para pruebas.

```php
<?php
class User extends Model
{
    public function __construct()
    {
        $this->table = "usuario"; 
        parent::__construct();
    }

    public function confirm_login(string $email, string $pass): array
    {
        $email = $this->clear_inputs_html($email);
        $pass = $this->clear_inputs_html($pass);
        $response = ["status" => false, "data" => null];
        $this->db->query("SELECT * FROM usuario WHERE email=:email AND del_status = 'Live' LIMIT 1");
        $this->db->bind(":email", $email);
        $res = $this->db->fetch();
        if (password_verify($pass, $res->clave)) {
            $response = ["status" => true, "data" => $res];
        }
        return $response;
    }
}
```

#### ¿Cómo renderizar una vista?

Utiliza el metodo herado llamado view de la clase Controller.
```php
<?php

public function index()
{
    $this->view("view", []);
    #El primer parametro es la ruta de la vista
    #Esto entrará a la carpeta "resources/views" en la raiz del proyecto
    #Si tu archivo es solo un archivo suelto en la raiz de views
    #solo especifica el nombre:
    $this->view("index", []);
    #Si está en una carpeta agrega "." para entrar a una carpeta y especificar el archivo
    $this->view("login.index", [], false);
    
    #El segundo parametro es la data que se enviará a la ruta y debe ser un array
    $this->view("login.index", ["title"=>"Vista de login"], false);

    #El tercer parametro es la renderización de la vista, por defectro TRUE
    #TRUE renderiza la vista con las porciones de header/scripts/footer dentro de la
    $this->view("dashboard.index", ["title"=>"Dashboard"], true);
    #carpeta "resources/views/layouts/"
    #FALSE solo renderiza la vista sin las porciones de header/scripts/footer
    $this->view("login.index", ["title"=>"Vista de login"], false);

    #Existe un cuarto parametro que sirve para la renderización de PDF usando DomPDF,
    #el tercer parametro debe ser FALSE  y el cuarto debe ser TRUE
    #por defecto el cuarto parametro es FALSE
    public function report($name)
    {
        $dompdf = new Dompdf();
        $user = $this->User->all();
        $html = $this->view('reports.pdf.reporte_ventas', ["name" => $name, 'user' => $user], false, true);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'protrait');
        $dompdf->render();
        $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
        exit(0);
    }
}
```

## FIN?

Eres libre de modificar todo el código a tu gusto.
Explora todo el proyecto, la mayoria dentro de App/Libs ;p
