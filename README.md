
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

Dirigete a

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

...

#### ¿Cómo recibir parametros por GET y POST?

...

#### ¿Cómo iniciar sesión?

...
