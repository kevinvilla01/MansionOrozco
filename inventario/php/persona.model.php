<?php
require_once 'connection.php';

class Persona extends Connection
{
    public static function mostrarDatos()
    {
        try{
            $sql = "SELECT * FROM USUARIOS";
            $stmt = Connection::get_Connection()->prepare($sql);
            $stmt -> execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch(PDOException $th){
            echo $th->getMessage();
        }
    }
    public static function obtenerDatoID($id)
    {
        try{
            $sql = "SELECT * FROM USUARIOS WHERE id_usuario = :id";
            $stmt = Connection::get_Connection()->prepare($sql);
            $stmt ->bindParam(':id', $id);
            $stmt -> execute();
            $result = $stmt->fetch();
            return $result;
        } catch(PDOException $th){
            echo $th->getMessage();
        }
    }
    public static function guardarDato($data)
    {
        try{
            $sql = "INSERT INTO USUARIOS (nombre, apellido, correo, telefono, rol, username, passwd) VALUES (:nombre, :apellido, :correo, :telefono, :rol, :username, :passwd)";
            $stmt = Connection::get_Connection()->prepare($sql);
            $stmt ->bindParam(':nombre', $data['nombre']);
            $stmt ->bindParam(':apellido', $data['apellido']);
            $stmt ->bindParam(':correo', $data['correo']);
            $stmt ->bindParam(':telefono', $data['telefono']);
            $stmt ->bindParam(':rol', $data['rol']);
            $stmt ->bindParam(':username', $data['username']);
            $stmt ->bindParam(':passwd', $data['passwd']);
            $stmt -> execute();
            return true;
        } catch(PDOException $th){
            echo $th->getMessage();
        }
    }
    public static function actualizarDato($data)
    {
        try{
            $sql = "UPDATE USUARIOS SET nombre=:nombre, apellido=:apellido, correo=:correo, telefono=:telefono, rol=:rol, username=:username, passwd=:passwd WHERE id_usuario=:id_usuario";
            $stmt = Connection::get_Connection()->prepare($sql);
            $stmt ->bindParam(':nombre', $data['nombre']);
            $stmt ->bindParam(':apellido', $data['apellido']);
            $stmt ->bindParam(':correo', $data['correo']);
            $stmt ->bindParam(':telefono', $data['telefono']);
            $stmt ->bindParam(':rol', $data['rol']);
            $stmt ->bindParam(':username', $data['username']);
            $stmt ->bindParam(':passwd', $data['passwd']);
            $stmt ->bindParam(':id_usuario', $data['id_usuario']);
            $stmt -> execute();
            return true;
        } catch(PDOException $th){
            echo $th->getMessage();
        }
    }
    public static function eliminarDato($id)
    {
        try{
            $sql = "DELETE FROM USUARIOS WHERE id_usuario=:id_usuario";
            $stmt = Connection::get_Connection()->prepare($sql);
            $stmt ->bindParam(':id_usuario', $id);
            $stmt -> execute();
            return true;
        } catch(PDOException $th){
            echo $th->getMessage();
        }
    }
}
?>