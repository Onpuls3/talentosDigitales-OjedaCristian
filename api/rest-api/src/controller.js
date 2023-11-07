import {pool} from './database.js';

class librosController{
    async getAll(req, res) {
        const [result] = await pool.query(`SELECT * FROM libros`);
        res.json(result);
    }

    async getOne(req, res){
        try {
        const id = req.params.id;
        const [result] = await pool.query(`SELECT * FROM libros WHERE id=(?)`, [id]);
        if (result.length > 0) {
        res.json(result[0]);
    } else {
        res.status(404).json({"Error":"No se encontro el libro con el id proporcionado"});
    }
    } catch (error) {
        res.status(500).json({"Error":"Ocurrio un error al obtener el libro"});
    }
}

    async add(req, res){
        try {
        const libros = req.body;
        const [result] = await pool.query(`INSERT INTO libros(nombre, autor, categoria, fechaPublicacion, ISBN) VALUES(?, ?, ?, ?, ?)`, [libros.nombre, libros.autor, libros.categoria, libros.fechaPublicacion, libros.ISBN]);
        res.json({"id insertado": result.insertId, "message":"Libro cargado exitosamente"});
    } catch (error) {
        res.status(500).json({"Error":"Ocurrio un error al cargar el libro"});
    }
}

    async delete(req, res){
        try {
        const libros = req.body;
        const [result] = await pool.query(`DELETE FROM libros WHERE id=(?)`, [libros.id]);
        if(result.affectedRows <=0) return res.status(404).json({message:"Libro no encontrado"});
        res.json({"Libro eliminado exitosamente": result.affectedRows});
        } catch (error) {
            return res.status(500).json({message:"No se puede eliminar el libro"});
        }
    }

    async update(req, res){
        try {
        const libros = req.body;
        const [result] = await pool.query(`UPDATE libros SET nombre=(?), autor=(?), categoria=(?), fechaPublicacion=(?), ISBN=(?) WHERE id=(?)`, [libros.nombre, libros.autor, libros.categoria, libros.fechaPublicacion, libros.ISBN, libros.id]);
        res.json({"Libro actualizado exitosamente": result.changedRows});
    } catch {
        res.status(500).json({"Error":"Ocurrio un error al intentar actualizar el libro"});
    }
}

}

export const libros = new librosController();