<?php
// esta es mi clase global
class Database
{
    // esto tendra nuestra coneccion
    private static $connection;

    private static function connect() // con esto nos conectamos a la base 
    {
        // datos de la conexion
        $server = "localhost"; // el nombre del servidor
        $database = "grandevent"; // el nombre de la base, NO EL DEL SCRIPT
        $username = "root"; // Con root tenemos acceso a todas las bases de datos de phpmyadmin
        $password = ""; // no tiene clave
        // PDO es un controlador que nos permite conectarnos a una base de datos MySQL mediante una interfaz de objetos de datos
        // MYSQL_ATTR_INIT_COMMAND esta es la cadena de conexion a la base
        // set names utf8 no permite ingresar caracteres especiales por ejemplo ñ, asi no dara error al ingresarlos
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8");
        // iniciamos nuestra coneccion
        self::$connection = null;
        // intentamos conectarnos
        try
        {
            // utilizamos la cadena de conexion mencionada anteriormente
            // recibira los datos establecios al inicio, server, usuario, base, clave
            self::$connection = new PDO("mysql:host=".$server."; dbname=".$database, $username, $password, $options);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        // si hay algun error lo capturamos de manera que obtengamos el error de forma un poco clara
        catch(PDOException $exception)
        {
            // Usamos die porque nos devolvera un mensaje de error
            // exit no lo hace
            die($exception->getMessage());
        }
    }

    private static function desconnect()
    {
        // aqui seteamos la coneccion para cerrarla
        self::$connection = null;
    }

    public static function executeRow($query, $values)
    {
        // al momento de usar los dato de la base usamos select, insert, update o delete
        // con esta funcion podemos ejecutar nuestras consultas
        self::connect();
        $statement = self::$connection->prepare($query);
        $statement->execute($values);
        // cuando se termina la ejecucion, la coneccion se cierra
        // haya sido exitosa o no la consulta ejecutada
        self::desconnect();
    }

    // esto lo usamos en el login, ya que solo necesitamos un registro en especifico
    public static function getRow($query, $values)
    {
        // iniciamos la coneccion a la base
        self::connect();
        // con esto obtenemos UN VALOR EN ESPECIFICO de las tablas en la base de datos
        $statement = self::$connection->prepare($query);
        $statement->execute($values);
        // al traerlos la coneccion se cierra
        self::desconnect();
        // pero siempre retornamos nuestro dato
        // FETCH_BOTH nos ayuda a devolver los que necesitamos
        return $statement->fetch(PDO::FETCH_BOTH);
    }

    // esto lo usamos para mostrar varios registros
    public static function getRows($query, $values)
    {
        // iniciamos la coneccion a la base
        self::connect();
        // con esto obtenemos los valores de las tablas en la base de datos
        $statement = self::$connection->prepare($query);
        $statement->execute($values);
        // cerramos la coneccion
        self::desconnect();
        // FETCH_BOTH nos ayuda a devolver los que necesitamos
        return $statement->fetchAll(PDO::FETCH_BOTH);
    }
}
?>