//
//  Grupo.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 6/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import Foundation

class Grupo: CustomStringConvertible{
	
	var id: Int
	var nombre: String
	
	init(nombre:String){
		self.id = -1
		self.nombre = nombre
	}
	
	init(id: Int, nombre: String){
		self.id = id
		self.nombre = nombre
	}
	
	init(dictionary: [String: Any]){
		self.id = dictionary["id"] as! Int
		self.nombre = dictionary["nombre"] as! String
	}
	
	public var description: String {
		return "Grupo: id \(id), nombre \(nombre)"
	}
}
