//
//  Profesor.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 6/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import Foundation

class Profesor: CustomStringConvertible{
	
	var id: Int
	var nombre: String
	var departamento: String
	
	init(nombre: String, departamento: String){
		self.id = -1
		self.nombre = nombre
		self.departamento = departamento
	}
	
	init(id: Int, nombre: String, departamento: String){
		self.id = id
		self.nombre = nombre
		self.departamento = departamento
	}
	
	init(dictionary: [String: Any]){
		self.id = dictionary["id"] as! Int
		self.nombre = dictionary["nombre"] as! String
		self.departamento = dictionary["departamento"] as! String
	}
	
	public var description: String {
		return "Profesor: id \(id), nombre \(nombre), departamento \(departamento)"
	}
}
