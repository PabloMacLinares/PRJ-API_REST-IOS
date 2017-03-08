//
//  ManagerProfesor.swift
//  IZV Actividades
//
//  Created by Pablo Maciá on 11/2/17.
//  Copyright © 2017 BLC. All rights reserved.
//

import Foundation

class ManagerProfesor: Manager, RequestReceiver{
	
	let BASE_URL = "profesor"
	let client = Client()
	var dataReceiver: DataReceiver?
	
	func selectAll(receiver: DataReceiver){
		self.dataReceiver = receiver
		let url = client.BASE_URL + "/" + BASE_URL
		client.connectToServer(urlStr: url, method: client.METHOD_GET, receiver: self)
	}
	
	func selectById(id: Int, receiver: DataReceiver){
		self.dataReceiver = receiver
		let url = "\(client.BASE_URL)/\(BASE_URL)/id/\(id)"
		client.connectToServer(urlStr: url, method: client.METHOD_GET, receiver: self)
	}
	
	func onRequestReceived(data: Data){
		var profesores:[Profesor] = []
		
		guard let dictionary = Utils.parseJson(data: data) else{
			print("can´t parse")
			return
		}
		
		guard let dictProfesores = dictionary["Profesor"] as? [[String: Any]] else{
			print("can't parse profesor")
			return
		}
		
		
		for dictProfesor in dictProfesores{
			let p = Profesor(dictionary: dictProfesor)
			profesores.append(p)
			//print(p)
		}
		dataReceiver?.onDataReceived(data: profesores)
	}
	
	func onErrorReceived(message: String) {
		print(message)
	}
}

