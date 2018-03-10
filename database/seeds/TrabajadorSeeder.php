<?php

use Illuminate\Database\Seeder;

class TrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('trabajadores')->insert([
    		'id' => '1', 
    		'nombre' => 'EMIRVIS DEL VALLE', 
    		'apellido' => 'BAEZA R', 
    		'cedula'  => '14487829', 
    		'cargo' => 'COORDINADOR DE EXTENSION ( E )', 
    		'departamento' => 'Coordinación de Extensión', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '2', 
    		'nombre' => 'DALIANNY', 
    		'apellido' => 'POLANCO ', 
    		'cedula'  => '25355344', 
    		'cargo' => 'SECRETARIA', 
    		'departamento' => 'Coordinación de Extensión', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '3', 
    		'nombre' => 'CARLOS ENRIQUE', 
    		'apellido' => 'MEZA', 
    		'cedula'  => '16174185', 
    		'cargo' => 'JEFE DEL DPTO. DE PASANTIAS', 
    		'departamento' => 'Coordinación de Extensión', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '4', 
    		'nombre' => 'ROXY', 
    		'apellido' => 'GARCIA', 
    		'cedula'  => '10742811', 
    		'cargo' => 'GERENTE DE FINANZAS DIR NAL', 
    		'departamento' => 'Dirección Nacional', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '5', 
    		'nombre' => 'PEDRO', 
    		'apellido' => 'BRICEÑO', 
    		'cedula'  => '3524288', 
    		'cargo' => 'DIRECTOR EJECUTIVO NACIONAL', 
    		'departamento' => 'Dirección Nacional', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '6', 
    		'nombre' => 'LUISA', 
    		'apellido' => 'SALAZAR', 
    		'cedula'  => '12791806', 
    		'cargo' => 'JEFE DE DIV. DE PERSONAL', 
    		'departamento' => 'Personal', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '7', 
    		'nombre' => 'ANAHERMIS', 
    		'apellido' => 'PALOMO', 
    		'cedula'  => '20139014', 
    		'cargo' => 'SECRETARIA', 
    		'departamento' => 'Personal', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '8', 
    		'nombre' => 'JESSICA', 
    		'apellido' => 'MOTA', 
    		'cedula'  => '19092297', 
    		'cargo' => 'JEFE DE AREA HIGIENE Y SEGURIDAD', 
    		'departamento' => 'Personal', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '9', 
    		'nombre' => 'MARIELYS DEL VALLE', 
    		'apellido' => 'RUIZ NADALES', 
    		'cedula'  => '16174142', 
    		'cargo' => 'JEFE DE DIV. DE ADMINISTRACION', 
    		'departamento' => 'Administración', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '10', 
    		'nombre' => 'CRISBEL', 
    		'apellido' => 'COVA', 
    		'cedula'  => '17590760', 
    		'cargo' => 'JEFE DE COMPRAS', 
    		'departamento' => 'Administración', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '11', 
    		'nombre' => 'MARIANNY', 
    		'apellido' => 'GUEVARA', 
    		'cedula'  => '14423654', 
    		'cargo' => 'SECRETARIA', 
    		'departamento' => 'Administración', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '12', 
    		'nombre' => 'YICETH MARIA', 
    		'apellido' => 'RIVERO', 
    		'cedula'  => '17404920', 
    		'cargo' => 'AUXILIAR (PROVEDURIA)', 
    		'departamento' => 'Administración', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '13', 
    		'nombre' => 'PATRICIA', 
    		'apellido' => 'MAITA', 
    		'cedula'  => '11335938', 
    		'cargo' => 'AUXILIAR (PROVEDURIA)', 
    		'departamento' => 'Administración', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '14', 
    		'nombre' => 'NORELYS', 
    		'apellido' => 'BUTTO', 
    		'cedula'  => '8435200', 
    		'cargo' => 'AUXILIAR (PROVEDURIA)', 
    		'departamento' => 'Administración', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '15', 
    		'nombre' => 'OMAR', 
    		'apellido' => 'VALERA', 
    		'cedula'  => '17935264', 
    		'cargo' => 'SOPORTE TECNICO', 
    		'departamento' => 'Administración', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '16', 
    		'nombre' => 'HELY', 
    		'apellido' => 'VASQUEZ', 
    		'cedula'  => '18651622', 
    		'cargo' => 'MENSAJERO', 
    		'departamento' => 'Administración', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '17', 
    		'nombre' => 'JESUS', 
    		'apellido' => 'ALFARO', 
    		'cedula'  => '8373546', 
    		'cargo' => 'CHOFER', 
    		'departamento' => 'Administración', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '18', 
    		'nombre' => 'YENNI COROMOTO', 
    		'apellido' => 'MILLAN RAUSEO', 
    		'cedula'  => '13915635', 
    		'cargo' => 'JEFE DE DPTO.CONTABILIDAD', 
    		'departamento' => 'Contabilidad', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '19', 
    		'nombre' => 'EILYNN', 
    		'apellido' => 'QUISPE', 
    		'cedula'  => '17092577', 
    		'cargo' => 'SECRETARIA', 
    		'departamento' => 'Contabilidad', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '20', 
    		'nombre' => 'ANGIE', 
    		'apellido' => 'GUEVARA', 
    		'cedula'  => '17529219', 
    		'cargo' => 'CAJERO (A)', 
    		'departamento' => 'Contabilidad', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '21', 
    		'nombre' => 'GUSTAVO', 
    		'apellido' => 'TOVAR ', 
    		'cedula'  => '23897719', 
    		'cargo' => 'CAJERO (A)', 
    		'departamento' => 'Contabilidad', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '22', 
    		'nombre' => 'RUAL', 
    		'apellido' => 'RUIZ', 
    		'cedula'  => '13056624', 
    		'cargo' => 'CAJERO (A)', 
    		'departamento' => 'Contabilidad', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '23', 
    		'nombre' => 'NILYAN', 
    		'apellido' => 'TORCAT', 
    		'cedula'  => '17623411', 
    		'cargo' => 'CAJERO (A)', 
    		'departamento' => 'Contabilidad', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '24', 
    		'nombre' => 'OSCAR RICARDO', 
    		'apellido' => 'RAMIREZ', 
    		'cedula'  => '13250004', 
    		'cargo' => 'JEFE DE AREA SEVICIOS GENERALES', 
    		'departamento' => 'Servicios Generales', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '25', 
    		'nombre' => 'FRANKLIN ANTONIO', 
    		'apellido' => 'CORTEZ FIGUEROA', 
    		'cedula'  => '11377105', 
    		'cargo' => 'VIGILANTE', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '26', 
    		'nombre' => 'DAVID JOSE', 
    		'apellido' => 'ZAPATA FUENTES', 
    		'cedula'  => '5399556', 
    		'cargo' => 'VIGILANTE', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '27', 
    		'nombre' => 'JUAN', 
    		'apellido' => 'ROCCA', 
    		'cedula'  => '10309909', 
    		'cargo' => 'VIGILANTE', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '28', 
    		'nombre' => 'MAURICIO', 
    		'apellido' => 'GONZALEZ', 
    		'cedula'  => '14619818', 
    		'cargo' => 'VIGILANTE', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '29', 
    		'nombre' => 'MIRIAN', 
    		'apellido' => 'MARVAL', 
    		'cedula'  => '5391169', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '30', 
    		'nombre' => 'DANNY', 
    		'apellido' => 'MUDARRA', 
    		'cedula'  => '10830425', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '31', 
    		'nombre' => 'CRUZ JOSE', 
    		'apellido' => 'GONZALEZ LOPEZ', 
    		'cedula'  => '17721026', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '32', 
    		'nombre' => 'GLADYS DEL VALLE', 
    		'apellido' => 'MARCANO', 
    		'cedula'  => '8950807', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '33', 
    		'nombre' => 'BELKIS JOSEFINA', 
    		'apellido' => 'MENDOZA DE ACEVEDO', 
    		'cedula'  => '9281680', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '34', 
    		'nombre' => 'NEICI DEL VALLE', 
    		'apellido' => 'GUZMAN', 
    		'cedula'  => '9284972', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '35', 
    		'nombre' => 'OLGA MARIA', 
    		'apellido' => 'ROJAS', 
    		'cedula'  => '6341001', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '36', 
    		'nombre' => 'ADELAIDA', 
    		'apellido' => 'BARCENAS', 
    		'cedula'  => '8378322', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '37', 
    		'nombre' => 'GERONIMA MILAGROS', 
    		'apellido' => 'SUBERO', 
    		'cedula'  => '13998670', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '38', 
    		'nombre' => 'DORIS', 
    		'apellido' => 'ANDRADE', 
    		'cedula'  => '4623583', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '39', 
    		'nombre' => 'ALEXIS', 
    		'apellido' => 'BENAVIDEZ', 
    		'cedula'  => '12151334', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '40', 
    		'nombre' => 'JUDITH', 
    		'apellido' => 'GRANADILLO', 
    		'cedula'  => '14253291', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '41', 
    		'nombre' => 'ODALIS COROMOTO', 
    		'apellido' => 'CARRION', 
    		'cedula'  => '8379256', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '42', 
    		'nombre' => 'LUISA ELENA', 
    		'apellido' => 'RIVAS', 
    		'cedula'  => '15116925', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '43', 
    		'nombre' => 'CARLOS ALFREDO', 
    		'apellido' => 'RODRIGUEZ', 
    		'cedula'  => '20002987', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '44', 
    		'nombre' => 'IRAIMA', 
    		'apellido' => 'PALMA', 
    		'cedula'  => '16175642', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '45', 
    		'nombre' => 'YONNY', 
    		'apellido' => 'HERNANDEZ', 
    		'cedula'  => '16809424', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '46', 
    		'nombre' => 'HILDA', 
    		'apellido' => 'RIOS', 
    		'cedula'  => '6487749', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '47', 
    		'nombre' => 'JOSE ', 
    		'apellido' => 'ARIAS', 
    		'cedula'  => '20248764', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '48', 
    		'nombre' => 'MIRAIDA', 
    		'apellido' => 'ECHEVERRIA', 
    		'cedula'  => '15279981', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '49', 
    		'nombre' => 'YIRBIN', 
    		'apellido' => 'ROJAS', 
    		'cedula'  => '20917545', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '50', 
    		'nombre' => 'PEDRO', 
    		'apellido' => 'RONDON', 
    		'cedula'  => '15030226', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '51', 
    		'nombre' => 'ADALGIZA', 
    		'apellido' => 'MENDOZA', 
    		'cedula'  => '18600189', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '52', 
    		'nombre' => 'JOSE LUIS', 
    		'apellido' => 'ROMERO', 
    		'cedula'  => '13940961', 
    		'cargo' => 'PERSONAL DE  MANTENIMIENTO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '53', 
    		'nombre' => 'LINDOLFO', 
    		'apellido' => 'SAVEDRA', 
    		'cedula'  => '8136794', 
    		'cargo' => 'JEFE DE ESC. ING. CIVIL', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '54', 
    		'nombre' => 'MIRIAM', 
    		'apellido' => 'SALAS', 
    		'cedula'  => '592313', 
    		'cargo' => 'JEFE DE ESC. DE ARQUITECTURA', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '55', 
    		'nombre' => 'JESUS', 
    		'apellido' => 'COA', 
    		'cedula'  => '11774062', 
    		'cargo' => 'JEFE DE ESC.ING.MANT.MECANICO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '56', 
    		'nombre' => 'RIGOBERTO', 
    		'apellido' => 'RODRIGUEZ', 
    		'cedula'  => '5073644', 
    		'cargo' => 'JEFE ESC.ING.ELECTRONICA Y ELECTRICA', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '57', 
    		'nombre' => 'MARIANN ', 
    		'apellido' => 'MARTINEZ', 
    		'cedula'  => '13994708', 
    		'cargo' => 'JEFE DE ESC.ING.DE SISTEMAS', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '58', 
    		'nombre' => 'LIRIANNIS', 
    		'apellido' => 'GOMEZ', 
    		'cedula'  => '20420081', 
    		'cargo' => 'COORDINADORA DE CICLO BASICO', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '59', 
    		'nombre' => 'JOSE', 
    		'apellido' => 'BLANCO', 
    		'cedula'  => '16311428', 
    		'cargo' => 'COORDINADOR DE SAIA', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '60', 
    		'nombre' => 'MARIA ALEJANDRA', 
    		'apellido' => 'FLORES ASENSO', 
    		'cedula'  => '12537343', 
    		'cargo' => 'SECRETARIA ', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '61', 
    		'nombre' => 'AURAMARINA', 
    		'apellido' => 'LOPEZ', 
    		'cedula'  => '24344471', 
    		'cargo' => 'SECRETARIA', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '62', 
    		'nombre' => 'ROSMARY', 
    		'apellido' => 'MARCANO RODULFO', 
    		'cedula'  => '15576755', 
    		'cargo' => 'SECRETARIA ', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '63', 
    		'nombre' => 'MARIANNYS', 
    		'apellido' => 'GOMEZ', 
    		'cedula'  => '22974551', 
    		'cargo' => 'SECRETARIA ', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '64', 
    		'nombre' => 'MANUEL', 
    		'apellido' => 'MAGO', 
    		'cedula'  => '13250974', 
    		'cargo' => 'ENCARGADO DE LAB', 
    		'departamento' => 'Sección de Vigilancia', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '65', 
    		'nombre' => 'MAXS', 
    		'apellido' => 'RUETTE', 
    		'cedula'  => '4776619', 
    		'cargo' => 'COORDINADOR CADETEC', 
    		'departamento' => 'Cadetec', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '66', 
    		'nombre' => 'MERALBYS JACKELINE', 
    		'apellido' => 'CARMONA COA', 
    		'cedula'  => '19781834', 
    		'cargo' => 'SECRETARIO', 
    		'departamento' => 'Cadetec', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '67', 
    		'nombre' => 'RAUL JOSE', 
    		'apellido' => 'BETANCOURT RODRIGUEZ', 
    		'cedula'  => '20645567', 
    		'cargo' => 'SECRETARIA', 
    		'departamento' => 'Cadetec', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '68', 
    		'nombre' => 'PEDRO', 
    		'apellido' => 'LOPEZ', 
    		'cedula'  => '25282162', 
    		'cargo' => 'SECRETARIO', 
    		'departamento' => 'Cadetec', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '69', 
    		'nombre' => 'ROSANNI', 
    		'apellido' => 'SALAZAR', 
    		'cedula'  => '19077966', 
    		'cargo' => 'JEFE DPTO.PASANTIAS ', 
    		'departamento' => 'Calidad', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '70', 
    		'nombre' => 'LEVYS', 
    		'apellido' => 'FIGUEROA', 
    		'cedula'  => '4025556', 
    		'cargo' => 'JEFE DPTO.DE TECNOLOGIA EDUCATIVA', 
    		'departamento' => 'Tecnología Educativa', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '71', 
    		'nombre' => 'RUDIS DEL VALLE', 
    		'apellido' => 'AGUILERA', 
    		'cedula'  => '12538357', 
    		'cargo' => 'AUXILIAR DE BIBLIOTECA', 
    		'departamento' => 'Tecnología Educativa', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '72', 
    		'nombre' => 'LISY DEL VALLE', 
    		'apellido' => 'ALCALA GARCIA', 
    		'cedula'  => '13249112', 
    		'cargo' => 'AUXILIAR DE BIBLIOTECA', 
    		'departamento' => 'Tecnología Educativa', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '73', 
    		'nombre' => 'ELIZABETH', 
    		'apellido' => 'NORIEGA', 
    		'cedula'  => '4046434', 
    		'cargo' => 'AUXILIAR DE BIBLIOTECA', 
    		'departamento' => 'Tecnología Educativa', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '74', 
    		'nombre' => 'DELIA', 
    		'apellido' => 'ROMERO', 
    		'cedula'  => '9289983', 
    		'cargo' => 'AUXILIAR DE BIBLIOTECA', 
    		'departamento' => 'Tecnología Educativa', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '75', 
    		'nombre' => 'NELLYA M', 
    		'apellido' => 'CEDEÑO', 
    		'cedula'  => '9900632', 
    		'cargo' => 'AUXILIAR DE BIBLIOTECA', 
    		'departamento' => 'Tecnología Educativa', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '76', 
    		'nombre' => 'LINNEYS', 
    		'apellido' => 'VILLARROEL', 
    		'cedula'  => '9898658', 
    		'cargo' => 'AUXILIAR DE BIBLIOTECA', 
    		'departamento' => 'Tecnología Educativa', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '77', 
    		'nombre' => 'RICCI', 
    		'apellido' => 'MOROCOIMA', 
    		'cedula'  => '12966235', 
    		'cargo' => 'AUXILIAR DE BIBLIOTECA', 
    		'departamento' => 'Tecnología Educativa', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '78', 
    		'nombre' => 'MARIA', 
    		'apellido' => 'GONZALEZ', 
    		'cedula'  => '11344699', 
    		'cargo' => 'AUXILIAR DE BIBLIOTECA', 
    		'departamento' => 'Tecnología Educativa', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '79', 
    		'nombre' => 'SIMON', 
    		'apellido' => 'RAMIREZ', 
    		'cedula'  => '12537040', 
    		'cargo' => 'AUXILIAR DE BIBLIOTECA', 
    		'departamento' => 'Tecnología Educativa', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '80', 
    		'nombre' => 'ANALIZ', 
    		'apellido' => 'HERNANDEZ', 
    		'cedula'  => '14187975', 
    		'cargo' => 'AUXILIAR DE BIBLIOTECA', 
    		'departamento' => 'Tecnología Educativa', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '81', 
    		'nombre' => 'YUDIRMA BAUTISTA', 
    		'apellido' => 'CEDEÑO DE PEREZ', 
    		'cedula'  => '12792662', 
    		'cargo' => 'AUXILIAR DE BIBLIOTECA', 
    		'departamento' => 'Tecnología Educativa', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '82', 
    		'nombre' => 'KEILYN', 
    		'apellido' => 'SOLORZANO', 
    		'cedula'  => '15563928', 
    		'cargo' => 'JEFE DIVISION DE ADMISION Y CONTROL DE ESTUDIO ', 
    		'departamento' => 'Control Académico', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '83', 
    		'nombre' => 'JOSE', 
    		'apellido' => 'FIGUERA', 
    		'cedula'  => '19747527', 
    		'cargo' => 'SECRETARIO', 
    		'departamento' => 'Control Académico', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '84', 
    		'nombre' => 'ANACARLS', 
    		'apellido' => 'GARCIA', 
    		'cedula'  => '14508136', 
    		'cargo' => 'COORD. DE EVALUACION Y EQUIVALENCIA', 
    		'departamento' => 'Control Académico', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '85', 
    		'nombre' => 'EDUARDO', 
    		'apellido' => 'ARMAS ', 
    		'cedula'  => '20535591', 
    		'cargo' => 'SECRETARIO', 
    		'departamento' => 'Control Académico', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '86', 
    		'nombre' => 'JESSICA', 
    		'apellido' => 'PRADO', 
    		'cedula'  => '15618325', 
    		'cargo' => 'SECRETARIA', 
    		'departamento' => 'Control Académico', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '87', 
    		'nombre' => 'MIGUEL', 
    		'apellido' => 'RAMIREZ', 
    		'cedula'  => '12150420', 
    		'cargo' => 'SECRETARIO', 
    		'departamento' => 'Control Académico', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '88', 
    		'nombre' => 'MARISOL', 
    		'apellido' => 'LARA', 
    		'cedula'  => '14424146', 
    		'cargo' => 'ARCHIVISTA', 
    		'departamento' => 'Control Académico', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '89', 
    		'nombre' => 'LUISANGELA', 
    		'apellido' => 'VELASQUEZ ', 
    		'cedula'  => '17934194', 
    		'cargo' => 'JEFE DE DPTO.DE DOBE', 
    		'departamento' => 'Dobe', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '90', 
    		'nombre' => 'JUAN', 
    		'apellido' => 'FIGUEROA', 
    		'cedula'  => '11773081', 
    		'cargo' => 'COORDINADOR DE DEPORTE', 
    		'departamento' => 'Dobe', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '91', 
    		'nombre' => 'ANGEL', 
    		'apellido' => 'MUNDARAY', 
    		'cedula'  => '11339916', 
    		'cargo' => 'COORDINADOR DE CULTURA', 
    		'departamento' => 'Dobe', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '92', 
    		'nombre' => 'MAXS', 
    		'apellido' => 'FEBRES', 
    		'cedula'  => '22969003', 
    		'cargo' => 'SECRETARIO', 
    		'departamento' => 'Dobe', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '93', 
    		'nombre' => 'RITA', 
    		'apellido' => 'PUENTE', 
    		'cedula'  => '10935981', 
    		'cargo' => 'PARAMEDICO', 
    		'departamento' => 'Dobe', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '94', 
    		'nombre' => 'MARIA', 
    		'apellido' => 'MENESES', 
    		'cedula'  => '10837096', 
    		'cargo' => 'PSICOLOGO', 
    		'departamento' => 'Dobe', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '95', 
    		'nombre' => 'BENITO', 
    		'apellido' => 'MATOS', 
    		'cedula'  => '2627158', 
    		'cargo' => 'ORIENTADOR VOCACIONAL', 
    		'departamento' => 'Dobe', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '96', 
    		'nombre' => 'JORGE', 
    		'apellido' => 'MARIN', 
    		'cedula'  => '10307009', 
    		'cargo' => 'INSTRUCTOR DE CULTURA', 
    		'departamento' => 'Dobe', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '97', 
    		'nombre' => 'XIOMARA', 
    		'apellido' => 'BASTARDO DE MOYA', 
    		'cedula'  => '3701377', 
    		'cargo' => 'JEFE DPTO.EXTENSION UNIVERSITARIA', 
    		'departamento' => 'Extensión Universitaria', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '98', 
    		'nombre' => 'BERNADETTE', 
    		'apellido' => 'CANELON', 
    		'cedula'  => '18272743', 
    		'cargo' => 'SECRETARIA', 
    		'departamento' => 'Extensión Universitaria', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '99', 
    		'nombre' => 'KARELYS', 
    		'apellido' => 'SANCHEZ', 
    		'cedula'  => '11775226', 
    		'cargo' => 'JEFE DE AREA PROMOCION Y DIFUSION', 
    		'departamento' => 'Extensión Universitaria', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '100', 
    		'nombre' => 'YOLIS', 
    		'apellido' => 'LUNA', 
    		'cedula'  => '10830929', 
    		'cargo' => 'JEFE DE AREA (SERVICIO Y PROYECTO COMUNITARIO)', 
    		'departamento' => 'Extensión Universitaria', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '101', 
    		'nombre' => 'SUSA', 
    		'apellido' => 'PRADA', 
    		'cedula'  => '12150296', 
    		'cargo' => 'SECRETARIA (SERVICIO Y PROYECTO COMUNITARIO)', 
    		'departamento' => 'Extensión Universitaria', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '102', 
    		'nombre' => 'ANA', 
    		'apellido' => 'SABINO', 
    		'cedula'  => '16809220', 
    		'cargo' => 'JEFE DE DPTO.INVESTIGACION Y POST GRADO', 
    		'departamento' => 'Investigación Y Postgrado', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '103', 
    		'nombre' => 'MIGDALIA', 
    		'apellido' => 'BLANCA', 
    		'cedula'  => '9287960', 
    		'cargo' => 'JEFE DE AREA TRABAJO DE GRADO', 
    		'departamento' => 'Investigación Y Postgrado', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);

    	DB::table('trabajadores')->insert([
    		'id' => '104', 
    		'nombre' => 'WILBERTO', 
    		'apellido' => 'RAMIREZ', 
    		'cedula'  => '23606497', 
    		'cargo' => 'SECRETARIO', 
    		'departamento' => 'Investigación Y Postgrado', 
    		'created_at' => date('y-m-d h:m:s'), 
    		'updated_at' => date('y-m-d h:m:s')
    	]);


    }
}
