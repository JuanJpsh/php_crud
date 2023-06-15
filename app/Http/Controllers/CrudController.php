<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index() {
        $datos=DB::select("SELECT tbl_actor.*, tbl_pais.nombre AS nombre_pais FROM tbl_actor INNER JOIN tbl_pais ON tbl_actor.id_pais_fk = tbl_pais.id_pais");
        $paises = DB::select("select id_pais, nombre from tbl_pais");
        return view("welcome", compact("datos", "paises"));
    }

    public function actor($id) {
        $peliculas=DB::select("SELECT a.nombres AS NombreActor, p.nombre AS NombrePais, pelicula.titulo AS TituloPelicula
        FROM tbl_actor a
        JOIN tbl_pais p ON a.id_pais_fk = p.id_pais
        JOIN tbl_reparto reparto ON a.id_actor = reparto.id_actor
        JOIN tbl_pelicula pelicula ON reparto.titulo_pelicula = pelicula.titulo where a.id_actor=$id");
        return view("actor", compact("peliculas"));
    }

    public function create(Request $request){
        try{
            $sql=DB::insert("insert into tbl_actor(id_actor, nombres, apellidos, genero, edad, id_pais_fk) values (?,?,?,?,?,?)", [
                $request->txtid_actor,
                $request->txtnombres,
                $request->txtapellidos,
                $request->txtgenero,
                $request->txtedad,
                $request->txtid_pais_fk
            ]);
        } catch (\Throwable $th) {
            $sql=0;
        }
        
        if($sql == true){
            return back()->with("Correcto","Actor registrado correctamente");
        } else {
            return back()->with("Incorrecto","Error al registrar actor.");
        }
    }

    public function update(Request $request){
        try{
            $sql=DB::update("update tbl_actor set nombres = ?, apellidos = ?, genero = ?, edad = ? where id_actor = ?", [
                $request->txtnombres,
                $request->txtapellidos,
                $request->txtgenero,
                $request->txtedad,
                $request->txtid_actor
            ]);
        } catch (\Throwable $th) {
            $sql=0;
        }
        
        if($sql == true){
            return back()->with("Correcto","Actor actualizado correctamente");
        } else {
            return back()->with("Incorrecto","Error al registrar actor.");
        }
    }

    public function delete($id){
        try{
            $slq = DB::delete("delete from tbl_actor where id_actor=$id");
        }catch(\throwable $th){
            $sql=0;
        }
        if($slq==true){
            return back()->with("correcto","Producto registrado correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }
    }

    public function getPais($id){
        try{
            $slq = DB::delete("delete from tbl_actor where id_actor=$id");
        }catch(\throwable $th){
            $sql=0;
        }
        if($slq==true){
            return back()->with("correcto","Producto registrado correctamente");
        }else{
            return back()->with("incorrecto","Error al registrar");
        }
    }
}
