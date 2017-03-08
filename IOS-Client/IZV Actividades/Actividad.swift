//
//  Actividad.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 6/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import UIKit

class Actividad: CustomStringConvertible{
	
	var id: Int
	var profesor: Profesor?
	var grupo: Grupo?
	var titulo: String
	var descripcion: String
	var fecha: Date
	var lugar: String
	var horaInicio: Date
	var horaFin: Date
	var imagen: UIImage?
	
	init(profesor: Profesor, grupo: Grupo, titulo: String, descripcion: String, fecha: Date, lugar: String, horaInicio: Date, horaFin: Date, imagen: UIImage){
		self.id = -1
		self.profesor = profesor
		self.grupo = grupo
		self.titulo = titulo
		self.descripcion = descripcion
		self.fecha = fecha
		self.lugar = lugar
		self.horaInicio = horaInicio
		self.horaFin = horaFin
		self.imagen = imagen
	}
	
	init(id: Int, profesor: Profesor, grupo: Grupo, titulo: String, descripcion: String, fecha: Date, lugar: String, horaInicio: Date, horaFin: Date, imagen: UIImage){
		self.id = id
		self.profesor = profesor
		self.grupo = grupo
		self.titulo = titulo
		self.descripcion = descripcion
		self.fecha = fecha
		self.lugar = lugar
		self.horaInicio = horaInicio
		self.horaFin = horaFin
		self.imagen = imagen
	}
	
	init(dictionary: [String: Any]){
		self.id = dictionary["id"] as! Int
		self.profesor = Profesor(dictionary: dictionary["profesor"] as! [String : Any])
		self.grupo = Grupo(dictionary: dictionary["grupo"] as! [String : Any])
		self.titulo = dictionary["titulo"] as! String
		self.descripcion = dictionary["descripcion"] as! String
		self.fecha = Utils.stringToDate(date: dictionary["fecha"] as! String)
		self.lugar = dictionary["lugar"] as! String
		self.horaInicio = Utils.stringToTime(time: dictionary["horaInicio"] as! String)
		self.horaFin = Utils.stringToTime(time: dictionary["horaFin"] as! String)
		if(dictionary["imagen"] as! String != ""){
			let imageData = NSData(base64Encoded: dictionary["imagen"] as! String, options: .ignoreUnknownCharacters)
			self.imagen = UIImage(data: imageData as! Data)!
		}else{
			self.imagen = UIImage()
		}
	}
	
	init(){
		self.id = -1
		self.profesor = nil
		self.grupo = nil
		self.titulo = ""
		self.descripcion = ""
		self.fecha = Date()
		self.lugar = ""
		self.horaInicio = Date()
		self.horaFin = Date()
		self.imagen = UIImage()
	}
	
	var description: String{
		return "Actividad: id \(id), profesor \(profesor), grupo \(grupo), titulo \(titulo), descripcion \(descripcion), fecha \(fecha), lugar \(lugar), horaInicio \(horaInicio), horaFin \(horaFin)"
	}
	
	func getDictionary() -> [String: Any] {
		var dict = [String: Any]()
		dict["id"] = self.id
		dict["profesor"] = self.profesor?.id
		dict["grupo"] = self.grupo?.id
		dict["titulo"] = self.titulo
		dict["descripcion"] = self.descripcion
		dict["fecha"] = Utils.dateForDictionary(date: self.fecha)
		dict["lugar"] = self.lugar
		dict["horaInicio"] = Utils.timeForDictionary(date: self.horaInicio)
		dict["horaFin"] = Utils.timeForDictionary(date: self.horaFin)
		if(imagen?.size.width != 0){
			let imageData: Data = UIImageJPEGRepresentation(self.imagen!, 0.4)!
			dict["imagen"] = imageData.base64EncodedString(options: .endLineWithCarriageReturn)
		}else{
			dict["imagen"] = ""
		}
		return dict
	}
	
	public static func sortByDate(ac1: Actividad, ac2: Actividad) -> Bool{
		if(ac1.fecha != ac2.fecha){
			return ac1.fecha > ac2.fecha
		}else{
			return ac1.horaInicio > ac2.horaInicio
		}
	}
}
